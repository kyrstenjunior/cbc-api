<?php

require_once __DIR__ . "/Database.php";

class Recurso extends Database {
    public static function down(int|string $id, int|string $clube, array $data) {
        $pdo = self::getConnection();

        $sql = "SELECT * FROM recurso WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}