<?php

require_once __DIR__ . "/Database.php";

class Clube extends Database {
    public static function save(array $data) {
        $pdo = self::getConnection();
        $sql = "INSERT INTO clube (clube, saldo_disponivel) VALUES (?, ?)";

        $statement = $pdo->prepare($sql);
        $statement->execute([
            $data["clube"],
            $data["saldo_disponivel"]
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function find(int|string $id) {
        $pdo = self::getConnection();

        if($id !== "") {
            $sql = "SELECT * FROM clube WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        };

        $sql = "SELECT * FROM clube";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function edit(int|string $id, array $data) {
        $pdo = self::getConnection();
        $sql = "UPDATE clube SET clube = ?, saldo_disponivel = ? WHERE id = ?";

        $statement = $pdo->prepare($sql);
        $statement->execute([$data["clube"], $data["saldo_disponivel"], $id]);

        return $statement->rowCount() > 0 ? true : false;
    }

    public static function remove(int|string $id) {
        $pdo = self::getConnection();
        $sql = "DELETE FROM clube WHERE id = ?";

        $statement = $pdo->prepare($sql);
        $statement->execute([$id]);

        return $statement->rowCount() > 0 ? true : false;
    }
}