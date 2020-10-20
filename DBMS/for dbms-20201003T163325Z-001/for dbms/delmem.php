<?php
$dbuser = "root";
	$dbpass = "1234";
	$dbhost = "localhost:3306";
	$dbname = "librarydatabase";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "1234", "librarydatabase");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt delete query execution
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mname = $_POST['mname'];
		$mail = $_POST['mail'];
		$cno = $_POST['cont_number'];
		$bday = $_POST['bday'];
		$type = $_POST['type'];
		$ms = $_POST['memstrt'];
		$mf = $_POST['memfin'];
		$mp = $_POST['mempswd'];
		$lid = $_POST['libid'];
		$mid = $_POST['memid'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
$sql = "DELETE FROM member WHERE Mem_Id='$mid'AND Mem_Name='$mname'AND Mem_Email='$mail' AND Mem_Contact='$cno' AND M_DOB='$bday' AND Membership_start='$ms' AND Membership_End='$mf' AND Mem_psswd='$mp' AND Libr_Id='$lid'";
$sql = "DELETE FROM member_card WHERE Mem_Id='$mid'AND Mem_Name='$mname'AND Type='--null--'";//in the create statement, change b2p2 whatever and b1p1 to type.. 
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql = "SELECT * FROM librarydatabase.member";
$sql1 = "SELECT * FROM librarydatabase.member_card";
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
// Close connection
mysqli_close($link);
?>