<?php

use App\Library\Database;

require_once __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../app/configurations/database.php';
Database::setup($settings);
$db = new Database();
$structure = [
    $db->query('DESCRIBE Amostra;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Cidade;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Contexto;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Estado;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Fitoplancton;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Pais;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Realiza;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Registro;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Taxon;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Usuario;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Variavel_auxiliar;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Projeto;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Variavel_ambiental;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Local;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Sinonimo;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Imagem;')->fetchAll(PDO::FETCH_ASSOC),
    $db->query('DESCRIBE Avalia;')->fetchAll(PDO::FETCH_ASSOC),
];

ob_start();
print_r($structure);
$structureString = ob_get_contents();
ob_end_clean();

echo($structureString);
var_dump(hash('sha256', $structureString));

$queryFilePath = [
    'folder' => './../database/migrations/',
    '1.1' => 'bootstrap.sql',
    '1.2' => '1.2.sql',
];

$query = file_get_contents($queryFilePath['folder'].$queryFilePath['1.1']));