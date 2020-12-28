<?php

require_once "Tile.php";

class LineTiles
{
    private bool $lineType;
    private bool $newLine;
    private string $content;
    private Tile $tile;

    public function __construct()
    {
        $this->lineType = true;
        $this->newLine = true;
        $this->content = "";
        $this->tile = new Tile();
    }

    public function getNewsLines(array $articles): string{

        foreach ($articles as $article){

            if($this->newLine){
                $this->content = $this->content.$this->createLine();
                $this->content = $this->content.$this->getTile($article);
                $this->newLine = false;
            }else{
                $this->content = $this->content.$this->getTile($article);
                $this->content = $this->content.$this->endLine();
                $this->newLine = true;
                $this->lineType = !$this->lineType;
            }
        }

        if(count($articles)%2 == 1)
            $this->content = $this->content.$this->endLine();


        return $this->content;
    }

    public function getMainLines(array $articles): string {

        foreach ($articles as $article){
            $this->content = $this->content.$this->getTile($article);
        }

        return $this->content;
    }

    private function createLine(): string{

        if($this->lineType){
            return "<div class='news-line-type1'>";
            $this->lineType = false;
        }else{
            return "<div class='news-line-type2'>";
            $this->lineType = true;
        }

    }


    private function endLine():string{
        return "</div>";
    }

    private function getTile(BasicArticle $article): string{
        if(($this->lineType && $this->newLine) || (!$this->lineType && !$this->newLine)){
            return $this->tile->getFirstType($article);
        }else{
            return $this->tile->getSecondType($article);
        }
    }



}