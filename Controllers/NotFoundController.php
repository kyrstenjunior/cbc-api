<?php

require_once __DIR__ . "/../Http/Request.php";
require_once __DIR__ . "/../Http/Response.php";

class NotFoundController {
    public function index(Request $resquest, Response $response) {
        $response::json([
            "error" => true,
            "success" => false,
            "message" => "Sorry, route not found."
        ]);

        return;
    }
}