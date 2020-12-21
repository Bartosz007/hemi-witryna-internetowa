<?php


class CrewMember
{
    public function getAllMembers(array $admins):string {

        foreach ($admins as $admin){


        }

    }

    private function getMember(Admin $admin):string {
        return "
                        <div class='crew-member'>
                            <div class='crew-member-content'>

                                <div class='crew-data'>
                                    <img src='public/img/photos/template-people.JPG' alt='people'>
                                    <div class='crew-complex-data'>                                        
                                        <h1>{$member->getName()} {$member->getSurname()}</h1>
                                        <p>{$member->getDescription()}</p>                                        
                                    </div>
                                </div>

                                <div class='crew-social-networks'>
                                    <img src='public/img/icons/instagram.svg' alt='insta'>
                                    <img src='public/img/icons/twitter.svg' alt='twitter'>
                                    <img src='public/img/icons/facebook.svg' alt='fb'>
                                    <img src='public/img/icons/website.svg' alt='web'>
                                </div>

                            </div>
                        </div>
                        ";
    }
}