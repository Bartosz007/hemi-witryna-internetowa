<?php

require_once "Controller.php";

class DefaultController extends Controller {

    public function search(){
        $this->render("search");
    }

}
