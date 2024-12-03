<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rolepegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '5'));
	}

	public function index()
	{
		$data['title'] = 'Data Role/Jabatan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['roleAll'] = $this->pm->show_data('pegawai_role_user');


		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('role_pegawai/index', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
		// $this->form_validation->set_rules('ket_status_pegawai', 'Nama Unit', 'required|trim');
		// if ($this->form_validation->run() == false) {
		// } else {
		// 	$dataStatusPegawai = [
		// 		'ket_status_pegawai' => htmlspecialchars($this->input->post('ket_status_pegawai')),
		// 	];

		// 	$this->pm->insert_data($dataStatusPegawai, 'pegawai_status');
		// 	$this->session->set_flashdata('message', 'Keterangan Status Pegawai Berhasil Ditambahkan.');
		// 	return redirect('statuspegawai');
		// }
	}

	// public function edit_status($id_status_pegawai)
	// {
	// 	$data['title'] = 'Data Status Pegawai';
	// 	$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
	// 	$data['statusAll'] = $this->pm->show_data('pegawai_status');

	// 	$this->form_validation->set_rules('ket_status_pegawai_edit', 'Nama Unit', 'required|trim');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('manage_pegawai/pegawai_header', $data);
	// 		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
	// 		$this->load->view('status_pegawai/index', $data);
	// 		$this->load->view('manage_pegawai/pegawai_footer', $data);
	// 	} else {
	// 		$dataStatusPegawai = [
	// 			'ket_status_pegawai' => htmlspecialchars($this->input->post('ket_status_pegawai_edit')),
	// 		];

	// 		$this->pm->update_data('id_status_pegawai', $id_status_pegawai, 'pegawai_status', $dataStatusPegawai);
	// 		$this->session->set_flashdata('message', 'Keterangan Status Pegawai Berhasil Diubah.');
	// 		return redirect('statuspegawai');
	// 	}
	// }

	// public function hapus_status_pegawai()
	// {
	// 	$id_status_pegawai = $this->input->post('id_status_pegawai');
	// 	if ($this->pm->delete_data('pegawai_status', 'id_status_pegawai', $id_status_pegawai)) {
	// 		echo json_encode(['status' => 'success']);
	// 	} else {
	// 		echo json_encode(['status' => 'error']);
	// 	}
	// }
}
