<?php


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Info</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <!-- nav area  -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Students Management System</a>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="admin/login.php">Login <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/logout.php">Logout</a>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
                <!-- nav area  end -->

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="header">
                                        <br>
                    <h2 class="text-center">Students Archieve</h2>
                    <br>
                </div>
                <div class="info-box">
                    <form action="" method="post" class="">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center"><label for=""><b>Student Information</b></label></td>
                            </tr>
                            <tr>
                                <td><label for="choose">Choose Class</label></td>
                                <td>
                                    <select name="choose" id="choose" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="roll">Roll</label></td>
                                <td><input type="text" name="roll" class="form-control" pattern="[0-9]{6}"></td>
                            </tr>
                            <td colspan="2" class="text-center"><input type="submit" class="btn btn-info" value="Show Info" name="show_info"></td>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php

        require_once 'admin/dbcon.php';
        if (isset($_POST['show_info'])) {
            $choose = $_POST['choose'];
            $roll = $_POST['roll'];

            $result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll'");
            $row = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) == 1) {
        ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="6">
                                        <img src="admin/student_images/<?= $row['photo']; ?>" alt="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Student Id</td>
                                    <td><?= $row['id'] ?></td>
                                </tr>
                                <tr>

                                    <td>Name</td>
                                    <td><?= $row['name'] ?></td>
                                </tr>
                                <tr>

                                    <td>Roll</td>
                                    <td><?= $row['roll'] ?></td>
                                </tr>
                                <tr>

                                    <td>Class</td>
                                    <td><?= $row['class'] ?></td>
                                </tr>
                                <tr>

                                    <td>Contact No</td>
                                    <td><?= $row['pcontact'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <script type="text/javascript">
                    alert("Data Not Found, Please Try Again")
                </script>
        <?php
            }
        }

        ?>

    </div>
</body>

</html>