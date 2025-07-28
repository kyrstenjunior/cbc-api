<?php

require_once __DIR__ . "/../Http/Route.php";

Route::get("/", "HomeController@index");

// CRUD Clubes
Route::get("/clubes", "ClubeController@index");
Route::post("/clube/create", "ClubeController@store");
Route::get("/clube/{id}", "ClubeController@findUnique");
Route::put("/clube/{id}/update", "ClubeController@update");
Route::delete("/clube/{id}/delete", "ClubeController@remove");

// Consumos
Route::post("/clube/{id}/passagem", "ConsumoController@passagem");
Route::post("/clube/{id}/hospedagem", "ConsumoController@hospedagem");