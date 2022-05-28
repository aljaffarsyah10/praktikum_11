<?php 
$db_hostname = "localhost"; // Write your own db server here
$db_database = "<db_name>"; // Write your own db name here 
$db_username = "<user>"; // Write your own username here 
$db_password = "<password>"; // Write your own password here 
$db_charset = "utf8mb4"; // Optional 
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset"; 
$opt = array( 
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
PDO::ATTR_EMULATE_PREPARES => false 
); 
try { 
$pdo = new PDO($dsn,$db_username,$db_password,$opt); 
//Code 6 
// lookup all hints if query result is not empty 
if($stmt){
	echo json_encode($stmt);
	// echo json_decode($stmt);	
}
else
// Output "no suggestion" if no hint was found or output correct values 
	echo "no suggestion";
$pdo = NULL; 
} 
catch (PDOException $e) { 
exit("PDO Error: ".$e->getMessage()."<br>"); 
} 
?>
