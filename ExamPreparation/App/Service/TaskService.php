<?php

namespace App\Service;


use App\Data\TaskDTO;
use App\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function getAll(): \Generator
    {
       return $this->taskRepository->findAll();
    }

    /**
     * @param int $id
     * @return TaskDTO
     * @throws \Exception
     */
    public function getOne(int $id): TaskDTO
    {
       $task = $this->taskRepository->findOne($id);


       if($task === null){
           throw new \Exception("Task not exist!");
       }

       return $task;
    }

    public function add(TaskDTO $taskDTO): bool
    {
      return $this->taskRepository->insert($taskDTO);
    }

    /**
     * @param TaskDTO $taskDTO
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function edit(TaskDTO $taskDTO, int $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null){
            throw new \Exception("Task not exist!");
        }

        return $this->taskRepository->update($taskDTO, $id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null){
            throw new \Exception("Task not exist!");
        }

        return $this->taskRepository->remove($id);
    }
}