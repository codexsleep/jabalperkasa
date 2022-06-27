<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('kehadiran_model', 'kehadiran_model');
		$this->load->model('Karyawan_model', 'karyawan_model');
		$this->load->model('Administrasi_model', 'administrasi_model');
		$this->load->model('Absensi_model', 'absensi_model');
		$this->load->library('session');
		error_reporting(0);
	}

	public function index()
	{
		$data['pageTitle'] = "MesinAbsensi";
		$this->load->view("admin/absensi/vw_pilih_absensi", $data);
	}


	public function masuk()
	{
		$data['pageTitle'] = "Absensi Masuk";
		$this->form_validation->set_rules('id', 'ID', 'required|integer', [
			'required' => 'ID Wajib Diisi',
			'integer' => 'ID Tidak Valid, Pastikan ID Berupa Angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/absensi/vw_masuk", $data);
		} else {
			$id = str_replace("'", "", htmlspecialchars($this->input->post('id', TRUE), ENT_QUOTES));
			$userData = $this->absensi_model->get_userbyIdNumber($id); //mengambil data karyawan
			if ($userData) { //mengecek apakah data karyawan valid
				$dateTime = date('Y-m-d H:i:s'); //waktu saat ini
				$absensi = $this->absensi_model->get_attendance_masuk($userData['user_id'], date('Y-m-d'));
				$shiftData = $this->absensi_model->get_shift_karyawan($userData['user_id']);
				$inTime = date('Y-m-d ') . $shiftData['shift_in'] . ':00';
				if ($shiftData) { // mengecek apakah karyawan memiliki shift
					if ($absensi == null or $absensi != null and $absensi['attendance_out']!='-') { //mengecek apakah karyawan sudah pernah melakukan absensi pada hari ini

						//program cek telat start
						$awal  = strtotime($inTime); //jam masuk shift karyawan
						$akhir = strtotime($dateTime); //waktu masuk hari karyawan hari ini
						$diff  = $akhir - $awal;
						$hour   = floor($diff / (60 * 60));
						$minute = floor(($diff - ($hour * (60 * 60))) / 60);
						$second = $diff % 60;
						if ($diff <= 0) {
							$lateTime = '00:00:00';
						} else {
							if ($hour < 10) {
								$jam = '0' . $hour;
							} else {
								$jam = $hour;
							}
							if ($minute < 10) {
								$menit = '0' . $minute;
							} else {
								$menit = $minute;
							}
							if ($second < 10) {
								$detik = '0' . $second;
							} else {
								$detik = $second;
							}
							$lateTime = $jam .  ':' . $menit . ':' . $detik;
						} //programcek telat end

						if($lateTime=='00:00:00'){ //mengecek apakah karyawan telat atau tidak
							$StatusAbsensi = 1;
						}else{
							$StatusAbsensi = 2;
						}
						
						$data = [
							'user_id' => $userData['user_id'],
							'attendance_in' => $dateTime,
							'attendance_out' => '-',
							'attendance_late_time' => $lateTime,
							'attendance_overtime' => '-',
							'attendance_status' => $StatusAbsensi,
						];

						$this->absensi_model->absensi_masuk($data);
						$this->session->set_flashdata('message', ' <div id="success_notification"><b>Absensi Berhasil!</b><br> Data anda telah masuk kedalam record</div>');
						$this->session->set_flashdata('message_show', 'success_notification');
					} else {
						//result ketika karyawan telah melakukan absensi sebelumnya
						$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Gagal!</b><br> Data anda  sudah pernah melakukan absensi sebelumnya</div>');
						$this->session->set_flashdata('message_show', 'failed_notification');
					}
				} else {
					//result karyawan tidak memiliki shift
					$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Gagal!</b><br> Karyawan tidak memiliki shift!</div>');
					$this->session->set_flashdata('message_show', 'failed_notification');
				}
			} else {
				//result data karyawan tidak valid
				$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Gagal!</b><br>  Data anda tidak valid, Mohon periksa kembali!</div>');
				$this->session->set_flashdata('message_show', 'failed_notification');
			}
			redirect('admin/absensi/masuk');
		}
	}

	public function keluar()
	{
	
		$data['pageTitle'] = "Absensi Keluar";
		$this->form_validation->set_rules('id', 'ID', 'required|integer', [
			'required' => 'ID Wajib Diisi',
			'integer' => 'ID Tidak Valid, Pastikan ID Berupa Angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/absensi/vw_keluar", $data);
		} else {
			$id = str_replace("'", "", htmlspecialchars($this->input->post('id', TRUE), ENT_QUOTES));
			$userData = $this->absensi_model->get_userbyIdNumber($id); //mengambil data karyawan
			if ($userData) { //mengecek apakah data karyawan valid
				$dateTime = date('Y-m-d H:i:s'); //waktu saat ini
				$absensi = $this->absensi_model->get_attendance_keluar($userData['user_id']);
				$shiftData = $this->absensi_model->get_shift_karyawan($userData['user_id']);
				$outTime = date('Y-m-d ') . $shiftData['shift_out'] . ':00'; //shift keluar karyawan
				if ($shiftData) { // mengecek apakah karyawan memiliki shift
					if ($absensi != null and $absensi['attendance_out']=='-') { //mengecek apakah karyawan sudah pernah melakukan absensi keluar pada hari ini
						//program cek telat start
						$awal  = strtotime($outTime); //jam masuk shift karyawan
						$akhir = strtotime($dateTime); //waktu masuk hari karyawan hari ini
						$diff  = $akhir - $awal;
						$hour   = floor($diff / (60 * 60));
						$minute = floor(($diff - ($hour * (60 * 60))) / 60);
						$second = $diff % 60;
						if ($diff <= 0) {
							$overTime = '00:00:00';
						} else {
							if ($hour < 10) {
								$jam = '0' . $hour;
							} else {
								$jam = $hour;
							}
							if ($minute < 10) {
								$menit = '0' . $minute;
							} else {
								$menit = $minute;
							}
							if ($second < 10) {
								$detik = '0' . $second;
							} else {
								$detik = $second;
							}
							$overTime = $jam .  ':' . $menit . ':' . $detik;
						} //programcek telat end

						$data = [
							'attendance_out' => $dateTime,
							'attendance_overtime' => $overTime,
						];

						$this->absensi_model->absensi_keluar(['attendance_id ' => $absensi['attendance_id']],$data);
						$this->session->set_flashdata('message', ' <div id="success_notification"><b>Absensi Keluar Berhasil!</b><br> Data anda telah masuk kedalam record</div>');
						$this->session->set_flashdata('message_show', 'success_notification');
					} else {
						//result ketika karyawan telah melakukan absensi sebelumnya
						$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Keluar Gagal!</b><br> Data anda sudah pernah melakukan absensi keluar sebelumnya</div>');
						$this->session->set_flashdata('message_show', 'failed_notification');
					}
				} else {
					//result karyawan tidak memiliki shift
					$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Keluar Gagal!</b><br> Karyawan tidak memiliki shift!</div>');
					$this->session->set_flashdata('message_show', 'failed_notification');
				}
			} else {
				//result data karyawan tidak valid
				$this->session->set_flashdata('message', ' <div id="failed_notification"><b>Absensi Keluar Gagal!</b><br>  Data anda tidak valid, Mohon periksa kembali!</div>');
				$this->session->set_flashdata('message_show', 'failed_notification');
			}
			redirect('admin/absensi/keluar');
		}
	}
}
