<?php
namespace App\Controller;

use App\Framework\ControllerGet;
use App\Model\Repository\CustomerRepository;

class ActionList extends ControllerGet
{
    const TEMPLATE = 'actionList.phtml';

    private $listCustomer;

    public function index(){
        $this->loadLayout(self::TEMPLATE);

        $repo = new CustomerRepository();
        $this->listCustomer = $repo->getList();

        $this->render();
    }
    public function getListCustomer()
    {
        return $this->listCustomer;
    }
}