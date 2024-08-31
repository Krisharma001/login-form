<?php
require_once("conn.php");

if(!$conn){ die;}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * from users where  username='$username' and password='$password'";
  
    $result = mysqli_query($conn, $query);
  
    if($result->num_rows){
        echo "login successfully";
        header("Location: ./thankyou.php?login=Success");
    }else{
       echo "<script>alert('Failed')</script>";
       header("Location: ./register.php?login=Failed");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <form action="index.php" method="post">
                    <h1 class="h1">Log In</h1>
                    <input type="text" placeholder="Username" class="input" name="username" required><br>
                    <input type="password" placeholder="Password" class="input" name="password" required>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="link">
                You don't have an account?
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>
    <div class="image-container">
        <img src="Glassmorphism Login Form v2 (Community).png">
    </div>
    <div class="image">
        <img src="Leaves.png">
    </div>
    </div>
</body>
</html>

