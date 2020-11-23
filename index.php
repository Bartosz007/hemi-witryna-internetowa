<?php

require "php/Routing.php";

$path = trim($_SERVER["REQUEST_URI"],"/");
$path = parse_url($path, PHP_URL_PATH);

if($path=="") $path = "main";


Routing::get("main","DefaultController");
Routing::get("article","DefaultController");
Routing::get("contact","DefaultController");
Routing::get("crew","DefaultController");
Routing::get("news","DefaultController");
Routing::get("search","DefaultController");

Routing::post("login","SecurityController");

Routing::run($path);