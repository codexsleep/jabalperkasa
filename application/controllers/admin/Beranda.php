<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Beranda_model','beranda_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		}
        error_reporting(0);
	}

	public function index()
	{
		$data['pageTitle'] = "Beranda";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/beranda/vw_beranda',$data);
		$this->load->view('admin/layout/footer',$data);
	}
}
