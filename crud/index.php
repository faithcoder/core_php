<?php 

require_once 'dbcon.php';

if (isset($_POST['save_info'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO `users`(`name`, `email`, `password`, `status`) VALUES ('$name','$email','$password','$status')";
    $result = mysqli_query($con, $sql);

    if($result){
        $success = "Data saved successfully";
    }else {
        $error = "Data is not saved!";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" placeholder="Your name"></td>
            </tr>
            
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Your Email"></td>
            </tr>
            
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td>Status: </td>
                <td>
                    <select name="status" id="">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save_info" value="Add User"></td>
            </tr>
            </table>
        </form>
        <a href="view.php">View Users</a>
        <br>
        <?php
            if(isset($success)){
                echo '<p>'. $success .'</p>';
            }

            if(isset($error)){
                echo '<p>'. $error .'</p>';
            }
        ?>
    </div>
</body>
</html>