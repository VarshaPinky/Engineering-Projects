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
/*$result = mysqli_query($connection,$sql);
if($result){
		echo "yes<br>";
	}
else{
		echo "no<br>";
	}
$sql="SELECT * FROM $novel";
//$result=mysqli_query($sql);*/

/* Count table rows */
//$count=mysql_num_rows($result);
/*?>
<?php*/

/* Check if button name "Submit" is active, do this */
//if(isset($_POST['Submit']))
//{
$sql = "UPDATE librarydatabase.member SET Mem_Id='$mid', Mem_Name='$mname', Mem_Email='$mail' , Mem_Contact='$cno' , M_DOB='$bday' , Membership_start='$ms' , Membership_End='$mf' , Mem_psswd='$mp' , Libr_Id='$lid' WHERE Mem_Id='$mid";
$sql1 = "UPDATE  librarydatabase.member_card SET Mem_Id='$mid', Mem_Name='$mname', Type='$type' WHERE Mem_Id='$mid'";
$result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
if(mysqli_query($connection,$sql)){
		echo "yes<br>";
	}
else{
		echo "no<br>";
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
	<!--//$count=count($_POST[]);
	//}
//for($i=0;$i<$count;$i++){
//$sql1="UPDATE $novel SET Book_Id='$bid', ISBN='$isbn', Book_Name='$bname',Book_Language='$language', Book_Availability='$avail', Book_Reserve='$res', Auth_Id='$author', Publ_Id='$publ' WHERE Book_Id='$bid'";
//$result1=mysqli_query($sql1);
//}


//echo $count;
//mysqli_close();

<table width="500" border="0" cellspacing="1" cellpadding="0">
<form name="form1" method="post" action="">
<tr>
<td>
<table width="500" border="0" cellspacing="1" cellpadding="0">

<tr>
<td align="center"><strong>Book Id</strong></td>
<td align="center"><strong>ISBN</strong></td>
<td align="center"><strong>Book Name</strong></td>
<td align="center"><strong>Book Language</strong></td>
<td align="center"><strong>Availability</strong></td>
<td align="center"><strong>Reserved</strong></td>
<td align="center"><strong>Author Id</strong></td>
<td align="center"><strong>Publisher Id</strong></td>
</tr>
-->

