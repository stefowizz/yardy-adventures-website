<?php 
    $router->addRoute(
        "/demo/api", "GET", function () {
            View::render("API/info");
        }
    );
    $router->addRoute(
        "/demo/api/adventures", "GET", function () {
            $Controller = new ApiController();
            $Model = new HomeModel(CONNECTION);
            $Controller->model = $Model;
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->adventures(); 
        }
    );
    $router->addRoute(
        "/demo/api/user", "GET", function () {
            $Controller = new ApiController();
            $Model = new HomeModel(CONNECTION);
            $Controller->model = $Model;
            $Controller->route = $_SERVER['REQUEST_URI'];
            $Controller->session = new Session();
            $Controller->user(); 
        }
    );
