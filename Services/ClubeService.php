<?php

require_once __DIR__ . "/../Utils/Validator.php";
require_once __DIR__ . "/../Models/Clube.php";

class ClubeService {
    public static function create(array $data) {
        try {
            $fields = Validator::validate([
                "clube" => $data["clube"] ?? "",
                "saldo_disponivel" => $data["saldo_disponivel"] ?? ""
            ]);

            $clube = Clube::save($fields);

            if(!$clube) return ["error" => "Sorry, we could not create your clube."];

            return "Clube created successfully!";
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }

    public static function find(int|string $id) {
        try {
            $clube = Clube::find($id);
            if(!$clube) return ["error" => "Sorry, we could not found your clube."];

            return $clube;
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }

    public static function update(int|string $id, array $data) {
        try {
            $clube = Clube::find($id);
            if(!$clube) return ["error" => "Sorry, we could not found your clube."];
            
            $clubeEdit = Clube::edit($id, $data);
            if(!$clubeEdit) return ["error" => "Sorry, this clube could not be edited."];

            return "Clube edited successfully!";
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }

    public static function delete(int|string $id) {
        try {
            $clube = Clube::remove($id);
            if(!$clube) return ["error" => "Sorry, we could not found your clube."];

            return $clube;
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }
}