<?php

require_once __DIR__ . "/../Utils/Validator.php";
require_once __DIR__ . "/../Models/Recurso.php";

class ConsumoService {

    public static function consumming(int|string $id, mixed $clube, array $data) {
        try {
            $baixa = Recurso::down($id, $clube, $data);
            if(!$baixa) return ["error" => "Sorry, we could not found your clube."];

            return $clube;
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }
}