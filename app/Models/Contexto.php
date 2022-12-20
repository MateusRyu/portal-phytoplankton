<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Contexto{ 
    public function getDataBySampleId($sampleId)
    {
        $query = 'SELECT 
                fk_Variavel_auxiliar_id_variavel as id,
                Variavel_auxiliar.nome_var as name,
                Contexto.valor as value,
                Variavel_auxiliar.unidade_medida as measure 
            FROM Contexto
            INNER JOIN Variavel_auxiliar ON Variavel_auxiliar.id_variavel = Contexto.fk_Variavel_auxiliar_id_variavel
            WHERE Contexto.fk_Amostra_id_amostra = :sampleId;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();

        return $result;
    }

    public function create($value, $sampleId, $varId)
    {
        $query = 'INSERT INTO Contexto (fk_Amostra_id_amostra, 
            fk_Variavel_auxiliar_id_variavel, valor) 
            VALUES (:sampleId, :varId, :value);
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        
        $insertData = [
            'sampleId' => $sampleId, 
            'varId' => $varId, 
            'value' => $value
        ];

        $db->execute($insertData);
        $result = $db->lastInsertId();
        $db->commit();

        return $result;
    }

    public function update($value, $sampleId, $varId)
    {
        $this->delete($sampleId, $varId);
        $this->create($value, $sampleId, $varId);
    }

    public function clearEraseSampleContext($sampleId)
    {
        $queryErase= 'DELETE FROM Contexto WHERE fk_Amostra_id_amostra = :sampleId;';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($queryNullify);
        $db->execute([
            'sampleId' => $sampleId,
            'varId' => $varId
        ]);
        $db->prepare($queryErase);
        $db->execute([]);
        return $db->commit();
    }

    public function delete($sampleId, $varId)
    {
        $queryNullify = 'UPDATE Contexto
             SET 
                fk_Amostra_id_amostra=NULL,
                fk_Variavel_auxiliar_id_variavel=NULL,
                valor=NULL
            WHERE fk_Amostra_id_amostra = :sampleId 
                AND fk_Variavel_auxiliar_id_variavel = :varId;
        ';

        $queryErase= 'DELETE FROM Contexto 
        WHERE 
            fk_Amostra_id_amostra IS NULL 
            OR fk_Variavel_auxiliar_id_variavel IS NULL
            OR valor IS NULL;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($queryNullify);
        $db->execute([
            'sampleId' => $sampleId,
            'varId' => $varId
        ]);
        $db->prepare($queryErase);
        $db->execute([]);
        return $db->commit();
    }
}