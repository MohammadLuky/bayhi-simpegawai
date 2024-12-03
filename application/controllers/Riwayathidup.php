<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayathidup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login_rekrutmen(array('1', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Riwayat Hidup';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan($this->session->userdata('username'));
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan($this->session->userdata('username'));
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi($this->session->userdata('username'));
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek($this->session->userdata('username'));
		$data['berkas_pelamar'] = $this->pm->getId_data($data['pelamar']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');

		$tahap_seleksi = $this->pm->show_data('pegawai_tahap_rekrutmen');

		if (count($tahap_seleksi) > 1) {
			$data['tahap_rekrutmen'] = array_slice($tahap_seleksi, 1, 1);
		} else {
			$data['tahap_rekrutmen'] = [];
		}

		// var_dump($data['tahap_rekrutmen']);
		// die;


		$this->load->view('manage_rekrutmen/template_header', $data);
		$this->load->view('manage_rekrutmen/template_sidebar', $data);
		$this->load->view('riwayat_hidup/index', $data);
		$this->load->view('manage_rekrutmen/template_footer', $data);
	}

	public function print_cv()
	{
		$data['title'] = 'Daftar Riwayat Hidup';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan($this->session->userdata('username'));
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan($this->session->userdata('username'));
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi($this->session->userdata('username'));
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek($this->session->userdata('username'));
		$data['berkas_pelamar'] = $this->pm->getId_data($data['pelamar']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');


		$this->load->view('riwayat_hidup/print_cv2', $data);

		// $this->load->view('manage_rekrutmen/template_header', $data);
		// $this->load->view('manage_rekrutmen/template_sidebar', $data);
		// $this->load->view('riwayat_hidup/print_cv', $data);
		// $this->load->view('manage_rekrutmen/template_footer', $data);
	}

	public function kirim_lamaran()
	{
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$id_pegawai = $data['pelamar']['id_pegawai'];
		$input_id_tahap = $this->input->post('input_id_tahap');
		$progres_lamaran = ['progres_lamaran' => 1];

		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $progres_lamaran);
		$dataTahapSeleksi = [
			'pegawai_id_hisrek' => $id_pegawai,
			'tahap_id_hisrek' => $input_id_tahap,
			'status_hisrek' => 2,
		];
		$this->pm->insert_data($dataTahapSeleksi, 'pegawai_history_rekrutmen');

		$this->session->set_flashdata('message', 'Lamaran Pekerjaan anda telah terkirim.');
		return redirect('riwayathidup');

		// $id_pegawai = $this->input->post('id_pegawai');

		// if ($this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $progres_lamaran)) {
		// 	$this->pm->insert_data($dataTahapSeleksi, 'pegawai_history_rekrutmen');
		// 	echo json_encode(['status' => 'success']);
		// } else {
		// 	echo json_encode(['status' => 'error']);
		// }
	}
}
