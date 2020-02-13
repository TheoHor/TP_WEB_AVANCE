<?php

namespace App\Framework;

class Singleton
{
    static protected $instance = null;

    protected function __construct()
    {
    }

    static function getInstance()
    {
        if (is_null(self::$instance)) {
            $class = get_called_class();
            self::$instance = new $class;
        }
        return self::$instance;
    }
}