<?php
namespace App\model;
use PDO;
use App\Config\Database;
require_once('../config/Database.php');

final class ArticleModel
{
    private $db;
    private $stmt;
    public function __construct(){
        $this->db = new Database();
    }

    public function getAll(){
        $this->stmt= $this->db->request('SELECT * FROM article',[]);
        $articles= $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    public function getByCategory($category) {
        $array=array($category);
        $stmt = $this->db->request("SELECT * FROM article WHERE libelle = ?",$array);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
}
