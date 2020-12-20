<?php


class BasicArticle
{
    protected string $title;
    protected string $subtitle;
    protected string $images;
    protected int $likes;
    protected int $comments;
    protected int $id;

    public function __construct(string $title, string $subtitle, string $images, int $likes, int $comments, int $id)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->images = $images;
        $this->likes = $likes;
        $this->comments = $comments;
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function getImages(): string
    {
        return $this->images;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getComments(): int
    {
        return $this->comments;
    }

    public function getId(): int
    {
        return $this->id;
    }

}