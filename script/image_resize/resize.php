<?php
if(isset($_POST['resize'])){
    $file = $_FILES['file']['tmp_name'];
    list($width, $height) = getimagesize($file);
    $new_width = $_POST['width'];
    $new_height = $_POST['height'];
    $new_image = imagecreatetruecolor($new_width, $new_height);

    if($_FILES['file']['type'] == 'image/jpeg'){
        $source = imagecreatefromjpeg($file);
        imagecopyresized($new_image, $source,0,0,0,0, $new_width, $new_height, $width, $height);
        $file_name = time().'.jpg';
        imagejpeg($new_image,'upload/'.$file_name);
    }
    if($_FILES['file']['type'] == 'image/png'){
        $source = imagecreatefrompng($file);
        imagecopyresized($new_image, $source,0,0,0,0, $new_width, $new_height, $width, $height);
        $file_name = time().'.png';
        imagepng($new_image,'upload/'.$file_name);
    }
}
?>

<style>
    .form-area{
        padding-top:200px;
        background: #f3f3f3;
        width:400px;
        padding:40px;
        text-align: left;
        margin:auto;
        overflow: hidden;
    }
    input {
        width:100%;
        border:1px solid #ddd;
        -webkit-border-radius:;
        -moz-border-radius:;
        border-radius:3px;
        padding:5px;
    }
    input[type="submit"] {
        background-color: #fff;
    }
    
    input[type="submit"]:hover {
        background-color: blanchedalmond;
        cursor: pointer;
    }
    label {
        font-family:tahoma;
        padding: 5px 10px;
        border:1px solid #ddd;
        display: block;
        cursor: pointer;
    }
</style>
<div class="form-area">
    <h2 style="text-align: center; font-family: tahoma;">Image Resizer</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Upload</label>
        <input type="file" hidden id="file" name="file"> <br> <br>
        <input type="text" name="width" placeholder="Width"> <br> <br>
        <input type="text" name="height" placeholder="Height"> <br> <br>
        <input type="submit" name="resize" value="Resize">
    </form>
</div>
