<?php

require_once 'php/controllers/DefaultController.php';
require_once 'php/controllers/SecurityController.php';
require_once 'php/controllers/AddController.php';
require_once 'php/controllers/NewsController.php';
require_once 'php/controllers/ArticleController.php';
require_once 'php/controllers/CrewController.php';
require_once 'php/controllers/MainController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function run($url){

        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if(!array_key_exists($action, self::$routes)){
            die("Side don't exists!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        $id = $urlParts[1] ?? '';
        $object->$action($id);


    }

}

