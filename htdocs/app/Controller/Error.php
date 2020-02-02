<?php

namespace App\Controller;

use App\Framework\ControllerAbstract;

class Error extends ControllerAbstract {
    const TEMPLATE = 'error.phtml';

    public function error($error){
        $this->loadLayout(self::TEMPLATE);
        $this->setError($error);
        $this->render();
    }
}