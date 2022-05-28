<?php
try {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $slot = $_GET["slot"];

  // sql to delete a record
  $sql = "DELETE FROM meetings WHERE slot=$slot";

  // use exec() because no results are returned
  $conn->exec($sql);
  // echo "Record deleted successfully";
  echo "<script type='text/javascript'>alert('Record deleted successfully');window.location='php10D.php'</script>";

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>