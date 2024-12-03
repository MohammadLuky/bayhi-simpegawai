<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Raport Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('coming_soon_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}
}
