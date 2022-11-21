<?php

if(isset($_POST['upload'])){
    //$file = "sample.jpg";

    $file = $_FILES['file']['tmp_name'];

    list ($width, $height) = getimagesize($file);

    $nwidth = $width/3;
    $nheight = $height/4;
    $newimage = imagecreatetruecolor($nwidth, $nheight);

    if($_FILES['file']['type'] == 'image/jpeg'){
        $source = imagecreatefromjpeg($file);
        imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        $file_name = time().'.jpg';
        imagejpeg($newimage,'upload/'.$file_name);
    }
    if($_FILES['file']['type'] == 'image/png'){
        $source = imagecreatefrompng($file);
        imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        $file_name = time().'.png';
        imagepng($newimage,'upload/'.$file_name);
    }
    if($_FILES['file']['type'] == 'image/gif'){
        $source = imagecreatefromgif($file);
        imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        $file_name = time().'.png';
        imagegif($newimage,'upload/'.$file_name);
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="upload">
</form>
