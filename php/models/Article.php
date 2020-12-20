<?php

require_once "BasicArticle.php";

class Article extends BasicArticle
{
    private string $content;
    private string $datetime;
    private int $owner_id;

    public function __construct(string $title, string $subtitle, string $content,
                                string $images, string $datetime, int $owner_id,
                                int $likes = 0, int $comments = 0, int $id = 0)
    {
        parent::__construct($title,$subtitle,$images,$likes,$comments, $id);
        $this->content = $content;
        $this->datetime = $datetime;
        $this->owner_id = $owner_id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function getOwnerId(): int
    {
        return $this->owner_id;
    }



}