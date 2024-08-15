<?php

namespace Apps\Models;

class DiscoveryPackReservation extends Model
{
    protected $table = 'discovery_pack_reservation';

    public function createReservation($userId, $discoveryPackId, $date, $hour)
    {
        $data = [
            'user_id' => $userId,
            'discovery_pack_id' => $discoveryPackId,
            'date' => $date,
            'hour' => $hour
        ];

        return $this->insert($data);
    }

    public function findReservationsByUserAndDate($userId, $currentDate, $type)
    {
        $operator = $type === 'future' ? '>' : '<';
        $sql = "
            SELECT dpr.*, dp.name AS discovery_pack_name
            FROM {$this->table} dpr
            JOIN discovery_pack dp ON dpr.discovery_pack_id = dp.ID
            WHERE dpr.user_id = :user_id AND CONCAT(dpr.date, ' ', dpr.hour) $operator :current_date
            ORDER BY dpr.date DESC, dpr.hour DESC
        ";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'user_id' => $userId,
            'current_date' => $currentDate,
        ]);

        return $query->fetchAll();
    }
}
