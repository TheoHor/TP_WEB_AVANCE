<?php
namespace App\Controller;

use App\Framework\ControllerGet;
use App\Model\Repository\CustomerRepository;

class ActionGet extends ControllerGet
{
    const TEMPLATE = 'actionGet.phtml';

    private $customer;

    public function index($id){
        $this->loadLayout(self::TEMPLATE);

        $repo = new CustomerRepository();
        $this->customer = $repo->get($id);

        $this->render();
    }
    public function getCustomer()
    {
        return $this->customer;
    }
}