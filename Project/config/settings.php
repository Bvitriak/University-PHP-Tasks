<?php
return [
    'host' => '127.0.0.1',
    'dbname' => 'my_blog',
    'user' => 'root',
    'password' => 'root',
    'charset' => 'utf8mb4',
    'port' => 8889,
    'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];