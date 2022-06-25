<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kehadiran_model extends CI_Model
{
    public $table = 'tbl_attendance';
    public $id = 'tbl_attendance.attendance_id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get($date)
    {
        $query = $this->db->query("SELECT *, DATE(attendance_in) as tanggal FROM $this->table where attendance_in between '$date 00:00:00.00' and '$date 23:59:59'");
        return $query->result_array();
    }

    public function getBySort($start,$end)
    {
        $query = $this->db->query("SELECT *, DATE(attendance_in) as tanggal FROM $this->table where attendance_in between '$start 00:00:00.00' and '$end 23:59:59'");
        return $query->result_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function get_shift_kerja()
    {
        $this->db->from('tbl_work_shift');
        $query = $this->db->get();
        return $query->result_array();
    }

   public function get_shift_karyawan($id)
    {
        $query = $this->db->query("SELECT s.shift_user_id as id, k.user_name as nama, d.department_title as departemen, s.shift_id as shift_id, s.user_id as user_id FROM tbl_work_shift_user s, tbl_users k, tbl_department d where k.user_id=s.user_id and d.department_id=user_department and s.shift_id='$id'");
        return $query->result_array();
    }

    public function insertShift($data)
    {
        $this->db->insert('tbl_work_shift', $data);
        return $this->db->insert_id();
    }

    public function hapusShift($id)
    {
        $this->db->where('shift_id', $id);
        $this->db->delete('tbl_work_shift');
        return $this->db->affected_rows();
    }
    
    public function ShiftgetById($id)
    {
       $this->db->select('*');
       $this->db->from('tbl_work_shift');
       $this->db->where('shift_id', $id);
       $query = $this->db->get();
       return $query->row_array();
    }

    public function Shiftupdate($where, $data)
    {
        $this->db->update('tbl_work_shift', $data, $where);
        return $this->db->affected_rows();
    }

    public function karyawanShift()
    {
        $query = $this->db->query("SELECT user_id as id, user_name as nama FROM tbl_users");
        return $query->result_array();
    }

    public function work_shift_karyawan_ignore($id)
    {
        $query = $this->db->query("SELECT user_id as id FROM tbl_work_shift_user where user_id='$id'");
        return $query->row_array();
    }

        public function insertKaryawanShift($data)
    {
        $this->db->insert('tbl_work_shift_user', $data);
        return $this->db->insert_id();
    } 

    public function hapusKaryawanShift($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tbl_work_shift_user');
        return $this->db->affected_rows();
    }

    function departemenbyId($id){
        $query= $this->db->query("SELECT * FROM tbl_department where department_id='$id'");
       return $query;
   }

   function userAttendanceSort($id){
       $query = $this->db->query("SELECT * FROM tbl_users where user_id='$id'");
       return $query;
   }

   function employeeById($id){
    $query= $this->db->query("SELECT * FROM tbl_users where user_id='$id'");
    return $query;
}


}
