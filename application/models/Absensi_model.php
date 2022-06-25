<?php
defined('BASEPATH') or exit('No direct script access allowed');
class absensi_model extends CI_Model
{
    public $table = 'tbl_attendance';
    public $id = 'tbl_attendance.attendance_id ';
    public function __construct()
    {
        parent::__construct();
    }
  
    public function get_userbyIdNumber($id)
    {
      $query = $this->db->query("SELECT * FROM tbl_users WHERE user_idnumber='$id' LIMIT 1");
      return $query->row_array();
    }

    public function get_attendance_masuk($user_id,$inTime)
    {
      $query = $this->db->query("SELECT *, DATE('attendance_in') as tanggal FROM tbl_attendance WHERE user_id='$user_id' and attendance_in LIKE '$inTime %:%:%' ORDER by attendance_id DESC limit 1");
      return $query->row_array();
    }

    public function get_attendance_keluar($user_id)
    {
      $query = $this->db->query("SELECT *, DATE('attendance_out') as tanggal FROM tbl_attendance WHERE user_id='$user_id' and attendance_out='-' ORDER BY attendance_in DESC limit 1");
      return $query->row_array();
    }

    public function get_shift_karyawan($user_id){
      $query = $this->db->query("SELECT * FROM tbl_work_shift_user w, tbl_work_shift s where w.user_id='$user_id' and s.shift_id=w.shift_id");
      return $query->row_array();
    }

    public function absensi_masuk($data)
    {
        $this->db->insert('tbl_attendance', $data);
        return $this->db->insert_id();
    }

    public function absensi_keluar($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    

}