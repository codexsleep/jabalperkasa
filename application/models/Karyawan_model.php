<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan_model extends CI_Model
{
    public $table = 'tbl_users';
    public $id = 'tbl_users.user_id';

    public function __construct()
    {
        parent::__construct();
    }
    public function karyawan_get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function karyawan_getById($id)
    {
       $this->db->select('*');
       $this->db->from($this->table);
       $this->db->where('user_id', $id);
       $query = $this->db->get();
       return $query->row_array();
    }

    public function karyawan_getByIdNumber($id)
    {
       $this->db->select('*');
       $this->db->from($this->table);
       $this->db->where('user_idnumber', $id);
       $query = $this->db->get();
       return $query->row_array();
    }

    public function karyawan_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function karyawan_insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function karyawan_delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}
