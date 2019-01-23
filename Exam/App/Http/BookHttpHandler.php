<?php

namespace App\Http;


use App\Data\EditDTO;
use App\Data\BookDTO;
use App\Service\GenreService;
use App\Service\GenreServiceInterface;
use App\Service\BookService;
use App\Service\BookServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class BookHttpHandler extends UserHttpHandlerAbstract
{

    public function list(BookServiceInterface $bookService){
        $books = $bookService->getAll();
        $this->render("books/all_books", $books);
    }

    public function view(BookServiceInterface $bookService, array $getData = [] ){
        $book = $bookService->getOne($getData['id']);
        $this->render("books/view_book", $book);
    }

    public function listMyBooks(BookServiceInterface $bookService){
        $books = $bookService->getMy($_SESSION['id']);
        $this->render("books/my_books", $books);
    }
    /**
     * @param BookServiceInterface $bookService
     * @param UserServiceInterface $userService
     * @param GenreServiceInterface $genreService
     * @param array $formData
     * @throws \Exception
     */
    public function add(BookServiceInterface $bookService,
                        UserServiceInterface $userService,
                        GenreServiceInterface $genreService,
                        array $formData = [])
    {

        /** @var EditDTO $bookDTO */
        $book = $this->dataBinder->bind($formData, BookDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if(isset($formData['save'])){
            $this->handleInsertProcess($bookService, $userService, $genreService, $formData);
        }else{
            $this->render("books/add_book", $editDTO);
        }
    }

    public function edit(BookServiceInterface $bookService,
                        UserServiceInterface $userService,
                        GenreServiceInterface $genreService,
                        array $formData = [], array $getData = [])
    {

        $book = $bookService->getOne(intval($getData['id']));

        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if(isset($formData['save'])){
            $this->handleEditProcess($bookService, $userService, $genreService, $formData, $getData);
        }else{
            $this->render("books/edit_book", $editDTO);
        }
    }

    public function delete(BookServiceInterface $bookService, array $getData = []){
        if(!isset($getData['id'])){
            $this->redirect("my_books.php");
        }
        $bookService->delete(intval($getData['id']));
        $this->redirect("my_books.php");
    }

    /**
     * @param $bookService
     * @param $userService
     * @param $genreService
     * @param $formData
     * @throws \Exception
     */
    private function handleInsertProcess($bookService, $userService, $genreService, $formData)
    {

        /** @var BookDTO $book */
        $book = $this->dataBinder->bind($formData, BookDTO::class);
        /** @var UserService $userService */
        $user = $userService->currentUser();
        /** @var GenreService $genreService */
        $genre = $genreService->getOne(intval($formData['genre_id']));
        $book->setUser($user);
        $book->setGenre($genre);

        /** @var BookService $bookService */
        $bookService->add($book);
        $this->redirect("my_books.php");

    }

    private function handleEditProcess($bookService, $userService, $genreService, $formData, $getData)
    {
        try {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            /** @var UserService $userService */
            $user = $userService->currentUser();
            /** @var GenreService $genreService */
            $genre = $genreService->getOne($formData['genre_id']);
            $book->setUser($user);
            $book->setGenre($genre);
            $book->setId($getData['id']);

            /** @var BookService $bookService */
            $bookService->edit($book, $getData['id']);
            $this->redirect("my_books.php");
        }catch (\Exception $ex){
                echo "opii";
        }
    }

}