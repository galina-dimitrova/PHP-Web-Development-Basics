<?php

namespace App\Http;

use App\Service\UserServiceInterface;

class HomeHttpHandler extends UserHttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if($userService->isLogged()){
            $this->render("users/profile");
        }else{
            $this->render("home/index");
        }
    }

}