<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 04-May-20
 * Time: 10:44 PM
 */
require_once 'classes/user.php';
$user = new User();
$id = $_GET['id'];
$data = $user->update_user($id);

$data = mysqli_fetch_assoc($data);
if(isset($_POST['update'])){
    $user->update_user_save($_POST);
}
?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id'];?>">
    <input type="text" name="name" placeholder="name" value="<?= $data['name'];?>">
    <input type="email" name="email" placeholder="email" value="<?= $data['email']; ?>">
    <input type="password" name="password" placeholder="password" value="<?= $data['password'];?>">
    <input type="submit" value="Update" name="update">

</form>
