<?php

namespace App\Service;


use App\Data\TaskDTO;

interface TaskServiceInterface
{
    /**
     * @return \Generator|TaskDTO[]
     *
     */
    public function getAll() : \Generator;

    public function getOne(int $id) : TaskDTO;

    public function add(TaskDTO $taskDTO) : bool;
    public function edit(TaskDTO $taskDTO, int $id) : bool;
    public function delete(int $id) : bool;


}