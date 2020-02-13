<?php
namespace App\Model;

class Customer
{
    private $lastname;
    private $firstname;
    private $age;

    public function __construct($lastname = "Deneudt", $firstname = "Lucas", $age = "20")
    {
        $this->setLastName($lastname);
        $this->setFirstName($firstname);
        $this->setAge($age);
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getFullName()
    {
        return $this->getLastName() . ' ' . $this->getFirstName();
    }
}