<?php

class DB
{
    public $host = "localhost";
    public $username = "root";
    public $password = "root";
    public $name = "task1";

    static $toHash = ["password", "x"];

    public function connect()
    {
        $dsn = "mysql:dbname=" . $this->name . ";host=" . $this->host;
        $pdo = new PDO($dsn, $this->username, $this->password);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function insertSql($insertArr, $table)
    {
        $sql = "INSERT INTO $table ";
        $fields = [];
        $values = [];

        foreach ($insertArr as $key => $value) {
            $fields[] = "`$key`";
            if (in_array($key, self::$toHash)) {
                $value = password_hash($value, PASSWORD_DEFAULT);
            }
            $values[] = "'$value'";
        }

        $fields = "(" . implode(",", $fields) . ")";
        $values = "(" . implode(",", $values) . ")";

        return $sql . $fields . " VALUES " . $values;
    }

}