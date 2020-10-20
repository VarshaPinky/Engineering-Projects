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
$sql = "DELETE FROM librarydatabase.librarian WHERE Lib_Id='$lid' AND Lib_Name='$lname' AND Lib_psswd='$lp'");
  //for($i=0;$i<$count;$i++){
  $sql1 = "DELETE FROM librarydatabase.libr_location WHERE Li_Id='$lid',Li_Loc='lloc'";
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
mysqli_close($link);
?>