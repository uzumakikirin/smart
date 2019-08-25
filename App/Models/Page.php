<?php
class Page
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProducts()
    {
        $this->db->query('SELECT * FROM product ORDER BY p_id DESC LIMIT :limit');
        $this->db->bind(':limit', 3);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM product WHERE p_id = :pid');
        $this->db->bind(':pid', $id);
        $row = $this->db->single();
        return $row;
    }


    public function getCategoryList()
    {
        $this->db->query('SELECT * FROM category');
        $results = $this->db->resultSet();
        return $results;
    }
}
