<?php

namespace App\Http;


use App\Data\EditDTO;
use App\Data\TaskDTO;
use App\Service\CategoryService;
use App\Service\CategoryServiceInterface;
use App\Service\TaskService;
use App\Service\TaskServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class TaskHttpHandler extends UserHttpHandlerAbstract
{

    /**
     * @param TaskServiceInterface $taskService
     * @param UserServiceInterface $userService
     * @param CategoryServiceInterface $categoryService
     * @param array $formData
     * @throws \Exception
     */
    public function add(TaskServiceInterface $taskService,
                        UserServiceInterface $userService,
                        CategoryServiceInterface $categoryService,
                        array $formData = [])
    {

        /** @var EditDTO $taskDTO */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setTask($task);
        $editDTO->setCategories($categoryService->getAll());

        if(isset($formData['save'])){
            $this->handleInsertProcess($taskService, $userService, $categoryService, $formData);
        }else{
            $this->render("tasks/add", $editDTO);
        }
    }

    public function edit(TaskServiceInterface $taskService,
                        UserServiceInterface $userService,
                        CategoryServiceInterface $categoryService,
                        array $formData = [], array $getData = [])
    {

        $task = $taskService->getOne(intval($getData['id']));

        $editDTO = new EditDTO();
        $editDTO->setTask($task);
        $editDTO->setCategories($categoryService->getAll());

        if(isset($formData['save'])){
            $this->handleEditProcess($taskService, $userService, $categoryService, $formData, $getData);
        }else{
            $this->render("tasks/edit", $editDTO);
        }
    }

    public function delete(TaskServiceInterface $taskService, array $getData = []){
        if(!isset($getData['id'])){
            $this->redirect("dashboard.php");
        }
        $taskService->delete(intval($getData['id']));
        $this->redirect("dashboard.php");
    }

    /**
     * @param $taskService
     * @param $userService
     * @param $categoryService
     * @param $formData
     * @throws \Exception
     */
    private function handleInsertProcess($taskService, $userService, $categoryService, $formData)
    {

        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
        /** @var UserService $userService */
        $author = $userService->currentUser();
        /** @var CategoryService $categoryService */
        /** @var CategoryService $categoryService */
        $category = $categoryService->getOne(intval($formData['category_id']));
        $task->setAuthor($author);
        $task->setCategory($category);

        /** @var TaskService $taskService */
        $taskService->add($task);
        $this->redirect("dashboard.php");

    }

    private function handleEditProcess($taskService, $userService, $categoryService, $formData, $getData)
    {
        try {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($formData, TaskDTO::class);
            /** @var UserService $userService */
            $author = $userService->currentUser();
            /** @var CategoryService $categoryService */
            /** @var CategoryService $categoryService */
            $category = $categoryService->getOne(intval($formData['category_id']));
            $task->setAuthor($author);
            $task->setCategory($category);
            $task->setId($getData['id']);

            /** @var TaskService $taskService */
            $taskService->edit($task, intval($getData['id']));
            $this->redirect("dashboard.php");
        }catch (\Exception $ex){

        }
    }

}