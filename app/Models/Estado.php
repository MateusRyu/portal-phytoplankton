<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Estado{
    private function getIdByNameAndCountry($name, $countryId)
    {
        $query = 'SELECT Estado.id_estado as id 
            FROM Estado 
            WHERE 
                Estado.nome_estado = :nome_estado
                AND Estado.fk_Pais_id_pais = :id_pais;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'nome_estado' => $name,
            'id_pais' => $countryId
        ]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $id = $result['id']  ?? false;
        $db->commit();

        return $id;
    }

    public function create($name, $countryId)
    {
        $alreadyExistId = $this->getIdByNameAndCountry($name, $countryId);

        if ($alreadyExistId) {
            return $alreadyExistId;
        }

        $query = 'INSERT INTO Estado (nome_estado, fk_Pais_id_pais) VALUES (:nome_estado, :id_pais);';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        
        $db->execute([
            'nome_estado' => $name,
            'id_pais' => $countryId
        ]);
        $stateId = $db->lastInsertId();
        $db->commit();

        return $stateId;
    }

    public function update(array $data)
    {
        echo "update state";
    }
}