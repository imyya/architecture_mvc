<?php
namespace App\Config;
use PDO;
use PDOException;

class Database{
    private $host="localhost";
    private $db_name="journal";
    private $username="root";
    private $password="12341234";
    private $conn;

    public function getConnection(){
        $this->conn=null;
        try{
            $this->conn= new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
            $this->conn->exec("set names utf8");
            
        }
        catch(PDOException $e){
            echo "Erreur de connexion".$e->getMessage();
        }
        return $this->conn;
    }

}
