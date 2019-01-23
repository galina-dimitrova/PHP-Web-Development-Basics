<?php


namespace App\Repository;


use App\Data\GenreDTO;
use Database\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * GenreRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /**
     * @return \Generator|GenreDTO[]
     */
    public function findAll(): \Generator
    {
       return $this->db->query("
            SELECT id, name
            FROM genres
        ")->execute()
            ->fetch(GenreDTO::class);
    }

    public function findOne(int $id): GenreDTO
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
            WHERE id = ?
        ")->execute([$id])
            ->fetch(GenreDTO::class)
            ->current();
    }
}