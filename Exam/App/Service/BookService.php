<?php

namespace App\Service;


use App\Data\BookDTO;
use App\Repository\BookRepositoryInterface;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function getAll(): \Generator
    {
       return $this->bookRepository->findAll();
    }

    /**
     * @param int $id
     * @return \Generator|BookDTO[]
     */
    public function getMy(int $id): \Generator
    {
        return $this->bookRepository->findMy($id);
    }

    /**
     * @param int $id
     * @return BookDTO
     * @throws \Exception
     */
    public function getOne(int $id): BookDTO
    {
       $book = $this->bookRepository->findOne($id);

       if($book === null){
           throw new \Exception("Book not exist!");
       }

       return $book;
    }

    public function add(BookDTO $bookDTO): bool
    {
      return $this->bookRepository->insert($bookDTO);
    }

    /**
     * @param BookDTO $bookDTO
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function edit(BookDTO $bookDTO, int $id): bool
    {
        $book = $this->bookRepository->findOne($id);

        if($book === null){
            throw new \Exception("Book not exist!");
        }

        return $this->bookRepository->update($bookDTO, $id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        $book = $this->bookRepository->findOne($id);

        if($book === null){
            throw new \Exception("Book not exist!");
        }

        return $this->bookRepository->remove($id);
    }
}