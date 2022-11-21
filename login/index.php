<?php 
session_start();

if(isset($_SESSION['email'])){
    header("location: admin.php");
}

    if(isset($_POST['login'])){
        
        define('EMAIL', 'admin@admin.com');
        define('PASSWORD', '1234');
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if( $email == EMAIL ){
            if( $password == PASSWORD){
                $_SESSION['email'] = $email;
                header("Location: admin.php");
            }else {
                echo "Wrong Password, Please Try Again";
            }
        }else {
            echo "Wrong Username, Please Try Again";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email Address">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>