<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{

	function __construct()
	{
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

	public function index()
	{
		$data['pageTitle'] = "Log Kehadiran";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['department'] = $this->administrasi_model->department_get();
		$start_date = str_replace("'", "", htmlspecialchars($this->input->get('start_date', TRUE), ENT_QUOTES));
		$end_date = str_replace("'", "", htmlspecialchars($this->input->get('end_date', TRUE), ENT_QUOTES));
		if ($start_date == null and $end_date == null) {
			$date = date('Y-m-d');
			$data['attendance'] = $this->kehadiran_model->get($date);
		} else {
			$data['attendance'] = $this->kehadiran_model->getBySort($start_date, $end_date);
		}
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/kehadiran/vw_kehadiran', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function shiftkerja()
	{
		$data['pageTitle'] = "Shift Kerja";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['shift'] = $this->kehadiran_model->get_shift_kerja();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/kehadiran/vw_shift_kerja', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function shiftkaryawan($id)
	{

		$data['pageTitle'] = "Shift Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['shift'] = $this->kehadiran_model->get_shift_karyawan($id);
		$data['karyawan'] = $this->kehadiran_model->karyawanShift($id);

		$this->form_validation->set_rules('karyawan', 'Karyawan', 'required', [
			'required' => 'Data Karyawan Harus Dipilih'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/kehadiran/vw_user_shift_kerja', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {
			$data = [
				'shift_id' => $id,
				'user_id' => str_replace("'", "", htmlspecialchars($this->input->post('karyawan', TRUE), ENT_QUOTES)),
			];
			$this->kehadiran_model->insertKaryawanShift($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan Berhasil Ditambahkan!</div>');
			redirect('admin/kehadiran/shiftkaryawan/'.$id);
		}
	}

	public function tambahshift()
	{

		$data['pageTitle'] = "Tambah Shift Kerja";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();

		$this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required', [
			'required' => 'Nama Shift Kerja Wajib Diisi'
		]);
		$this->form_validation->set_rules('masuk', 'Masuk', 'required', [
			'required' => 'Jam Masuk Wajib Diisi'
		]);

		$this->form_validation->set_rules('keluar', 'Keluar', 'required', [
			'required' => 'Jam Keluar Wajib Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/layout/header", $data);
			$this->load->view("admin/kehadiran/vw_tambah_shift_kerja", $data);
			$this->load->view("admin/layout/footer");
		} else {
			$data = [
				'shift_name' => str_replace("'", "", htmlspecialchars($this->input->post('nama_shift', TRUE), ENT_QUOTES)),
				'shift_start' => '-',
				'shift_end' => '-',
				'shift_type' => 'Regular',
				'shift_in' => str_replace("'", "", htmlspecialchars($this->input->post('masuk', TRUE), ENT_QUOTES)),
				'shift_out' => str_replace("'", "", htmlspecialchars($this->input->post('keluar', TRUE), ENT_QUOTES)),
				'created_date' => date('Y-m-d H:i:s'),
			];
			$this->kehadiran_model->insertShift($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Shift Kerja Berhasil Ditambah!</div>');
			redirect('admin/kehadiran/shiftkerja');
		}
	}

	public function hapus_shift($id)
	{
		$this->kehadiran_model->hapusShift($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Shift Berhasil Dihapus!</div>');
		redirect('admin/kehadiran/shiftkerja');
	} 

	public function editshift($id)
	{
		$data['pageTitle'] = "Edit Shift Kerja";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['shift'] = $this->kehadiran_model->ShiftgetById($id);
		$this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required', [
			'required' => 'Nama Shift Kerja Wajib Diisi'
		]);
		$this->form_validation->set_rules('masuk', 'Masuk', 'required', [
			'required' => 'Jam Masuk Wajib Diisi'
		]);

		$this->form_validation->set_rules('keluar', 'Keluar', 'required', [
			'required' => 'Jam Keluar Wajib Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/layout/header", $data);
			$this->load->view("admin/kehadiran/vw_edit_shift_kerja", $data);
			$this->load->view("admin/layout/footer");
		} else {
			$data = [
				'shift_name' => str_replace("'", "", htmlspecialchars($this->input->post('nama_shift', TRUE), ENT_QUOTES)),
				'shift_start' => '-',
				'shift_end' => '-',
				'shift_type' => 'Regular',
				'shift_in' => str_replace("'", "", htmlspecialchars($this->input->post('masuk', TRUE), ENT_QUOTES)),
				'shift_out' => str_replace("'", "", htmlspecialchars($this->input->post('keluar', TRUE), ENT_QUOTES)),
				'update_date' => date('Y-m-d H:i:s'),
			];
			$this->kehadiran_model->Shiftupdate(['shift_id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Shift Kerja Berhasil Di Update!</div>');
			redirect('admin/kehadiran/shiftkerja');
		}
	}

	public function hapusKaryawanShift($shift_id,$user_id)
	{
		$this->kehadiran_model->hapusKaryawanShift($user_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan Dihapus dari Shift!</div>');
		redirect('admin/kehadiran/shiftkaryawan/'.$shift_id);
	}
}
