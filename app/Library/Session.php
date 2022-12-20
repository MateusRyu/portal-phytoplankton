<?php

namespace App\Library;

use Exception;
use App\Library\JWT;
use App\Http\Controllers\UserController;

class Session
{
    public static $closed = 'closed';

    private static function getOptions($expireTime=0): array
    {
        $options = require APP_DIR.'/configurations/session.php';
        $options['expires'] =  $expireTime;
        unset($options['lifeTime']);
        unset($options['remember']);

        return $options;
    }

    public static function logout(): void
    {
        setcookie('session', '', self::getOptions());
    }

    public static function login(array $user, $rememberUser=false): void
    {
        $options = require_once APP_DIR.'/configurations/session.php';
        $role = $user['categoria']??'colaborador';
        
        $issuedAt = time();
        if ($rememberUser){
            $expireTime = $issuedAt + $options['remember']; 
        } else {
            $expireTime = $issuedAt + $options['lifeTime'];
        }

        $session = array(
            'iat' => $issuedAt,
            'id' => $user['id_usuario'],
            'username' => $user['nome_usuario'],
            'role' => $role,
            'exp' => $expireTime,
        );
        $jwt = JWT::encode($session);
        $options = self::getOptions($expireTime);
        setcookie('session', $jwt, $options);
    }

    public static function authenticateSession()
    {
        if (isset($_COOKIE['session'])){
            try{
                $cookie = JWT::decode($_COOKIE['session']);
                $user = UserController::loadUserById($cookie->id);
                $session = array(
                    'iat' => $cookie->iat,
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'exp' => $cookie->exp,
                );
                $jwt = JWT::encode($session);
                $options = self::getOptions($cookie->exp);
                setcookie('session', $jwt, $options);
                return $session;
            } catch (Exception $e){
                Self::logout();
                return self::$closed;
            };
        }
        return false;
    }

    public static function getUser(): array|bool
    {
        $session = self::authenticateSession();
        if ($session and $session!=self::$closed){
            $username = explode(' ', $session['username']);
            $user = [
                'id' => $session['id'], 
                'username' => implode(' ', $username),
                'firstName' => $username[0],
                'role' => $session['role'],
            ];
            return $user;
        }
        return false;
    }
}