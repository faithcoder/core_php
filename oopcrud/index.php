<?php
require_once 'classes/user.php';
$user = new User();

if(isset($_POST['save'])){
    $message = $user->save_user($_POST);
}

$all_users = $user->all_users();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="Save" name="save">

    <hr>
    <?php
        if(isset($message)){
            ?>
            <h4><?= $message; ?></h4>
            <?php
        }

    ?>
    <table border>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($all_users)){
            ?>

            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                </td>
            </tr>

            <?php
        }

        ?>
    </table>
</form>
</body>
</html>