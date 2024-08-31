<?php
require_once("conn.php");

$error = '';
if(!$conn){ die;}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $findquery = "SELECT * from users where username = '$username'";
    $exist = mysqli_query($conn, $findquery);

    if ($exist->num_rows) {
        $error = 'Existed';
    }elseif ($password !== $cpassword) {
        $error = 'Not Matched';
    }else{
        $query = "INSERT INTO users (username, password) VALUES ('$username','$password')";
        $result = mysqli_query($conn, $query);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="registerstyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <form action="register.php" method="post">
                    <h1 class="h1">Sign Up</h1>
                    <input type="text" placeholder="Name" class="input" required><br>
                    <input type="text" placeholder="Username" class="input" required name="username"><br>
                    <input type="password" placeholder="Password" class="input" required name="password">
                    <input type="password" placeholder="Confirm Password" name="cpassword" class="input" required>
                    <div class="terms">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">Agree to the terms & conditions.</label>
                    </div>
                <div> 
                    <button type="submit">Register</button>
                </div>
            </form>
            <div class="link">
                Already have an account?
                <a href="index.php">Log In</a>
                <h5><?= @$_GET['login'] ?></h5>
                <h4><?= $error ?></h4>
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