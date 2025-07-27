<?php

require_once(realpath(MODEL_PATH . '/Model.php'));

class Clube extends Model {
    protected static $tableName = "clube";
    protected static $columns = [
        "idclube",
        "clube",
        "saldo_disponivel"
    ];

}