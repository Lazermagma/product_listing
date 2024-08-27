<?php

namespace App;

use PDO;
use PDOException;

class Dbh
{

    public  $host = 'localhost';
    public $dbname = 'scandiweb';
    public $username = 'root';
    public $password = '';

    public function connect(){
        try {
          $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Return the connection object
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}