<?php include 'time_session.php';?>

<?php 
session_start (); 
if (isset($_REQUEST['item'])) 
$_SESSION['name'] = $_REQUEST['item']; 
?> 

<!DOCTYPE html> 
<html lang='en-GB'> 
<head><title>Form 2</title></head> 
<body> 
<form action="processSession.php" method="post"> 
<label>Address: <input type="text" 
name="address"></label> 
<!-- no hidden input required --> 
<input type="submit" value="Send"> 
</form> 
</body> 
</html> 
