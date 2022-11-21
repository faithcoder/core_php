<?php

require_once 'app\classes\First.php';
require_once 'app\classes\test.php';

//$x = new App\classes\First();
//$x->name();

use app\classes\First as a;
use App\test\First as b;

a::name();

b::name();