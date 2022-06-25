<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintanance extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->model('Maintanance_model','maintanance_model');
		$this->load->library('session');
		if($this->session->userdata('logged')!=TRUE){
			redirect("auth/login");
		} 
        error_reporting(0);
	}
	
	public function index()
	{
		$data['pageTitle'] = "Maintanance Data";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['maintanance'] = $this->maintanance_model->maintanance()->result_array();
		$this->load->view('admin/dataMaintanance',$data);
	}

	public function tambah()
	{
		$data['pageTitle'] = "Tambah tugas";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$this->load->view('admin/tambahMaintanance',$data);
	}

	
	public function process(){
		$detail = str_replace("'", "", htmlspecialchars($this->input->post('detail',TRUE),ENT_QUOTES));
		$waktu = str_replace("'", "", htmlspecialchars($this->input->post('waktu',TRUE),ENT_QUOTES));
		$id = str_replace("'", "", htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES));
		$maintananceDate = date('Y-m-d H:i:s');
		$created = date('Y-m-d');
		$card = $this->maintanance_model->cardbyNumber($id)->row_array();
		if($card){
			$cardId = $card['card_id'];	
			$result = $this->maintanance_model->prosesMaintanance($cardId,$maintananceDate,$detail,$waktu,$created);
			if($result){
				redirect("admin/maintanance");
			}else{
				redirect("admin/maintanance");
			}
		}else{
			redirect("admin/maintanance/tambah");
		}
	}

	public function done($id)
	{
		$data['pageTitle'] = "Done Maintanance";
		$data['userdata'] = $this->auth_model->datauser($this->session->userdata('email'))->row_array();
		$data['maintanceId'] = $id;
		$this->load->view('admin/doneMaintanance',$data);
	}

	public function doneProcess($id){
		$number = str_replace("'", "", htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES));
		$card = $this->maintanance_model->cardbyNumber($number)->row_array();
		if($card){
			$result = $this->maintanance_model->doneProcess($id);
			if($result){
				redirect("admin/maintanance");
			}else{
				redirect("admin/maintanance");
			}
		}else{
			redirect("admin/maintanance/done");
		}
	}


	public function hapus($id){
		$result = $this->maintanance_model->hapusMaintanance($id);
		if($result){
			redirect("admin/maintanance");
		}else{
			redirect("admin/maintanance");
		}
	}
}
