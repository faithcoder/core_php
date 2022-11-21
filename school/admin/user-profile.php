<?php

$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>

<h1 class="text-primary"><i class="fa fa-dashboard"></i> User <small class="text-black-50">Profile</small></h1>
<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tr>
                <th>User Id</th>
                <td><?= $user_row['id']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= ucwords($user_row['name']);?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= $user_row['username'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $user_row['email'];?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= ucwords($user_row['status']);?></td>
            </tr>
            <tr>
                <th>Signup Date</th>
                <td><?= $user_row['datetime']; ?></td>
            </tr>
        </table>
        <a href="" class="btn btn-info pull-right btn-sm">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href=""><img src="images/<?= $user_row['photo']; ?>" class="img-thumbnail mb-2" style="max-width: 300px" alt="" ></a>
        <br>

        <?php
        if(isset($_POST['upload'])){
            $photo = explode('.',$_FILES['photo']['name']);
            $photo_ex = end($photo);
            $photo_name = $session_user.'.'.$photo_ex;
            $upload = mysqli_query($link, "UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_user'");
            if($upload){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="photo" class="btn btn-sm btn-success">Select Image</label>
            <input type="file" name="photo" id="photo" hidden>
            <br>
            <input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
        </form>
    </div>
</div>