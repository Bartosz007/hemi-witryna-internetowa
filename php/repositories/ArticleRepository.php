<?php

require_once "Repository.php";
require_once __DIR__."/../models/Article.php";

class ArticleRepository extends Repository
{

    public function addArticle(Article $article):bool{

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "hemi-site"."articles" (id_user, title,subtitle, content, images, datetime)
            VALUES (?, ?, ?, ?, ?, ?);
        ');

        $stmt->execute([
            $article->getOwnerId(),
            $article->getTitle(),
            $article->getSubtitle(),
            $article->getContent(),
            $article->getImages(),
            $article->getDatetime(),
        ]);

        return true;
    }

}