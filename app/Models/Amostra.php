<?php
namespace App\Models;

use App\Library\Database;
use PDO;

class Amostra{
    public static $status = array();
    public static $spatialReferenceSystem = array();
    public static $marker = array();

    function __construct()
    {
        self::$status['draft'] = 'rascunho';
        self::$status['approved'] = 'aprovado';
        self::$status['disapproved'] = 'rejeitado';
        self::$status['toCurate'] = 'em curadoria';

        self::$spatialReferenceSystem['id'] = '4326';
        self::$spatialReferenceSystem['name'] = 'WGS 84';
        self::$marker['normal'] = 'normal';
        self::$marker['warning'] = 'atenção';
        self::$marker['alert'] = 'alerta';
        self::$marker['danger'] = 'perigo';
        self::$marker['bloom'] = 'bloom';
    }

    public function getAllSafeData()
    {
        $query = "SELECT 
                Registro.nome as register,
                Amostra.nome_amostra as name, 
                ST_X(Amostra.coordenadas) as longitude, 
                ST_Y(Amostra.coordenadas) as latitude,
                Registro.descricao_registro as description,
                Amostra.marcador as marker, 
                Amostra.diretorio_capa as cover,
                Cidade.nome_cidade as city, 
                Estado.nome_estado as state,
                Pais.nome_pais as country,
                Amostra.profundidade as depth, 
                Amostra.unidade_medida as measure,
                Amostra.data_edicao as editedAt, 
                Amostra.data_coleta as collectedAt,
                Registro.referencia as reference,
                Amostra.id_amostra as id 
            FROM Amostra
            LEFT JOIN Cidade ON Cidade.id_cidade = Amostra.fk_Cidade_id_cidade
            LEFT JOIN Estado ON Cidade.fk_Estado_id_estado = Estado.id_estado
            LEFT JOIN Pais ON Estado.fk_Pais_id_pais = Pais.id_pais
            INNER JOIN Registro ON Amostra.fk_Registro_id_registro = Registro.id_registro
            WHERE Amostra.status = :statusApproved
            ORDER BY Amostra.data_coleta DESC;
        ";

        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute(['statusApproved' => self::$status['approved']]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getSamplesByRegisterId($id)
    {
        // https://dev.mysql.com/doc/refman/8.0/en/gis-class-point.html
        $query = "SELECT 
                Amostra.id_amostra as id, 
                Amostra.nome_amostra as name, 
                Cidade.nome_cidade as city, 
                ST_X(Amostra.coordenadas) as longitude, 
                ST_Y(Amostra.coordenadas) as latitude, 
                Amostra.profundidade as depth, 
                Amostra.data_edicao as editedAt, 
                Amostra.data_coleta as colectedAt, 
                Amostra.status as status,
                Amostra.observacao as note 
            FROM Amostra
            LEFT JOIN Cidade ON Cidade.id_cidade = Amostra.fk_Cidade_id_cidade
            WHERE Amostra.fk_Registro_id_registro = :register_id 
            ORDER BY Amostra.data_edicao DESC;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute([$id]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function createFromForm($data)
    {
        $query = "INSERT 
            INTO Amostra 
                (fk_Registro_id_registro, fk_Cidade_id_cidade, 
                nome_amostra, coordenadas, profundidade, data_edicao, 
                data_coleta, status, 
                unidade_medida, diretorio_capa) 
            VALUES 
                (:registerId, :city, :name, 
                ST_GeomFromText(:point, ".self::$spatialReferenceSystem['id']."), 
                :depth, :editedAt, :colectedAt, :status, :unitMeasure, :coverDir);
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);

        $insertData = [
            'registerId' => $data['registerId'], 
            'city' => (string)$data['city'], 
            'name' => $data['name'], 
            'point' => 'POINT('.$data['longitude'].' '.$data['latitude'].')', 
            'depth'  => $data['depth'], 
            'editedAt' => $data['editedAt'],  
            'colectedAt' => $data['colectedAt'], 
            'status' => self::$status['draft'] , 
            'unitMeasure' => $data['unitMeasure'], 
            'coverDir' => $data['coverDir'] ?? 'NULL'
        ];
        $db->execute($insertData);
        $result = $db->lastInsertId();
        $db->commit();

        return $result;
    }

    public function createFromFile($data)
    {
        $query = "INSERT 
            INTO Amostra 
                (fk_Registro_id_registro, fk_Cidade_id_cidade, 
                nome_amostra, coordenadas, profundidade, data_edicao, 
                data_coleta, status, 
                unidade_medida) 
            VALUES 
                (:registerId, :city, :name, 
                ST_GeomFromText(:point, ".self::$spatialReferenceSystem['id']."), 
                :depth, :editedAt, :colectedAt, :status, :unitMeasure);
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);

        $insertData = [
            'registerId' => $data[0], 
            'city' => $data[8], 
            'name' => $data[2], 
            'point' => 'POINT('.$data[7].' '.$data[6].')', 
            'depth'  => $data[5], 
            'editedAt' => $data[1],  
            'colectedAt' => $data[4], 
            'status' => self::$status['draft'] , 
            'unitMeasure' => $data[3], 
        ];
        $db->execute($insertData);
        $result = $db->lastInsertId();
        $db->commit();

        return $result;
    }

    public function deleteByRegisterId($registerId)
    {
        $query = 'DELETE FROM Amostra
            WHERE 
                fk_Registro_id_registro = :registerId 
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'registerId' => $registerId
        ]);

        return $db->commit();
    }

