<?php

namespace App\controller;
use App\model\ArticleModel;
require_once('../model/ArticleModel.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class HomepageController 
{
    private $ArticleModel;

    public function __construct(){
        $this->ArticleModel= new ArticleModel();

    }
    public function index() {
        $articles= $this->ArticleModel->getAll();
        require_once __DIR__ . '/../view/html/home.php';
    }
}
