<?php

require_once __DIR__ . "/../Http/Request.php";
require_once __DIR__ . "/../Http/Response.php";

class Core {
    public static function dispatch(array $routes) {
        $url = "";

        isset($_SERVER['REQUEST_URI']) && $url .= $_SERVER['REQUEST_URI'];

        $url !== "/" && $url = rtrim($url, "/");

        $routeFound = false;

        foreach($routes as $route) {
            $pattern = "#^" . preg_replace('/{id}/', "([\w-]+)", $route["path"]) . "$#";

            if(preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routeFound = true;

                if($route["method"] !== Request::method()) {
                    Response::json([
                        "error" => true,
                        "success" => false,
                        "message" => "Sorry, method not allowed."
                    ], 405);

                    return;
                }

                [$controller, $action] = explode("@", $route["action"]);

                require_once __DIR__ . "/../Controllers/$controller.php";

                $newController = new $controller();
                $newController->$action(new Request, new Response, $matches);
            }
        }

        if(!$routeFound) {
            require_once __DIR__ . "/../Controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index(new Request, new Response);
        }
    }
}