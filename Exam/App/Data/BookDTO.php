<?php

namespace App\Data;

class BookDTO
{
    const TITLE_MIN_LENGTH = 3;
    const TITLE_MAX_LENGTH = 50;

    const AUTHOR_MIN_LENGTH = 3;
    const AUTHOR_MAX_LENGTH = 50;

    const DESCRIPTION_MIN_LENGTH = 10;
    const DESCRIPTION_MAX_LENGTH = 10000;

    const IMAGE_MIN_LENGTH = 3;
    const IMAGE_MAX_LENGTH = 255;

    private $id;
    private $title;
    private $author;
    private $description;
    private $image;

    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var GenreDTO
     */
    private $genre;

    private $added_on;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @throws \Exception
     */
    public function setTitle($title): void
    {
        PDOValidator::validate(
            self::TITLE_MIN_LENGTH,
            self::TITLE_MAX_LENGTH,
            $title,
            "{$title} must be between {self::TITLE_MIN_LENGTH} and {self::TITLE_MAX_LENGTH} characters!"
        );

        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @throws \Exception
     */
    public function setAuthor($author): void
    {
        PDOValidator::validate(
            self::AUTHOR_MIN_LENGTH,
            self::AUTHOR_MAX_LENGTH,
            $author,
            "{$author} must be between {self::AUTHOR_MIN_LENGTH} and {self::AUTHOR_MAX_LENGTH} characters!"
        );

        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @throws \Exception
     */
    public function setDescription($description): void
    {
        PDOValidator::validate(
            self::DESCRIPTION_MIN_LENGTH,
            self::DESCRIPTION_MAX_LENGTH,
            $description,
            "{$description} must be between {self::DESCRIPTION_MIN_LENGTH} and {self::DESCRIPTION_MAX_LENGTH} characters!"
        );


        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @throws \Exception
     */
    public function setImage($image): void
    {
        PDOValidator::validate(
            self::IMAGE_MIN_LENGTH,
            self::IMAGE_MAX_LENGTH,
            $image,
            "{$image} must be between {self::IMAGE_MIN_LENGTH} and {self::IMAGE_MAX_LENGTH} characters!"
        );


        $this->image = $image;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }

    /**
     * @return GenreDTO
     */
    public function getGenre(): GenreDTO
    {
        return $this->genre;
    }

    /**
     * @param GenreDTO $genre
     */
    public function setGenre(GenreDTO $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getAddedOn()
    {
        return $this->added_on;
    }

    /**
     * @param mixed $added_on
     */
    public function setAddedOn($added_on): void
    {
        $this->added_on = $added_on;
    }


}