<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model', 'auth_model');
		$this->load->model('kehadiran_model', 'kehadiran_model');
		$this->load->model('Karyawan_model', 'karyawan_model');
		$this->load->model('Administrasi_model', 'administrasi_model');
		$this->load->library('session');
		if ($this->session->userdata('logged') != TRUE) {
			redirect("auth/login");
		}
		error_reporting(0);
	}

	public function departemen()
	{
		$data['pageTitle'] = "Departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['department'] = $this->administrasi_model->department_get();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/administrasi/vw_departemen', $data);
		$this->load->view('admin/layout/footer', $data);
	}

    public function tambahdepartemen()
	{
		$data['pageTitle'] = "Tambah Departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->form_validation->set_rules('departemen', 'Departemen', 'required', [
			'required' => 'Nama Departemen Kerja Wajib Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/layout/header", $data);
			$this->load->view("admin/administrasi/vw_tambah_departemen", $data);
			$this->load->view("admin/layout/footer");
		} else {
			$data = [
				'department_title' => str_replace("'", "", htmlspecialchars($this->input->post('departemen', TRUE), ENT_QUOTES)),
			];
			$this->administrasi_model->departemenInsert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Departemen Kerja Berhasil Disimpan!</div>');
			redirect('admin/administrasi/departemen');
		}
	}

	public function editdepartemen($id)
	{
		$data['pageTitle'] = "Edit Departemen";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['departemen'] = $this->administrasi_model->department_getbyid($id);
		$this->form_validation->set_rules('departemen', 'Departemen', 'required', [
			'required' => 'Nama Departemen Kerja Wajib Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/layout/header", $data);
			$this->load->view("admin/administrasi/vw_edit_departemen", $data);
			$this->load->view("admin/layout/footer");
		} else {
			$data = [
				'department_title' => str_replace("'", "", htmlspecialchars($this->input->post('departemen', TRUE), ENT_QUOTES)),
			];
			$this->administrasi_model->departemenUpdate(['department_id ' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Departemen Kerja Berhasil Di Update!</div>');
			redirect('admin/administrasi/departemen');
		}
	}

	public function hapus_departemen($id)
	{
		$this->administrasi_model->hapusDepartemen($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Departemen Berhasil Dihapus!</div>');
		redirect('admin/administrasi/departemen');
	}


}
