<?php

require_once "Controller.php";
require_once __DIR__.'/../repositories/ArticleRepository.php';
require_once __DIR__.'/../printClasses/BigArticle.php';
require_once __DIR__.'/../printClasses/Slider.php';

class ArticleController extends Controller
{
    private ArticleRepository $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }

    public function article(){

        if(!$this->isGet())
            return $this->render('main');

        if(!isset($_GET["id"]))
            return $this->render('main');


        $article = $this->articleRepository->getArticle(intval($_GET["id"]));

        $bigArticle = new BigArticle();
        $slider = new Slider();

        $this->render("article",[
            "slider" => $slider->getSlider($article->getImages(),$article->getTitle()),
            "content"=>$bigArticle->getArticle($article)
            ]);
    }

    public function addComment(){
        if(!$this->isPost())
            return $this->render('main');

        $contentType = $_SERVER["CONTENT_TYPE"];

        if(isset($contentType) && trim($contentType) == "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decodedData = json_decode($content, true);


            $response = $this->articleRepository->addComment(
                $decodedData["id_article"],
                $decodedData["email"],
                $decodedData["text"],
                $decodedData["date"],
                $decodedData["time"]
            );

            header("Content-Type: application/json");
            http_response_code(200);

            if($response) {
                $bigArticle = new BigArticle();
                $userRepository = new UserRepository();
                $user = $userRepository->getUserDetails($decodedData["email"]);

                $comment = [
                    "avatar"=>$user->getFile(),
                    "name"=>$user->getName(),
                    "surname"=>$user->getSurname(),
                    "text"=>$decodedData["text"]
                ];

                echo json_encode([
                    "response" => $response,
                    "data" => $bigArticle->getComment($comment)
                ]);
            }
            else{
                echo json_encode(["response" => $response]);
            }
        }

    }

    public function addLike(int $id){
        $this->articleRepository->addLike($id);
        http_response_code(200);
    }

    public function searchArticle(string $value){

        if(!$this->isPost())
            return $this->render('main');

        $contentType = $_SERVER["CONTENT_TYPE"];

        if(isset($contentType) && trim($contentType) == "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decodedData = json_decode($content, true);
            $text = $decodedData["search"];

            $articles = $this->articleRepository->searchArticles($text);
            $lineTiles = new LineTiles();

            header("Content-Type: application/json");
            http_response_code(200);


            echo json_encode([
                "data" => $lineTiles->getMainLines($articles)
            ]);

        }

    }

}