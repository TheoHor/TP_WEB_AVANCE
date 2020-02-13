<?php
class Autoload {
    static function run()
    {
        spl_autoload_register(function ($class){
            require_once lcfirst(str_replace("\\", DS, $class)) . '.php';
        });
    }
}