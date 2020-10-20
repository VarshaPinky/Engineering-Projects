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
		$lid = $_POST['lid'];
		$ln = $_POST['lname'];
		$lp = $_POST['lpswd'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
	
	$sql = "INSERT librarydatabase.librarian(Lib_Id,Lib_Name,Lib_psswd)
	VALUES('$lid','$ln','$lp')";
	//for($i=0;$i<$count;$i++){
	$sql1 = "INSERT librarydatabase.libr_location(Li_Id,Li_Loc)
	VALUES('$lid','$lloc')";
    //}
	
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	
	if($result){
		echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.librarian";
	$sql1 = "SELECT * FROM librarydatabase.libr_location";
	
	$result = mysqli_query($connection,$sql);
	$reult1 = mysqli_query($connetion,$sql1);

	
echo "<table style='border:2px solid black;'><tr><th>LIBRARIAN ID</th><th>LIBRARIAN NAME</th><th>LIBRARIAN PASSWAORD</th><th>LIBRARIAN LOCATION</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[Lib_Id]</td>";
		echo "<td>$row[Lib_Name]</td>";
		echo "<td>$row[Lib_psswd]</td>";
		echo "</tr>";
	}
	echo "</table>";

echo "</table>";
echo "<table style='border:2px solid black;'><tr><th>LIBRARIAN ID</th><th>LIBRARIAN</tr>";
	while($row = mysqli_fetch_array($result1)){
		echo "<tr>";
		echo "<td>$row[Li_Id]</td>";
		echo "<td>$row[Li_Loc]</td>";
		echo "</tr>";
	}
	echo "</table>";
 
?>
