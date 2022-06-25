<?php
class beranda_model extends CI_Model{

    function maintanance(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_maintanance");
        return $query;
    }

    function attendance(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_attendance");
        return $query;
    }

    function employee(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_users");
        return $query;
    }

}