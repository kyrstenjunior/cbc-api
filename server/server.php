<?php

function conexaoDB() {
    include '../env.php';

    $conexao = new mysqli($hostname, $username, $password, $database);

    if($conexao->connect_error) {
        die("ERROR: $conexao->connect_error");
    }

    return $conexao;
}
