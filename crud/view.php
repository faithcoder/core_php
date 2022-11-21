<?php
require_once 'dbcon.php';

$sql = "SELECT * FROM `users`";
$result = mysqli_query($con, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="view">
        <a href="index.php">Add User</a>
        <form action="">
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?= $row['name']?></td>
                        <td><?= $row['email']?></td>
                        <td><?= $row['status'] == 1 ? 'Active':'Inactive' ?></td>
                        <td><a href="edit.php?edit=<?= base64_encode($row['id']); ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?= base64_encode($row['id']); ?>">Delete</a></td>
                    </tr>

                    <?php
                    $i++;
                }
                    

                ?>
                
            </table>
        </form>
    </div>
</body>
</html>