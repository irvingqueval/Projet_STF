<?php

namespace Apps\Models;

class WeaponReservation extends Model
{
    protected $table = 'weapon_reservation';

    public function createReservation($userId, $weaponId, $date, $hour, $ammoBoxes, $totalPrice)
    {
        $sql = "INSERT INTO weapon_reservation (user_id, weapon_id, date, hour, ammo_boxes, total_price) 
            VALUES (:user_id, :weapon_id, :date, :hour, :ammo_boxes, :total_price)";
        $query = $this->pdo->prepare($sql);

        $query->execute([
            'user_id' => $userId,
            'weapon_id' => $weaponId,
            'date' => $date,
            'hour' => $hour,
            'ammo_boxes' => $ammoBoxes,
            'total_price' => $totalPrice
        ]);
    }


    public function findAllByUserWithWeaponName($userId)
    {
        $sql = "
        SELECT wr.*, w.name AS weapon_name, w.caliber AS weapon_caliber
        FROM {$this->table} wr
        JOIN weapon w ON wr.weapon_id = w.id
        WHERE wr.user_id = :user_id
    ";
        $query = $this->pdo->prepare($sql);
        $query->execute(['user_id' => $userId]);
        return $query->fetchAll();
    }

    public function findReservationsByUserAndDate($userId, $currentDate, $type)
    {
        $operator = $type === 'future' ? '>' : '<';
        $sql = "
            SELECT wr.*, w.name AS weapon_name 
            FROM {$this->table} wr
            JOIN weapon w ON wr.weapon_id = w.ID
            WHERE wr.user_id = :user_id AND CONCAT(wr.date, ' ', wr.hour) $operator :current_date
            ORDER BY wr.date DESC, wr.hour DESC
        ";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'user_id' => $userId,
            'current_date' => $currentDate,
        ]);

        return $query->fetchAll();
    }
}
