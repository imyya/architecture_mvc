<?php
namespace App\Config;
use PDO;
use PDOException;

class Database{
    protected const HOSTNAME="localhost";
    protected const DBNAME="journal";
    protected const USERNAME="root";
    protected const PASSWORD="12341234";
    private $db;
    private $stmt;

    
    public function __construct(){
        try{

        $this->db=new PDO('mysql:host='.self::HOSTNAME.';dbname='.self::DBNAME, self::USERNAME, self::PASSWORD);
        }

        catch(PDOException $e){
            die("there is an issue".$e->getMessage());
        };

        

    }

    public function __destruct(){   
   
    
    if($this->db!=null){
        $this->db=null; //c pareil q close()
    }

}
    
public function request(string $req, array $data=[])
{   try{
    $this->stmt = $this->db->prepare($req);
    for ($i=0; $i < count($data); $i++) {
        $this->stmt->bindValue($i + 1, $data[$i]);
    }
    $this->stmt->execute();
    return $this->stmt;
}
    
catch (PDOException $e) {
    // Handle the exception or display an error message
    die("There is an issue: " . $e->getMessage());
}
    
}

}
