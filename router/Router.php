<?php
namespace App\router;
use App\controller\HomepageController;
require_once __DIR__ . '/../controller/HomepageController.php';

class Router{
    public function __construct(){
        $requestUri = $_SERVER['REQUEST_URI'];
        // remove any query string and decode the URL
        $path = urldecode(parse_url($requestUri, PHP_URL_PATH));
    
        // remove the leading slash if there is one
    
        $path = str_replace("/public", "", $path);

    
        // if (substr($path, 0, 1) === '/') {//checks if the #st crctr startin frm 0 is / 
        //     $path = substr($path, 1); //creates new string that skips the first crctr @ 0
        // }     
        // Split the path into controller and action
    
        $parts = explode('/', $path);

        $controllerName = $parts[1] ?? null;
        $action = $parts[2] ?? null;
    
        // $params = array_slice($parts, 2); // Get any remaining parts of the URL
        unset($parts[1],$parts[2]);//to get rid of the contrller n action and leav only the params
        $params=!empty($parts) ? array_values($parts):[];
        // echo $params[1];
        // foreach($params as $p){
        //     echo $p;
        // }
        if ($controllerName !== null) {

            $controllerName = ucfirst($controllerName) . "Controller";
            
            $file=__DIR__ . '/../controller/'.$controllerName.".php";
            
            $ctrlObject="App\controller\\".$controllerName;
                
            if (file_exists($file)){
                require_once($file);
                $controller = new $ctrlObject;
    
                $action=$action ?? 'index';
    
                if (method_exists($controller, $action)) {
                    if(!empty($params)){
                        $controller->$action($params);  
                    }
                    else{
    
                        $controller->$action();
                    }
                    
                    
                } 
                else {
    
                    echo "Unknown method: " . $action;
                }
            } 
            else {

    
                echo "Unknown controller: " . $controllerName;
            }
        } else {
    
            echo "Invalid URL";
        }
    }

}



