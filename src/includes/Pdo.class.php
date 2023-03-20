<?php

class Pdo
{

    // Database configuration
    private $host = 'db';
    private $dbname = 'GW2';
    private $username = 'root';
    private $password = 'rootpass';
    private $port = 3306;
    private $pdo;

    // Create a new PDO instance
    public function __construct()
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO(
                    "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname . ";charset=utf8mb4",
                    $this->username,
                    $this->password
                );
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return null;
            }
        }
    }

    public function executeQuery($sql, $filters = [], $fetch = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($filters);
        return $stmt->fetchAll($fetch);
    }

    private function buildWhere($filters)
    {
        $where = '';
        if (count($filters)) {
            $where = [];
            foreach ($filters as $key => $value) {
                $where[] = "$key = :$key";
            }
            $where = 'WHERE ' . implode(' AND ', $where);
        }
        return $where;
    }
}
