<!DOCTYPE html> 
<html lang='en-GB'> 
<head> 
<title>PHP09 B</title> 
</head> 
<body> 
<?php 
echo 'Item: ', $_REQUEST['item'], "<br>"; ?> 
<!-- <?php var_dump ($_POST);?> -->

<!-- <?php var_dump ($_POST);?> -->
<form action="php09C.php" method="post">
	<input type="hidden"name="item" value="<?= $_REQUEST['item'] ?>"><br>
	<label for="address">
		Address: <input type="text" name="address"></label>
</form> 



<!-- <?php 
echo 'Item: ', $_REQUEST['item'], "<br>"; 
echo ' 
<form action="php09C.php" method="post">

';?>
<input type="text" id="item" name="item" value="<?php echo $_REQUEST['item'] ?>">
<?php echo '

<label>Address: <input type="text" name="address"></label>
</form>'; 
?> 
 -->


<!-- <input type="text" id="item" name="item" value="<?php echo $_REQUEST['item'] ?>"> -->

</body> 
</html>
