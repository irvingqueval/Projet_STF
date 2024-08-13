<?php

namespace Apps\Models;

class User extends Model
{
    protected $table = "users";

    public function findUserByEmail($email)
    {
        $results = $this->findAll(['email' => $email]);
        return !empty($results) ? $results[0] : null; // Retourner le premier résultat ou null si non trouvé
    }

    public function verifyPassword($inputPassword, $hashedPassword)
    {
        return password_verify($inputPassword, $hashedPassword);
    }

    public function createUser($email, $hashedPassword, $age)
    {
        $data = [
            'email' => $email,
            'password' => $hashedPassword,
            'age' => $age
        ];

        return $this->insert($data);
    }
}
