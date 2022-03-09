<?php

class User extends DB
{

    public function insert($insertArr)
    {
        $pdo = $this->connect();

        $sql = $this->insertSql($insertArr, "`users`");

        $pdo->query($sql);

        return $pdo->lastInsertId();
    }

    public function find($where)
    {
        $pdo = $this->connect();
        $sql = "SELECT * FROM users WHERE $where";
        $result = $pdo->query($sql);

        return $result->fetch();
    }

}