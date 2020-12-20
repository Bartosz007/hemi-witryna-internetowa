<?php

require_once "Controller.php";
require_once __DIR__ . "/../other/basicFunctions.php";
require_once __DIR__ . "/../constants/SETTINGS.php";
require_once __DIR__."/../repositories/ArticleRepository.php";

class AddController extends Controller
{

    private array $messages = [];
    private ArticleRepository $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }

    public function add(){
        if($_COOKIE["admin"] == true)
            return $this->render("add-article");
        else
            return $this->render("main");

    }

    public function addArticle(){
        if(!$this->isPost())
            return $this->render("add-article");

        $tmpFileNames = [];
        $tmpTmpFileNames = [];
        $files = count($_FILES["files"]["name"]);
        $i = 0;
        while ($i < $files && count($tmpFileNames)<5){ //maksymalnie 5 władowanych plików
            if(is_uploaded_file($_FILES["files"]["tmp_name"][$i])
                && validate($_FILES["files"]["size"][$i],$_FILES["files"]["type"][$i])){


                $fileid = explode("/",$_FILES["files"]["tmp_name"][$i])[2];
                $ext = pathinfo($_FILES["files"]["name"][$i], PATHINFO_EXTENSION);
                $filename =  $fileid."-".rand().".".$ext;

                array_push($tmpFileNames, $filename);
                array_push($tmpTmpFileNames, $_FILES["files"]["tmp_name"][$i]);

            }
            $i++;
        }

        if(count($tmpFileNames) > 0){

            for($i = 0; $i<count($tmpFileNames); $i++){
                move_uploaded_file(
                    $tmpTmpFileNames[$i],
                    dirname(__DIR__).PHOTOS_UPLOAD_DIRECTORY.$tmpFileNames[$i]
                );
            }

        }else{
            return $this->render("add-article",["messages" => ["Wysłane pliki są nieprawidłowe!"]]);
        }
        $date = new DateTime();
        $date->format('Y-m-d');
        $userRepository = new UserRepository();

        $article = new Article($_POST["title"],
            $_POST["subtitle"],
            $_POST["text"],
            implode(",",$tmpFileNames),
            $date->format('Y-m-d'),
            $userRepository->getUserId($_COOKIE["email"])
        );

        $conn = $this->articleRepository->addArticle($article);

        if(!$conn)
            return $this->render("add-article",["messages" => ["Wystąpił błąd!"]]);


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/news");
    }
}