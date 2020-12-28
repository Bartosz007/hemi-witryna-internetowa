<?php


class BigArticle
{
    private string $text;


    public function __construct()
    {
        $this->text = "";
    }


    public function getArticle(Article $article): string{
        $this->text = $this->text.$this->getContent($article->getTitle(),$article->getSubtitle(),$article->getContent());
        $this->text = $this->text.$this->getLikes($article->getLikes());
        $this->text = $this->text.$this->getComments($article->getId());

        return $this->text;
    }

    private function getContent(string $title, string $subtitle, string $text): string{
        return "<article>                  
                    <div class='article-title'>
                        <h1>{$title}</h1>
                        <h2>{$subtitle}</h2>
                    </div>
                    <div class='article-text'>{$text}</div>
                 
                
               </article>";
    }

    private function getLikes(int $likes):string {
        return "<div class='like'>
                    <img src='public/img/icons/heart.svg' alt='like'>
                    <p>{$likes}</p>
                </div>";
    }

    private function getComments(int $id): string{
        $text = "<section class='comment-section'>";

        $articleRepository = new ArticleRepository();
        $comments = $articleRepository->getComments($id);

        foreach ($comments as $comment){
            $text = $text.$this->getComment($comment);
        }

        $text = $text.$this->getAddComment();
        $text = $text."</section>";

        return $text;
    }

    private function getComment($comment): string {
        return
            "<div class='comment'>
                <div class='comment-header'>
                    <img src='public/upload/avatars/{$comment["avatar"]}' alt='avatar'>
                    <div class='comment-owner'>{$comment["name"]} {$comment["surname"]}</div>
                </div>
                <div class='comment-context'>{$comment["text"]}</div>
            </div>";
    }

    private function getAddComment():string {
        return "<div class='comment'>
                    <form class='add-comment-form' method='POST'>
                        <textarea name='context' class='text-new-comment' rows='1' cols='1'></textarea>
                        <button class='add-comment' type='submit' >Dodaj</button>
                    </form>
                </div>";
    }


}