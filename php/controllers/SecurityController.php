<?php

require_once "Controller.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__."/../helpers/basicFunctions.php";

class SecurityController extends Controller
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
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

        $user = $this->userRepository->getUser($email,$password);

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

    public function registerForm(){

        if(!$this->isPost())
            return $this->render('login');

        if($_POST["password"] !=  $_POST["repassword"])
            return $this->render("login",["messages"=>["Podane hasła się różnią!"]]);

        if(!is_uploaded_file($_FILES["avatar"]["tmp_name"]) || !validate($_FILES["avatar"]["size"],$_FILES["avatar"]["type"]))
            return $this->render("login",["messages"=>["Niedozwolony format pliku!"]]);


        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = hash("Whirlpool", $_POST["password"]);
        $avatar = $_FILES["avatar"];

        $user = new User($email,$password,$name,$surname);

        $conn = $this->userRepository->addUser($user,$avatar);

        if(!$conn){
            return $this->render("login",["messages"=>["Taki użytkownik juz istnieje!"]]);
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