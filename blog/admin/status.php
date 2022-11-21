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

//status for category

if(isset($_GET['active']) && isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->active($id);
    header('location:manage-category.php');
}

if(isset($_GET['inactive']) && isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->inactive($id);
    header('location:manage-category.php');
}

//status for blog

if(isset($_GET['active']) && isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->active($id);
    header('location:manage-blog.php');
}

if(isset($_GET['inactive']) && isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->inactive($id);
    header('location:manage-blog.php');
}
