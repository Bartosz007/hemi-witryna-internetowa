<?php

class Slider
{
    private string $text;

    public function __construct()
    {
        $this->text = "";
    }

    public function getSlider(string $images, string $title):string {
        $images = explode(",",$images);

        //poczatek
        $this->text = "
                <div class='slider'>
                    <div class='img-container'>";


        $length = count($images);
        //obrazki
        $this->text = $this->text."
                    <img src='public/upload/articles/{$images[0]}' style='display: block; opacity: 1' alt='carr'>";
        for($i = 1; $i < $length; $i++){
            $this->text = $this->text."
                    <img src='public/upload/articles/{$images[$i]}' style='display: none; opacity: 0' alt='carr'>";
        }


        $this->text = $this->text."
                    </div>
                    <div class='title-container'>
                        <h1>{$title}</h1>
                    </div>
                    <div class='slider-dots'>";
        //kropki
        $this->text = $this->text."<div class='dot' style='background-color: black'></div>";
        for($i = 1; $i < $length; $i++){
            $this->text = $this->text."<div class='dot'></div>";
        }

        $this->text = $this->text."
                    </div>
                </div>";

        return $this->text;

    }
}