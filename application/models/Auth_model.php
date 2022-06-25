<?php
class auth_model extends CI_Model{

    function authlogin($email,$password){
        $query=$this->db->query("SELECT * FROM tbl_users WHERE user_email='$email' AND user_password=SHA1('$password') LIMIT 1");
        return $query;
    }

    function datauser($email){
        $query= $this->db->query("SELECT * FROM tbl_users WHERE user_email='$email' LIMIT 1");
        return $query;
    }

}

