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
		$mname = $_POST['mname'];
		$mail = $_POST['mail'];
		$cno = $_POST['cont_number'];
		$dob = $_POST['bday'];
		$type = $_POST['type'];
		$ms = $_POST['memstrt'];
		$mf = $_POST['memfin'];
		$mid=$_POST['memid'];
		$mp=$_POST['mempswd'];
		$libid=$_POST['libid'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
	
	$sql = "INSERT librarydatabase.member(Mem_Id,Mem_Name,Mem_Email,Mem_Contact,M_DOB,Membership_start,Membership_End,Mem_psswd,Libr_Id)
	VALUES('$mid','$mname','$mail','$cno','$dob','$ms','$mf','$mp','$libid')";
	//for($i=0;$i<$count;$i++){
	$sql1 = "INSERT librarydatabase.member_card(Mbr_Id,Mbr_Name,B_2_P_2,B_1_P_1)
	VALUES('$mid','$mname','$b2','$b1')";
    //}
	
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	
	if($result){
		echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.member";
	$sql1 = "SELECT * FROM librarydatabase.member_card";
	$result = mysqli_query($connection,$sql);
	$result1=mysqli_query($connection,$sql1)
	echo "<table style='border:2px solid black;'><tr><th>MEMBER ID</th><th>MEMBER NAME</th><th>MEMEBER EMAIL </th><th>CONTACT NUMBER</th><th>DOB</th><th>MEMBERSHIP START DATE</th><th>MEMBERSHIP END DATE</th><th>MEMBER PASSWORD</th><th>LIBRARIAN ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[Mem_Id]</td>";
		echo "<td>$row[Mem_Name]</td>";
		echo "<td>$row[Mem_Email]</td>";
		echo "<td>$row[Mem_Contact]</td>";
		echo "<td>$row[M_DOB]</td>";
		echo "<td>$row[Membership_start]</td>";
		echo "<td>$row[Membership_End]</td>";
		echo "<td>$row[Mem_psswd]</td>";
		echo "<td>$row[Libr_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "<table style='border:2px solid black;'><tr><th>MEMBER ID</th><th>MEMBER NAME</th><th>2 BOOKS 2 PERIODICALS</th><th>1 BOOK 1 PERIODICAL</th></tr>";
	while($row = mysqli_fetch_array($result1)){
		echo "<tr>";
		echo "<td>$row[Mbr_Id]</td>";
		echo "<td>$row[Mbr_Name]</td>";
		echo "<td>$row[B_2_P_2]</td>";
		echo "<td>$row[B_1_P_1]</td>";
		echo "</tr>";
	}
	echo "</table>";


 
?>
