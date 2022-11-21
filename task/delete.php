<?php

require_once 'dbcon.php';

$id = base64_decode($_GET['id']);
$delete = "DELETE FROM `task` WHERE `id` = '$id';";
$result = mysqli_query($con, $delete);

if($result){
    header('Location: view.php');
}else {
    echo mysqli_error($con);
}

?>