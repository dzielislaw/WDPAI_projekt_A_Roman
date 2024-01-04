<?php

    require_once 'src/Controllers/DefaultController.php';
    require_once 'src/Controllers/SecurityController.php';
    class Routing{
        public static $get_routes;
        public static $post_routes;

        public static function get($url, $view){
            self::$get_routes[$url] = $view;
        }

        public static function post($url, $view){
            self::$post_routes[$url] = $view;
        }

        public static function run($url){
            $action = explode("/", $url)[0];


            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(!array_key_exists($action, self::$post_routes)){
                    die("Wrong url!");
                }
                $controller = self::$post_routes[$action];
                $object = new $controller;
                $action = $action ?: 'index'; //Tel me why
                $object->$action();
            }
            else{
                if(!array_key_exists($action, self::$get_routes)){
                    //die("Wrong url!");
                    $url = "http://$_SERVER[HTTP_HOST]";
                    header("Location: {$url}/error404");
                }
                $controller = self::$get_routes[$action];
                $object = new $controller;
                $action = $action ?: 'index'; //Tel me why
                $object->$action();
            }
        }
    }