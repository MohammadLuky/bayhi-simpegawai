<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['tahap_seleksi'] = $this->pm->tahap_seleksi($data['pelamar']['id_pegawai']);
		$data['jumlah_pelamar'] = $this->pm->count_by_category('status_pegawai_id', 'pegawai_data', 4);
		$data['jumlah_pegawai'] = $this->pm->jumlah_pegawai();
		$data['jumlah_unit'] = $this->pm->count_rows('pegawai_unit');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}
}
