<?php
require_once 'dbcon.php';
session_start();
if(isset($_POST['registration'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $c_password = $_POST['c_password'];

   $photo = explode('.',$_FILES['photo']['name']);

   $photo = end($photo);
   $photo_name = $username.'.'.$photo;

   $input_error = array();

   if(empty($name)){
       $input_error['name'] = "The name field is required";
   }
    if(empty($email)){
        $input_error['email'] = "The Email field is required";
    }
    if(empty($username)){
        $input_error['username'] = "Username field is required";
    }
    if(empty($password)){
        $input_error['password'] = "Password field is required";
    }
    if(empty($c_password)) {
        $input_error['c_password'] = "Confirm Password field is required";
    }
    if(count($input_error) == 0){

        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';");

        if(mysqli_num_rows($email_check) == 0){

            $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';");

            if(mysqli_num_rows($username_check) == 0){
                if(strlen($username) > 7){
                    if(strlen($password) > 7){
                        if($password == $c_password){
                            $password = $password;
                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','active')";
                            $result = mysqli_query($link, $query);
                            if($result){
                                $_SESSION['data_insert_success'] = "Registration done! Now you can login";
                                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                                header('location: registration.php');
                            }else{
                                $_SESSION['data_insert_error'] = "Registration is not completed";
                            }

                        }else{
                            $password_not_match = "Password Doesn't Matched";
                        }
                    } else{
                        $password_len = "Password must be more than 8 characters";
                    }
                }else{
                    $username_len = "Username must be more than 8 characters";
                }
            }else{
                $username_error = "This username already exist";
            }
        }else {
            $email_error = "This email address already exist";
        }
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <br>
        <h1>User Registration Form</h1>
        <br>
        <?php
        if(isset($_SESSION['data_insert_success'])){
            echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';
        }

        ?>
        <?php
        if(isset($_SESSION['data_insert_error'])){
            echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';
        }

        ?>

        <br>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1" for="name">Name</label>
                        <div class="col-sm-4">
                            <input id="name" class="form-control" type="text" name="name" placeholder="Your Name" value="<?php if(isset($name)){echo $name;} ?>">
                            <label class="error" for=""><?php if(isset($input_error['name'])) { echo $input_error['name']; } ?></label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-sm-1" for="name">Email</label>
                        <div class="col-sm-4">
                            <input id="email" class="form-control" type="email" name="email" placeholder="Your Email" value="<?php if(isset($email)){echo $email;} ?>">
                            <label for="" class="error"><?php if(isset($input_error['email'])){ echo $input_error['email'];} ?></label>
                            <label for="" class="error"><?php if(isset($email_error)){ echo $email_error;} ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label col-sm-1" for="username">Username</label>
                        <div class="col-sm-4">
                            <input id="username" class="form-control" type="text" name="username" placeholder="Your Username" value="<?php if(isset($username)){echo $username;} ?>">
                            <label for="" class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];} ?></label>
                            <label for="" class="error"><?php if(isset($username_error)){ echo $username_error ;} ?></label>
                            <label for="" class="error"><?php if(isset($username_len)){ echo $username_len ;} ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-sm-1" for="password">Password</label>
                        <div class="col-sm-4">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Your Password" value="<?php if(isset($password)){echo $password;} ?>">
                            <label for="" class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];} ?></label>
                            <label for="" class="error"><?php if(isset($password_len)){ echo $password_len ;} ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_password" class="control-label col-sm-2" for="c_password">Confirm Password</label>
                        <div class="col-sm-4">
                            <input id="c_password" class="form-control" type="password" name="c_password" placeholder="Retype your password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
                            <label for="" class="error"><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];} ?></label>
                            <label for="" class="error"><?php if(isset($password_not_match)){ echo $password_not_match ;} ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="photo" class="control-label col-sm-1" for="name">Photo</label>
                        <div class="col-sm-4">
                            <input id="photo" class="form-control" type="file" name="photo" placeholder="Your Photo">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <input type="submit" name="registration" value="Registration" class="btn btn-success">
                    </div>
                </form>
                <br>
                <br>
            </div>
        </div>
        <br>
        <p>If you have an account then please <a href="login.php">Login</a></p>
        <hr>
        <footer>
            <p>Copyright &copy; 2020 | All rights reserved by FaithCoder</p>
        </footer>
    </div>
</body>
</html>