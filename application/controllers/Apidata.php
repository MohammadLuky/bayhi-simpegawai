<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apidata extends CI_Controller
{
	private $api_key = '2012pasuruan';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api_model', 'am');
		$this->load->model('Pegawai_model', 'pm');
	}

	private function authenticate()
	{
		$headers = $this->input->request_headers();
		if (isset($headers['Api-Key']) && $headers['Api-Key'] == $this->api_key) {
			return true;
		}
		return false;
	}

	public function login()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'pesan' => 'Unauthorized'));
		// 	return;
		// }

		$postData = json_decode(file_get_contents('php://input'), true);
		$username = $postData['username'];
		$password = $postData['password'];

		$user = $this->am->validasi_user($username, $password);

		if ($user) {
			echo json_encode(array('status' => true, 'user_pegawai' => $user));
		} else {
			echo json_encode(array('status' => false, 'pesan' => 'Data tidak ada'));
		}
	}


	public function datapegawai()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$pegawai_data = $this->am->getAllpegawai();
		$pegawai_data = $this->am->datapegawai_beberapa();

		if ($pegawai_data) {
			$tampil_data = array('status' => true, 'data' => $pegawai_data);
		} else {
			$tampil_data = array('status' => false, 'data' => 'Data Tidak Ada');
		}
		echo json_encode($tampil_data);
		// $tampil_data = json_encode($pegawai_data);
		// echo $tampil_data;
	}

	public function pegawailogin()
	{
		if (!$this->authenticate()) {
			echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
			return;
		}

		$username = $this->input->get('username');
		if (empty($username)) {
			$response = array('status' => false, 'pesan' => 'Username tidak ada');
			echo json_encode($response);
			return;
		}

		$user_login = $this->am->getone_user($username);

		if ($user_login) {
			$response = array('status' => true, 'data_login' => $user_login);
		} else {
			$response = array('status' => false, 'pesan' => 'Data tidak ada');
		}

		echo json_encode($response);
	}

	public function dataunit()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data_unit = $this->pm->show_data('pegawai_unit');

		$tampil_data = json_encode($data_unit);
		echo $tampil_data;
	}

	public function data_agama()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data_unit = $this->pm->show_data('pegawai_agama');

		$tampil_data = json_encode($data_unit);
		echo $tampil_data;
	}

	public function provinsi_indo()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data = $this->pm->show_data('pegawai_data_provinsi');

		$tampil_data = json_encode($data);
		echo $tampil_data;
	}

	public function kotakab_indo()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data = $this->pm->show_data('pegawai_data_kota_kab');

		$tampil_data = json_encode($data);
		echo $tampil_data;
	}

	public function kecamatan_indo()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data = $this->pm->show_data('pegawai_data_kecamatan');

		$tampil_data = json_encode($data);
		echo $tampil_data;
	}

	public function kelurahan_indo()
	{
		// if (!$this->authenticate()) {
		// 	echo json_encode(array('status' => false, 'message' => 'Unauthorized'));
		// 	return;
		// }
		$data = $this->pm->show_data('pegawai_data_kelurahan');

		$tampil_data = json_encode($data);
		echo $tampil_data;
	}
}
