<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 12-May-20
 * Time: 10:52 PM
 */
session_start();

session_destroy();

header('location:login.php');