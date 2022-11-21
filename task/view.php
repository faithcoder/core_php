<?php
require_once 'dbcon.php';

$sql = "SELECT * FROM `task`";
$result = mysqli_query($con, $sql);

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

                <div class="header align-content-center" style="text-align: center; display:block; margin-top:50px;">
                    <h2 style="margin: 0;padding:0;">WK UPDATE</h2> <br/>
                    <h3>OPS & PLAN DTE (JT P&P)</h3>
                </div>
                <div class="data">
                    <a href="index.php" class="btn btn-success" style="margin-left: 20px; margin-bottom: 20px;" >Add Data</a>
                    <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ser</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Received Date</th>
                            <th scope="col">Category</th>
                            <th scope="col">File put up to:</th>
                            <th scope="col">Action Taken</th>
                            <th scope="col">Rmk</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                       <?php
                        $i = 1;
                       while ($row = mysqli_fetch_assoc($result)){
                           ?>
                           <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?= $row['subject']?></td>
                            <td><?= $row['date']?></td>
                            <td><?= $row['category']?></td>
                            <td><?= $row['put_up']?></td>
                            <td><?= $row['action']?></td>
                            <td><?= $row['rmk']?></td>
                            <td>
                                <a href="edit.php?edit=<?= base64_encode($row['id']);?>" class="btn btn-primary" >Edit</a>
                                <a href="delete.php?id=<?= base64_encode($row['id']);?>" class="btn btn-danger" >Delete</a>
                            </td>
                        </tr>
                       <?php
                           $i++;
                       }

                       ?>

                    </tbody>
                </table>
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

