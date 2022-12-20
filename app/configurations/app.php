<?php

return array(
    'debug' => False,
    'siteName' => 'Fitoplâncton Georreferenciado',
    'url' => isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']:'',
    'prefix' => '',
    'uploadDir' => '/img/uploads/',
    'pathTemplates' => APP_DIR . '/views/',
    'pathCache' => APP_DIR . '/../var/cache/',
    'renderFileFormat' => '.html.twig',
    'secret' => getenv('SECRET_CODE') ?? 'Secret_password_that_only_exist_to_the_sever',
    'password' => [
        'algorithm' => PASSWORD_DEFAULT,
        'options' => [
            'cost' => 10,
        ]
    ]
);
