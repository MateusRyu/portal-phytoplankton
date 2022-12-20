<?php

namespace App\Models;

use App\Library\Database;
use PDO;

class Usuario{
    public static $role = array();

    function __construct()
    {
        self::setup();
    }

    public static function setup(): void
    {
        self::$role['collaborator'] = 'colaborador';
        self::$role['administrator'] = 'administrador';
        self::$role['curator'] = 'curador';
        self::$role['banished'] = 'banido';
    }

    public function register(string $username, string $email, string $senha)
    {
        $data = array(
            'nome' => $username,
            'email' => $email,
            'senha' => $senha,
            'categoria' => self::$role['collaborator']
        );

        $db = new Database();
        $db->beginTransaction();
        $db->prepare('INSERT INTO Usuario (nome_usuario, email, senha, categoria) VALUES (:nome, :email, :senha, :categoria)');
        $db->execute($data);
        $user = $db->lastInsertId();
        $db->commit();
        return [
            'id_usuario' => $user,
            'nome_usuario' => $username,
            'email' => $email, 
            'senha' => $senha
        ];
    }

    public function getUserByEmail(string $email)
    {
        $db = new Database();

        $db->beginTransaction();
        $db->prepare('SELECT * FROM Usuario WHERE email = :email AND NOT categoria = :banished'); 
        $db->execute(['email' => $email, 'banished' => self::$role['banished']]);
        $user = $db->statements->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }
        return false;
    }

    public function getUserById(string $id)
    {
        $db = new Database();

        $db->beginTransaction();
        $db->prepare('SELECT * FROM Usuario WHERE id_usuario = :id'); 
        $db->execute(['id' => $id]);
        $user = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();

        return $user;
    }

    public function update($id, $username, $email, $password)
    {
        $db = new Database();
        $db->beginTransaction();
        $db->prepare('UPDATE Usuario
            SET 
                nome_usuario = :username,
                email = :email,
                senha = :password
            WHERE id_usuario = :id;
        '); 

        $db->execute([
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
        $db->commit();
    }

    public function changeRole($userId, $role)
    {
        $query = 'UPDATE Usuario 
            SET categoria = :role
            WHERE id_usuario= :userId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'role' => self::$role[$role],
            'userId' => $userId,
        ]);

        return $db->commit();
    }

    public function getAllUsers()
    {
        $db = new Database();

        $db->beginTransaction();
        $db->prepare('SELECT 
                id_usuario as id,
                nome_usuario as name,
                email,
                categoria as role
            FROM Usuario 
            WHERE NOT categoria = :banished;
        '); 
        $db->execute(['banished' => self::$role['banished']]);
        $users = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();

        return $users;
    }
}
