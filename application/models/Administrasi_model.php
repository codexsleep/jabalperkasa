<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrasi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function company_get()
    {
        $this->db->from('tbl_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function department_get()
    {
        $this->db->from('tbl_department');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function company_getbyid($id)
    {
       $this->db->select('*');
       $this->db->from('tbl_company');
       $this->db->where('company_id', $id);
       $query = $this->db->get();
       return $query->row_array();
    }

    public function department_getbyid($id)
    {
       $this->db->select('*');
       $this->db->from('tbl_department');
       $this->db->where('department_id', $id);
       $query = $this->db->get();
       return $query->row_array();
    }

    public function departemenUpdate($where, $data)
    {
        $this->db->update('tbl_department', $data, $where);
        return $this->db->affected_rows();
    }
    public function departemenInsert($data)
    {
        $this->db->insert('tbl_department', $data);
        return $this->db->insert_id();
    }

    public function hapusDepartemen($id)
    {
        $this->db->where('department_id', $id);
        $this->db->delete('tbl_department');
        return $this->db->affected_rows();
    }
}