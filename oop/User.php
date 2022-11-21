<?php

/**
 * Created by PhpStorm.
 * User: FaithCoder
 * Date: 27-Apr-20
 * Time: 9:53 PM
 */
class User extends Admin
{
    function js(){
        echo "JS";
    }
    public function test()
    {
        $this->css();
    }
}