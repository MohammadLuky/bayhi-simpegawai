<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menurekrutmen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		$IDPegawai = $this->pm->get_status_pegawai($this->session->userdata('username'));
		if ($IDPegawai['status_pegawai_id'] != 4) {
			is_login(array('1', '5'));
		}
		// elseif ($IDPegawai['status_pegawai_id'] == 4) {
		// 	is_login_rekrutmen(array('1', '8'));
		// }
		// is_login_rekrutmen(array('1', '5'));
	}

	public function index()
	{
		$data['title'] = 'Kebutuhan Rekrutmen';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['posisi'] = $this->pm->show_data('pegawai_role_user');
		$data['unit'] = $this->pm->show_data('pegawai_unit');
		$data['mapel'] = $this->pm->show_data('pegawai_mapel_guru');
		$data['kebutuhan_rekrutmen'] = $this->pm->data_kebutuhan_rekurtmen();
		$data['jumlah_kebrek'] = $this->pm->hitung_kebrek_tahun_ini();

		$this->form_validation->set_rules('kebutuhan_role_id', 'Posisi', 'required|trim');
		$this->form_validation->set_rules('tahun_rekrutmen', 'Tahun Rekrutmen', 'required|trim');
		$this->form_validation->set_rules('kebutuhan_kuota', 'Kebutuhan Rekrutmen', 'required|trim');
		$this->form_validation->set_rules('kebutuhan_ket', 'Keterangan/Alasan Kebutuhan Rekrutmen', 'required|trim');
		if ($this->input->post('kebutuhan_role_id') == '7') {
			$this->form_validation->set_rules('kebutuhan_unit_id', 'Unit', 'required|trim');
		} else if ($this->input->post('kebutuhan_role_id') == '8') {
			$this->form_validation->set_rules('kebutuhan_mapel_id', 'Mata Pelajaran', 'required|trim');
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('menu_rekrutmen/index2', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);

			// $this->load->view('manage_rekrutmen/template_header', $data);
			// $this->load->view('manage_rekrutmen/template_sidebar', $data);
			// $this->load->view('menu_rekrutmen/index', $data);
			// $this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$unit = $this->input->post('kebutuhan_unit_id');
			$mapel = $this->input->post('kebutuhan_mapel_id');

			if ($unit) {
				$dataKebutuhanRek = [
					'kebutuhan_role_id' => htmlspecialchars($this->input->post('kebutuhan_role_id')),
					'tahun_rekrutmen' => htmlspecialchars($this->input->post('tahun_rekrutmen')),
					'kebutuhan_kuota' => htmlspecialchars($this->input->post('kebutuhan_kuota')),
					'kebutuhan_ket' => htmlspecialchars($this->input->post('kebutuhan_ket')),
					'keb_rek_aktif' => 0,
					'kebutuhan_unit_id' => htmlspecialchars($unit),
					'kebutuhan_mapel_id' => '',
				];
			} else if ($mapel) {
				$dataKebutuhanRek = [
					'kebutuhan_role_id' => htmlspecialchars($this->input->post('kebutuhan_role_id')),
					'tahun_rekrutmen' => htmlspecialchars($this->input->post('tahun_rekrutmen')),
					'kebutuhan_kuota' => htmlspecialchars($this->input->post('kebutuhan_kuota')),
					'kebutuhan_ket' => htmlspecialchars($this->input->post('kebutuhan_ket')),
					'keb_rek_aktif' => 0,
					'kebutuhan_unit_id' => '',
					'kebutuhan_mapel_id' => htmlspecialchars($mapel),
				];
			}

			$this->pm->insert_data($dataKebutuhanRek, 'pegawai_kebutuhan_rekrutmen');
			$this->session->set_flashdata('message', 'Data Kebutuhan Rekrutmen Berhasil Ditambah');
			return redirect('menurekrutmen');
		}
	}

	public function kebrek_aktif()
	{
		$id_kebutuhan_rekrutmen = $this->input->post('id_kebrek_aktif');

		$data_Aktivasi = [
			'keb_rek_aktif' => 1
		];
		$this->pm->update_data('id_kebutuhan_rekrutmen', $id_kebutuhan_rekrutmen, 'pegawai_kebutuhan_rekrutmen', $data_Aktivasi);
		$this->session->set_flashdata('message', 'Data Kebutuhan Rekrutmen Berhasil Diaktifkan');
		return redirect('menurekrutmen');
	}

	public function kebrek_nonaktif()
	{
		$id_kebutuhan_rekrutmen = $this->input->post('id_kebrek_nonaktif');

		$data_Aktivasi = [
			'keb_rek_aktif' => 0
		];
		$this->pm->update_data('id_kebutuhan_rekrutmen', $id_kebutuhan_rekrutmen, 'pegawai_kebutuhan_rekrutmen', $data_Aktivasi);
		$this->session->set_flashdata('message', 'Data Kebutuhan Rekrutmen Berhasil Dinon-aktifkan');
		return redirect('menurekrutmen');
	}

	public function hapus_kebutuhan_rekrutmen()
	{
		$id_kebutuhan_rekrutmen = $this->input->post('id_kebutuhan_rekrutmen');
		if ($this->pm->delete_data('pegawai_kebutuhan_rekrutmen', 'id_kebutuhan_rekrutmen', $id_kebutuhan_rekrutmen)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function tahap_rekrutmen()
	{
		$data['title'] = 'Tahap Rekrutmen';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tahap_rekrutmen'] = $this->pm->show_data('pegawai_tahap_rekrutmen');

		$this->form_validation->set_rules('tahap_rekrutmen', 'Nama Tahap Seleksi', 'required|trim');
		// $this->form_validation->set_rules('jadwal_tahap', 'Jadwal Pelaksanaan', 'required|trim');
		// $this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
		// $this->form_validation->set_rules('ket_tahap', 'Keterangan Tahap Seleksi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('menu_rekrutmen/tahap_rekrutmen2', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);

			// $this->load->view('manage_rekrutmen/template_header', $data);
			// $this->load->view('manage_rekrutmen/template_sidebar', $data);
			// $this->load->view('menu_rekrutmen/tahap_rekrutmen', $data);
			// $this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$dataSeleksi = [
				'tahap_rekrutmen' => htmlspecialchars($this->input->post('tahap_rekrutmen')),
				'jadwal_tahap' => htmlspecialchars($this->input->post('jadwal_tahap')),
				'waktu_pelaksanaan' => htmlspecialchars($this->input->post('waktu_pelaksanaan')),
				'ket_tahap' => htmlspecialchars($this->input->post('ket_tahap')),
			];

			$this->pm->insert_data($dataSeleksi, 'pegawai_tahap_rekrutmen');
			$this->session->set_flashdata('message', 'Tahapan Seleksi Telah Ditambahkan');
			return redirect('menurekrutmen/tahap_rekrutmen');
		}
	}

	public function edit_tahap_rekrutmen($id_tahap_rekrutmen)
	{
		$data['title'] = 'Tahap Rekrutmen';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tahap_rekrutmen'] = $this->pm->show_data('pegawai_tahap_rekrutmen');

		$this->form_validation->set_rules('tahap_rekrutmen_edit', 'Nama Tahap Seleksi', 'required|trim');
		$this->form_validation->set_rules('jadwal_tahap_edit', 'Jadwal Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('waktu_pelaksanaan_edit', 'Waktu Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('ket_tahap_edit', 'Keterangan Tahap Seleksi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('menu_rekrutmen/tahap_rekrutmen2', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);

			// $this->load->view('manage_rekrutmen/template_header', $data);
			// $this->load->view('manage_rekrutmen/template_sidebar', $data);
			// $this->load->view('menu_rekrutmen/tahap_rekrutmen', $data);
			// $this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$dataSeleksi = [
				'tahap_rekrutmen' => htmlspecialchars($this->input->post('tahap_rekrutmen_edit')),
				'jadwal_tahap' => htmlspecialchars($this->input->post('jadwal_tahap_edit')),
				'waktu_pelaksanaan' => htmlspecialchars($this->input->post('waktu_pelaksanaan_edit')),
				'ket_tahap' => htmlspecialchars($this->input->post('ket_tahap_edit')),
			];

			$this->pm->update_data('id_tahap_rekrutmen', $id_tahap_rekrutmen, 'pegawai_tahap_rekrutmen', $dataSeleksi);
			$this->session->set_flashdata('message', 'Tahapan Seleksi Telah Diubah');
			return redirect('menurekrutmen/tahap_rekrutmen');
		}
	}

	public function hapus_tahap_rekrutmen()
	{
		$id_tahap_rekrutmen = $this->input->post('id_tahap_rekrutmen');
		if ($this->pm->delete_data('pegawai_tahap_rekrutmen', 'id_tahap_rekrutmen', $id_tahap_rekrutmen)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function riwayat_rekrutmen()
	{
		$data['title'] = 'Riwayat Seleksi Pelamar';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tahap_rekrutmen'] = $this->pm->show_data('pegawai_tahap_rekrutmen');
		// $data['pelamarAll'] = $this->pm->data_Allpelamar();
		$data['pelamarAll'] = $this->pm->pelamar_kirimData();
		$data['status_hisrek'] = $this->pm->data_status_seleksi();
		$data['history_seleksi'] = $this->pm->Alltahap_seleksi();

		$this->form_validation->set_rules('pegawai_id_hisrek[]', 'Nama Pelamar', 'required|trim');
		$this->form_validation->set_rules('tahap_id_hisrek', 'Tahap Seleksi', 'required|trim');
		$this->form_validation->set_rules('status_hisrek', 'Status', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('menu_rekrutmen/riwayat_rekrutmen2', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);

			// $this->load->view('manage_rekrutmen/template_header', $data);
			// $this->load->view('manage_rekrutmen/template_sidebar', $data);
			// $this->load->view('menu_rekrutmen/riwayat_rekrutmen', $data);
			// $this->load->view('manage_rekrutmen/template_footer', $data);
		} else {

			$datamultiple_pelamar = array();
			$pegawai_id_hisreks = $this->input->post('pegawai_id_hisrek');
			$tahap_id_hisrek = htmlspecialchars($this->input->post('tahap_id_hisrek'));
			$status_hisrek = htmlspecialchars($this->input->post('status_hisrek'));

			foreach ($pegawai_id_hisreks as $pelamar) {
				$datamultiple_pelamar[] = array(
					'pegawai_id_hisrek' => $pelamar,
					'tahap_id_hisrek' => $tahap_id_hisrek,
					'status_hisrek' => $status_hisrek
					// 'tahap_id_hisrek' => htmlspecialchars($this->input->post('tahap_id_hisrek')),
					// 'status_hisrek' => htmlspecialchars($this->input->post('status_hisrek'))
				);
			}

			$this->pm->insert_data_batch($datamultiple_pelamar, 'pegawai_history_rekrutmen');
			$this->session->set_flashdata('message', 'Tahapan Seleksi Telah Ditambahkan');
			return redirect('menurekrutmen/riwayat_rekrutmen');
		}
	}

	public function nilai_rekrutmen() {}
}
