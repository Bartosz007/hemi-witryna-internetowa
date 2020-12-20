<?php

require_once __DIR__ . "/../models/Article.php";

class Tile
{

    public function getFirstType(BasicArticle $article): string{
        $photo = explode(",",$article->getImages())[0];
        return "<a href='article?id={$article->getId()}'>
                    <div class='news-block-type1'>
                    <div class='photo-type1'>
                        <img src='public/upload/articles/{$photo}' alt='template-photo'>
                    </div>
                    <div class='text-type1'>
                        <div class='content-type1'>
                            <h5>{$article->getTitle()}</h5>
                            <p>{$article->getSubtitle()}</p>
                            <div class='social-buttons'>
                                <div class='left-side'>
                                    <div>
                                        <img src='public/img/icons/heart.svg' alt='share'>
                                        <p class='heart-button'>{$article->getLikes()}</p>
                                    </div>
                                    <div>
                                        <img src='public/img/icons/comment.svg' alt='comment'>
                                        <p class='comment-button'>{$article->getComments()}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                  </div>
              </a>";
    }

    public function getSecondType(BasicArticle $article): string{
        $photo = explode(",",$article->getImages())[0];
        return "<a href='article?id={$article->getId()}'>
                    <div class='news-block-type2'>
                        <div class='text-type2'>
                            <div class='content-type2'>
                                <h5>{$article->getTitle()}</h5>
                                <p>{$article->getSubtitle()}</p>
                                <div class='social-buttons'>
                                    <div class='left-side'>
                                        <div>
                                            <img src='public/img/icons/heart.svg' alt='share'>
                                            <p class='heart-button'>{$article->getLikes()}</p>
                                        </div>
                                        <div>
                                            <img src='public/img/icons/comment.svg' alt='comment'>
                                            <p class='comment-button'>{$article->getComments()}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class='photo-type2'>
                            <img src='public/upload/articles/{$photo}' alt='template-photo'>
                        </div>
                    </div>
                </a>";

    }

}