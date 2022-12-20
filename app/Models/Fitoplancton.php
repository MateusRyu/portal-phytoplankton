<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Fitoplancton{    

    public function getFitoplanctonBySampleId($sampleId)
    {
        $config = require APP_DIR.'/configurations/app.php';
        $baseUrl = $config["url"];

        $query = 'SELECT 
            Fitoplancton.id_fitoplancton as id,
            Taxon.nome_taxon as name,
            Fitoplancton.quantidade_media as mean,
            Fitoplancton.quantidade_maxima as max,
            Fitoplancton.diretorio_imagem as image 
        FROM Fitoplancton
        INNER JOIN Taxon ON Taxon.id_taxon = Fitoplancton.fk_Taxon_id_taxon
        WHERE 
            Fitoplancton.fk_Amostra_id_amostra = :sampleId;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();

        foreach ($result as &$taxon) {
            $taxon['image'] = $taxon['image']?$baseUrl.$taxon['image']:null;
        }

        return $result;
    }

    public function create($data, $sampleId, $taxonId)
    {
        $query = "INSERT INTO Fitoplancton 
            (fk_Amostra_id_amostra, fk_Taxon_id_taxon, 
            quantidade_media , quantidade_maxima";
        if (isset($data['imagePath'])) {
            $query .= ', diretorio_imagem';
        }
        $query .= ') VALUES (:sampleId, :TaxonId, :mean, :max';
        if (isset($data['imagePath'])) {
            $query .= ', :coverDir';
        }
        $query .= ');';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        // echo "<pre>";
        // var_dump($data);
        // die();
        $insertData = [
            'sampleId' => $sampleId, 
            'TaxonId' => $taxonId, 
            'mean' => $data['mean'], 
            'max' => $data['max'] 
        ];

        if (isset($data['imagePath'])) {
            $insertData['coverDir'] = $data['imagePath'];
        }
        $db->execute($insertData);
        $result = $db->lastInsertId();
        $db->commit();
        return $result;
    }

    public function updateImageById($sampleId, $path)
    {
        $query = 'UPDATE Fitoplancton 
            SET diretorio_imagem = :path
            WHERE fk_Amostra_id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'path' => $path,
            'sampleId' => $sampleId,
        ]);

        return $db->commit();    
    }

    public function update($data, $id, $taxonId)
    {
        $query = 'UPDATE Fitoplancton 
            SET 
                fk_Taxon_id_taxon = :taxonId, 
                quantidade_media = :mean, 
                quantidade_maxima = :max
            
        ';
        if (isset($data['imagePath'])) {
            $query .= ', diretorio_imagem = :imagePath ';
        }
        $query .= 'WHERE id_fitoplancton = :id;';

        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $updateData = [
            'taxonId' => $taxonId,
            'mean' => $data['currentMean'],
            'max' => $data['currentMax'],
            'id' => $id,
        ];
        if (isset($data['imagePath'])) {
            $updateData['imagePath'] = $data['imagePath'];
        }
        $db->execute($updateData);

        return $db->commit();    
    }

    public function delete($id)
    {
        $query = 'DELETE FROM Fitoplancton 
            WHERE Fitoplancton.id_fitoplancton = :id';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['id' => $id]);

        return $db->commit();
    }

    public function deleteImageById($sampleId)
    {
        $query = 'UPDATE Fitoplancton 
            SET diretorio_imagem = ""
            WHERE fk_Amostra_id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId,]);

        return $db->commit();    
    }

    public function getImagePathById($sampleId)
    {
        $query = 'SELECT diretorio_imagem as path
            FROM Fitoplancton 
            WHERE fk_Amostra_id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId,]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();    

        return $result;
    }
}