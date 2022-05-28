<?php include 'time_session.php';?>

<?php 
session_start (); 
// not necessary but convenient 
if (isset($_REQUEST['address'])) 
$_SESSION['address'] = $_REQUEST['address']; 
// $_SESSION['item'] = $_SESSION['name']; 

?> 
<!DOCTYPE html> 
<html lang='en-GB'> 
<head><title>Processing</title></head> 
<body> 

<?php 
try {
	include 'time_session.php';
	echo $_SESSION['name'],"<br/>"; 
	echo $_SESSION['address']; 
	// Once we do not need the data anymore , get rid of it 
	// session_unset(); 
	// session_destroy(); 
} catch(Exception $e) {
	echo "Error code: " . $e->getCode();
}

?> 
</body></html> 