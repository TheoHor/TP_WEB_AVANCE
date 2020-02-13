<?php
namespace App\Controller;

use App\Framework\ControllerAbstract;

class Contact extends ControllerAbstract {
    const TEMPLATE = 'contact.phtml';

    public function index(){
        $this->loadLayout(self::TEMPLATE);
        $this->render();
    }
}

