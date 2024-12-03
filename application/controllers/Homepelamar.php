<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepelamar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login_rekrutmen(array('1', '5', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tahap_seleksi'] = $this->pm->tahap_seleksi($data['pelamar']['id_pegawai']);
		$data['jumlah_pelamar'] = $this->pm->count_by_category('status_pegawai_id', 'pegawai_data', 4);

		$this->load->view('manage_rekrutmen/template_header', $data);
		$this->load->view('manage_rekrutmen/template_sidebar', $data);
		$this->load->view('home_pelamar/index', $data);
		$this->load->view('manage_rekrutmen/template_footer', $data);
	}

	public function getnext_tahap($id_tahap_rekrutmen)
	{
		// $next_data = $this->pm->getnext_data('pegawai_tahap_rekrutmen', $id_tahap_rekrutmen, 'id_tahap_rekrutmen');
		$next_data = $this->pm->datanext_tahap($id_tahap_rekrutmen);
		// var_dump($next_data);
		// die;
		echo json_encode($next_data);
	}
}
