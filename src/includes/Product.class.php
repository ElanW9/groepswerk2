<?php

class Product
{

    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getProducts()
    {

        $sql = "SELECT *  FROM product ";
        return $this->db->executeQuery($sql);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        return $this->db->executeQuery($sql, ['id' => $id]);
    }
}
