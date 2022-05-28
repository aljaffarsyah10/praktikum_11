<?php 
session_start();
	if (!isset($_SESSION['username'])){
	$_SESSION['bool']="1"; 
	header("Location: php10A.php"); 
	} 
?>

<!DOCTYPE html> <html lang='en-GB'> 
<head> 
<title>PHP 10 D</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body> 
<div class="laman_article">
<h1>PHP and Databases</h1>


<form action=""> 
		Name: <input type="text" id="txt1" onkeyup="showHint(this.value)"> 
</form> 
<p>Suggestions: <span id="txtHint"></span></p>


<?php 
include('php10D_header.php'); 

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

$stmt = $pdo->query("select * from meetings order by slot asc"); 
?>



<form action="" method="post"  style="text-align: right;">
	<input  class="search" type="text" id="keyword" name="keyword" placeholder="Cari slot/nama/email anggota...">
	<button class="btn-log" type="submit" name="cari">Search</button>
</form>
<br>

<h2>Data in meeting table (While loop)</h2> 

<div id="tabel_anggota">

		<?php
		if(isset($_POST["cari"])){
			$nama = $_POST['keyword'];
			$stmt = $pdo->query("select * from meetings WHERE name LIKE '%$nama%' order by slot asc"); 
		}

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
				<td><a href="php10F.php? slot=<?php echo $row['slot'] ?>"><img src='edit.png' style='width:30px;height:30px;' alt="Ubah"></a></td>
				<td> <a href="php10G.php? slot=<?php echo $row['slot'] ?>"><img src='remove.png' style='width:30px;height:30px;' alt="Hapus"></a></td>
			</tr>
			<?php } ?>
		</table>


</div>



<h2>Data in meeting table (Foreach loop)</h2>

<div id="tabel_anggota2">

		<?php 
		$stmt = $pdo->query("select * from meetings order by slot asc"); 
		if(isset($_POST["cari"])){
			$nama = $_POST['keyword'];
			$stmt = $pdo->query("select * from meetings WHERE name LIKE '%$nama%' order by slot asc"); 
		}
		echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n"; 

		?>


		<table>
			<tr>
				<th>Slot</th>
				<th>Name</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
			<?php 
				// echo json_encode($stmt)
				foreach($stmt as $row) { 
			?>
			<tr>
				<td><?php echo $row["slot"] ?></td>
				<td><?php echo $row["name"] ?></td> 
				<td><?php echo $row["email"] ?></td>
				<td><a href="php10F.php? slot=<?php echo $row['slot'] ?>"><img src='edit.png' style='width:30px;height:30px;' alt="Ubah"></a></td>
				<td> <a href="php10G.php? slot=<?php echo $row['slot'] ?>"><img src='remove.png' style='width:30px;height:30px;' alt="Hapus"></a></td>
			</tr>
			<?php } ?>
		</table>

</div>
		<br>
    <form method="get" action="php10E.php">
      <button class="btn-dark">Tambah</button>
    </form>


<?php
$pdo = NULL; 
} 
catch (PDOException $e) { 
exit("PDO Error: ".$e->getMessage()."<br>"); 
} 
?> 


<script type="text/javascript" src="liveSearchAnggota.js"></script>

<script src="php11D_suggestion.js"></script>

</div>
</body> 
</html>
