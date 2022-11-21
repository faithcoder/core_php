<?php

session_start();

if( !isset($_SESSION['email']) ){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>WELCOME TO ADMIN PANEL</h2>
    <h3><?php echo $_SESSION['email']; ?></h3>
    <a href="logout.php">Logout</a>
</body>
</html>