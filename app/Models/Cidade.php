<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Cidade{
    private function getIdByNameAndState($name, $stateId)
    {
        $query = 'SELECT Cidade.id_cidade as id 
            FROM Cidade 
            WHERE 
                Cidade.nome_cidade = :nome_cidade
                AND Cidade.fk_Estado_id_estado = :id_estado;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'nome_cidade' => $name,
            'id_estado' => $stateId
        ]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'] ?? false;
        $db->commit();

        return $id;
    }

    public function create($name, $stateId)
    {
        $alreadyExistId = $this->getIdByNameAndState($name, $stateId);

        if ($alreadyExistId) {
            return $alreadyExistId;
        }

        $query = 'INSERT INTO Cidade (nome_cidade, fk_Estado_id_estado) 
            VALUES (:nome_cidade, :id_estado);';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'nome_cidade' => $name,
            'id_estado' => $stateId
        ]);
        $cityId = $db->lastInsertId();
        $db->commit();

        return $cityId;
    }

    public function update(array $data)
    {
        echo "update city";
    }
}