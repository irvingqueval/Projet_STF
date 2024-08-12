<?php

namespace Models;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM `{$this->table}` ";
        if ($order) {
            $sql .= "ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        // Search the result to extract the actual data
        $results = $resultats->fetchAll();

        return $results;
    }

    public function findOne(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM `{$this->table}` WHERE id = :id");
        // Execute the query, specifying parameter :weapon_id 
        $query->execute(['id' => $id]);
        // Search the result to extract the actual article data
        $item = $query->fetch();
        return $item;
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM `{$this->table}` WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}
