<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 04-May-20
 * Time: 10:33 PM
 */

require_once 'classes/user.php';
$user = new User();

$id = $_GET['id'];

$user->delete_user($id);