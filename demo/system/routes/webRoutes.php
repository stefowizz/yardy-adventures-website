<?php
    $router = new Router();
    
    $router->addRoute(
        '/demo/', 'GET', function () {
            $Controller = new HomeController();
      
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->index();        
        }
    );

    
    $router->addRoute(
        '/demo/product/:id', 'GET', function ($id) {
            $Controller = new HomeController();
      
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->product();        
        }
    );
 
    
    $router->addRoute(
        '/demo/login', 'GET', function () {
            $Controller = new AuthController();
      
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->index();
        }
    );

    $router->addRoute(
        '/demo/register', 'GET', function () {
            $Controller = new AuthController();
      
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->register();
        }
    );


    $router->addRoute(
        '/demo/users', 'GET', function () {
            $Controller = new DashboardController();
      
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->users();
        }
    );

    $router->addRoute(
        '/demo/dashboard', 'GET', function () {
            View::render('Dashboard/dashboard');
        }
    );
 
    $router->addRoute(
        '/demo/checkout', 'GET', function () {
            $Controller = new CheckoutController();
            $Model = new CheckoutModel(CONNECTION);
            $Controller->model = $Model;
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->checkout(); 
        }
    );
    
    $router->addRoute(
        '/demo/services', 'GET', function () {
            $Controller = new HomeController();
            $Model = new HomeModel(CONNECTION);
            $Controller->model = $Model;
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->services(); 
        }
    );

      $router->addRoute(
        '/demo/adventures', 'GET', function () {
            $Controller = new HomeController();
            $Model = new HomeModel(CONNECTION);
            $Controller->model = $Model;
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->adventures(); 
        }
    );

    $router->addRoute(
        '/demo/blog', 'GET', function () {
            View::render('blog');
        }
    );
    


    $router->addRoute(
        '/demo/contact', 'GET', function () {
            View::render('contact');
        }
    );
    



    $router->addRoute(
        '/demo/spage', 'GET', function () {
            View::render('spage');
        }
    );
    



    $router->addRoute(
        '/demo/dahboard/share', 'GET', function () {
            View::render('spage');
        }
    );
    



    $router->addRoute(
        '/demo/dashboard/share2', 'GET', function () {
            View::render('share2');
        }
    );
    


    $router->addRoute(
        '/demo/reseller', 'GET', function () {
            View::render('reseller');
        }
    );
    




    $router->addRoute(
        '/demo/attraction', 'GET', function () {
            View::render('attract');
        }
    );
    



    $router->addRoute(
        '/demo/terms', 'GET', function () {
            View::render('terms');
        }
    );
    





    $router->addRoute(
        '/users/:id', 'GET', function ($id) {
            echo 'User ID: ' . $id;
        }
    );
    
    
    try {
        $router->run();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
