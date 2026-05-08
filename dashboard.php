<?php

session_start();

if(!isset($_SESSION['name']))
{
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<h3>
Welcome <?php echo $_SESSION['name']; ?>
</h3>

<?php

if(isset($_COOKIE['time']))
{
    echo "Last Login: " . $_COOKIE['time'];
}

?>

<br><br>

<a href="logout.php">Logout</a>

</body>
</html>