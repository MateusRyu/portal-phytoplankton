<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Router;
use App\Http\View;
use App\Library\JWT;
use App\Library\Session;
use App\Models\Usuario;
use Exception;

class UserController extends Controller
{
    public function login($alert = null): void
    {
        $responseContent = parent::load('pages/user/login', array(
            'alert' => $alert
        ));
        $responseContent->sendResponse();
        exit();
    }

    public function logout(): void
    {
        Session::logout();
        parent::redirect('', 'Realizando logout');
    }

    private function confirmUser($password, $user, $rememberUser=false): void
    {
        if (password_verify($password.$user["email"], $user['senha'])){
            Session::login($user, $rememberUser);
            parent::redirect('registros', 'confirmUser: Usuario confirmado');
        }  
        $this->login("E-mail ou senha incorreto! Verifique se digitou corretamente.");  
    }

    public function createAccount(string $alert=null): void
    {
        $view = 'pages/user/createAccount';
        $arguments = ['alert' => $alert];
        $responseContent = parent::load($view, $arguments);
        $responseContent->sendResponse();
    }

    public function validateLogin()
    {
        if (isset($_POST['email']) and isset($_POST['password'])){
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $rememberUser = (filter_input(INPUT_POST, 'rememberUser') == '1')?true:false;

            $model = new Usuario;
            $user = $model->getUserByEmail($email);
            $user = ($user === false)?['senha'=>'preventTimingAttack', 'email'=>'stab.email@example.com']:$user;
            return $this->confirmUser($password, $user, $rememberUser);
        }
        parent::redirect('login', 'validateLogin: Usuario NÃO encontrado');
        exit();
    }

    private function validatePasswordInput($password): bool
    {
        $attackSpeedPerSecond = 10**5;
        $lowerCasePattern = "/[a-z]+/";
        $upperCasePattern = "/[A-Z]+/";
        $numbersPattern = "/[0-9]+/";
        $symbolsPattern = "/[^a-zA-Z0-9]+/";
        $passwordComplexity = 0;
        if (preg_match($lowerCasePattern,$password)){
            $passwordComplexity += 26;
        }
        if (preg_match($upperCasePattern,$password)) {
            $passwordComplexity += 26;
        }
        if (preg_match($numbersPattern,$password)){
            $passwordComplexity += 10;
        }
        if (preg_match($symbolsPattern,$password)){
            $passwordComplexity += 30;
        }
        $possibilities = $passwordComplexity**strlen($password);
        $timeToCrackInSeconds = $possibilities/$attackSpeedPerSecond;
        if ($timeToCrackInSeconds<(60*60*24*30*6)){
            return false;
        }
        return true;
    }

    private function validateCreateAccountInputs(array $inputs)
    {
        $validInputs = (
            filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)
            && isset($inputs['username'])
            && $inputs['username']
            || $inputs['username'] !== ''
            && isset($inputs['password'])
            && $inputs['password']
            || $inputs['password'] !== ''
            && (strlen($inputs['password'])<120)
            && isset($inputs['confirmPassword'])
            && $inputs['confirmPassword']
            && $inputs['password'] === $inputs['confirmPassword']
            && $this->validatePasswordInput($inputs['password'])
        )?true:false;
        return($validInputs);
    }

    public function confirmCreateAccount()
    {
        $config = require APP_DIR.'/configurations/app.php';
        $cryptConfig = $config["password"];
        $inputs['username'] = htmlspecialchars($_POST['username'], ENT_COMPAT, 'UTF-8');
        $inputs['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $inputs['password']= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $inputs['confirmPassword'] = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $inputs = parent::normalizeInputs($inputs);
        $model = new Usuario;

        if ($this->validateCreateAccountInputs($inputs)){
            list('username'=> $username, 'email'=> $email, 'password'=>$password) = $inputs;
            $password = password_hash($password.$email, $cryptConfig["algorithm"], $cryptConfig['options']);
            if ($model->getUserByEmail($inputs['email'])) {
                $this->createAccount('email já existe');
                exit();
            }
            $user = $model->register($username, $email, $password);
            $responseContent = $this->confirmUser($inputs['password'], $user);
        }
    }

    public function showUsers()
    {
        $user = Session::getUser();
        // var_dump($user);
        // die();
        $model = new Usuario();
        $users = $model->getAllUsers();

        $responseContent = parent::load('pages/user/adminUsers', array(
            'username' => $user['firstName'],
            'role' => $user['role'],
            'users' => $users,
            'roles' => $model::$role
        ));
        $responseContent->sendResponse();
    }

    public function configureUserAccount ($alert='')
    {
        $model = new Usuario();
        $user = $model->getUserById(Session::getUser()['id']);
        unset($user['senha']);
        unset($user['categoria']);
        
        $responseContent = parent::load('pages/user/settings', array(
            'user' => $user,
            'alert' => $alert
        ));
        $responseContent->sendResponse();
    }

    public function updateAccount ()
    {
        $model = new Usuario();
        $config = require APP_DIR.'/configurations/app.php';
        $cryptConfig = $config["password"];
        $inputs['username'] = htmlspecialchars($_POST['username'], ENT_COMPAT, 'UTF-8');
        $inputs['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $inputs['password']= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $inputs['confirmPassword'] = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $inputs = parent::normalizeInputs($inputs);
        $model = new Usuario;

        if ($this->validateCreateAccountInputs($inputs)){
            list('username'=> $username, 'email'=> $email, 'password'=>$password) = $inputs;
            $password = password_hash($password.$email, $cryptConfig["algorithm"], $cryptConfig['options']);
            $user = $model->update(Session::getUser()['id'], $username, $email, $password);
        }
        parent::redirect('registros');
    }

    public function changeRole($userId)
    {
        $model = new Usuario();
        $role = array_search($_POST['role'], $model::$role);
        if ($role) {
            $model->changeRole($userId, $role);
            parent::redirect('usuarios');
        }
        parent::redirect('usuarios');
    }

    public function banUser($userId)
    {
        $model = new Usuario();
        $role = 'banished';
        $model->changeRole($userId, $role);
        parent::redirect('usuarios');
    }

    public static function loadUserById($userId)
    {
        $model = new Usuario();
        $result = $model->getUserById($userId);
        $user = [
            'id' => $result['id_usuario'],
            'username' => $result['nome_usuario'],
            'role' => $result['categoria']
        ];
        return $user;
    }
}
