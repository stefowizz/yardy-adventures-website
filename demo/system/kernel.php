<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once ("config.php");

    spl_autoload_register(function($class){
        if(file_exists(CLASSES.$class.'.php')){
            require CLASSES.str_replace('\\', '/', $class) . '.php';
        }
        
        if(file_exists(CONTROLLER.$class.'.php')){
            require_once CONTROLLER.str_replace('\\', '/', $class) . '.php';
        }
        
        if(file_exists(MODEL.$class.'.php')){
            require_once MODEL.str_replace('\\', '/', $class) . '.php';
        }
    });
    
    $db = Connection::connect($dbconfig);
    DEFINE('CONNECTION',$db);
    
            if(isset($_REQUEST['route'])){
                $route = $_REQUEST['route'];
                $action = null;
                $rout = explode('/', $route);
                $path = [];
                
                foreach ($rout as $r => $v){
                    
                    if( $v === null || trim($v) == ''){
                        $path[] = null;
                    }else{
                        $path[] = $v;
                        
                    }
                }
                if($path != null){
                    $num = count($path)-1;
                }else{
                    $num = 0;
                    
                }
 
                if(!isset($path[0]) || $path[0] === null || trim($path[0]) == ''){
                    $controller = "HomeController";
                    $model = "HomeModel";
                    
                }else{
                    $controller = ucfirst($path[0]).'Controller';
                    $model =   ucfirst($path[0]).'Model';
                    
                }
                if(!isset($path[$num]) || $path[$num] === null || trim($path[$num]) == '' || trim($path[$num])==$path[0]){
                    $path[$num] = "index";
                    $action = "index";
                    
                }else{
                    $action = lcfirst($path[$num]);
                }
                if(class_exists($controller)){
                    $Controller = new $controller();
                    $Controller->route = $route;
                    $Controller->session = new Session();
                    
                }
                if(class_exists($model)){
                    $Model = new $model();
                    
                    $Controller->model = $Model;
 
                    $Controller->$action();
                }
            }else{
                 include(SYSTEMS.'routes/webRoutes.php');  
            }
    
    

    
?>