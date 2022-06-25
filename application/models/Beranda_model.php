<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Beranda_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
  
    public function jmlKaryawan()
    {
      $query = $this->db->query("SELECT count(user_id) as jumlah FROM tbl_users WHERE user_type!='manager'");
      return $query->row_array();
    }

    public function jmlAbsensi()
    {
      $query = $this->db->query("SELECT count(attendance_id) as jumlah FROM tbl_attendance");
      return $query->row_array();
    }
    
    public function jmlDepartemen()
    {
      $query = $this->db->query("SELECT count(department_id) as jumlah FROM tbl_department");
      return $query->row_array();
    }

}