from flask import Flask,jsonify,request,Response
import re
import datetime
import sqlite3
from sqlalchemy.dialects.sqlite import TIMESTAMP
from requests import post,get
from sqlalchemy import and_,Column,Integer,String,DateTime
from  flask_sqlalchemy import SQLAlchemy
app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///app.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = True
db = SQLAlchemy(app)
class User(db.Model):
    ___tablename__ = 'user'
    username = db.Column(db.String(50), primary_key=True)
    password = db.Column(db.String(50), primary_key=True)
db.session.commit()
c=0
@app.route('/api/v1/users',methods=["PUT"])
def add_user():
                global c
                c+=1
                data = request.get_json()
                if re.match(r'[a-fA-F0-9]{40}$',data["password"]):
                        r = post('http://0.0.0.0:80/api/v1/db/read',json={"api":"add","usn":data["username"]})
                        if r.status_code == 201:
                                data["api"] = "add"
                                r1=post('http://0.0.0.0:80/api/v1/db/write',json = data)
                                if(r1.status_code==200):
                                        return jsonify({}),201
                                else:
                                        return jsonify({}),400
                        else:
                                return jsonify({}),400
                else:

                        return jsonify({}),400

@app.route('/api/v1/db/read',methods = ["POST"])
def read():
        if request.get_json()["api"] == "add":
                try:
                        u = User.query.filter_by(username = request.get_json()["usn"]).one()
                except:
                        return jsonify({}),201
                return jsonify({}),400
        elif request.get_json()["api"] == "remove":
                usn = request.get_json()["column"]
                try:
                        u = User.query.filter_by(username = usn).one()
                except:
                        return jsonify({}),400
                return jsonify({}),200
        elif request.get_json()["api"]== "clear_db":
                if not User.query.all():
                        return jsonify({}),400
                else:
                        return jsonify({}),200
        elif request.get_json()["api"] == "list_users":
                try:
                        if not User.query.all():
                                return Response(status=204)
                        else:
                                v = User.query.all()
                                l=[]
                                for i in v:
                                        l.append(i.username)
                                return jsonify(l),200
                except:
                        return Response(status=400)
@app.route('/api/v1/db/write',methods = ["POST"])
def write():
        if request.get_json()["api"] == "remove":
                db.session.delete(User.query.filter_by(username = request.get_json()["column"]).one())
                db.session.commit()
                return jsonify({}),200
        if request.get_json()["api"] == "add":
                db.session.add(User(username=request.get_json()["username"],password=request.get_json()["password"]))
                db.session.commit()
                return jsonify({}),200
        if request.get_json()["api"] == "clear_db":
                meta = db.metadata
                for table in reversed(meta.sorted_tables):
                        db.session.execute(table.delete())
                db.session.commit()
                return jsonify({}),200
@app.route('/api/v1/users/<username>',methods = ["DELETE"])
def remove_user(username):
                global c
                c+=1
                r = post('http://0.0.0.0:80/api/v1/db/read',json = {"api":"remove","column":username})
                if r.status_code == 400:
                        return jsonify({}),400
                elif r.status_code == 200:
                        post('http://0.0.0.0:80/api/v1/db/write',json = {"api":"remove","column":username})
                        return jsonify({}),200
@app.route('/api/v1/users',methods=['GET'])
def list_all_users():
                global c
                c+=1
                r = post('http://0.0.0.0:80/api/v1/db/read',json ={"api":"list_users"})
                if r.status_code == 200:
                        return jsonify(r.json()),200
                elif r.status_code == 204:
                        return jsonify({}),204
                else:
                        return jsonify({}),400

@app.route('/api/v1/db/clear',methods=['POST'])
def clear_db():
                r=post('http://0.0.0.0:80/api/v1/db/read',json = {"api":"clear_db"})
                if r.status_code == 200:
                        r1 = post('http://0.0.0.0:80/api/v1/db/write',json = {"api":"clear_db"})
                        if r1.status_code == 200:
                                return jsonify({}),200
                        return jsonify({}),400
                else:
                        return jsonify({}),200

@app.errorhandler(405)
def handle(e):
    global c
    c+=1
    return jsonify({}),405

@app.route('/api/v1/_count',methods = ["GET"])
def count_req():
        return jsonify([c]),200

@app.route('/api/v1/_count',methods = ["DELETE"])
def reset_count():
        global c
        c=0
        return Response(status=200)

if __name__ == '__main__':
        db.create_all()
        app.run(debug=True,host="0.0.0.0",port="80")