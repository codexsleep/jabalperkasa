<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Laporan_model','laporan_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		} 
        error_reporting(0);
	} 
	
	public function index()
	{
		$data['pageTitle'] = "Laporan";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['maintanance'] = $this->laporan_model->maintananceCount()->row_array();
		$data['attendance'] = $this->laporan_model->attendanceCount()->row_array();
		$data['employee'] = $this->laporan_model->employeeCount()->row_array();
		$data['reports'] = $this->laporan_model->attendance()->result_array();
		$this->load->view('admin/laporan',$data);
	}
}
