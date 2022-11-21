<?php
require_once ('dbcon.php');
session_start();
if(isset($_SESSION['user_login'])){
    header('location: index.php');
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'; ");
    if(mysqli_num_rows($username_check) > 0){
        $row = mysqli_fetch_assoc($username_check);
        if($row['password'] == $password){

            if($row['status'] == 'active'){
                $_SESSION['user_login'] = $username;
                header('location: index.php');
            }else {
                $status_inactive = "Your status is inactive, Please activate your status";
            }
        }else{
            $wrong_password = "Wrong Password, Please try again";
        }
    }else{
        $username_not_found = "Wrong Username";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="admin">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <form action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>Username </td>
                            <td><input type="text" name="username" class="form-control" value="<?php if(isset($username)){echo $username;} ?>"></td>
                        </tr>
                        <tr>
                            <td>Password </td>
                            <td><input type="password" name="password" class="form-control" value="<?php if(isset($password)){echo $password;} ?>"></td>
                        </tr>
                        <tr><td colspan="2"><input type="submit" name="login" value="Login" class="btn btn-info"></td></tr>
                    </table>
                </form>
                <a href="registration.php">Register</a>
                <br>
                <?php
                    if(isset($username_not_found)){
                        echo '<div class="alert alert-danger col-sm-12 col-sm-offset-4">'.$username_not_found.'</div>';
                    }
                ?>
                <?php
                if(isset($wrong_password)){
                    echo '<div class="alert alert-danger col-sm-12 col-sm-offset-4">'.$wrong_password.'</div>';
                }
                ?>
                <?php
                if(isset($status_inactive)){
                    echo '<div class="alert alert-danger col-sm-12 col-sm-offset-4">'.$status_inactive.'</div>';
                }
                ?>

            </div>

        </div>

    </div>
</div>
</body>
</html>