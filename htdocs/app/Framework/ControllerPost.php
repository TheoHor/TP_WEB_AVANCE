<?php
namespace App\Framework;

class ControllerPost extends ControllerAbstract
{
    public function checkMethod()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        } else {
            return false;
        }
    }

    public function getParam($param){
        return isset($_POST[$param])? $_POST[$param] : 'null';
    }
}