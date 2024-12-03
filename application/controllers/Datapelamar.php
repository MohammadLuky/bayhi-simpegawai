<?php
require FCPATH . 'vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datapelamar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		$IDPegawai = $this->pm->get_status_pegawai($this->session->userdata('username'));
		if ($IDPegawai['status_pegawai_id'] != 4) {
			is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
		} elseif ($IDPegawai['status_pegawai_id'] == 4) {
			is_login_rekrutmen(array('7', '8'));
		}
		// is_login_rekrutmen(array('1', '7', '8'));
	}

	public function index()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Data Pelamar';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['provinsi'] = $this->pm->show_data('pegawai_data_provinsi');
		$data['agama'] = $this->pm->show_data('pegawai_agama');
		$data['status_perkawinan'] = ['Kawin', 'Belum Kawin', 'Duda/Janda'];
		$data['jenis_kelamin'] = ['Laki - Laki', 'Perempuan'];
		$data['pendidikan'] = $this->pm->show_data('pegawai_pendidikan');
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan($this->session->userdata('username'));
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan($this->session->userdata('username'));
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi($this->session->userdata('username'));
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek($this->session->userdata('username'));
		$tahun = date('Y');
		$data['staffs'] = $this->pm->kebutuhan_byposisi('7', $tahun);
		$data['gurus'] = $this->pm->kebutuhan_byposisi('8', $tahun);
		$cek_domisili = htmlspecialchars($this->input->post('cek_domisili'));

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nik_pelamar', 'NIK KTP', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		if (empty($data['pelamar']['alamat'])) {
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('kel_rekrutmen', 'Kelurahan', 'required|trim');
		}
		if (empty($cek_domisili)) {
			if (empty($data['pelamar']['alamat_domisili'])) {
				$this->form_validation->set_rules('alamat_domisili', 'Alamat Domisili', 'required|trim');
				$this->form_validation->set_rules('kel_rek_domisili', 'Kelurahan', 'required|trim');
			}
		}
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required|trim');
		$this->form_validation->set_rules('no_wa_telp', 'Nomor WA/Telp', 'required|trim');
		if ($data['pelamar']['role_id'] == 7) {
			$this->form_validation->set_rules('pilih_unit', 'Unit', 'required|trim');
		} elseif ($data['pelamar']['role_id'] == 8) {
			$this->form_validation->set_rules('pilih_mapel', 'Mata Pelajaran', 'required|trim');
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/index', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			if (empty($data['pelamar']['alamat']) || empty($data['pelamar']['alamat_domisili'])) {
				if ($cek_domisili) {
					$dataPegawai = [
						'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
						'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
						'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
						'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
						'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_pegawai' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'alamat_domisili' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_domisili' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'agama_id' => htmlspecialchars($this->input->post('agama')),
						'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
						'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
						'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
						'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
						'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
					];
				} else {
					$dataPegawai = [
						'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
						'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
						'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
						'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
						'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_pegawai' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'alamat_domisili' => htmlspecialchars($this->input->post('alamat_domisili')),
						'kel_id_domisili' => htmlspecialchars($this->input->post('kel_rek_domisili')),
						'agama_id' => htmlspecialchars($this->input->post('agama')),
						'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
						'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
						'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
						'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
						'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
					];
				}
			} else {
				$dataPegawai = [
					'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
					'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
					'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
					'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
					'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
					'agama_id' => htmlspecialchars($this->input->post('agama')),
					'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
					'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
					'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
					'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
					'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
				];
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataPegawai);
			$this->session->set_flashdata('message', 'Data Diri Telah Diperbarui');
			return redirect('datapelamar');
		}
	}

	public function edit_alamat()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$id_pegawai = $data['pelamar']['id_pegawai'];

		$dataAlamat = [
			'alamat' => '',
			'kel_id_pegawai' => 0,
			'alamat_domisili' => '',
			'kel_id_domisili' => 0,
		];

		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataAlamat);
		return redirect('datapelamar');
	}

	public function riwayat_pendidikan()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Input Riwayat Pendidikan';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['pendidikan'] = $this->pm->show_data('pegawai_pendidikan');

		$this->form_validation->set_rules('jenjang_pend', 'Jenjang Pendidikan', 'required|trim');
		$this->form_validation->set_rules('instansi_pendidikan', 'Nama Sekolah/Perguruan Tinggi', 'required|trim');
		$this->form_validation->set_rules('program_studi', 'Jurusan/Program Studi', 'required|trim');
		$this->form_validation->set_rules('tahun_lulus', 'Pilih Tahun', 'required|trim');
		$this->form_validation->set_rules('ipk', 'Nilai', 'required|trim');
		$this->form_validation->set_rules('valid_pend_terakhir', 'Validasi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/input_riwayat_pendidikan', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {

			$config['upload_path'] = './assets/file_ijazah/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 512;
			$config['file_name'] = $data['pelamar']['id_pegawai'] . '_' . htmlspecialchars($this->input->post('instansi_pendidikan')) . '_Ijazah-Transkrip_' . $data['pelamar']['nama_lengkap'] . '-' . $data['pelamar']['nama_unit'];

			$this->load->library('upload', $config);
			// $this->upload->initialize($config);
			if (!$this->upload->do_upload('ijazah_transkrip_pdf')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				return redirect('datapelamar/riwayat_pendidikan');
			} else {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$id_pegawai = $data['pelamar']['id_pegawai'];
				$validasi_pend_terakhir = $this->input->post('valid_pend_terakhir');

				if ($validasi_pend_terakhir) {

					$dataPendidikan = [
						'pegawai_id_hispen' => $id_pegawai,
						'pendidikan_pegawai_id' => htmlspecialchars($this->input->post('jenjang_pend')),
						'program_studi' => htmlspecialchars($this->input->post('program_studi')),
						'instansi_pendidikan' => htmlspecialchars($this->input->post('instansi_pendidikan')),
						'tahun_lulus' => htmlspecialchars($this->input->post('tahun_lulus')),
						'ipk' => htmlspecialchars($this->input->post('ipk')),
						'ijazah_transkrip_pdf' => $file_name,
					];

					$this->pm->insert_data($dataPendidikan, 'pegawai_history_pendidikan');


					$pilih_pend = $this->db->insert_id();

					$PendidikanTerpilih = array(
						'pend_aktif_id' => $pilih_pend
					);
					$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $PendidikanTerpilih);
					$this->session->set_flashdata('message', 'Riwayat Pendidikan Telah Ditambahkan');
					return redirect('datapelamar');
				} else {
					$dataPendidikan = [
						'pegawai_id_hispen' => $id_pegawai,
						'pendidikan_pegawai_id' => htmlspecialchars($this->input->post('jenjang_pend')),
						'program_studi' => htmlspecialchars($this->input->post('program_studi')),
						'instansi_pendidikan' => htmlspecialchars($this->input->post('instansi_pendidikan')),
						'tahun_lulus' => htmlspecialchars($this->input->post('tahun_lulus')),
						'ipk' => htmlspecialchars($this->input->post('ipk')),
						'ijazah_transkrip_pdf' => $file_name,
					];

					$this->pm->insert_data($dataPendidikan, 'pegawai_history_pendidikan');
					$this->session->set_flashdata('message', 'Riwayat Pendidikan Telah Ditambahkan');
					return redirect('datapelamar');
				}
			}
		}
	}

	// public function pilih_pendidikan_aktif()
	// {
	// 	$data['title'] = 'Data Pelamar';
	// 	$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));

	// 	$this->form_validation->set_rules('pend_aktif_id', 'Pilih Pendidikan Terakhir Anda', 'required');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('manage_rekrutmen/template_header', $data);
	// 		$this->load->view('manage_rekrutmen/template_sidebar', $data);
	// 		$this->load->view('data_pelamar/index', $data);
	// 		$this->load->view('manage_rekrutmen/template_footer', $data);
	// 	} else {
	// 		$id_pegawai = $data['pelamar']['id_pegawai'];
	// 		$pilih_pend = $this->input->post('pend_aktif_id');
	// 		$PendidikanTerpilih = array(
	// 			'pend_aktif_id' => $pilih_pend
	// 		);
	// 		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $PendidikanTerpilih);
	// 		$this->session->set_flashdata('message', 'Pendidikan terakhir Telah Terpilih.');
	// 		return redirect('datapelamar');
	// 	}
	// }

	public function hapus_riwayat_pendidikan()
	{
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$id_history_pendidikan = $this->input->post('id_history_pendidikan');

		if ($data['pelamar']['pend_aktif_id'] == $id_history_pendidikan) {
			$id_pegawai = $data['pelamar']['id_pegawai'];
			$datapendidikan = 0;

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', array('pend_aktif_id' => $datapendidikan));

			$file = $this->pm->getId_data($id_history_pendidikan, 'pegawai_history_pendidikan', 'id_history_pendidikan');

			if ($file) {

				$upload_path = './assets/file_ijazah/';
				$nama_file = $file['ijazah_transkrip_pdf'];
				$file_path = $upload_path . $nama_file;
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}

			$this->pm->delete_data('pegawai_history_pendidikan', 'id_history_pendidikan', $id_history_pendidikan);
			$this->session->set_flashdata('message', 'Riwayat Pendidikan Berhasil Dihapus');
			return redirect('datapelamar');
		} else {

			$file = $this->pm->getId_data($id_history_pendidikan, 'pegawai_history_pendidikan', 'id_history_pendidikan');

			if ($file) {

				$upload_path = './assets/file_ijazah/';
				$nama_file = $file['ijazah_transkrip_pdf'];
				$file_path = $upload_path . $nama_file;
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}

			$this->pm->delete_data('pegawai_history_pendidikan', 'id_history_pendidikan', $id_history_pendidikan);
			$this->session->set_flashdata('message', 'Riwayat Pendidikan Berhasil Dihapus');
			return redirect('datapelamar');
		}
	}

	public function riwayat_pekerjaan()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Input Riwayat Pekerjaan';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		// $data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan($this->session->userdata('username'));

		$this->form_validation->set_rules('tempat_kerja', 'Nama Tempat Kerja', 'required|trim');
		$this->form_validation->set_rules('posisi_pekerjaan', 'Posisi Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('tahun_awal_bekerja', 'Tahun Awal Bekerja', 'required|trim');
		$this->form_validation->set_rules('tahun_akhir_bekerja', 'Tahun Akhir Bekerja', 'required|trim');
		$this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/input_riwayat_pekerjaan', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			$dataPekerjaan = [
				'pegawai_id_hispek' => $id_pegawai,
				'tempat_kerja' => htmlspecialchars($this->input->post('tempat_kerja')),
				'posisi_pekerjaan' => htmlspecialchars($this->input->post('posisi_pekerjaan')),
				'tahun_awal_bekerja' => htmlspecialchars($this->input->post('tahun_awal_bekerja')),
				'tahun_akhir_bekerja' => htmlspecialchars($this->input->post('tahun_akhir_bekerja')),
				'deskripsi_pekerjaan' => htmlspecialchars($this->input->post('deskripsi_pekerjaan')),
			];

			$this->pm->insert_data($dataPekerjaan, 'pegawai_history_pekerjaan');
			$this->session->set_flashdata('message', 'Riwayat Pekerjaan Telah Ditambahkan');
			return redirect('datapelamar');
		}
	}

	public function hapus_riwayat_pekerjaan()
	{
		$id_history_pekerjaan = $this->input->post('id_history_pekerjaan');
		if ($this->pm->delete_data('pegawai_history_pekerjaan', 'id_history_pekerjaan', $id_history_pekerjaan)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function riwayat_organisasi()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Input Riwayat Organisasi';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tingkatan'] = $this->pm->show_data('pegawai_data_tingkatan');

		$this->form_validation->set_rules('tingkat_organisasi_id', 'Tingkat Organisasi', 'required|trim');
		$this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('tahun_awal_jabat', 'Tahun Awal Menjabat', 'required|trim');
		$this->form_validation->set_rules('tahun_akhir_jabat', 'Tahun Akhir Menjabat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/input_riwayat_organisasi', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			$dataOrganisasi = [
				'pegawai_id_hisor' => $id_pegawai,
				'tingkat_organisasi_id' => htmlspecialchars($this->input->post('tingkat_organisasi_id')),
				'nama_organisasi' => htmlspecialchars($this->input->post('nama_organisasi')),
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'tahun_awal_jabat' => htmlspecialchars($this->input->post('tahun_awal_jabat')),
				'tahun_akhir_jabat' => htmlspecialchars($this->input->post('tahun_akhir_jabat')),
			];

			$this->pm->insert_data($dataOrganisasi, 'pegawai_history_organisasi');
			$this->session->set_flashdata('message', 'Riwayat Organisasi Telah Ditambahkan');
			return redirect('datapelamar');
		}
	}

	public function setting_akun()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Setting Akun';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));

		$this->form_validation->set_rules('password_baru', 'Password', 'required|trim|min_length[8]|matches[password_baru2]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek! Minimal 8 Karakter.'
		]);
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|matches[password_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/setting_akun', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			$dataPegawai = [
				'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
				'pass_tampil' => htmlspecialchars($this->input->post('password_baru')),
			];

			$this->pm->update_data('pegawai_id', $id_pegawai, 'pegawai_user', $dataPegawai);
			$this->session->set_flashdata('message', 'Password Telah Diperbarui');
			return redirect('datapelamar/setting_akun');
		}
	}

	public function hapus_riwayat_organisasi()
	{
		$id_history_organisasi = $this->input->post('id_history_organisasi');
		if ($this->pm->delete_data('pegawai_history_organisasi', 'id_history_organisasi', $id_history_organisasi)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function riwayat_proyek()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Input Riwayat Proyek';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['tingkatan'] = $this->pm->show_data('pegawai_data_tingkatan');

		$this->form_validation->set_rules('tingkat_proyek_id', 'Nama Tempat Kerja', 'required|trim');
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required|trim');
		$this->form_validation->set_rules('deskripsi_proyek', 'Deskripsi Proyek', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_rekrutmen/template_header', $data);
			$this->load->view('manage_rekrutmen/template_sidebar', $data);
			$this->load->view('data_pelamar/input_riwayat_proyek', $data);
			$this->load->view('manage_rekrutmen/template_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			$dataProyek = [
				'pegawai_id_hispro' => $id_pegawai,
				'tingkat_proyek_id' => htmlspecialchars($this->input->post('tingkat_proyek_id')),
				'nama_proyek' => htmlspecialchars($this->input->post('nama_proyek')),
				'deskripsi_proyek' => htmlspecialchars($this->input->post('deskripsi_proyek')),
			];

			$this->pm->insert_data($dataProyek, 'pegawai_history_proyek');
			$this->session->set_flashdata('message', 'Riwayat Proyek Telah Ditambahkan');
			return redirect('datapelamar');
		}
	}

	public function hapus_riwayat_proyek()
	{
		$id_history_proyek = $this->input->post('id_history_proyek');
		if ($this->pm->delete_data('pegawai_history_proyek', 'id_history_proyek', $id_history_proyek)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function upload_foto()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Upload Foto';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));

		$this->load->view('manage_rekrutmen/template_header', $data);
		$this->load->view('manage_rekrutmen/template_sidebar', $data);
		$this->load->view('data_pelamar/upload_foto', $data);
		$this->load->view('manage_rekrutmen/template_footer', $data);
	}

	public function uploadFile_foto()
	{
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));

		$config['upload_path'] = './assets/file_foto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 512;
		$config['file_name'] = uniqid();

		$this->load->library('upload', $config);
		// $this->upload->initialize($config);

		if (!$this->upload->do_upload('uploadImg')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			return redirect('datapelamar/upload_foto');
		} else {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$id_pegawai = $data['pelamar']['id_pegawai'];
			if ($id_pegawai['foto'] && file_exists('./assets/file_foto/' . $id_pegawai['foto'])) {
				unlink('./assets/file_foto/' . $id_pegawai['foto']);
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', array('foto' => $file_name));

			$this->session->set_flashdata('message', 'Foto Berhasil Diperbarui.');
			redirect('datapelamar/upload_foto');
		}
	}

	public function upload_berkas()
	{
		is_login_rekrutmen(array('7', '8'));
		$data['title'] = 'Upload Berkas Lamaran';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['berkas_pelamar'] = $this->pm->getId_data($data['pelamar']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('manage_rekrutmen/template_header', $data);
		$this->load->view('manage_rekrutmen/template_sidebar', $data);
		$this->load->view('data_pelamar/upload_berkas_pdf', $data);
		$this->load->view('manage_rekrutmen/template_footer', $data);
	}

	public function uploadall_berkas()
	{
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$id_pegawai = $data['pelamar']['id_pegawai'];
		$UnitID = $data['pelamar']['unit_kerja_id'];
		$berkaslama = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$files = array('file_lamaran_pdf', 'file_ktp_pdf', 'file_kk_pdf', 'file_komitmen_pdf', 'file_sertifikat_pdf', 'file_suket_sehat_pdf');
		$files_skck = array('file_lamaran_pdf', 'file_ktp_pdf', 'file_kk_pdf', 'file_komitmen_pdf', 'file_sertifikat_pdf', 'file_skck_pdf', 'file_suket_sehat_pdf');
		$upload_data = array();
		$uploadallberkas = true;

		if ($UnitID != 59) {
			foreach ($files as $file) {
				$config['upload_path'] = './assets/file_berkas/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 512;

				$new_file_name = $id_pegawai . '_berkas' . '-' . $data['pelamar']['nama_lengkap'];
				$config['file_name'] = $new_file_name;

				// $this->upload->initialize($config);

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload($file)) {
					if ($file != 'file_sertifikat_pdf') {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						$uploadallberkas = false;
						break;
					}
				} else {
					$upload_data[$file] = $this->upload->data('file_name');

					if (!empty($berkaslama[$file])) {
						$file_path = './assets/file_berkas/' . $berkaslama[$file];
						if (file_exists($file_path)) {
							unlink($file_path);
						}
					}
				}
			}

			if ($uploadallberkas) {
				$dataBerkas = array(
					'file_lamaran_pdf' => $upload_data['file_lamaran_pdf'],
					'file_ktp_pdf' => $upload_data['file_ktp_pdf'],
					'file_kk_pdf' => $upload_data['file_kk_pdf'],
					'file_komitmen_pdf' => $upload_data['file_komitmen_pdf'],
					'file_sertifikat_pdf' => $upload_data['file_sertifikat_pdf'],
					'file_suket_sehat_pdf' => $upload_data['file_suket_sehat_pdf'],
					'file_skck_pdf' => ''
				);
				$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);

				$this->session->set_flashdata('message', 'File Lamaran Berhasil Diunggah.');
			} else {
				foreach ($upload_data as $uploaded_file) {
					$file_path = './assets/file_berkas/' . $uploaded_file;
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			}
		} else {
			foreach ($files_skck as $file) {
				$config['upload_path'] = './assets/file_berkas/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 512;

				$new_file_name = $id_pegawai . '_berkas' . '-' . $data['pelamar']['nama_lengkap'];
				$config['file_name'] = $new_file_name;

				// $this->upload->initialize($config);

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload($file)) {
					if ($file != 'file_sertifikat_pdf') {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						$uploadallberkas = false;
						break;
					}
				} else {
					$upload_data[$file] = $this->upload->data('file_name');

					if (!empty($berkaslama[$file])) {
						$file_path = './assets/file_berkas/' . $berkaslama[$file];
						if (file_exists($file_path)) {
							unlink($file_path);
						}
					}
				}
			}

			if ($uploadallberkas) {
				$dataBerkas = array(
					'file_lamaran_pdf' => $upload_data['file_lamaran_pdf'],
					'file_ktp_pdf' => $upload_data['file_ktp_pdf'],
					'file_kk_pdf' => $upload_data['file_kk_pdf'],
					'file_komitmen_pdf' => $upload_data['file_komitmen_pdf'],
					'file_sertifikat_pdf' => $upload_data['file_sertifikat_pdf'],
					'file_suket_sehat_pdf' => $upload_data['file_suket_sehat_pdf'],
					'file_skck_pdf' => $upload_data['file_skck_pdf']
				);

				$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);

				$this->session->set_flashdata('message', 'File Lamaran Berhasil Diunggah.');
			} else {
				foreach ($upload_data as $uploaded_file) {
					$file_path = './assets/file_berkas/' . $uploaded_file;
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			}
		}

		redirect('datapelamar/upload_berkas');
	}

	public function hapusall_berkas()
	{
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$id_pegawai = $data['pelamar']['id_pegawai'];

		$berkas = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		if ($berkas) {
			$fields = array('file_lamaran_pdf', 'file_ktp_pdf', 'file_kk_pdf', 'file_komitmen_pdf', 'file_sertifikat_pdf', 'file_skck_pdf', 'file_suket_sehat_pdf');
			foreach ($fields as $field) {

				if (!empty($berkas[$field])) {
					$file_path = './assets/file_berkas/' . $berkas[$field];
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			}
			$dataBerkas = array(
				'file_lamaran_pdf' => '',
				'file_ktp_pdf' => '',
				'file_kk_pdf' => '',
				'file_komitmen_pdf' => '',
				'file_sertifikat_pdf' => '',
				'file_suket_sehat_pdf' => '',
				'file_skck_pdf' => ''
			);
		}

		$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);

		$this->session->set_flashdata('message', 'File Lamaran Berhasil Dihapus.');
		redirect('datapelamar/upload_berkas');
	}

	public function getKota_byProv()
	{
		$id_prov = $this->input->post('id_prov');
		$data_kota = $this->pm->getdata_byID('pegawai_data_kota_kab', 'prov_id', $id_prov);
		echo json_encode($data_kota);
	}

	public function getKec_byKota()
	{
		$id_kota = $this->input->post('id_kota');
		$data_kec = $this->pm->getdata_byID('pegawai_data_kecamatan', 'kota_kab_id', $id_kota);
		echo json_encode($data_kec);
	}

	public function getKel_byKec()
	{
		$id_kec = $this->input->post('id_kec');
		$data_kel = $this->pm->getdata_byID('pegawai_data_kelurahan', 'kec_id', $id_kec);
		echo json_encode($data_kel);
	}

	public function daftar_pelamar()
	{
		$data['title'] = 'Daftar Pelamar';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['pelamarAll'] = $this->pm->data_Allpelamar();

		// $this->load->view('manage_rekrutmen/template_header', $data);
		// $this->load->view('manage_rekrutmen/template_sidebar', $data);
		// $this->load->view('data_pelamar/daftar_pelamar', $data);
		// $this->load->view('manage_rekrutmen/template_footer', $data);
		if ($data['pegawai']['status_pegawai_id'] != 4) {
			is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pelamar/daftar_pelamar2', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			redirect('rekrutmen/blocked');
		}
	}

	public function rekap_pelamar()
	{
		$title = 'Daftar Pelamar';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		// $pelamarAll = $this->pm->data_Allpelamar();
		$tahun_ini = date('Y');
		$pelamarAll = $this->pm->filter_Allpelamar($tahun_ini);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$pathLogo = base_url('assets/bayhi_logo.png');
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
		$drawing->setName('Logo');
		$drawing->setDescription('Logo');
		$drawing->setImageResource(imagecreatefrompng($pathLogo));
		$drawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_PNG);
		$drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_PNG);
		$drawing->setWidth(105);
		$drawing->setHeight(105);
		$drawing->setCoordinates('B1');
		$drawing->setWorksheet($sheet);


		$sheet->mergeCells('A1:I1');
		$sheet->setCellValue('A1', $title);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
		$sheet->mergeCells('A2:I2');
		$sheet->setCellValue('A2', 'Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah');
		$sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);
		$sheet->mergeCells('A3:I3');
		$sheet->setCellValue('A3', 'Tahun ' . $tahun_ini);
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A3')->getFont()->setBold(true)->setSize(13);

		$headerData = array(
			'A6' => array('No', 7),
			'B6' => array('Nama Pelamar', 50),
			'C6' => array('Alamat KTP Pelamar', 150),
			'D6' => array('Alamat Domisili Pelamar', 150),
			'E6' => array('Posisi Dilamar', 35),
			'F6' => array('Pendidikan Terakhir', 35),
			'G6' => array('Nama Sekolah', 40),
			'H6' => array('IPK/Nilai Ujian Akhir', 20),
			'I6' => array('Umur', 20)
		);

		foreach ($headerData as $cell => $data) {
			$sheet->setCellValue($cell, $data[0])->getColumnDimension(substr($cell, 0, 1))->setWidth($data[1]);
			$sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle($cell)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			// $sheet->getStyle($cell)->getFill()->getStartColor()->setARGB('60e690');
			$sheet->getStyle($cell)->getFill()->getStartColor()->setARGB('7AF2F6');
			$sheet->getStyle($cell)->getAlignment()->setWrapText(true);
			$sheet->getStyle($cell)->getFont()->setBold(true)->setSize(12);
		}


		$borderStyle = [
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => '00000000'],
				],
				'inside' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => '00000000']
				]
			],
		];

		$sheet->getStyle('A6:I6')->applyFromArray($borderStyle);

		$row = 7;
		$a = 1;
		foreach ($pelamarAll as $item) {
			$sheet->setCellValue('A' . $row, $a++);
			$sheet->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('B' . $row, $item['nama_lengkap']);
			$sheet->setCellValue('C' . $row, $item['alamat'] . ' Kelurahan ' . $item['nama_kelurahan_pelamar'] . ' Kecamatan ' . $item['nama_kecamatan_pelamar'] . ' ' . $item['nama_kotakab_pelamar']);
			$sheet->setCellValue('D' . $row, $item['alamat'] . ' Kelurahan ' . $item['nama_kelurahan_pelamar'] . ' Kecamatan ' . $item['nama_kecamatan_pelamar'] . ' ' . $item['nama_kotakab_pelamar']);
			if ($item['role_id'] != 8) {
				$sheet->setCellValue('E' . $row, $item['nama_unit']);
				$sheet->getStyle('E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			} elseif ($item['role_id'] == 8) {
				$sheet->setCellValue('E' . $row, $item['ket_role'] . ' - ' . $item['mata_pelajaran']);
				$sheet->getStyle('E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			}
			$sheet->setCellValue('F' . $row, $item['tingkat_pendidikan'] . ' ' . $item['program_studi']);
			$sheet->getStyle('F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('G' . $row, $item['instansi_pendidikan']);
			$sheet->getStyle('G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('H' . $row, $item['ipk']);
			$sheet->getStyle('H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$age = calculate_age($item['tanggal_lahir']);
			$sheet->setCellValue('I' . $row, $age !== null ? $age . ' Tahun' : 'Tanggal Belum Diisi');
			$sheet->getStyle('I')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

			$sheet->getStyle('A' . $row . ':I' . $row)->applyFromArray($borderStyle);

			$row++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = $title  . ' - Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah - ' . $tahun_ini . '.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function data_individu($id_pegawai)
	{
		$data['title'] = 'Data Individu Pelamar';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['individu'] = $this->pm->data_individu_pelamar($id_pegawai);
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan_individu($id_pegawai);
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan_individu($id_pegawai);
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi_individu($id_pegawai);
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek_individu($id_pegawai);
		$data['berkas_pelamar'] = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');
		$data['tahap_rekrutmen'] = $this->pm->show_data('pegawai_tahap_rekrutmen');
		$data['status_hisrek'] = $this->pm->data_status_seleksi();
		$data['history_seleksi'] = $this->pm->riwayat_seleksi($id_pegawai);

		// $this->load->view('manage_rekrutmen/template_header', $data);
		// $this->load->view('manage_rekrutmen/template_sidebar', $data);
		// $this->load->view('data_pelamar/data_individu', $data);
		// $this->load->view('manage_rekrutmen/template_footer', $data);
		if ($data['pegawai']['status_pegawai_id'] != 4) {
			is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
			$this->form_validation->set_rules('tahap_id_hisrek', 'Tahap Seleksi', 'required|trim');
			$this->form_validation->set_rules('status_hisrek', 'Status', 'required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('manage_pegawai/pegawai_header', $data);
				$this->load->view('manage_pegawai/pegawai_sidebar', $data);
				$this->load->view('data_pelamar/data_individu2', $data);
				$this->load->view('manage_pegawai/pegawai_footer', $data);
			} else {
				$tahap_id_hisrek = htmlspecialchars($this->input->post('tahap_id_hisrek'));
				$status_hisrek = htmlspecialchars($this->input->post('status_hisrek'));
				// var_dump($status_hisrek);
				// die;

				if ($status_hisrek == 0) {
					$progres_lamaran = ['progres_lamaran' => 99];
					$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $progres_lamaran);
				}

				$dataSeleksi = [
					'pegawai_id_hisrek' => $id_pegawai,
					'tahap_id_hisrek' => $tahap_id_hisrek,
					'status_hisrek' => $status_hisrek
				];

				$this->pm->insert_data($dataSeleksi, 'pegawai_history_rekrutmen');
				$this->session->set_flashdata('message', 'Tahapan Seleksi Telah Ditambahkan');
				return redirect('datapelamar/data_individu/' . $id_pegawai);
			}
		} else {
			redirect('rekrutmen/blocked');
		}
	}

	public function diterima_pegawai()
	{
		$id_pegawai = $this->input->post('pelamar_id_validasi');
		$dataPegawai = [
			'status_pegawai_id' => 3,
			'aktif_pegawai' => 2, // untuk aktivasi data primer
		];

		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataPegawai);
		$this->session->set_flashdata('message', 'Selamat, pegawai baru berhasil ditambahkan dan diterima.');
		return redirect('datapelamar/daftar_pelamar');
	}

	public function print_cv_individu($id_pegawai)
	{
		$data['title'] = 'Data Individu Pelamar';
		$data['pelamar'] = $this->pm->data_pelamar($this->session->userdata('username'));
		$data['individu'] = $this->pm->data_individu_pelamar($id_pegawai);
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan_individu($id_pegawai);
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan_individu($id_pegawai);
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi_individu($id_pegawai);
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek_individu($id_pegawai);
		$data['berkas_pelamar'] = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('data_pelamar/print_cv_individu', $data);
	}

	public function editdata_pelamar($id_pegawai)
	{
		$data['title'] = 'Edit Data Pelamar';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['pelamar'] = $this->pm->data_individu_pelamar($id_pegawai);
		$data['provinsi'] = $this->pm->show_data('pegawai_data_provinsi');
		$data['agama'] = $this->pm->show_data('pegawai_agama');
		$data['status_perkawinan'] = ['Kawin', 'Belum Kawin', 'Duda/Janda'];
		$data['jenis_kelamin'] = ['Laki - Laki', 'Perempuan'];
		$data['pendidikan'] = $this->pm->show_data('pegawai_pendidikan');
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan($this->session->userdata('username'));
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan($this->session->userdata('username'));
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi($this->session->userdata('username'));
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek($this->session->userdata('username'));
		$tahun = date('Y');
		$data['staffs'] = $this->pm->kebutuhan_byposisi('7', $tahun);
		$data['gurus'] = $this->pm->kebutuhan_byposisi('8', $tahun);
		$cek_domisili = htmlspecialchars($this->input->post('cek_domisili'));

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nik_pelamar', 'NIK KTP', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		if (empty($data['pelamar']['alamat'])) {
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('kel_rekrutmen', 'Kelurahan', 'required|trim');
		}
		if (empty($cek_domisili)) {
			if (empty($data['pelamar']['alamat_domisili'])) {
				$this->form_validation->set_rules('alamat_domisili', 'Alamat Domisili', 'required|trim');
				$this->form_validation->set_rules('kel_rek_domisili', 'Kelurahan', 'required|trim');
			}
		}
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required|trim');
		$this->form_validation->set_rules('no_wa_telp', 'Nomor WA/Telp', 'required|trim');
		if ($data['pelamar']['role_id'] == 7) {
			$this->form_validation->set_rules('pilih_unit', 'Unit', 'required|trim');
		} elseif ($data['pelamar']['role_id'] == 8) {
			$this->form_validation->set_rules('pilih_mapel', 'Mata Pelajaran', 'required|trim');
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pelamar/edit_pelamar', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$id_pegawai = $data['pelamar']['id_pegawai'];

			if (empty($data['pelamar']['alamat']) || empty($data['pelamar']['alamat_domisili'])) {
				if ($cek_domisili) {
					$dataPegawai = [
						'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
						'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
						'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
						'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
						'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_pegawai' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'alamat_domisili' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_domisili' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'agama_id' => htmlspecialchars($this->input->post('agama')),
						'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
						'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
						'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
						'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
						'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
					];
				} else {
					$dataPegawai = [
						'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
						'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
						'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
						'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
						'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
						'alamat' => htmlspecialchars($this->input->post('alamat')),
						'kel_id_pegawai' => htmlspecialchars($this->input->post('kel_rekrutmen')),
						'alamat_domisili' => htmlspecialchars($this->input->post('alamat_domisili')),
						'kel_id_domisili' => htmlspecialchars($this->input->post('kel_rek_domisili')),
						'agama_id' => htmlspecialchars($this->input->post('agama')),
						'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
						'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
						'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
						'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
						'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
					];
				}
			} else {
				$dataPegawai = [
					'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
					'nik_pegawai' => htmlspecialchars($this->input->post('nik_pelamar')),
					'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
					'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
					'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
					'agama_id' => htmlspecialchars($this->input->post('agama')),
					'status_perkawinan' => htmlspecialchars($this->input->post('status_perkawinan')),
					'no_wa_telp' => htmlspecialchars($this->input->post('no_wa_telp')),
					'email_pegawai' => htmlspecialchars($this->input->post('email_pegawai')),
					'unit_kerja_id' => htmlspecialchars($this->input->post('pilih_unit')),
					'ket_guru_id' => htmlspecialchars($this->input->post('pilih_mapel')),
				];
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataPegawai);
			$this->session->set_flashdata('message', 'Data Diri Telah Diperbarui');
			return redirect('datapelamar');
		}
	}
}
