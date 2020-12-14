<?php

require_once "Controller.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__.'/../connections/UserConnection.php';

class SecurityController extends Controller
{
    private $userConnection;

    public function __construct()
    {
        parent::__construct();
        $this->userConnection = new UserConnection();
    }

    public function login(){
        if(isset($_COOKIE["email"])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/main");
        }else
        {
            return $this->render("login");
        }
    }

    public function loginForm(){

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = hash("Whirlpool", $_POST["password"]);

        $user = $this->userConnection->getUser($email,$password);

        if(!$user){
            return $this->render("login",["messages"=>["Podano złe dane logowania!"]]);
        }else{
            setcookie("email",$user->getEmail(), time()+86400 * 30);
            setcookie("name",$user->getName(), time()+86400 * 30);
            setcookie("surname",$user->getSurname(), time()+86400 * 30);
            setcookie("admin",$user->isAdmin(), time()+86400 * 30);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/main");
        }
    }

}