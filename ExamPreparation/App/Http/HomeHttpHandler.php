<?php

namespace App\Http;


use App\Service\TaskServiceInterface;
use App\Service\UserServiceInterface;

class HomeHttpHandler extends UserHttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if($userService->isLogged()){
            $this->render("tasks/all");
        }else{
            $this->render("home/index");
        }
    }

    public function dashboard(TaskServiceInterface $taskService){
        if(!isset($_SESSION['id'])){
            $this->redirect("login.php");
        }

        $allTasks = $taskService->getAll();

        $this->render("tasks/all", $allTasks);

    }



}