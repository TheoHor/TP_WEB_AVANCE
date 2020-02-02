<?php

/**
 * Class Autoload
 */
class Autoload{

    static public function run()
    {
        spl_autoload_register(function ($class) {


            $class = lcfirst(str_replace('\\',DS,$class).'.php');
            require_once $class;
        });
    }
}