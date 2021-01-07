<?php

require "php/Routing.php";

$path = trim($_SERVER["REQUEST_URI"],"/");
$path = parse_url($path, PHP_URL_PATH);

if($path=="") $path = "main";


Routing::get("main","MainController");

Routing::get("search","DefaultController");

Routing::get("add","AddController");
Routing::post("addArticle","AddController");

Routing::get("login","SecurityController");
Routing::post("loginForm","SecurityController");
Routing::post("registerForm","SecurityController");
Routing::post("contact","SecurityController");
Routing::get("sendForm","SecurityController");

Routing::get("news","NewsController");

Routing::get("article","ArticleController");
Routing::post("addComment","ArticleController");
Routing::get("addLike","ArticleController");


Routing::get("crew","CrewController");

Routing::run($path);