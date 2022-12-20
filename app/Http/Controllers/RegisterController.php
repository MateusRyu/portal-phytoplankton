<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amostra;
use App\Models\Registro;
use App\Models\Realiza;
use App\Models\Fitoplancton;
use App\Models\Contexto;
use App\Library\Session;
use App\Models\Imagem;

class RegisterController extends Controller
{
    private function loadRegisterNavData($id, $current = null): array
    {
        $modelRegister = new Registro();
        $data = $modelRegister->countRegistersByStatus($id);
        
        $dataView = array(
            Registro::$all => [
                'link' => '',
                'icon' => 'inbox',
                'text' => 'Todos',
                'number' => $data[Registro::$all]
            ],
            Registro::$draft => [
                'link' => 'rascunhos',
                'icon' => 'file',
                'text' => 'rascunhos',
                'number' => $data[Registro::$draft]
            ],
            Registro::$curated => [
                'link' => 'em-curadoria',
                'icon' => 'send',
                'text' => 'em curadoria',
                'number' => $data[Registro::$curated]
            ],
            Registro::$approved => [
                'link' => 'aprovados',
                'icon' => 'thumbs-up',
                'text' => 'aprovados',
                'number' => $data[Registro::$approved]
            ],
            Registro::$disapproved => [
                'link' => 'rejeitados',
                'icon' => 'thumbs-down',
                'text' => 'rejeitados',
                'number' => $data[Registro::$disapproved]
            ],
        );

        if ($current) {
            $dataView[$current]['link'] = '#';
            $dataView[$current]['active'] = true;
        }

        return $dataView;
    }

    public function showRegister($id): void
    {
        $modelRegisters = new Registro();

        echo "<pre>";
        $register = $modelRegisters->getPublicRegister($id);
        print_r($register);
        die('Return 404 page if null');
        
        $register = $modelRegisters->getUserRegisters($user['id']);
            
        $responseContent = parent::load('pages/registers/index', array(
            'register' => $register,
        ));
        
        $responseContent->sendResponse();
    }

    public function showRegisters(): void
    {
        $user = Session::getUser();
        $modelRegister = new Registro();

        $registers = $modelRegister->getUserRegisters($user['id']);
        $registerNavData = $this->loadRegisterNavData($user['id'], Registro::$all);

        $recents = array_slice($registers, 0, 3);
        
        $responseContent = parent::load('pages/registers/index', array(
            'username' => $user['firstName'],
            'role' => $user['role'],
            'registerNavData' => $registerNavData,
            'registers' => $registers,
            'recents' => $recents,
        ));
        $responseContent->sendResponse();
    }

    private function loadRegistersByTag($tag): array
    {
        $user = Session::getUser();
        $modelRegister = new Registro();

        $registers = $modelRegister->getUserRegistersByTag($user['id'], $tag);
        $recents = array_slice($registers, 0, 3);
        $registerNavData = $this->loadRegisterNavData($user['id'], $tag);
            
        $data = [
            'username' => $user['firstName'],
            'role' => $user['role'],
            'registerNavData' => $registerNavData,
            'registers' => $registers,
            'recents' => $recents,
        ];
        return $data;
    }

    public function showDraftRegisters(): void
    {
        $user = Session::getUser();
        $modelRegister = new Registro();

        $registerNavData = $this->loadRegisterNavData($user['id'], Registro::$draft);
        $registers = $modelRegister->getUserRegistersByTag($user['id'], Registro::$draft);
        $registersWithoutSample = $modelRegister->getUserRegistersWithoutSample($user['id']);
        foreach ($registersWithoutSample as $id => $register) {
            if (array_key_exists($id, $registers) == false) {
                $registers[$id] = $registersWithoutSample[$id];
            }
        }
        $recents = array_slice($registers, 0, 3);

        $responseContent = parent::load('pages/registers/index', [
            'username' => $user['firstName'],
            'role' => $user['role'],
            'registerNavData' => $registerNavData,
            'registers' => $registers,
            'recents' => $recents,
        ]);

        $responseContent->sendResponse();
    }

    public function showCuratedRegisters(): void
    {
        $registers = $this->loadRegistersByTag(Registro::$curated);
        $responseContent = parent::load('pages/registers/index', $registers);
        $responseContent->sendResponse();
    }
    
    public function showApprovedRegisters(): void
    {
        $registers = $this->loadRegistersByTag(Registro::$approved);
        $responseContent = parent::load('pages/registers/index', $registers);
        $responseContent->sendResponse();
    }

    public function showDisapprovedRegisters(): void
    {
        $registers = $this->loadRegistersByTag(Registro::$disapproved);
        $responseContent = parent::load('pages/registers/index', $registers);
        $responseContent->sendResponse();
    }

    public function formRegister(): void
    {
        $user = Session::getUser();

        $responseContent = parent::load('pages/registers/formRegister', array(
            'username' => $user['firstName'],
            'role' => $user['role'],
        ));
        $responseContent->sendResponse();
    }

    public function saveRegister(): void
    {
        $data = [
            'name' => $_POST['registerName'], 
            'description' => $_POST['description'], 
            'reference' => ($_POST['reference'] == '')?null:$_POST['reference'],
        ];
        
        $Registro = new Registro();
        $idRegister = $Registro->create($data);

        $user = Session::getUser();
        $Realiza = new Realiza();
        $Realiza->create($idRegister, $user['id']);
        parent::redirect('registros/'.$idRegister.'/amostras');
    }

    public function deleteRegister($id): void
    {
        $user = Session::getUser();
        $Registro = new Registro();
        $Realiza = new Realiza();
        $Amostra = new Amostra();

        $Realiza->delete($id, $user['id']);
        $Amostra->deleteByRegisterId($id);
        $Registro->delete($id);

        parent::redirect('registros');
    }

    public function updateRegister($registerId): void
    {
        die();
        $data = [
            'id' => $registerId,
            'name' => $_POST['registerName'], 
            'description' => $_POST['description'], 
            'reference' => ($_POST['reference'] == '')?null:$_POST['reference'],
        ];
        
        $Registro = new Registro();
        $idRegister = $Registro->updateRegister($data);
        parent::redirect('registros/'.$idRegister.'/editar');
    }

    public function formEditRegister($id): void
    {
        $user = Session::getUser();
        $modelRegisters = new Registro();
        $register = $modelRegisters->getRegisterById($id);

        if ($register == false) {
            parent::redirect('registros');
        }

        $responseContent = parent::load('pages/registers/formEditRegister', array(
            'username' => $user['firstName'],
            'role' => $user['role'],
            'id' => $id,
            'name' => $register['title'],
            'description' => $register['description'],
            'reference' => $register['reference'],
        ));
        $responseContent->sendResponse();
    }

    public function editRegister($id): void
    {
        die($id);
        $user = Session::getUser();
        $data = [
            'name' => $_POST['registerName'], 
            'description' => $_POST['description'], 
            'reference' => ($_POST['reference'] == '')?null:$_POST['reference'],
        ];
        
        $Registro = new Registro();
        $idRegister = $Registro->createRegister($data, $user['id']);

        parent::redirect('cadastrar-amostras/'.$idRegister);
    }
}