<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 15-May-20
 * Time: 10:37 PM
 */
require_once '../vendor/autoload.php';
$cat = new \App\classes\Category();
$blog = new \App\classes\Blog();

if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->delete($id);
    header('location:manage-category.php');
}

if(isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->delete($id);
    header('location:manage-blog.php');
}
