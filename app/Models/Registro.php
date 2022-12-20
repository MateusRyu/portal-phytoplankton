<?php

namespace App\Models;

use App\Library\Database;
use PDO;

class Registro{
    public static $all = 'todos';
    public static $draft = 'rascunho';
    public static $curated = 'em curadoria';
    public static $approved = 'aprovado';
    public static $disapproved = 'reprovado';

    public function create(array $data)
    {
        $query = 'INSERT INTO Registro 
            (nome, descricao_registro, referencia) 
            VALUES (:nome,:descricao_registro, :referencia)';

        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            ':nome' => $data['name'], 
            ':descricao_registro' => $data['description'], 
            ':referencia' => $data['reference'],
        ]);
        $projectId = $db->lastInsertId();
        $db->commit();

        return $projectId;
    }

    public function delete($registerId)
    {
        $query = "DELETE FROM Registro WHERE Registro.id_registro = :registerId;";
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'registerId' => $registerId
        ]);

        return $db->commit();
    }

    public function update(array $data)
    {
        $update = [];
        $updateData = array(':id' => $data['id']);
        if ($data['name']) {
            array_push($update, 'nome = :nome');
            $updateData[':nome'] = $data['name'];
        } 
        if ($data['description']) {
            array_push($update, 'descricao_registro = :descricao');
            $updateData[':descricao'] = $data['description'];
        } 
        if ($data['description']) {
            array_push($update, 'referencia = :referencia');
            $updateData[':referencia'] = $data['reference'];
        } 

        $query = 'UPDATE Registro SET'.implode(',', $update).'WHERE id_registro = :id;';

        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute($data);

        $db->execute($updateData);

        return $db->commit();
    }

    public static function countRegistersByStatus($userId)
    {
        $queryAll = "SELECT 
                count(Registro.id_registro) AS count 
            FROM Registro 
            INNER JOIN Realiza 
                ON Registro.id_registro = Realiza.fk_Registro_id_registro 
            WHERE Realiza.fk_Usuario_id_usuario =:user_id
            ";

        $queryBytag = "SELECT
                Amostra.status AS tag, 
                count(DISTINCT Registro.id_registro) AS count 
            FROM Registro
            LEFT JOIN Amostra 
                ON Registro.id_registro=Amostra.fk_Registro_id_registro
            LEFT JOIN Realiza 
                ON Registro.id_registro = Realiza.fk_Registro_id_registro
            WHERE Realiza.fk_Usuario_id_usuario =:user_id
            GROUP BY Amostra.status;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($queryBytag); 
        $db->execute([':user_id' => $userId]);
        $registers = $db->statements->fetchAll(PDO::FETCH_ASSOC);

        $db->beginTransaction();
        $db->prepare($queryAll); 
        $db->execute([':user_id' => $userId]);
        $countAll = $db->statements->fetch(PDO::FETCH_ASSOC);

        $data = [
            self::$all => $countAll['count'], 
            self::$draft => 0, 
            self::$curated => 0, 
            self::$approved => 0, 
            self::$disapproved => 0
        ];

        foreach ($registers as $counts){
            switch ($counts["tag"]) {
                case self::$draft:
                    $data[self::$draft] += $counts['count'];
                    break;

                case self::$curated:
                    $data[self::$curated] += $counts['count'];
                    break;

                case self::$approved:
                    $data[self::$approved] += $counts['count'];
                    break;

                case self::$disapproved:
                    $data[self::$disapproved] += $counts['count'];
                    break;
                
                default:
                    $data[self::$draft] += $counts['count'];
                    break;
            }
        }

        return $data;
    }

    public function getRegisterById($id): array|bool
    {
        $query = "SELECT 
                id_registro as id, 
                nome as title, 
                descricao_registro as description, 
                referencia as reference
            FROM Registro
            WHERE id_registro = :id;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute([':id' => $id]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function getUserRegisters($userId): array 
    {
        $query = "SELECT 
                Registro.id_registro as id, 
                Registro.nome as title, 
                Amostra.data_edicao as edit, 
                Registro.descricao_registro as description, 
                Registro.referencia as reference, 
                Amostra.status as tag 
            FROM Registro
            INNER JOIN Realiza ON Registro.id_registro = Realiza.fk_Registro_id_registro
            INNER JOIN Usuario u ON u.id_usuario = Realiza.fk_Usuario_id_usuario
            LEFT JOIN Amostra ON Registro.id_registro = Amostra.fk_Registro_id_registro
            WHERE u.id_usuario = :user_id;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute([':user_id' => $userId]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $projects = array();

        for ($i=0; $i < count($result); $i++) { 
            $id = $result[$i]['id'];
            if ($result[$i]['tag'] === null) {
                $result[$i]['tag'] = self::$draft;
            }
            if (array_key_exists($id, $projects)) {
                array_push($projects[$id]['tags'], $result[$i]['tag']);
                $time = [
                    strtotime($projects[$id]['edit']),
                    strtotime($result[$i]['edit'])
                ];
                sort($time, SORT_NATURAL | SORT_FLAG_CASE);
                $projects[$id]['edit'] = date("d/m/Y, G:i",  $time[1]).' GMT'.date('T');
                $projects[$id]['tags'] = array_unique($projects[$id]['tags']);
            } else {
                if ($result[$i]['edit'] ){
                    $timeInt = strtotime($result[$i]['edit']);
                    $timeString = date("d/m/Y, G:i",  $timeInt).' GMT'.date('T');
                }
                $project = [
                    "id" => $result[$i]['id'],
                    "title" => $result[$i]['title'],
                    "edit" => isset($timeString)?$timeString:false,
                    "description" => $result[$i]['description'],
                    "reference" => $result[$i]['reference'],
                    "tags" => array($result[$i]['tag'])
                ];
                $projects[$id] = $project;
                $timeString=null;
            }
        }
        usort($projects, function ($item1, $item2) {
            return $item1['edit'] <=> $item2['edit'];
        });
        return $projects;
    }

    public function getUserRegistersByTag($userId, $tag): array 
    {
        $query = "SELECT 
                Registro.id_registro as id, 
                Registro.nome as title, 
                Amostra.data_edicao as edit, 
                Registro.descricao_registro as description, 
                Registro.referencia as reference, 
                Amostra.status as tag 
            FROM Registro
            LEFT JOIN Realiza ON Registro.id_registro = Realiza.fk_Registro_id_registro
            INNER JOIN Usuario u ON u.id_usuario = Realiza.fk_Usuario_id_usuario
            LEFT JOIN Amostra ON Registro.id_registro = Amostra.fk_Registro_id_registro
            WHERE u.id_usuario = :user_id AND Amostra.status = :tag
            GROUP BY Registro.id_registro
            ORDER BY Amostra.data_edicao DESC;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute([':user_id' => $userId, ':tag' => $tag]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $projects = array();

        for ($i=0; $i < count($result); $i++) { 
            $id = $result[$i]['id'];
            if ($result[$i]['tag'] === null) {
                $result[$i]['tag'] = self::$draft;
            }
            if (array_key_exists($id, $projects)) {
                array_push($projects[$id]['tags'], $result[$i]['tag']);
                $projects[$id]['tags'] = array_unique($projects[$id]['tags']);
            } else {
                $time = strtotime($result[$i]['edit']);

                $project = [
                    "id" => $result[$i]['id'],
                    "title" => $result[$i]['title'],
                    "edit" => date("d/m/Y, G:i", $time).' GMT'.date('T'),
                    "description" => $result[$i]['description'],
                    "reference" => $result[$i]['reference'],
                    "tags" => array($result[$i]['tag'])
                ];
                $projects[$id] = $project;
            }
        }
        return $projects;
    }

    public function getUserRegistersWithoutSample($userId): array 
    {
        $query = "SELECT 
                Registro.id_registro as id, 
                Registro.nome as title, 
                Amostra.data_edicao as edit, 
                Registro.descricao_registro as description, 
                Registro.referencia as reference, 
                Amostra.status as tag 
            FROM Registro
            LEFT JOIN Realiza ON Registro.id_registro = Realiza.fk_Registro_id_registro
            INNER JOIN Usuario u ON u.id_usuario = Realiza.fk_Usuario_id_usuario
            LEFT JOIN Amostra ON Registro.id_registro = Amostra.fk_Registro_id_registro
            WHERE u.id_usuario = :user_id OR Amostra.status = NULL
            GROUP BY Registro.id_registro
            ORDER BY Amostra.data_edicao DESC;
        ";
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query); 
        $db->execute([':user_id' => $userId]);
        $result = $db->statements->fetchAll(PDO::FETCH_ASSOC);
        $projects = array();

        for ($i=0; $i < count($result); $i++) { 
            $id = $result[$i]['id'];
            
            $projects[$id] = [
                "id" => $id,
                "title" => $result[$i]['title'],
                "edit" => 'Sem coletas',
                "description" => $result[$i]['description'],
                "reference" => $result[$i]['reference'],
                "tags" => array(self::$draft)
            ];
        }
        return $projects;
    }

    public function getPublicRegister($registerId): array 
    {
        $query = "SELECT 
                Registro.id_registro as id, 
                Registro.nome as title, 
                Amostra.data_coleta as edit, 
                Registro.descricao_registro as description, 
                Registro.referencia as reference, 
                Amostra.status as tag 
            FROM Registro
            INNER JOIN Realiza ON Registro.id_registro = Realiza.fk_Registro_id_registro
            INNER JOIN Usuario u ON u.id_usuario = Realiza.fk_Usuario_id_usuario
            LEFT JOIN Amostra ON Registro.id_registro = Amostra.fk_Registro_id_registro
            WHERE Registro.id_registro = :register_id
            AND Amostra.status IS NOT NULL
            AND NOT Amostra.status = 'rascunhos'
            ORDER BY Amostra.data_coleta DESC;
        ";
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([':register_id' => $registerId]);

        $project = [
            'main' => null,
            'taxons' => null,
            'extra' => null,
        ];
        $project['main'] = $db->statements->fetch(PDO::FETCH_ASSOC);

        return $project;
    }
}