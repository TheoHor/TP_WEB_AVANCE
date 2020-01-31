<?php

namespace App\Controller;

use app\Framework\ControllerAbstract;

class Contact extends ControllerAbstract
{
    public function index()
    {
        $this->loadLayout("template.phtml");
        $this->render();
    }
}