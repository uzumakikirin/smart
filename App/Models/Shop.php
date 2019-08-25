<?php
class Shop
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProducts($ctg_id, $page)
    {

        if (empty($ctg_id)) {
            $this->db->query('SELECT * FROM product ORDER BY p_id DESC');
            $results = $this->db->resultSet();
            $number_items = $this->db->rowCount();
            $result_per_page = 6;
            $page_first_result = ($page - 1) * $result_per_page;
            $number_of_result = ($number_items !== false && $number_items !== 0) ? $number_items : 0;
            $number_of_pages = ceil($number_of_result / $result_per_page);
            $this->db->query('SELECT * FROM product WHERE delete_flg = 0 ORDER BY p_id DESC LIMIT :limit OFFSET :offset');
            $this->db->bind(':limit', $result_per_page);
            $this->db->bind(':offset', $page_first_result);
            $results = $this->db->resultSet();
            return [$results, $number_of_pages];
        } else {
            $this->db->query('SELECT *
                          FROM product
                          WHERE p_ctg_id = :ctg_id
                          ORDER BY p_id DESC
                          ');
            $this->db->bind(':ctg_id', $ctg_id);
            $results = $this->db->resultSet();
            $number_items = $this->db->rowCount();
            $result_per_page = 6;
            $page_first_result = ($page - 1) * $result_per_page;
            $number_of_result = ($number_items !== false && $number_items !== 0) ? $number_items : 0;
            $number_of_pages = ceil((int)$number_of_result / $result_per_page);
            $this->db->query('SELECT * FROM product WHERE p_ctg_id = :ctg_id AND delete_flg = 0 ORDER BY p_id DESC LIMIT :limit OFFSET :offset');
            $this->db->bind(':ctg_id', $ctg_id);
            $this->db->bind(':limit', $result_per_page);
            $this->db->bind(':offset', $page_first_result);
            $results = $this->db->resultSet();
            return [$results, $number_of_pages];
        }
    }

    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM product WHERE p_id = :pid AND delete_flg = 0');
        $this->db->bind(':pid', $id);
        $row = $this->db->single();
        return $row;
    }


    public function getCategoryList()
    {
        $this->db->query('SELECT * FROM category WHERE delete_flg=0 ');
        $results = $this->db->resultSet();
        return $results;
    }
}
