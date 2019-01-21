<?php

namespace App\Service;


use App\Data\CategoryDTO;
use App\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{

    /**
     * @var CategoryRepositoryInterface
     *
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll(): \Generator
    {
       return $this->categoryRepository->findAll();
    }

    /**
     * @param int $id
     * @return CategoryDTO
     * @throws \Exception
     */
    public function getOne(int $id): CategoryDTO
    {
        $category = $this->categoryRepository->findOne($id);

        if($category === null){
            throw new \Exception("Category not found!");
        }

        return $this->categoryRepository->findOne($id);
    }
}