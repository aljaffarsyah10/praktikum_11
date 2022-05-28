<!DOCTYPE html> 
<html lang='en-GB'> 
<head> 
<title>PHP09 C</title> 
</head> 
<body>
<!-- <?php var_dump ($_POST);?> -->
<!-- <?php var_dump($_POST);?> -->

<?php 
echo 'Item: ', $_REQUEST['item'], '<br>'; 
echo 'Address: ', $_REQUEST['address'], '<br>'; 
?> 
<a href="php09A.php">
<button>Back</button>
</a>
</body> 
</html>