    public function deleteById($sampleId)
    {
        $query = 'DELETE FROM Amostra WHERE id_amostra = :sampleId;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);

        return $db->commit();
    }

    public function updateSampleToCurate($sampleId)
    {
        $query = 'UPDATE Amostra 
            SET status = :status, data_edicao = :date
            WHERE id_amostra = :sampleId
                AND status = :draftStatus;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'status' => self::$status['toCurate'],
            'date' => date("Y-m-d H:i:s", time()+(int)date('T')),
            'sampleId' => $sampleId,
            'draftStatus' => self::$status['draft']
        ]);

        return $db->commit();    
    }

    public function updateSamplesToCurateByRegisterId($registerId)
    {
        $query = 'UPDATE Amostra 
            SET 
                status = :status,
                data_edicao = :date
            WHERE fk_Registro_id_registro = :registerId
                AND status = :draftStatus;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'status' => self::$status['toCurate'],
            'date' => date("Y-m-d H:i:s", time()+(int)date('T')),
            'registerId' => $registerId,
            'draftStatus' => self::$status['draft']
        ]);

        return $db->commit();    
    }

    public function getMeasureUnits(): array
    {
        $query = 'SELECT id_amostra as id, unidade_medida as label 
            FROM Amostra WHERE status = "aprovado" GROUP BY label;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }

    public function getMeasureUnitById($sampleId): array|bool
    {
        $query = 'SELECT unidade_medida as label FROM Amostra WHERE id_amostra = :sampleId;';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }

    public function getsampleById($sampleId): array
    {
        $query = 'SELECT 
                id_amostra as id,
                nome_amostra as name, 
                ST_X(Amostra.coordenadas) as longitude, 
                ST_Y(Amostra.coordenadas) as latitude,
                Cidade.nome_cidade as city, 
                Estado.nome_estado as state,
                Pais.nome_pais as country,
                profundidade as depth, 
                data_coleta as colectedAt, 
                unidade_medida as label,
                diretorio_capa as coverPath,
                unidade_medida as measureUnit
            FROM Amostra 
            LEFT JOIN Cidade ON Cidade.id_cidade = Amostra.fk_Cidade_id_cidade
            LEFT JOIN Estado ON Cidade.fk_Estado_id_estado = Estado.id_estado
            LEFT JOIN Pais ON Estado.fk_Pais_id_pais = Pais.id_pais
            WHERE id_amostra = :sampleId;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }

    public function getSamplesToCurate(): array
    {
        $query = 'SELECT 
                Registro.nome as register,
                Amostra.nome_amostra as name, 
                Usuario.nome_usuario as author,
                Usuario.id_usuario as authorId,
                ST_X(Amostra.coordenadas) as longitude, 
                ST_Y(Amostra.coordenadas) as latitude,
                Amostra.diretorio_capa as cover,
                Cidade.nome_cidade as city, 
                Estado.nome_estado as state,
                Pais.nome_pais as country,
                Amostra.profundidade as depth, 
                Amostra.unidade_medida as measure,
                Amostra.data_edicao as editedAt, 
                Amostra.data_coleta as colectedAt,
                Registro.referencia as reference,
                Amostra.id_amostra as id 
            FROM Amostra
            LEFT JOIN Cidade ON Cidade.id_cidade = Amostra.fk_Cidade_id_cidade
            LEFT JOIN Estado ON Cidade.fk_Estado_id_estado = Estado.id_estado
            LEFT JOIN Pais ON Estado.fk_Pais_id_pais = Pais.id_pais
            INNER JOIN Registro ON Amostra.fk_Registro_id_registro = Registro.id_registro
            INNER JOIN Realiza ON Realiza.fk_Registro_id_registro = Registro.id_registro
            INNER JOIN Usuario ON Usuario.id_usuario = Realiza.fk_Usuario_id_usuario
            WHERE Amostra.status = :statusDraft
            ORDER BY Amostra.data_edicao ASC;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'statusDraft' => self::$status['toCurate']
        ]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $db->commit();
        return $result;
    }

    public function approveSample($sampleId, $feedback, $markerKey)
    {
        $query = 'UPDATE Amostra 
            SET 
                status = :status,
                observacao = :feedback,
                marcador = :marker
            WHERE id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'status' => self::$status['approved'],
            'marker' => self::$marker[$markerKey],
            'feedback' => $feedback,
            'sampleId' => $sampleId,
        ]);

        return $db->commit();    
    }

    public function disapproveSample($sampleId, $feedback)
    {
        $query = 'UPDATE Amostra 
            SET 
                status = :status,
                observacao = :feedback
            WHERE id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'status' => self::$status['disapproved'],
            'feedback' => $feedback,
            'sampleId' => $sampleId,
        ]);

        return $db->commit();    
    }

    public function updateCoverById($sampleId, $path)
    {
        $query = 'UPDATE Amostra 
            SET diretorio_capa = :path
            WHERE id_amostra = :sampleId;
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

    public function updateBySampleId($sampleId, $data)
    {
        $query = 'UPDATE Amostra 
            SET 
                nome_amostra  = :name,
                coordenadas = ST_GeomFromText(:point, '.self::$spatialReferenceSystem['id'].'),
                fk_Cidade_id_cidade = :city,
                profundidade = :depth,
                data_coleta = :colectedAt,
                data_edicao = :editedAt,
                unidade_medida = :unitMeasure
            WHERE id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'name' => $data['name'],
            'point' => 'POINT('.$data['longitude'].' '.$data['latitude'].')',
            'city' => $data['city'],
            'depth' => $data['depth'],
            'colectedAt' => $data['colectedAt'],
            'editedAt' => $data['editedAt'],
            'unitMeasure' => $data['unitMeasure'],
            'sampleId' => $sampleId,
        ]);

        return $db->commit();    
    }

    public function deleteCoverById($sampleId)
    {
        $query = 'UPDATE Amostra 
            SET diretorio_capa = ""
            WHERE id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId,]);

        return $db->commit();    
    }

    public function getCoverPathById($sampleId)
    {
        $query = 'SELECT diretorio_capa as path
            FROM Amostra 
            WHERE id_amostra = :sampleId;
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute(['sampleId' => $sampleId,]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();    

        return $result;
    }

    public function getRegisterIdBySampleId($sampleId)
    {
        $query = 'SELECT fk_Registro_id_registro as registerId
            FROM Amostra 
            WHERE id_amostra = :sampleId;
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