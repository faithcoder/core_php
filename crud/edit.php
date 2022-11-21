<?php 

require_once 'dbcon.php';

if(isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    
    $update = "SELECT * FROM `users` WHERE `id` = '$id'" ;
    $result = mysqli_query($con, $update);
    $row = mysqli_fetch_assoc($result);

}

if (isset($_POST['save_info'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    
    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`status`='$status' WHERE `id` = '$id' ";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location: view.php');
    }else {
        $error = "Data is not updated!";
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
                <td>
                    <input type="text" name="name" placeholder="Your name" value="<?= $row['name']; ?>">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                </td>
            </tr>
            
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Your Email" value="<?= $row['email']?>"></td>
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
                        <option value="1" <?= $row['status'] == 1 ? 'selected':'' ?>>Active</option>
                        <option value="0" <?= $row['status'] == 0 ? 'selected':'' ?>>Inactive</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save_info" value="Update"></td>
            </tr>
            </table>
        </form>
        <a href="view.php">View Users</a>
        <br>
        <?php
            if(isset($success)){
                echo '<p>'.$success.'</p>';
            }else {
                echo '<p>'.$error.'</p>';
            }
        ?>
    </div>
</body>
</html>