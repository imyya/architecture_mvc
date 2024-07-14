<?php

namespace App\controller;
use App\model\ArticleModel;
require_once('../model/ArticleModel.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ArticleController{
   private $ArticleModel;
   
   public function __construct()
   {
    $this->ArticleModel= new ArticleModel();
   }

   public function index(){
      $articles= $this->ArticleModel->getAll();

      require_once('../view/html/home.php');

    
   }

   public function filterByCategory($category) {
     // echo $category[1];
      $categ_articles = $this->ArticleModel->getByCategory($category[1]);
    
      //echo 'here'.$categ_articles[0];
      require_once __DIR__ . '/../view/html/home.php';
  }


}