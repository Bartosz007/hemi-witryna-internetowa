<?php

require_once "AppController.php";

class DefaultController extends AppController {

    public function index(){
        $this->render("index");
    }

    public function login(){
        $this->render("login");
    }

    public function article(){
        $this->render("article");
    }

    public function contact(){
        $this->render("contact");
    }

    public function crew(){
        $this->render("crew");
    }

    public function news(){
        $this->render("news");
    }

    public function search(){
        $this->render("search");
    }

}
