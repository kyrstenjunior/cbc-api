<?php

require_once __DIR__ . "/../Http/Request.php";
require_once __DIR__ . "/../Http/Response.php";
require_once __DIR__ . "/../Services/ClubeService.php";

class ClubeController {

    public function index(Request $request, Response $response) {
        $clubeService = ClubeService::find($id = "");

        if(isset($clubeService["error"])) {
            return $response::json([
                "error" => true,
                "success" => false,
                "message" => $clubeService["error"]
            ], 400);
        }

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $clubeService
        ], 201);
    }

    public function findUnique(Request $request, Response $response, array $id) {

        $clubeService = ClubeService::find($id[0]);

        if(isset($clubeService["error"])) {
            return $response::json([
                "error" => true,
                "success" => false,
                "message" => $clubeService["error"]
            ], 400);
        }

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $clubeService
        ], 201);
    }

    public function store(Request $request, Response $response) {
        $body = $request::body();

        $clubeService = ClubeService::create($body);

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $clubeService
        ], 201);
    }

    public function update(Request $request, Response $response, array $id) {
        $body = $request::body();
        $clubeService = ClubeService::update($id[0], $body);

        if(isset($clubeService["error"])) {
            return $response::json([
                "error" => true,
                "success" => false,
                "message" => $clubeService["error"]
            ], 400);
        }

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $clubeService
        ], 201);
    }

    public function remove(Request $request, Response $response, array $id) {
        $clubeService = ClubeService::delete($id[0]);

        if(isset($clubeService["error"])) {
            return $response::json([
                "error" => true,
                "success" => false,
                "message" => $clubeService["error"]
            ], 400);
        }

        $response::json([
            "error" => false,
            "success" => true,
            "data" => $clubeService
        ], 201);
    }

}