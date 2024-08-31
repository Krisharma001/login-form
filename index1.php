<?php
require_once('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * from users where  username='$username' and password='$password'";

$result = mysqli_query($conn, $query);

print_r($result)
}
$conn->close();
header("Location: index.php");
exit(); 
?>