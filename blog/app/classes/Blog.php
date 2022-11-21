<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 20-May-20
 * Time: 11:28 PM
 */

namespace App\classes;

use App\classes\Database;


class Blog
{
    public function addBlog($data){
        $cat_id = mysqli_real_escape_string(Database::dbCon(),$data['cat_id']);
        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['content']);

        $filename = $_FILES['photo']['name'];
        $fileex = explode('.',$filename);
        $fileex = end($fileex);
        $file_name = date('Ymdhis.').$fileex;

        $name = $_SESSION['name'];
        $status = $data['status'];

        $sql = "INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$cat_id','$title','$content','$file_name','$name','$status')";

        $result = mysqli_query(Database::dbCon(),$sql);

        if($result){
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);
            $insertMsg = "Post Published";
            return $insertMsg;
        }else{
            $insertMsg = "Error occured, Please try again";
            return $insertMsg;
        }
    }

    public function allBlog(){
        $result = mysqli_query(Database::dbCon(),"
SELECT `blog`.*,`category`.`category_name` FROM `blog` INNER JOIN `category` ON `blog`.`cat_id` = `category`.`id` ORDER BY `id` DESC");
        return $result;
    }

    public function active($id){
        mysqli_query(Database::dbCon(),"UPDATE `blog` SET `status`= 1 WHERE `id` = '$id'");
    }
    public function inactive($id){
        mysqli_query(Database::dbCon(),"UPDATE `blog` SET `status`= 0 WHERE `id` = '$id'");
    }
    public function delete($id){
        mysqli_query(Database::dbCon(),"DELETE FROM `blog` WHERE `id` = '$id'");
    }

    public function selectRow($id = ''){
        $result = mysqli_query(Database::dbCon(),"SELECT * FROM `blog` WHERE `id` = '$id'");
        return $result;
    }

    public function updateBlog($data){

        $cat_id = mysqli_real_escape_string(Database::dbCon(),$data['cat_id']);
        $title = mysqli_real_escape_string(Database::dbCon(),$data['title']);
        $content = mysqli_real_escape_string(Database::dbCon(),$data['content']);
        $id = $_POST['id'];

        $name = $_SESSION['name'];
        $status = $data['status'];

        if($_FILES['photo']['name'] == NULL){
            $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`name`='$name',`status`='$status' WHERE `id` = '$id'";
        }else{
            $filename = $_FILES['photo']['name'];
            $fileex = explode('.',$filename);
            $fileex = end($fileex);
            $file_name = date('Ymdhis.').$fileex;

            $sql = "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$file_name',`name`='$name',`status`='$status' WHERE `id` = '$id'";
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);
        }


        $result = mysqli_query(Database::dbCon(),$sql);
        if($result){
            header('location:edit-blog.php?id='.$id);
        }else{
            header('location:edit-blog.php?id='.$id);
        }
    }

}