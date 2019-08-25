<?php
class Checkout
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCartData($uid)
    {
        $this->db->query('SELECT 
                             c.crt_id,
                             sum(c.num) As num, 
                             c.p_id, 
                             p.p_name, 
                             p.p_detail, 
                             p.p_price, 
                             p.p_image 
                        FROM 
                            cart c 
                               LEFT JOIN 
                            product p ON c.p_id = p.p_id
                        WHERE c.delete_flg = :dltt_flg AND user_id = :uid
                        GROUP BY c.p_id     
                          ');
        $this->db->bind(':uid', $uid);
        $this->db->bind(':dltt_flg', 0);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getUser($id)
    {
        $this->db->query('SELECT full_name, email, dob, gender, contact, address, image_name, image_path FROM users WHERE user_id = :userid');
        $this->db->bind(':userid', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getItemPrice($uid)
    {

        $this->db->query('SELECT 
                             sum(c.num) As num,  
                             sum(c.num * p.p_price) As Price
                        FROM 
                            cart c 
                               LEFT JOIN 
                            product p ON c.p_id = p.p_id
                        WHERE c.delete_flg = :dlt_flg AND user_id = :uid
                          ');
        $this->db->bind(':uid', $uid);
        $this->db->bind(':dlt_flg', 0);
        $results = $this->db->resultSet();
        return $results;
    }



}
