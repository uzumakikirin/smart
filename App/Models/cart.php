<?php
class Cart
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

    public function insertCartData($id, $u_id)
    {
        $this->db->query('INSERT INTO cart (p_id, user_id, num ) VALUES (:itemid, :userid, :qty) ');
        $this->db->bind(':itemid', $id);
        $this->db->bind(':userid', $u_id);
        $this->db->bind(':qty', 1);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCartData($id, $uid)
    {
        $this->db->query('UPDATE cart SET num = num+1, delete_flg = :dlt WHERE p_id = :pid AND user_id = :uid');
        $this->db->bind(':pid', $id);
        $this->db->bind(':uid', $uid);
        $this->db->bind(':dlt', 0);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuantity($id, $uid, $qty){
        $this->db->query('UPDATE cart SET num = :qty WHERE p_id = :p_id AND user_id = :uid');
        $this->db->bind(':p_id', $id);
        $this->db->bind(':uid', $uid);
        $this->db->bind(':qty', $qty);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkCartData($id, $u_id)
    {
        $this->db->query('SELECT * FROM cart WHERE p_id = :item_id AND user_id = :uid');
        $this->db->bind(':item_id', $id);
        $this->db->bind(':uid', $u_id);
        $row = $this->db->single();
        //Checking the Table Data Row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }


    public function delCartData($crt_id)
    {
        $this->db->query('UPDATE cart SET delete_flg = :dlt, num= :num WHERE crt_id = :crt_id ');
        $this->db->bind(':dlt', 1);
        $this->db->bind(':num', 0);
        $this->db->bind(':crt_id', $crt_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
