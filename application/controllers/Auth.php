<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model','auth_model');
		$this->load->library('session');
        error_reporting(0);
	}

	public function index(){
		if(isset($_POST['login'])){
		$email=str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
        $password=str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		if($email!=null && $password!=null){//check userdata null or not
			$validasi_login = $this->auth_model->authlogin($email,$password); //validation user data
               if($validasi_login->num_rows() > 0){
                   //if login success
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('email',$email);
                    setcookie("error_login", 'false', time() + (3), "/");
                    redirect("admin/beranda");
               }else{
				   //if login faild
					setcookie("error_login", 'true', time() + (3), "/");
					redirect("auth/login");
			   }
			}else{
					//if required data null
					setcookie("error_login", 'null', time() + (3), "/");
					redirect("auth/login");
				}
			}else{
				redirect("auth/login");
			}
	}

	public function login(){
		if($this->session->userdata('logged')==TRUE){
			redirect("admin/beranda");
		}
		$data['pageTitle'] = "Login";
		$this->load->view('login',$data);
	}

	public function logout()
    {
		$this->session->sess_destroy();
        redirect('auth/login');
    }
}
 