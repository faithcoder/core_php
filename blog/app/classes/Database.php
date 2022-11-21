<?php
/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 09-May-20
 * Time: 10:57 AM
 */

namespace App\classes;


class Database
{
    public function dbCon(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "blog";
        $link = mysqli_connect($host, $user, $pass, $db);
        return $link;
    }
}