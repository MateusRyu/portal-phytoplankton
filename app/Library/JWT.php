<?php

namespace App\Library;

use Exception;
use Firebase\JWT\JWT as LibJWT;

class JWT
{
    private static $algorithm = 'HS256';
    
    private static function getKey(): string 
    {
        $secret = getenv('secret')?getenv('secret'):'SecretPassFromSever';
        return($secret);
    }

    public static function encode(array|\stdClass $payload, $keyId=null, $head=null): string
    {
        $jwt = LibJWT::encode($payload, self::getKey(), self::$algorithm, $keyId, $head);
        return($jwt);
    }

    public static function decode(string $jwt): object
    {
        $jwt = LibJWT::decode($jwt, self::getKey(), [self::$algorithm]);
        return($jwt);
    }
}