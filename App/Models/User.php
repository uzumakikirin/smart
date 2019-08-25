<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    //registration model code
    public function register($data)
    {
        $this->db->query('INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)');
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //login model code
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function changePassword($data)
    {
        $this->db->query('SELECT * FROM users WHERE user_id = :userid');
        $this->db->bind(':userid', $data['user_id']);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($data['currentpassword'], $hashed_password)) {
            $this->db->query('UPDATE users SET password = :newpassword WHERE user_id = :userid ');
            $this->db->bind(':newpassword', $data['newpassword']);
            $this->db->bind(':userid', $data['user_id']);
            //Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    //check email model code
    public function checkUser($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //Checking the Table Data Row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser($id)
    {
        $this->db->query('SELECT full_name, email, dob, gender, contact, address, image_name, image_path FROM users WHERE user_id = :userid');
        $this->db->bind(':userid', $id);
        $row = $this->db->single();
        return $row;
    }

    public function editUser($data)
    {
        $this->db->query('UPDATE users SET full_name = :full_name,
        dob = :dob, address=:address, contact=:contact, image_name=:image_name, gender=:gender
        where user_id=:userid');
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':image_name', (empty($data['image_name']))? $data['old_image_name']: $data['image_name']);
        $this->db->bind(':userid', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
