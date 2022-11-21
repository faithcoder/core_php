<?php

$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = '$id';");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id` = '$id'";
    $result = mysqli_query($link, $query);

    if($result){
        header('location:index.php?page=all-student');
    }
}
?>

<h1 class="text-primary"><i class="fa fa-pencil"></i> Update Students </h1>
<br>
<a href="index.php?page=dashboard">Dashboard</a>
<br>
<br>
<div class="row">

</div>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="" value="<?= $db_row['name']; ?>">
            </div>

            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" placeholder="Student Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{6}" required="" value="<?= $db_row['roll']; ?>">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="" value="<?= $db_row['city']; ?>">
            </div>

            <div class="form-group">
                <label for="pcontact">PContact</label>
                <input type="text" placeholder="01*******" name="pcontact" id="pcontact" class="form-control" required="" value="<?= $db_row['pcontact']; ?>">
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="">

                    <option <?php echo $db_row['class']=='1st' ? 'selected=""':''; ?> value="1st">1st</option>
                    <option <?php echo $db_row['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['class']=='4th' ? 'selected=""':''; ?> value="4th">4th</option>
                    <option <?php echo $db_row['class']=='5th' ? 'selected=""':''; ?> value="5th">5th</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="update-student" value="Update Student" class="btn btn-warning pull-right">
            </div>

        </form>

    </div>
</div>