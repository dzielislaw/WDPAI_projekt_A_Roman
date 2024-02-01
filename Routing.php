<?php

    require_once __DIR__.'/src/Controllers/DefaultController.php';
    require_once __DIR__.'/src/Controllers/SecurityController.php';
    require_once __DIR__.'/src/Controllers/AuthController.php';
    require_once __DIR__.'/src/Controllers/RentController.php';
    require_once __DIR__.'/src/Controllers/CheckOutApiController.php';
    require_once __DIR__.'/src/Controllers/CheckInApiController.php';

    class Routing{
        public static $get_routes;
        public static $post_routes;

        public static function get($url, $view): void
        {
            self::$get_routes[$url] = $view;
        }

        public static function post($url, $view): void
        {
            self::$post_routes[$url] = $view;
        }

        public static function run($url){
            $action = explode("/", $url)[0];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(!array_key_exists($action, self::$post_routes)){
                    die("Wrong url!");
                }
                $controller = self::$post_routes[$action];
                include_once ('src/Controllers/'.$controller.'.php');
                $object = new $controller;
                $action = $action ?: 'index'; //Tel me why
                $object->$action();
            }
            else{
                if(!array_key_exists($action, self::$get_routes)){
                    //die("Wrong url!");
                    $url = "https://$_SERVER[HTTP_HOST]";
                    header("Location: {$url}/error404");
                }
                $controller = self::$get_routes[$action];
                $object = new $controller;
                $action = $action ?: 'index'; //Tel me why
                $object->$action();
            }
        }
    }