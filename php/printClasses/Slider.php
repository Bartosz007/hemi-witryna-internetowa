<?php


class Slider
{
    private string $text;

    public function __construct()
    {
        $this->text = "";
    }

    public function getSlider(string $images):string {
        return "<div class='slider'>
                    <img src='public/img/photos/template-photo.jpg'>
                    <div class='title-container'>
                        <h1>Piękna i bestia...</h1>
                    </div>
                    <div class='slider-dots'>
                        <div class='dot'></div>
                        <div class='dot'></div>
                        <div class='dot'></div>
                        <div class='dot'></div>
                        <div class='dot'></div>
                    </div>
                </div>";
    }
}