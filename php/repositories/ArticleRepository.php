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

    public function getArticle(int $id):Article{

        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM "hemi-site"."articles" WHERE id_article = :id;'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Article(
            $article["title"],
            $article["subtitle"],
            $article["content"],
            $article["images"],
            $article["datetime"],
            $article["id_user"],
            $article["id_article"],
            $article["likes"]
        );
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

    public function getComments(int $id): array{
        $comments = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM "hemi-site"."view_comments"
                        WHERE id_article = :id;'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($fetch as $row){
            array_push($comments,[
            "avatar"=>$row["avatar"],
            "name"=>$row["name"],
            "surname"=>$row["surname"],
            "text"=>$row["text"]
            ]);
        }

        return $comments;
    }

    public function addComment(int $id, string $email, string $text, string $date, string $time):bool {
        $user = new UserRepository();
        $id_user_details = $user->getUserDetailsIdByEmail($email);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "hemi-site"."comments" (id_article, id_user_details, text, date, time)
            VALUES (?, ?, ?, ?, ?);
        ');

        return $stmt->execute([
            $id,
            $id_user_details,
            $text,
            $date,
            $time
        ]);

    }

    public function addLike(int $id_article){

        $stmt = $this->database->connect()->prepare('
            UPDATE "hemi-site"."articles" SET likes=likes+1 WHERE id_article = :id;
        ');

        $stmt->bindParam(':id', $id_article, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function searchArticles(string $text): array{
        $articles = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM "hemi-site"."articles"
                        WHERE LOWER(title) LIKE :search
                        OR LOWER(subtitle) LIKE :search
                        OR LOWER(content) LIKE :search
                        ORDER BY datetime;'
        );
        $text = "%{$text}%";
        $stmt->bindParam(':search', $text, PDO::PARAM_STR);
        $stmt->execute();
        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($fetch as $article){
            array_push($articles, new Article(
                $article["title"],
                $article["subtitle"],
                $article["content"],
                $article["images"],
                $article["datetime"],
                $article["id_user"],
                $article["id_article"],
                $article["likes"]
            ));
        }

        return $articles;

    }
}