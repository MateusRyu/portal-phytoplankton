<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Pais{    
    private function getIdByName($name)
    {
        $query = 'SELECT Pais.id_pais as id FROM Pais WHERE nome_pais = :nome_pais;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([$name]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'] ?? false;
        $db->commit();

        return $id;
    }

    public function create($name)
    {
        $alreadyExistId = $this->getIdByName($name);
        if ($alreadyExistId) {
            return $alreadyExistId;
        }

        $query = 'INSERT INTO Pais (nome_pais) VALUES (:nome_pais);';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([$name]);
        $countryId = $db->lastInsertId();
        $db->commit();
        return $countryId;
    }

    public function update(array $data)
    {
        echo "update country<br>";
    }
}