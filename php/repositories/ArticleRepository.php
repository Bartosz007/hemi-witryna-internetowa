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

    public function getAllArticles():array {
        $articles = [];

        $stmt = $this->database->connect()->prepare(
            'SELECT id_article,title,subtitle,images,likes,count(id_comment) as "comments" 
                        FROM "hemi-site"."articles" 
                        LEFT JOIN "hemi-site"."comments" 
                        USING(id_article) 
                        GROUP BY (id_article)
                        ORDER BY (datetime) DESC ;'
        );

        $stmt->execute();

        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fetch as $row){
            array_push($articles,new BasicArticle(
                $row["title"],
                $row["subtitle"],
                $row["images"],
                $row["likes"],
                $row["comments"],
                $row["id_article"]
            ));
        }

        return $articles;
    }

}