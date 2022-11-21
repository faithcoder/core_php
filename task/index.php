<?php 

require_once 'dbcon.php';

if(isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $put_up = $_POST['put_up'];
    $action = $_POST['action'];
    $rmk = $_POST['rmk'];

    $sql = "INSERT INTO `task`(`subject`, `date`, `category`, `put_up`, `action`, `rmk`) VALUES ('$subject','$date','$category','$put_up','$action','$rmk')";
    $result = mysqli_query($con, $sql);

    if(isset($result)){
        $success = "<div class=\"alert alert-success\" role=\"alert\">Data Saved Successfully.</div>";
    }else{
        $wrong = "<div class=\"alert alert-warning\" role=\"alert\">Data is not Saved, Please Try Again!</div>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="data table-responsive">
                    <div class="header align-content-center" style="text-align: center; display:block; margin-top:50px;">
                        <h2 style="margin: 0;padding:0;">WK UPDATE</h2> <br/>
                        <h3>OPS & PLAN DTE (JT P&P)</h3>
                    </div>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <table class="table">

                            <tbody>
                            <tr>
                                <th scope="col">Subject</th>
                                <td scope="col"><input type="text" name="subject" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="col">Received Date</th>
                                <td><input type="date" id="birthday" name="date" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="col">Category</th>
                                <td><input type="text" name="category" class="form-control">
                                    <!--<select id="" name="category" class="form-control">
                                        <option value="1">Select</option>
                                        <option value="2">Procurement</option>
                                        <option value="3">STD</option>
                                        <option value="4">TOandE</option>
                                        <option value="5">Others</option>
                                    </select>-->
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Put Up to:</th>
                                <td>
                                    <select id="" name="put_up" class="form-control">
                                        <option value="">Select</option>
                                        <option value="GSO-2">GSO-2</option>
                                        <option value="GSO-1">GSO-1</option>
                                        <option value="Col Staff">Col Staff</option>
                                        <option value="DG">DG</option>
                                        <option value="PSO">PSO</option>
                                        <option value="PMO">PMO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td><input type="text" name="action" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Rmk (If Any)</th>
                                <td><input type="text" name="rmk" class="form-control"></td>
                            </tr>
                            <tr><td>

                                    <input type="submit" name="submit" value="Save" class="btn btn-info">
                                    <a href="view.php" class="btn btn-secondary">Task List</a>
                                </td>
                            </tr>


                            </tbody>

                        </table>
                    </form>

                </div>
                <div class="notification">
                    <?php
                    if(isset($success)){
                        echo '<p>'.$success.'</p>';
                    }
                    if(isset($wrong)){
                        echo '<p>'.$wrong.'</p>';
                    }


                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
        
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

























<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" placeholder="Your name"></td>
            </tr>
            
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Your Email"></td>
            </tr>
            
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td>Status: </td>
                <td>
                    <select name="status" id="">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save_info" value="Add User"></td>
            </tr>
            </table>
        </form>
        <a href="view.php">View Users</a>
        <br>
        <?php
            if(isset($success)){
                echo '<p>'. $success .'</p>';
            }else {
                echo '<p>'. $error .'</p>';
            }
        ?>
    </div>
</body>
</html>