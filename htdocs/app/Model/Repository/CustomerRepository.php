<?php
namespace App\Model\Repository;

use App\Framework\Connexion;
use App\Model\Customer;

class CustomerRepository
{
    public function save(Customer $customer) {
        $query = "INSERT INTO contact(lastname, firstname, age) VALUES(:lastname, :firstname,  :age);";
        $request = Connexion::getInstance()->prepare($query);
        $request->execute(array(':firstname' => $customer->getFirstName(), ':lastname' => $customer->getLastName(), ':age' => $customer->getAge()));
    }

    public function get($id) {
        $query = "SELECT * FROM contact WHERE id = ". $id[0];
        return Connexion::getInstance()->query($query)->fetch();
    }

    public function getList(){
        $query = "SELECT * FROM contact";
        return Connexion::getInstance()->query($query)->fetchAll();
    }
}
