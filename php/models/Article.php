<?php


class Article
{
    private string $title;
    private string $subtitle;
    private string $content;
    private string $images;
    private string $datetime;
    private string $owner_id;


    public function __construct(string $title, string $subtitle, string $content, string $images, string $datetime, string $owner_id)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->content = $content;
        $this->images = $images;
        $this->datetime = $datetime;
        $this->owner_id = $owner_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getImages(): string
    {
        return $this->images;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function getOwnerId(): string
    {
        return $this->owner_id;
    }


}