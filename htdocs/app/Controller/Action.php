<?php

namespace App\Controller;

use App\Customer;
use App\Framework\ControllerPost;

class Action extends ControllerPost
{
    const TEMPLATE = 'action.phtml';

    private $customer;

    public function index()
    {
        $this->loadLayout(self::TEMPLATE);

        $lastname = $this->getParam('lastname');
        $firstname = $this->getParam('firstname');
        $age = $this->getParam('age');

        $this->customer = new Customer($lastname, $firstname, $age);

        $this->render();
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}