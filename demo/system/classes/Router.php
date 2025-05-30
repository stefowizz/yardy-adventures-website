<?php
class Router {

      private $routes = [];
      private $Advanceroutes = [];
    
   
      // Add a route
      public function addRoute($path, $method, $handler) {
        $this->routes[] = [
          'path' => $path,
          'method' => $method,
          'handler' => $handler
        ];
      }
      public function addAdvanceRoute($uri, $controller)
      {
        $this->Advanceroutes[$uri] = $controller;
      } 
    
      // Find and execute the appropriate route
      public function run() {
        $request_uri = $_SERVER['REQUEST_URI'];
        $qsi = strpos($request_uri,'?');
        if($qsi !== false){
            $path = substr($request_uri, 0, $qsi);
        }else{
            $path = $request_uri;
        }
   
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
          if ($route['path'] === $path && $route['method'] === $method) {
            $handler = $route['handler'];
            return $handler();
          }
        }
        // If no matching route is found, throw an exception
  
        http_response_code(404);
        include("404.php");
        @throw new Exception("The page $method $path does not exists on this server! ");
      }
      
    public function handleAdvanceRequest()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $this->handleGetRequest($uri);
        } elseif ($method === 'POST') {
            $this->handlePostRequest($uri);
        } else {
            // Handle other HTTP methods if needed
            echo "Unsupported HTTP method: $method";
        }
    }

    private function handleGetRequest($uri)
    {
        $params = $_GET;

        foreach ($this->Advanceroutes as $route => $controller) {
            if ($this->matchRoute($uri, $route)) {
                $this->callController($controller, $params);
                return;
            }
        }

        echo "404 Not Found";
    }

    private function handlePostRequest($uri)
    {
        $params = $_POST;

        foreach ($this->Advanceroutes as $route => $controller) {
            if ($this->matchRoute($uri, $route)) {
                $this->callController($controller, $params);
                return;
            }
        }

        echo "404 Not Found";
    }

    private function matchRoute($uri, $route)
    {
        // Simple matching for demonstration purposes
        return $uri === $route;
    }

    private function callController($controller, $params)
    {
        // Assuming controllers are simple classes with a method called 'process'
        if (class_exists($controller)) {
            $controllerInstance = new $controller();
            if (method_exists($controllerInstance, 'process')) {
                $controllerInstance->process($params);
            } else {
                echo "Controller method 'process' not found";
            }
        } else {
            echo "Controller class not found: $controller";
        }
    }

    public function autoroute(){
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
        }
    }

    public function affiliateRouting($var){
        if(isset($var)){
            $route = $var;
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
        }
    }

// // Example Usage:



// // Create an instance of the Router
// $router = new Router();

// // Add routes
// $router->addRoute('/example', 'ExampleController');

// // Handle the request
// $router->handleRequest();
}
?>