<?php 
use App\Library\Database;

$data = array(
    ':nome' => 'Admin',
    ':email' => 'admin@gmail.com',
    ':senha' => '',
    ':categoria' => 'colaborador'
);

$db = new Database();
$db->beginTransaction();
$db->prepare('INSERT INTO Usuario (nome_usuario, email, senha, categoria) VALUES (:nome, :email, :senha, :categoria)');
$db->execute($data);
$db->commit();
return ['email' => $email, 'senha' => $senha;