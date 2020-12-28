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

}