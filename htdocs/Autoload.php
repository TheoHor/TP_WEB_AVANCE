<?php

class Autoload
{
    public static function run()
    {
        spl_autoload_register(function ($class) {
            include lcfirst(str_replace("\\",DS,$class)). '.php';
        });
    }
}