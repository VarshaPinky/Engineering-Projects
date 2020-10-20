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
    $lloc=$_POST['lloc'];
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
$sql = "UPDATE librarydatabase.librarian SET Lib_Id='$lid' , Lib_Name='$lname' , Lib_psswd='$lp' WHERE Lib_Id='$lid");
  //for($i=0;$i<$count;$i++){
  $sql1 = "UPDATE librarydatabase.libr_location SET Li_Id='$lid',Li_Loc='lloc' WHERE Lib_Id='$lid'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
 
// Close connection

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

