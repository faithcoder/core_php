<?php

if(isset($_POST['add-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    $student_photo = explode('.',$_FILES['picture']['name']);
    $student_photo = end($student_photo);
    $photo_name = $roll.'.'.$student_photo;

    $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$photo_name')";
    $result = mysqli_query($link, $query);

    if($result){
        $success = "Data Saved Successfully";
        move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$photo_name);
    }else{
        $error = "Data is not Saved";
    }
}

?>

<h1 class="text-primary"><i class="fa fa-plus"></i> Add Students </h1>
<br>
<a href="index.php?page=dashboard">Dashboard</a>
<br>
<br>
<div class="row">

    <?php
        if(isset($success)){
            echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';
        }
        if(isset($error)){
            echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';
        }
    ?>

</div>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" placeholder="Student Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{6}" required="">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="pcontact">PContact</label>
                <input type="text" placeholder="01*******" name="pcontact" id="pcontact" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="add-student" value="Add Student" class="btn btn-primary pull-right">
            </div>

        </form>

    </div>
</div>