<?php

$stu_id=$_GET['id'];


$connection=mysqli_connect("localhost","root","","student") or die("connection failed");
$sql="DELETE FROM students WHERE sid={$stu_id}";
$result = mysqli_query($connection,$sql) or die("Query Failed");
header("Location: http://localhost/crud_html/index.php");
mysqli_close($connection);