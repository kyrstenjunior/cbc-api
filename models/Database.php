<?php

class Database {
    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . "/../env.ini");
        $env = parse_ini_file($envPath);

        $dsn = 'mysql:host=' . $env['HOSTNAME'] . ';dbname=' . $env['DATABASE'];

        $conn = new PDO($dsn, $env['USERNAME'], $env['PASSWORD']);
        return $conn;
    } // Método criado para conectar com o banco
}