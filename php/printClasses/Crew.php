<?php

require_once __DIR__ . "/../models/Article.php";

class Crew
{

    private string $text;

    public function __construct()
    {
        $this->text = "";
    }

    public function getAllMembers(array $admins):string {

        foreach ($admins as $admin){
            $this->text = $this->text.$this->getMember($admin);
        }

        return $this->text;

    }

    private function getMember(Admin $admin):string {
        return "<div class='crew-member'>
                    <div class='crew-member-content'>
                        <div class='crew-data'>
                            <img src='public/upload/avatars/{$admin->getFile()}' alt='people'>
                            <div class='crew-complex-data'>                                        
                                <h1>{$admin->getName()} {$admin->getSurname()}</h1>
                                <p>{$admin->getDescription()}</p>                                        
                            </div>
                        </div>
                        <div class='crew-social-networks'>
                            <a href='https://www.instagram.com/'><img src='public/img/icons/instagram.svg' alt='insta'></a>
                            <a href='https://www.twitter.com/'><img src='public/img/icons/twitter.svg' alt='twitter'></a>
                            <a href='https://www.facebook.com/'><img src='public/img/icons/facebook.svg' alt='fb'></a>
                            <a href='https://www.google.com/'><img src='public/img/icons/website.svg' alt='web'></a>
                        </div>

                    </div>
                </div>";
    }
}