<?php
class Cpanel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductlist($s)
    {
        if (!empty($s)) {
            $this->db->query('SELECT * FROM product WHERE (p_name LIKE :search)  ORDER BY p_ctg_id DESC');
        }
        else{
            $this->db->query('SELECT * FROM product  ORDER BY p_ctg_id DESC');
        } 
        $this->db->bind(':search', $s);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCate()
    {
        $this->db->query('SELECT * FROM category');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getSingleCate($id){
        $this->db->query('SELECT * FROM category WHERE ctg_id=:ctgid');
        $this->db->bind(':ctgid', $id);
        $row = $this->db->single();
        return $row;
    }

    public function productAdd($data)
    {
        $this->db->query('INSERT INTO product(p_name, p_detail, p_price, p_ctg_id, p_image) 
       VALUES(:pname,:pdetail,:pprice,:pctgid, :pimage)');
        $this->db->bind(':pname', $data['item_name']);
        $this->db->bind(':pdetail', $data['detail']);
        $this->db->bind(':pprice', $data['price']);
        $this->db->bind(':pctgid', $data['ctg_id']);
        $this->db->bind(':pimage', empty($data['image_name']) ? 'pavatar.jpg' : $data['image_name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProduct($item_id)
    {
        $this->db->query('SELECT * FROM product WHERE p_id = :pid');
        $this->db->bind(':pid', $item_id);
        $row = $this->db->single();
        return $row;
    }

    public function updateProduct($data)
    {
        $this->db->query('UPDATE product SET p_name = :pname, p_detail=:pdetail,
        p_price = :pprice, p_image= :pimage, p_ctg_id = :pctgid, delete_flg= :dlt_flg
        WHERE p_id=:pid');
        $this->db->bind(':pname', $data['item_name']);
        $this->db->bind(':pdetail', $data['detail']);
        $this->db->bind(':pprice', $data['price']);
        $this->db->bind(':pimage', (empty($data['image_name'])) ? $data['old_image_name'] : $data['image_name']);
        $this->db->bind(':pctgid', $data['ctg_id']);
        $this->db->bind(':dlt_flg', $data['dlt_flg']);
        $this->db->bind(':pid', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->query('UPDATE product SET delete_flg = :dt_flg WHERE p_id = :pid');
        $this->db->bind(':pid', $id);
        $this->db->bind(':dt_flg', 1);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory($data)
    {
        $this->db->query('UPDATE category SET category_name = :cname, delete_flg = :dlt_flg
        WHERE ctg_id=:ctgid');
        $this->db->bind(':cname', $data['category_name']);
        $this->db->bind(':dlt_flg', $data['dlt_flg']);
        $this->db->bind(':ctgid', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory($id)
    {
        $this->db->query('UPDATE category SET delete_flg = :dt_flg WHERE ctg_id = :ctgid');
        $this->db->bind(':ctgid', $id);
        $this->db->bind(':dt_flg', 1);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function categoryAdd($data)
    {
        $this->db->query('INSERT INTO category(category_name) 
       VALUES(:c_name)');
        $this->db->bind(':c_name', $data['c_name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
