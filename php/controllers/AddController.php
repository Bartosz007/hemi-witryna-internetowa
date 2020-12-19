<?php

require_once "Controller.php";
require_once __DIR__."/../helpers/basicFunctions.php";
require_once __DIR__."/../helpers/SETTINGS.php";

class AddController extends Controller
{

    private $messages = [];

    public function add(){
        return $this->render("add-article");
    }

    public function addArticle(){
        if($this->isPost() && is_uploaded_file($_FILES["files"]["tmp_name"]) && validate($_FILES["files"])){
            move_uploaded_file(
                $_FILES["files"]["tmp_name"],
                dirname(__DIR__).PHOTOS_UPLOAD_DIRECTORY.$_FILES['files']['name']
            );
            return $this->render("news",["messages" => $this->messages]);
        }

        return $this->render("add-article",["messages" => $this->messages]);
    }

    private function validate(array $files): bool
    {
        if($files["size"] > MAX_FILE_SIZE){
            $this->messages[]="Plik jest za duży!";
            return false;
        }

        if(!isset($files["type"]) || !in_array($files["type"],SUPPORTED_TYPES)){
            $this->messages[]="Zły format pliku!";
            return false;
        }
        return true;

    }

}