<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model'); 
		$this->load->model('Karyawan_model','karyawan_model');
        $this->load->model('Administrasi_model','administrasi_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		}
        error_reporting(0);
	}

	 
	public function index()
	{
		$data['pageTitle'] = "Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['karyawan'] = $this->karyawan_model->karyawan_get();
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/karyawan/vw_karyawan',$data);
		$this->load->view('admin/layout/footer',$data);
	}

	public function tambah()
    {
        $data['pageTitle'] = "Tambah Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
        $data['company'] = $this->administrasi_model->company_get();
        $data['department'] = $this->administrasi_model->department_get();

        $this->form_validation->set_rules('name', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required', [
            'required' => 'Gender Karyawan Wajib diisi'
        ]);

        $this->form_validation->set_rules('company', 'Company', 'required', [
            'required' => 'Company Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('department', 'Department', 'required', [
            'required' => 'Department Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('idkaryawan', 'ID Karyawan', 'required', [
            'required' => 'ID Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('employeeType', 'Tipe Karyawan', 'required', [
            'required' => 'Tipe Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('userType', 'Type Akun', 'required', [
            'required' => 'Type Akun Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Karyawan Mahasiswa Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("admin/layout/header", $data);
            $this->load->view("admin/karyawan/vw_tambah_karyawan", $data);
            $this->load->view("admin/layout/footer");
        } else {
            $data = [
                'user_name' => str_replace("'", "", htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES)),
                'user_gender' => str_replace("'", "", htmlspecialchars($this->input->post('gender',TRUE),ENT_QUOTES)),
                'user_civilstatus' => str_replace("'", "", htmlspecialchars($this->input->post('civilstatus',TRUE),ENT_QUOTES)),
                'user_email' => str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES)),
                'user_mobilenumber' => str_replace("'", "", htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES)),
                'user_birth	' => str_replace("'", "", htmlspecialchars($this->input->post('tglLahir',TRUE),ENT_QUOTES)),
                'user_ktp' => str_replace("'", "", htmlspecialchars($this->input->post('noKtp',TRUE),ENT_QUOTES)),
                'user_address' => str_replace("'", "", htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES)),
                'user_company' => str_replace("'", "", htmlspecialchars($this->input->post('company',TRUE),ENT_QUOTES)),
                'user_department' => str_replace("'", "", htmlspecialchars($this->input->post('department',TRUE),ENT_QUOTES)),
                'user_idnumber' => str_replace("'", "", htmlspecialchars($this->input->post('idkaryawan',TRUE),ENT_QUOTES)),
                'user_employeetype' => str_replace("'", "", htmlspecialchars($this->input->post('employeeType',TRUE),ENT_QUOTES)),
                'user_type' => str_replace("'", "", htmlspecialchars($this->input->post('userType',TRUE),ENT_QUOTES)),
                'user_password' => str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)),
                'user_status' => str_replace("'", "", htmlspecialchars($this->input->post('status',TRUE),ENT_QUOTES)),
                'created_date' => date('Y-m-d'),
            ];
            $this->karyawan_model->karyawan_insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Berhasil Ditambah!</div>');
            redirect('admin/karyawan');
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = "Edit Karyawan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
        $data['company'] = $this->administrasi_model->company_get();
        $data['department'] = $this->administrasi_model->department_get();
        $data['karyawan'] = $this->karyawan_model->karyawan_getById($id);
        $this->form_validation->set_rules('name', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required', [
            'required' => 'Gender Karyawan Wajib diisi'
        ]);

        $this->form_validation->set_rules('company', 'Company', 'required', [
            'required' => 'Company Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('department', 'Department', 'required', [
            'required' => 'Department Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('idkaryawan', 'ID Karyawan', 'required', [
            'required' => 'ID Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('employeeType', 'Tipe Karyawan', 'required', [
            'required' => 'Tipe Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('userType', 'Type Akun', 'required', [
            'required' => 'Type Akun Karyawan Wajib diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status Karyawan Mahasiswa Wajib diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("admin/layout/header", $data);
            $this->load->view("admin/karyawan/vw_edit_karyawan", $data);
            $this->load->view("admin/layout/footer");
        } else {
            if($this->input->post('password',TRUE)==null){
                $password = $data['karyawan']['user_password'];
            }else{
                $password = SHA1(str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)));
            }
            $data = [
                'user_name' => str_replace("'", "", htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES)),
                'user_gender' => str_replace("'", "", htmlspecialchars($this->input->post('gender',TRUE),ENT_QUOTES)),
                'user_civilstatus' => str_replace("'", "", htmlspecialchars($this->input->post('civilstatus',TRUE),ENT_QUOTES)),
                'user_email' => str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES)),
                'user_mobilenumber' => str_replace("'", "", htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES)),
                'user_birth	' => str_replace("'", "", htmlspecialchars($this->input->post('tglLahir',TRUE),ENT_QUOTES)),
                'user_ktp' => str_replace("'", "", htmlspecialchars($this->input->post('noKtp',TRUE),ENT_QUOTES)),
                'user_address' => str_replace("'", "", htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES)),
                'user_company' => str_replace("'", "", htmlspecialchars($this->input->post('company',TRUE),ENT_QUOTES)),
                'user_department' => str_replace("'", "", htmlspecialchars($this->input->post('department',TRUE),ENT_QUOTES)),
                'user_idnumber' => str_replace("'", "", htmlspecialchars($this->input->post('idkaryawan',TRUE),ENT_QUOTES)),
                'user_employeetype' => str_replace("'", "", htmlspecialchars($this->input->post('employeeType',TRUE),ENT_QUOTES)),
                'user_type' => str_replace("'", "", htmlspecialchars($this->input->post('userType',TRUE),ENT_QUOTES)),
                'user_password' => $password,
                'user_status' => str_replace("'", "", htmlspecialchars($this->input->post('status',TRUE),ENT_QUOTES)),
                'update_date' => date('Y-m-d'),
            ];
            $this->karyawan_model->karyawan_update(['user_id' => $id], $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan Berhasil Diedit!</div>');
                redirect('admin/karyawan');
            }
        }



}
