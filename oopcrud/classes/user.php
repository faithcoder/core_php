<?php

/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 02-May-20
 * Time: 11:11 PM
 */
class User {
    function __construct()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "oop";
        $this->link = mysqli_connect($host, $user, $password, $database);
    }

    public function save_user($data){
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
        mysqli_query($this->link,$query);
        $message = "Data Saved Successfully";
        return $message;

    }

    public function all_users()
    {
        return mysqli_query($this->link,"SELECT * FROM `users`");
    }
    public function delete_user($id){
        mysqli_query($this->link,"DELETE FROM `users` WHERE `id` = '$id'");
        header('location:index.php');
    }
    public function update_user($id){
        return mysqli_query($this->link,"SELECT * FROM `users` WHERE `id` = '$id'");
    }
    public function update_user_save($data){
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        mysqli_query($this->link,"UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id` = '$id'");
        header('location:index.php');
    }

}










