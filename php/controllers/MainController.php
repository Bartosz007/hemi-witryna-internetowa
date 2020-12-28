<?php

require_once "Controller.php";
require_once __DIR__."/../repositories/ArticleRepository.php";

class MainController extends Controller
{
    private ArticleRepository $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }

    public function main(){

        $articles = $this->articleRepository->getAllArticles();

        $lineTiles = new LineTiles();
        $slider = new Slider();

        $this->render("main",[
            "slider" => $slider->getSlider($articles[0]->getImages()),
            "content"=>$lineTiles->getMainLines($articles)
        ]);

    }

}