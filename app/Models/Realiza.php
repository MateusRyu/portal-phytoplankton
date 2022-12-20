<?php

namespace App\Models;

use App\Library\Database;
use PDO;

class Realiza{
    public static $roles = [
        'default' => 'autor',
        'author' => 'autor'
    ];
    
    public function create($registerId, $userId, $role=null): void
    {
        $query = 'INSERT 
            INTO Realiza 
            (fk_Usuario_id_usuario, fk_Registro_id_registro, cargo) 
            Values (:id_usuario, :id_registro, :cargo)
        ';
        
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'id_usuario' => $userId,
            'id_registro' => $registerId,
            'cargo' => $role??self::$roles['default']
        ]);
        $db->commit();
    }

    public function getRegisterOwner($registerId)
    {
        $query = 'SELECT 
                fk_Usuario_id_usuario as userId,
                Cargo as role
            FROM Realiza
            WHERE fk_Registro_id_registro = :registerId;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'registerId' => $registerId
        ]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();

        return $result;
    }

    public function getSampleOwner($sampleId)
    {
        
        $query = 'SELECT 
                Realiza.fk_Usuario_id_usuario as userId,
                Realiza.Cargo as role
            FROM Realiza
            INNER JOIN Registro ON Registro.id_registro = Realiza.fk_Registro_id_registro
            INNER JOIN Amostra ON Amostra.fk_Registro_id_registro = Registro.id_registro
            WHERE Amostra.id_amostra = :sampleId;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'sampleId' => $sampleId
        ]);
        $result = $db->statements->fetch(PDO::FETCH_ASSOC);
        $db->commit();

        return $result;
    }

    public function delete($registerId, $userId)
    {
        $query = 'DELETE FROM Realiza
            WHERE 
                fk_Usuario_id_usuario = :id_usuario 
                AND fk_Registro_id_registro = :id_registro;
        ';
        $db = new Database();
        $db->beginTransaction();
        $db->prepare($query);
        $db->execute([
            'id_usuario' => $userId,
            'id_registro' => $registerId
        ]);

        return $db->commit();
    }

}