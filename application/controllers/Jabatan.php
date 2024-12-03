<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Data Jabatan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['jabatanAll'] = $this->pm->show_data('pegawai_jabatan');

		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('jabatan/index', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$jabatanData = [
				'nama_jabatan' => htmlspecialchars($this->input->post('nama_jabatan')),
			];

			$this->pm->insert_data($jabatanData, 'pegawai_jabatan');
			$this->session->set_flashdata('message', 'Nama Jabatan Pegawai Berhasil Ditambahkan.');
			return redirect('jabatan');
		}
	}

	public function edit_jabatan($id_jabatan)
	{
		$data['title'] = 'Data Jabatan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['statusAll'] = $this->pm->show_data('pegawai_status');

		$this->form_validation->set_rules('nama_jabatan_edit', 'Nama Unit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('jabatan/index', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$jabatanData = [
				'nama_jabatan' => htmlspecialchars($this->input->post('nama_jabatan_edit')),
			];

			$this->pm->update_data('id_jabatan', $id_jabatan, 'pegawai_jabatan', $jabatanData);
			$this->session->set_flashdata('message', 'Nama Jabatan Pegawai Berhasil Diubah.');
			return redirect('jabatan');
		}
	}

	public function hapus_jabatan()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		if ($this->pm->delete_data('pegawai_jabatan', 'id_jabatan', $id_jabatan)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}
}
