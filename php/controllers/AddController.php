<?php

require_once "Controller.php";

class AddController extends Controller
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png","image/jpeg"];
    const UPLOAD_DIRECTORY = "/../public/upload/";
    private $messages = [];

    public function add(){
        return $this->render("add-article");
    }

    public function addArticle(){
        if($this->isPost() && is_uploaded_file($_FILES["files"]["tmp_name"]) && $this->validate($_FILES["files"])){
            move_uploaded_file(
                $_FILES["files"]["tmp_name"],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['files']['name']
            );
            return $this->render("news",["messages" => $this->messages]);
        }

        return $this->render("add-article",["messages" => $this->messages]);
    }

    private function validate(array $files): bool
    {
        if($files["size"] > self::MAX_FILE_SIZE){
            $this->messages[]="Plik jest za duży!";
            return false;
        }

        if(!isset($files["type"]) || !in_array($files["type"],self::SUPPORTED_TYPES)){
            $this->messages[]="Zły format pliku!";
            return false;
        }
        return true;

    }

}