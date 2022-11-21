<?php

$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];

$connection=mysqli_connect("localhost","root","","student") or die("connection failed");
$sql="INSERT INTO students(sname,saddress,sclass,sphone)VALUES('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
$result = mysqli_query($connection,$sql) or die("Query Failed");
header("Location: http://localhost/crud_html/index.php");
mysqli_close($connection);