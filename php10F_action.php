<?php
try {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "praktikum";

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql="SELECT * FROM meetings WHERE slot=$slot";

	$result = $conn->query("$sql");
	$result->setFetchMode(PDO::FETCH_ASSOC);
	$row = $result->fetch();	


} catch (PDOException $e) {
	echo "Koneksi gagal : ".$e->getMessage();
}

?>