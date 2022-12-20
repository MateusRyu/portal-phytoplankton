<?php

return array(
    'engine'   => getenv('DATABASE_ENGINE') ?? 'mysql',
    'host'     => getenv('DATABASE_HOST') ?? 'localhost',
    'port'     => getenv('DATABASE_PORT') ?? '3306',
    'name'     => getenv('DATABASE_NAME') ?? 'your_database_name',
    "user"     => getenv('DATABASE_USERNAME') ?? 'root',
    "password" => getenv('DATABASE_PASSWORD') ?? '',
);