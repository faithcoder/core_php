<?php

if(isset($_POST['upload'])){
    $file = $_FILES['file']['tmp_name'];

    list($width, $height) = getimagesize($file);
    $new_width = $_POST['width'];
    $new_height = $_POST['height'];
    $new_image = imagecreatetruecolor($new_width,$new_height);

    if($_FILES['file']['type'] == 'image/jpeg'){
        $source = imagecreatefromjpeg($file);
        imagecopyresized($new_image, $source,0,0,0,0,$new_width, $new_height, $width, $height);
        $file_name = time().'.jpg';
        imagejpeg($new_image,'upload/'.$file_name);
    }
    if($_FILES['file']['type'] == 'image/png'){
        $source = imagecreatefrompng($file);
        imagecopyresized($new_image, $source,0,0,0,0,$new_width, $new_height, $width, $height);
        $file_name = time().'.png';
        imagepng($new_image,'upload/'.$file_name);
    }
    if($_FILES['file']['type'] == 'image/gif'){
        $source = imagecreatefromgif($file);
        imagecopyresized($new_image, $source,0,0,0,0,$new_width, $new_height, $width, $height);
        $file_name = time().'.gif';
        imagegif($new_image,'upload/'.$file_name);
    }
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="width" placeholder="width"> <br> <br>
    <input type="text" name="height" placeholder="height"> <br> <br>
    <input type="file" name="file"> <br> <br>
    <input type="submit" name="upload">
</form>
