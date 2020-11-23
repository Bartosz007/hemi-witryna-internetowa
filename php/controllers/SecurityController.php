<?php

require_once "Controller.php";
require_once __DIR__."/../models/User.php";

class SecurityController extends Controller
{

    public function login(){
        $user = new User("admin@tlen.pl","admin","Imie","Nazwisko");

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];


        if($user->getEmail() !== $email){
            return $this->render("login",["messages"=>["User with this email not exists!"]]);
        }

        if($user->getPassword() !== $password){
            return $this->render("login",["messages"=>["Wrong password!"]]);
        }

        return $this->render("main");
    }

}