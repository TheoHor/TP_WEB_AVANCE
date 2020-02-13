<?php
namespace App\Framework;

class ControllerGet extends ControllerAbstract
{
    public function checkMethod()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return true;
        } else {
            return false;
        }
    }

    public function getParam($param){
        return isset($_GET[$param])? $_GET[$param] : 'null';
    }
}