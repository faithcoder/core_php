<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pagination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
    $con = mysqli_connect('localhost', 'root', '', 'wk_update');
    $parPage = 4;
    $result = mysqli_query($con, "SELECT * FROM `pagination`");

    /* while ($row = mysqli_fetch_array($result)){
        echo $row['id'].'=>'.$row['district'].'<br/>';
    }*/

    $totalData = mysqli_num_rows($result);
    $totalPage = ceil($totalData / $parPage) ;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $limit = ($page - 1) * $parPage ;

    $result = mysqli_query($con, "SELECT * FROM `pagination` LIMIT ".$limit .','.$parPage);

    while ($row = mysqli_fetch_array($result)){
        echo $row['id'].'=>'.$row['district'].'<br/>';
    }

    if($page > 1){
        ?> <a href="index.php?page=<?=$page-1 ?>" class="btn btn-secondary">Previous</a> <?php
    }else{
        ?> <a href="javascript:avoid(0)" class="btn btn-secondary disabled"  >Previous</a> <?php
    }

    for($i = 1; $i <= $totalPage; $i++){
        ?>
        <a href="index.php?page=<?=$i ?>" class="btn btn-info <?= $page == $i ? 'active':'' ?> "><?= $i ?></a>
        <?php
    }
    if(($i > $page) && ($page < $totalPage)){
        ?> <a href="index.php?page=<?=$page+1 ?>" class="btn btn-secondary">Next</a> <?php
    }else{
        ?> <a href="javascript:avoid(0)" class="btn btn-secondary disabled"  >Next</a> <?php
    }
?>
</body>
</html>