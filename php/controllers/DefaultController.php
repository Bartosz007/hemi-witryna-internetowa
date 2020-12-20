<?php

require_once "Controller.php";

class DefaultController extends Controller {

    public function main(){
        $this->render("main");
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

    public function search(){
        $this->render("search");
    }


}
