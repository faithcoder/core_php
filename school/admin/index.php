<?php
session_start();

if(!isset($_SESSION['user_login'])){
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Admin|Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">SMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-user"> </i> Welcome : <?php echo $_SESSION['user_login']; ?> </a></li>
            <li class="nav-item"><a class="nav-link" href="registration.php"><i class="fa fa-user-plus"> </i> Add User</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"> </i> Profile </a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"> </i> Logout</a></li>
        </ul>
    </div>
</nav>
<br>
<div class="container-fluid main-area">
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
                <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-plus"></i> Add Student</a>
                <a href="index.php?page=all-student" class="list-group-item"><i class="fa fa-users"></i> All Student</a>
                <a href="index.php?page=all-user" class="list-group-item"><i class="fa fa-user"></i> All Users</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="content">
                <?php
                require_once "dbcon.php";

                if(isset($_GET['page'])){
                    $page = $_GET['page'].'.php';
                }else{
                    $page = "dashboard.php";
                }

                if(file_exists($page)){
                    require_once $page;
                }else{
                    require_once "404.php";
                }

                ?>
            </div>
        </div>
    </div>
    
</div>
<footer class="footer-area text-center">
    <p>Copyright &copy; All rights reserved</p>
</footer>

<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

</body>
</html>