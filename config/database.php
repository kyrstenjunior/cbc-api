<?php

class Database {
    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . "/../env.ini");
        $env = parse_ini_file($envPath);

        $dsn = 'mysql:host=' . $env['HOSTNAME'] . ';dbname=' . $env['DATABASE'];

        try {
            $conn = new PDO($dsn, $env['USERNAME'], $env['PASSWORD']);
            return $conn;
        } catch(PDOException $e) {
            die('Erro: '. $e->getMessage());
        }
    } // Método criado para conectar com o banco

    public static function getResultFromQuery($query) {
        $conn = self::getConnection();
        
        $statement = $conn->prepare($query);

        if($statement->execute()) {
            $resultado = $statement->fetchAll();
            return $resultado;
        } else {
            print_r($statement->errorInfo());
        }
    } // Método criado para receber o resultado de uma query no banco
}