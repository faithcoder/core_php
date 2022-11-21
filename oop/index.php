<?php

require_once 'Admin.php';
require_once 'User.php';

$x = new Admin();

echo $x->html();

$css = new User();
echo $css->test();
//I N H E R I T E N C E

?>


