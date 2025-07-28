<?php

require_once __DIR__ . "/../Utils/Validator.php";
require_once __DIR__ . "/../Models/Recurso.php";

class RecursoService {
    public static function down(int|string $id) {
        try {
            $recurso = Recurso::find($id);
            if(!$recurso) return ["error" => "Sorry, we could not found your recurso."];

            return $recurso;
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }
}