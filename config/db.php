<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$_ENV['MYSQL_HOST']};port={$_ENV['MYSQL_TCP_PORT']};dbname={$_ENV['MYSQL_DATABASE']}",
    'username' => $_ENV['MYSQL_USER'],
    'password' => $_ENV['MYSQL_PASSWORD'],
    'charset' => 'utf8',
];
