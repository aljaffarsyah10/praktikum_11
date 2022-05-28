	<?php
session_start();
try {

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "praktikum";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $username= $_POST["username"];
  $password = $_POST["password"];


  // sql to delete a record
  $sql = "SELECT * FROM user WHERE username='$username';
  ";

  $result = $conn->query($sql);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  $row = $result->fetch();


  //kalo user ketemu
  if($row){
    // var_dump($row);
    //cek password
    $_SESSION["login"]=true;
    if($password===$row["password"]){
      	// header("Location: index.php");
		$_SESSION['username'] = $username; 
		header("Location: php10D.php"); 

    }else{
      echo("password Salah");
    }
  }else{
	// header("Location: php10A.php"); 
    echo("user Tidak Ditemukan");

  }

	$conn = null;
} catch(PDOException $e) {
  echo $sql . "Koneksi Gagal : <br>" . $e->getMessage();
}

?>