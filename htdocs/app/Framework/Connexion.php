<?php
namespace App\Framework;

class Connexion extends Singleton
{
    private $instancePDO;

    protected function __construct()
    {
        try {
            $this->instancePDO = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function getInstancePdo(){
        return $this->instancePDO;
    }

    public function query($query){
        return $this->getInstancePdo()->query($query);
    }

    public function exec($query){
        return $this->getInstancePdo()->exec($query);
    }

    public function prepare($query) {
        return $this->getInstancePdo()->prepare($query);
    }
}