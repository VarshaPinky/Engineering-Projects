<?php
	$dbuser = "root";
	$dbpass = "1234";
	$dbhost = "localhost:3306";
	$dbname = "librarydatabase";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if($connection){
		echo "Connected to DATABASE<br>";
	}
	else{
		echo "NOT CONNECTED TO DATABASE<br>";
	}


 

	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$bname = $_POST['bookname'];
		$author = $_POST['author'];
		$bid = $_POST['bookid'];
		$isbn = $_POST['isbn'];
		$branch = $_POST['branch'];
		$genre = $_POST['genre'];// try $genre[] -- it kind of worked
		$language = $_POST['language'];
		$publisher = $_POST['publ'];
		$avail=$_POST['avail'];
		$res=$_POST['res'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
	
	$sql = "INSERT librarydatabase.novel(Book_Id,ISBN,Book_Name,Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id)
	VALUES('$bid','$isbn','$bname','$language','$avail','$res','$author','$publisher')";
	//for($i=0;$i<$count;$i++){
	$sql1 = "INSERT librarydatabase.genre(B_Id,B_Genre)
	VALUES('$bid','$genre')";
    //}
	$sql2 = "INSERT librarydatabase.b_location(Boo_Id,B_Location)
	VALUES('$bid','$branch')";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	$result2 = mysqli_query($connection,$sql2);
	if($result){
		echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.novel";
	$sql1 = "SELECT * FROM librarydatabase.genre";
	$sql2 = "SELECT * FROM librarydatabase.b_location";
	$result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
$result2 = mysqli_query($connection,$sql2);
	echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>ISBN</th><th>BOOK NAME</th><th>BOOK LANGUAGE</th><th>BOOK AVAILABILITY</th><th>BOOK RESERVE</th><th>AUTHOR ID</th><th>PUBLISHER ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[Book_Id]</td>";
		echo "<td>$row[ISBN]</td>";
		echo "<td>$row[Book_Name]</td>";
		echo "<td>$row[Book_Language]</td>";
		echo "<td>$row[Book_Availability]</td>";
		echo "<td>$row[Book_Reserve]</td>";
		echo "<td>$row[Auth_Id]</td>";
		echo "<td>$row[Publ_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";

echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>BOOK GENRE</th></tr>";
	while($row = mysqli_fetch_array($result1)){
		echo "<tr>";
		echo "<td>$row[B_Id]</td>";
		echo "<td>$row[B_Genre]</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>BOOK LOCATION</th></tr>";
	while($row = mysqli_fetch_array($result2)){
		echo "<tr>";
		echo "<td>$row[Boo_Id]</td>";
		echo "<td>$row[B_Location]</td>";
		echo "</tr>";
	}
	echo "</table>";

 
?>
