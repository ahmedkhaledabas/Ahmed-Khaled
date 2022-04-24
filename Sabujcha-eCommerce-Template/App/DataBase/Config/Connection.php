<?php

namespace App\DataBase\Config;

use mysqli;

class Connection{
    protected $hostName= 'localhost';
    protected $userName= 'root';
    protected $password= '';
    protected $database= 'ecommerce';
    protected $port= 3306;
    public mysqli $con;
    public function __construct()
    {
        $this->con= new mysqli($this->hostName, $this->userName, $this->password, $this->database, $this->port);
    
    }
    public function __destruct () {
        $this->con->close();
    }
}



?>