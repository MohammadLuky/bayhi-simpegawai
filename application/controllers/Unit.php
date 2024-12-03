<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Data Unit';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['unitAll'] = $this->pm->show_data('pegawai_unit');

		$this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('unit/index', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$dataUnit = [
				'nama_unit' => htmlspecialchars($this->input->post('nama_unit')),
			];

			$this->pm->insert_data($dataUnit, 'pegawai_unit');
			$this->session->set_flashdata('message', 'Unit Baru Berhasil Ditambahkan.');
			return redirect('unit');
		}
	}

	public function edit_unit($id_unit)
	{
		$data['title'] = 'Data Unit';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['unitAll'] = $this->pm->show_data('pegawai_unit');

		$this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('unit/index', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$dataUnit = [
				'nama_unit' => htmlspecialchars($this->input->post('nama_unit')),
			];

			$this->pm->update_data('id_unit', $id_unit, 'pegawai_unit', $dataUnit);
			$this->session->set_flashdata('message', 'Unit Berhasil Diubah.');
			return redirect('unit');
		}
	}

	public function hapus_unit()
	{
		// $id_unit = $this->input->post('id_unit');
		// if ($this->pm->delete_data('pegawai_unit', 'id_unit', $id_unit)) {
		// 	echo json_encode(['status' => 'success']);
		// } else {
		// 	echo json_encode(['status' => 'error']);
		// }
		$id_unit = $this->input->post('id_unit');

		$this->pm->delete_data('pegawai_unit', 'id_unit', $id_unit);
		$this->session->set_flashdata('message', 'Unit Berhasil Dihapus.');
		return redirect('unit');
	}

	public function posisi_unit($id_unit)
	{
		$data['title'] = 'Data Posisi Unit';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['PosisiunitAll'] = $this->pm->posisi_unit($id_unit);
		$data['GetUnit'] = $this->pm->getId_data($id_unit, 'pegawai_unit', 'id_unit');

		$this->form_validation->set_rules('nama_posisi', 'Nama Posisi Unit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('unit/posisi_unit', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$dataPosisiUnit = [
				'nama_posisi' => htmlspecialchars($this->input->post('nama_posisi')),
				'unit_posisi_id' => $id_unit,
			];

			$this->pm->insert_data($dataPosisiUnit, 'pegawai_posisi_unit');
			$this->session->set_flashdata('message', 'Posisi Baru di Unit' . $data['GetUnit']['nama_unit'] . ' Berhasil Ditambahkan.');
			return redirect('unit/posisi_unit/' . $id_unit);
		}
	}

	public function edit_posisi_unit($id_unit, $id_posisi_unit)
	{
		$data['title'] = 'Data Unit';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetPosisiUnit'] = $this->pm->getId_data($id_posisi_unit, 'pegawai_posisi_unit', 'id_posisi_unit');
		// $id_unit = $data['GetPosisiUnit']['posisi_unit_id'];
		$data['GetUnit'] = $this->pm->getId_data($id_unit, 'pegawai_unit', 'id_unit');

		$this->form_validation->set_rules('nama_posisi_edit', 'Nama Posisi Unit', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('unit/posisi_unit', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$dataUnit = [
				'nama_posisi' => htmlspecialchars($this->input->post('nama_posisi_edit')),
			];

			$this->pm->update_data('id_posisi_unit', $id_posisi_unit, 'pegawai_posisi_unit', $dataUnit);
			$this->session->set_flashdata('message', 'Posisi di Unit' . $data['GetUnit']['nama_unit'] . ' Berhasil Diubah.');
			return redirect('unit/posisi_unit/' . $id_unit);
		}
	}

	public function hapus_posisi_unit($id_unit, $id_posisi_unit)
	{
		// $id_unit = $this->input->post('id_unit');
		$data['GetUnit'] = $this->pm->getId_data($id_unit, 'pegawai_unit', 'id_unit');

		$this->pm->delete_data('pegawai_posisi_unit', 'id_posisi_unit', $id_posisi_unit);
		$this->session->set_flashdata('message', 'Posisi di Unit' . $data['GetUnit']['nama_unit'] . ' Berhasil Dihapus.');
		return redirect('unit/posisi_unit/' . $id_unit);
	}
}
