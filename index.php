<?php

require "php/Routing.php";

$path = trim($_SERVER["REQUEST_URI"],"/");
$path = parse_url($path, PHP_URL_PATH);

if($path=="") $path = "main";


Routing::get("main","DefaultController");
Routing::get("article","DefaultController");
Routing::get("contact","DefaultController");
Routing::get("crew","DefaultController");
Routing::get("search","DefaultController");

Routing::get("news","NewsController");

Routing::get("add","AddController");
Routing::post("addArticle","AddController");

Routing::get("login","SecurityController");
Routing::post("loginForm","SecurityController");
Routing::post("registerForm","SecurityController");


Routing::run($path);