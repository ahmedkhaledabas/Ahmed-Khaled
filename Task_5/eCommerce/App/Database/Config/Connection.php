<?php
namespace App\Database\Config;

use mysqli;

class Connection {
    protected string $DBhostName = 'localhost';
    protected string $DBusername = 'root';
    protected string $DBpassword = '';
    protected string $DBdatabase = 'ecommerce';
    protected int    $DBport = 3306;
    public  mysqli $con;
    public function __construct() {
        $this->con = new mysqli($this->DBhostName , $this->DBusername, $this->DBpassword , $this->DBdatabase , $this->DBport);
    }

    public function __destruct () {
        $this->con->close();
    }
}