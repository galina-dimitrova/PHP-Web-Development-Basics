<?php

namespace App\Repository;


use App\Data\TaskDTO;

interface TaskRepositoryInterface
{
    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll() : \Generator;

    public function findOne(int $id) : TaskDTO;

    public function insert(TaskDTO $taskDTO) : bool;
    public function update(TaskDTO $taskDTO, int $id) : bool;
    public function remove(int $id) : bool;

}