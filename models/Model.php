<?php

class Model {
    protected static $tableName = "";
    protected static $columns = [];
    protected $values = [];

    function __construct($arr) {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr) {
        if($arr) {
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function getResultSetFromSelect($filters = [], $columns = "*") {
        $query = "SELECT $columns FROM "
            . static::$tableName
            . static::getFilters($filters);

        $result = Database::getResultFromQuery($query);
        return $result;
    }

    private static function getFilters($filters) {
        $sql = "";

        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1 "; // Essa linha vai ser sempre true e assim eu sempre incluo a expressão WHERE na minha função SQL
            foreach($filters as $column => $value) {
                $sql .= " AND $column = ". static::getFormattedValue($value);
            }
        }

        return $sql;
    }

    private static function getFormattedValue($value) {
        switch(gettype($value)) {
            case "NULL":
                return "null";
            case "string":
                return "'$value'";
            default:
                return $value;
        }
    }
}