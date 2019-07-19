<?php
namespace App\Service;

class Utilities{

    /**
     * Return Hello + $name
     *
     * @param [type] $name
     */
    function sayHello($name)
    {
        return "Hello ". $name ."!";
    }

}