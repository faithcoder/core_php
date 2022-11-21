<?php

$count_student = mysqli_query($link, "SELECT * FROM `student_info`");
$total_student = mysqli_num_rows($count_student);

$count_user = mysqli_query($link, "SELECT * FROM `users`");
$total_user = mysqli_num_rows($count_user);

?>


    <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small class="text-black-50">Statistics Overview</small></h1>
    <br>
    <div class="row">
        <div class="col-sm-4 panel-area">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="pull-right" style="font-size: 40px;"><?= $total_student; ?></div>
                            <div class="clear-fix"></div>
                            <div class="pull-right">All Students</div>

                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-student">
                <div class="panel-footer">
                    <span class="pull-left">All Student</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clear-fix"></div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 panel-area">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="pull-right" style="font-size: 40px;"><?= $total_user; ?></div>
                            <div class="clear-fix"></div>
                            <div class="pull-right">All Users</div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-user">
                <div class="panel-footer">
                    <span class="pull-left">All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clear-fix"></div>
                </div>
            </a>
        </div>
        <div class="col-sm-3"></div>
    </div>
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
                    </tr>
                    <?php
                }
            ?>



            </tbody>

        </table>
    </div>
