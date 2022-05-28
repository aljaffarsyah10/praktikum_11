<!DOCTYPE html> <html lang='en-GB'> 
<head> 
<title>PHP09 D</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body> 
<div class="laman_article">
<h1>PHP and Databases</h1>
<?php 
$db_hostname = "localhost"; // Write your own db server here 
$db_database = "praktikum"; // Write your own db name here 
$db_username = "root"; // Write your own username here 
$db_password = ""; // Write your own password here 
// For the best practice, don’t use your “real” password when submitting your work 
$db_charset = "utf8mb4"; // Optional 
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset"; 
$opt = array( 
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
PDO::ATTR_EMULATE_PREPARES => false 
); 
try { 
$pdo = new PDO($dsn,$db_username,$db_password,$opt); 

echo "<h2>Data in meeting table (While loop)</h2>\n"; 
$stmt = $pdo->query("select * from meetings order by slot asc"); 
echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n"; 
?>
<table >
	<tr>
		<th>Slot</th>
		<th>Name</th>
		<th>Email</th>
		<th colspan="2">Action</th>
	</tr>
	<?php 
		while ($row = $stmt->fetch()) { 
	?>
	<tr>
		<td><?php echo $row["slot"] ?></td>
		<td><?php echo $row["name"] ?></td> 
		<td><?php echo $row["email"] ?></td>
		<td><a href="php09F.php? slot=<?php echo $row['slot'] ?>"><img src='edit.png' style='width:30px;height:30px;' alt="Ubah"></a></td>
		<td> <a href="php09G.php? slot=<?php echo $row['slot'] ?>"><img src='remove.png' style='width:30px;height:30px;' alt="Hapus"></a></td>
	</tr>
	<?php } ?>
</table>



<?php
echo "<h2>Data in meeting table (Foreach loop)</h2>\n"; 
$stmt = $pdo->query("select * from meetings order by slot asc"); 
?>
<table>
	<tr>
		<th>Slot</th>
		<th>Name</th>
		<th>Email</th>
		<th colspan="2">Action</th>
	</tr>
	<?php 
		foreach($stmt as $row) { 
	?>
	<tr>
		<td><?php echo $row["slot"] ?></td>
		<td><?php echo $row["name"] ?></td> 
		<td><?php echo $row["email"] ?></td>
		<td><a href="php09F.php? slot=<?php echo $row['slot'] ?>"><img src='edit.png' style='width:30px;height:30px;' alt="Ubah"></a></td>
		<td> <a href="php09G.php? slot=<?php echo $row['slot'] ?>"><img src='remove.png' style='width:30px;height:30px;' alt="Hapus"></a></td>
	<?php } ?>
</table>
<?php
$pdo = NULL; 
} 
catch (PDOException $e) { 
exit("PDO Error: ".$e->getMessage()."<br>"); 
} 
?> 
</div>
</body> 
</html>
