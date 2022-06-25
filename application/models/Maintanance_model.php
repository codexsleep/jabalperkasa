<?php
class maintanance_model extends CI_Model{

    function maintanance(){
        $query= $this->db->query("SELECT * FROM tbl_maintanance");
        return $query;
    }

    function prosesMaintanance($cardId,$maintananceDate,$detail,$waktu,$created){
        $query= $this->db->query("INSERT INTO tbl_maintanance (card_id, maintanance_date, maintanance_detail, mainteanance_estimatetime, status, created_date) VALUES ('$cardId','$maintananceDate','$detail','$waktu','under maintenance','$created')");
        return $query;
    }

    function cardbyNumber($number){
        $query= $this->db->query("SELECT * FROM maintanace_card where card_number='$number'");
        return $query;
    }

    function doneProcess($id){
        $query= $this->db->query("UPDATE tbl_maintanance SET status='done' WHERE maintanance_id='$id'");
        return $query;
    }

    function employee(){
        $query= $this->db->query("SELECT * FROM tbl_users");
        return $query;
    }

    function tambahTugas($judul,$keterangan,$employee,$created){
        $query= $this->db->query("INSERT INTO tbl_task(user_id, task_title, task_description, created_date) VALUES ('$employee','$judul','$keterangan','$created')");
        return $query;
    }

    
    function employeeById($id){
        $query= $this->db->query("SELECT * FROM tbl_users where user_id='$id'");
        return $query;
    }
    
    function hapusMaintanance($id){
        $query= $this->db->query("DELETE FROM tbl_maintanance WHERE maintanance_id='$id'");
        return $query;
    }
}