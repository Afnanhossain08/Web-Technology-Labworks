<?php

include("db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password)
    VALUES('$name','$email','$password')";

    mysqli_query($conn,$sql);

    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>
<br><br>

<input type="email" name="email" placeholder="Email" required>
<br><br>

<input type="password" name="password" placeholder="Password" required>
<br><br>

<button type="submit" name="register">Register</button>

</form>

<br>

<a href="login.php">Login</a>

</body>
</html>