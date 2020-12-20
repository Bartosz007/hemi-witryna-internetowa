<?php

require_once "Controller.php";
require_once __DIR__."/../other/LineTiles.php";

class NewsController extends Controller
{
    private ArticleRepository $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }

    public function news(){
        $articles = $this->articleRepository->getAllArticles();
        $lines = new LineTiles($articles);

        return $this->render("news",["lines" => $lines->getNewsLines($articles)]);
    }

}