
<h1 class="text-primary"><i class="fa fa-user"></i><small class="text-black-50"> All Student</small></h1>
<br>
<div class="row"></div>
<hr>
<h3>New Students</h3>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $db_info = mysqli_query($link, "SELECT * FROM `student_info`");
        while ($row = mysqli_fetch_assoc($db_info)){
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name'];?></td>
                <td><?= $row['roll'];?></td>
                <td><?= $row['class'];?></td>
                <td><?= $row['city'];?></td>
                <td><?= $row['pcontact'];?></td>
                <td><img class="w-100" src="student_images/<?php echo $row['photo']; ?>" alt=""></td>
                <td>
                    <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>  " class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="delete-student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>



        </tbody>

    </table>
</div>