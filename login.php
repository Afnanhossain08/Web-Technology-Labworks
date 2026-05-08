<?php

session_start();

include("db.php");

$email = "";

if(isset($_COOKIE['email']))
{
    $email = $_COOKIE['email'];
}

if(isset($_POST['login']))
{
    $user_email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
    WHERE email='$user_email'
    AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $row['name'];

        setcookie("email",$user_email,time()+3600);

        setcookie("time",date("Y-m-d h:i:s"),time()+3600);

        header("location:dashboard.php");
    }
    else
    {
        echo "Login Failed";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

<input type="email" name="email"
value="<?php echo $email; ?>"
placeholder="Email" required>

<br><br>

<input type="password" name="password"
placeholder="Password" required>

<br><br>

<button type="submit" name="login">Login</button>

</form>

<br>

<a href="register.php">Register</a>

</body>
</html>