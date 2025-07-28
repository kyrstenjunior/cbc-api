<?php

require_once __DIR__ . "/../Http/Request.php";
require_once __DIR__ . "/../Http/Response.php";
require_once __DIR__ . "/../Controllers/ClubeController.php";
require_once __DIR__ . "/../Services/ConsumoService.php";

class ConsumoController {
    public function passagem(Request $request, Response $response, array $id) {
        $clubeController = new ClubeController();
        $clubeController->findUnique($request, $response, $id);

        if(!$clubeController) return ["error" => "Sorry, the consumption of resources could not be achieved."];

        $body = $request::body();

        $consumoPassagem = ConsumoService::consumming(1, $id, $body);


        if(isset($consumoPassagem["error"])) {
            return $response::json([
                "error" => true,
                "success" => false,
                "message" => $consumoPassagem["error"]
            ], 400);
        }

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $consumoPassagem
        ], 201);
    }
}