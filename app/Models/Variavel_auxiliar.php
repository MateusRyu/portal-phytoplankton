<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Variavel_auxiliar{    
    private function getIdByNameAndUnitMeasure($name, $unitMeasure)
    {
        $query = 'SELECT id_variavel as id FROM Variavel_auxiliar WHERE nome_var = :name AND unidade_medida = :unitMeasure;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['name' => $name, 'unitMeasure' => $unitMeasure]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'] ?? false;
        $db->commit();

        return $id;
    }

    public function create($name, $unitMeasure)
    {
        $alreadyExistId = $this->getIdByNameAndUnitMeasure($name, $unitMeasure);
        if ($alreadyExistId) {
            return $alreadyExistId;
        }

        $query = 'INSERT INTO Variavel_auxiliar (nome_var, unidade_medida) VALUES (:name, :unitMeasure);';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['name' => $name, 'unitMeasure' => $unitMeasure]);
        $dataId = $db->lastInsertId();
        $db->commit();
        return $dataId;
    }
    
    public function update(array $data)
    {
        echo "update state";
    }

    public function getMeasureUnits(): array
    {
        $query = 'SELECT 
                Variavel_auxiliar.id_variavel as id, 
                Variavel_auxiliar.nome_var as name, 
                Variavel_auxiliar.unidade_medida as unit 
            FROM Variavel_auxiliar
            INNER JOIN Contexto ON Contexto.fk_Variavel_auxiliar_id_variavel = Variavel_auxiliar.id_variavel
            INNER JOIN Amostra ON Amostra.id_amostra = Contexto.fk_Amostra_id_amostra
            WHERE Amostra.status = "aprovado"
        ;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }

    public function getContextBySampleId($sampleId): array
    {
        $query = 'SELECT 
                Variavel_auxiliar.id_variavel as id, 
                Variavel_auxiliar.nome_var as name, 
                Variavel_auxiliar.unidade_medida as unit 
            FROM Variavel_auxiliar
            INNER JOIN Contexto ON Contexto.fk_Variavel_auxiliar_id_variavel = Variavel_auxiliar.id_variavel
            INNER JOIN Amostra ON Amostra.id_amostra = Contexto.fk_Amostra_id_amostra
            WHERE Amostra.id_amostra = :sampleId
        ;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }
}