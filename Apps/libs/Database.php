<?php

namespace Apps\Libs;

require_once 'config.php';  // Assurez-vous que ce chemin pointe vers votre fichier config

class Database
{
    private static $instance = null;

    public static function getPdo(): \PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new \PDO(DB_DSN, DB_USER, DB_PASS, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $e) {
                // Gérer les erreurs de connexion ici
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
