<?php

require_once "Controller.php";
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__.'/../printClasses/Crew.php';

class CrewController extends Controller
{
    private UserRepository $userRepository;


    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function crew(){

        if(!$this->isGet())
            return $this->render('main');

        $users = $this->userRepository->getAdmins();
        $print = new Crew();

        return $this->render('crew',["admins"=>$print->getAllMembers($users)]);

    }

}