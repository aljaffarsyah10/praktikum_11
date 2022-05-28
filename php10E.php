<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>tes</title>
</head>
<body>
<?php include('php10D_header.php'); ?>    
<form class="formreg" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <br>
    <h1>Form Menambahkan Data Meeting</h1>
    <table>
        <tr>
            <td><label for="slot">Slot : </label></td>
            <td><input type="text" name="slot" id="slot"></td>
        </tr>
        <tr>
            <td><label for="name">Name : </label></td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td><label for="email">Email : </label></td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
    </table>

    <input class="btn-dark" type="submit">
</form>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum";

  $slot = isset($_POST['slot']) ? $_POST['slot'] : "";
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO meetings (slot,name,email)
  VALUES ('$slot', '$name', '$email')";
  // use exec() because no results are returned
  $conn->exec($sql);
  // echo "New record created successfully";
  echo "<script type='text/javascript'>alert('New record created successfully');</script>";
} catch(PDOException $e) {
  echo "<script type='text/javascript'>alert('Failed to created New record');</script>";
    // echo $sql . "<br>" ;
    // echo $e->getMessage();    
}

$conn = null;

}

?>

</body>
</html>