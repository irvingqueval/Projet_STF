<?php

namespace Apps\Models;

use Apps\Libs\Database;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function findAll(array $conditions = [], ?string $order = ""): array
    {
        $sql = "SELECT * FROM `{$this->table}`";

        if (!empty($conditions)) {
            $clauses = [];
            foreach ($conditions as $key => $value) {
                $clauses[] = "`$key` = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($conditions);

        return $stmt->fetchAll();
    }

    public function findOne(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM `{$this->table}` WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM `{$this->table}` WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function insert(array $data): bool
    {
        $keys = array_keys($data);
        $fields = "`" . implode("`, `", $keys) . "`";
        $placeholders = ":" . implode(", :", $keys);

        $sql = "INSERT INTO `{$this->table}` ($fields) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
}
