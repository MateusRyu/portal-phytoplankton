<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Taxon{    
    private function getIdByName($name)
    {
        $query = 'SELECT Taxon.id_taxon as id FROM Taxon WHERE nome_taxon = :taxon;';
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

        $query = 'INSERT INTO Taxon (nome_taxon) VALUES (:taxon);';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([$name]);
        $countryId = $db->lastInsertId();
        $db->commit();
        return $countryId;
    }

    public function getAllNames(): array
    {
        $query = 'SELECT DISTINCT Taxon.nome_taxon FROM Taxon
            INNER JOIN Fitoplancton ON Fitoplancton.fk_Taxon_id_taxon = Taxon.id_taxon
            INNER JOIN Amostra ON Amostra.id_amostra = Fitoplancton.fk_Amostra_id_amostra
            WHERE Amostra.status = "aprovado";
        ';

        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([]);
        $result = $db->statements->fetchAll(PDO::FETCH_COLUMN);
        $db->commit();

        return $result;
    }

    public function update(array $data)
    {
        echo "update country<br>";
    }
}