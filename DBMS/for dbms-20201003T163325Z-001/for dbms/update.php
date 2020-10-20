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
		$genre = $_POST['genre'];
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
	$sql1="UPDATE librarydatabase.novel SET Book_Id='$bid', ISBN='$isbn', Book_Name='$bname',Book_Language='$language', Book_Availability='$avail', Book_Reserve='$res', Auth_Id='$author', Publ_Id='$publisher' WHERE Book_Id='$bid'";
	$result = mysqli_query($connection,$sql1);
	$sql2="UPDATE librarydatabase.genre SET B_Id='$bid',B_Genre='$genre' WHERE B_Id='$bid'";
	$result1 = mysqli_query($connection,$sql2);
	$sql3="UPDATE librarydatabase.b_location SET Boo_Id='$bid', B_Location='$branch' WHERE Boo_Id='$bid'";
	$result2 = mysqli_query($connection,$sql3);
if(mysqli_query($connection,$sql1)){
		echo "yes<br>";
	}
else{
		echo "no<br>";
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

