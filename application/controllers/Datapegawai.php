<?php
require FCPATH . 'vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Datapegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['data_pegawai'] = $this->pm->data_Allpegawai();
		$data['jumlah_staff'] = $this->pm->hitung_staff();
		$data['jumlah_guru'] = $this->pm->hitung_guru();

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/index', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function tambah_pegawai()
	{
		$data['title'] = 'Tambah Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['roles'] = $this->pm->show_data('pegawai_role_user');
		$data['mapels'] = $this->pm->show_data('pegawai_mapel_guru');
		$data['units'] = $this->pm->show_data('pegawai_unit');
		$data['status'] = $this->pm->show_data('pegawai_status');

		$this->form_validation->set_rules('nama_lengkap', 'Nama Pegawai', 'required|trim');
		$this->form_validation->set_rules('niy_pegawai', 'NIY Pegawai', 'required|trim');
		$this->form_validation->set_rules('role_pegawai', 'Jabatan Pegawai', 'required|trim');
		$role_pegawai = htmlspecialchars($this->input->post('role_pegawai'));
		$this->form_validation->set_rules('unit_pegawai', 'Unit', 'required|trim');
		if ($role_pegawai == 8) {
			$this->form_validation->set_rules('mapel_guru', 'Mata Pelajaran', 'required|trim');
		}
		$this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/tambah_pegawai', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
			$niy_pegawai = htmlspecialchars($this->input->post('niy_pegawai'));
			$unit_pegawai = htmlspecialchars($this->input->post('unit_pegawai'));
			$mapel_guru = htmlspecialchars($this->input->post('mapel_guru'));
			$status_pegawai = htmlspecialchars($this->input->post('status_pegawai'));

			$dataPegawai = [
				'niy_pegawai' => $niy_pegawai,
				'nik_pegawai' => '',
				'nama_lengkap' => $nama_lengkap,
				'tempat_lahir' => '',
				'tanggal_lahir' => '',
				'jenis_kelamin' => '',
				'alamat' => '',
				'kel_id_pegawai' => 0,
				'agama_id' => 1,
				'status_perkawinan' => '',
				'no_wa_telp' => '',
				'email_pegawai' => '',
				'unit_kerja_id' => $unit_pegawai,
				'status_pegawai_id' => $status_pegawai,
				'ket_guru_id' => $mapel_guru,
				'pend_aktif_id' => 0,
				'tahun_masuk' => '',
				'foto' => 'akun.jpg',
				'progres_lamaran' => 0,
				'aktif_pegawai' => 1
			];

			// var_dump($dataPegawai);
			// die;
			$this->pm->insert_data($dataPegawai, 'pegawai_data');

			$getIdPegawai = $this->db->insert_id();

			$dataPengguna = [
				'pegawai_id' => $getIdPegawai,
				'username' => $niy_pegawai,
				'password' => password_hash($niy_pegawai, PASSWORD_DEFAULT),
				'pass_tampil' => $niy_pegawai,
				'role_id' => $role_pegawai,
			];

			$this->pm->insert_data($dataPengguna, 'pegawai_user');

			$dataBerkas = [
				'berkas_pegawai_id' => $getIdPegawai,
				'file_lamaran_pdf' => '',
				'file_ktp_pdf' => '',
				'file_kk_pdf' => '',
				'file_komitmen_pdf' => '',
				'file_skck_pdf' => '',
				'file_sertifikat_pdf' => ''
			];

			$this->pm->insert_data($dataBerkas, 'pegawai_data_berkas');
			$this->session->set_flashdata('message', 'Data Pegawai Baru Berhasil Ditambahkan');
			return redirect('datapegawai');
		}
	}

	public function edit_pegawai($id_pegawai)
	{
		$data['title'] = 'Edit Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetPegawai'] = $this->pm->data_individu_pegawai($id_pegawai);
		// var_dump($data['GetPegawai']);
		// die;
		$data['provinsi'] = $this->pm->show_data('pegawai_data_provinsi');
		$data['jenis_kelamin'] = ['Laki - Laki', 'Perempuan'];
		$data['agama'] = $this->pm->show_data('pegawai_agama');
		$data['status_perkawinan'] = ['Kawin', 'Belum Kawin', 'Duda/Janda'];
		$data['roles'] = $this->pm->show_data('pegawai_role_user');
		$data['mapels'] = $this->pm->show_data('pegawai_mapel_guru');
		$data['units'] = $this->pm->show_data('pegawai_unit');
		$data['status'] = $this->pm->show_data('pegawai_status');
		$cek_domisili = htmlspecialchars($this->input->post('check_domisili_edit'));

		$this->form_validation->set_rules('nik_pegawai_edit', 'NIK Pegawai', 'required|trim');
		$this->form_validation->set_rules('niy_pegawai_edit', 'NIY Pegawai', 'required|trim');
		$this->form_validation->set_rules('nama_lengkap_edit', 'Nama Pegawai', 'required|trim');
		$this->form_validation->set_rules('jk_pegawai_edit', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir_edit', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir_edit', 'Tanggal Lahir', 'required|trim');
		if (empty($data['GetPegawai']['alamat'])) {
			$this->form_validation->set_rules('alamat_pegawai_edit', 'Alamat Pegawai', 'required|trim');
			$this->form_validation->set_rules('prov_pegawai_edit', 'Provinsi', 'required|trim');
			$this->form_validation->set_rules('kotakab_pegawai_edit', 'Kota/Kabupaten', 'required|trim');
			$this->form_validation->set_rules('kec_pegawai_edit', 'Kecamatan', 'required|trim');
			$this->form_validation->set_rules('kel_pegawai_edit', 'Kelurahan', 'required|trim');
		}
		if (empty($cek_domisili)) {
			if (empty($data['GetPegawai']['alamat_domisili'])) {
				$this->form_validation->set_rules('alamatdom_pegawaiedit', 'Alamat Pegawai', 'required|trim');
				$this->form_validation->set_rules('prov_pegawai_domedit', 'Provinsi', 'required|trim');
				$this->form_validation->set_rules('kotakab_pegawai_domedit', 'Kota/Kabupaten', 'required|trim');
				$this->form_validation->set_rules('kec_pegawai_domedit', 'Kecamatan', 'required|trim');
				$this->form_validation->set_rules('kel_pegawai_domedit', 'Kelurahan', 'required|trim');
			}
		}
		$this->form_validation->set_rules('role_pegawai_edit', 'Jenis Pegawai', 'required|trim');
		$this->form_validation->set_rules('unit_pegawai_edit', 'Unit Kerja', 'required|trim');
		if ($data['GetPegawai']['ket_guru_id'] != 0) {
			$this->form_validation->set_rules('mapel_guru_edit', 'Mata Pelajaran', 'required|trim');
		}
		$this->form_validation->set_rules('status_pegawai_edit', 'Status Pegawai', 'required|trim');
		$this->form_validation->set_rules('agama_pegawai_edit', 'Agama', 'required|trim');
		$this->form_validation->set_rules('statuskawin_pegawai_edit', 'Status Perkawinan', 'required|trim');
		$this->form_validation->set_rules('notelp_pegawai_edit', 'No Telepon / WA', 'required|trim');
		$this->form_validation->set_rules('email_pegawai_edit', 'Email', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/edit_pegawai', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$nik_pegawai = htmlspecialchars($this->input->post('nik_pegawai_edit'));
			$niy_pegawai = htmlspecialchars($this->input->post('niy_pegawai_edit'));
			$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap_edit'));
			$jenis_kelamin = htmlspecialchars($this->input->post('jk_pegawai_edit'));
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir_edit'));
			$tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir_edit'));
			$alamat = htmlspecialchars($this->input->post('alamat_pegawai_edit'));
			$kel_id_pegawai = htmlspecialchars($this->input->post('kel_pegawai_edit'));
			$alamat_domisili = htmlspecialchars($this->input->post('alamatdom_pegawaiedit'));
			$kel_pegawai_dom = htmlspecialchars($this->input->post('kel_pegawai_domedit'));
			$agama_id = htmlspecialchars($this->input->post('agama_pegedit'));
			$role_pegawai = htmlspecialchars($this->input->post('role_pegawai_edit'));
			$unit_pegawai = htmlspecialchars($this->input->post('unit_pegawai_edit'));
			$mapel_guru = htmlspecialchars($this->input->post('mapel_guru_edit'));
			$status_pegawai = htmlspecialchars($this->input->post('status_pegawai_edit'));
			$status_perkawinan = htmlspecialchars($this->input->post('statuskawin_pegawai_edit'));
			$no_wa_telp = htmlspecialchars($this->input->post('notelp_pegawai_edit'));
			$email_pegawai = htmlspecialchars($this->input->post('email_pegawai_edit'));

			if (empty($data['GetPegawai']['alamat']) || empty($data['GetPegawai']['alamat_domisili'])) {
				if ($cek_domisili) {
					$UpdateDataPegawai = [
						'nik_pegawai' => $nik_pegawai,
						'niy_pegawai' => $niy_pegawai,
						'nama_lengkap' => $nama_lengkap,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat' => $alamat,
						'kel_id_pegawai' => $kel_id_pegawai,
						'alamat_domisili' => $alamat,
						'kel_id_domisili' => $kel_id_pegawai,
						'agama_id' => $agama_id,
						'status_perkawinan' => $status_perkawinan,
						'no_wa_telp' => $no_wa_telp,
						'email_pegawai' => $email_pegawai,
						'unit_kerja_id' => $unit_pegawai,
						'status_pegawai_id' => $status_pegawai,
						'ket_guru_id' => $mapel_guru
					];
				} else {
					$UpdateDataPegawai = [
						'nik_pegawai' => $nik_pegawai,
						'niy_pegawai' => $niy_pegawai,
						'nama_lengkap' => $nama_lengkap,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat' => $alamat,
						'kel_id_pegawai' => $kel_id_pegawai,
						'alamat_domisili' => $alamat_domisili,
						'kel_id_domisili' => $kel_pegawai_dom,
						'agama_id' => $agama_id,
						'status_perkawinan' => $status_perkawinan,
						'no_wa_telp' => $no_wa_telp,
						'email_pegawai' => $email_pegawai,
						'unit_kerja_id' => $unit_pegawai,
						'status_pegawai_id' => $status_pegawai,
						'ket_guru_id' => $mapel_guru
					];
				}
			} else {
				$UpdateDataPegawai = [
					'nik_pegawai' => $nik_pegawai,
					'niy_pegawai' => $niy_pegawai,
					'nama_lengkap' => $nama_lengkap,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama_id' => $agama_id,
					'status_perkawinan' => $status_perkawinan,
					'no_wa_telp' => $no_wa_telp,
					'email_pegawai' => $email_pegawai,
					'unit_kerja_id' => $unit_pegawai,
					'status_pegawai_id' => $status_pegawai,
					'ket_guru_id' => $mapel_guru
				];
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $UpdateDataPegawai);

			$UpdateRole = [
				'role_id' => $role_pegawai,
			];
			$this->pm->update_data('pegawai_id', $id_pegawai, 'pegawai_user', $UpdateRole);
			$this->session->set_flashdata('message', 'Data Pegawai Berhasil Diperbarui');
			return redirect('datapegawai');
		}
	}

	public function edit_alamat_pegawai($id_pegawai)
	{
		// $data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		// $id_pegawai = $data['pegawai']['id_pegawai'];

		$dataAlamat = [
			'alamat' => '',
			'kel_id_pegawai' => 0,
			'alamat_domisili' => '',
			'kel_id_domisili' => 0,
		];

		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataAlamat);
		return redirect('datapegawai/edit_pegawai/' . $id_pegawai);
	}

	public function berkas_pegawai($id_pegawai)
	{
		$data['title'] = 'Berkas Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetPegawai'] = $this->pm->data_individu_pegawai($id_pegawai);
		$data['file_pegawai'] = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/berkas_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function unggah_berkas_perpegawai($id_pegawai)
	{
		$data['pegawai'] = $this->pm->data_individu_pegawai($id_pegawai);
		$berkaslama = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$files = array('pegawai_kk', 'pegawai_ktp');
		$upload_data = array();
		$uploadallberkas = true;

		foreach ($files as $file) {
			$config['upload_path'] = './assets/file_berkas/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 512;

			$new_file_name = $id_pegawai . '-' . $data['pegawai']['niy_pegawai'] . '-file_peg-' . $data['pegawai']['nama_lengkap'];
			$config['file_name'] = $new_file_name;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($file)) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				$uploadallberkas = false;
				break;
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
				'file_ktp_pdf' => $upload_data['pegawai_ktp'],
				'file_kk_pdf' => $upload_data['pegawai_kk']
			);
			$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);

			$this->session->set_flashdata('message', 'File KK dan KTP Berhasil Diunggah.');
		} else {
			foreach ($upload_data as $uploaded_file) {
				$file_path = './assets/file_berkas/' . $uploaded_file;
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		}
		redirect('datapegawai/berkas_pegawai/' . $id_pegawai);
	}

	public function upload_pegawai()
	{
		$config['upload_path'] = './assets/file_upload/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('unggah_data_pegawai')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('datapegawai');
		} else {
			$file = $this->upload->data();
			$file_path = './assets/file_upload/' . $file['file_name'];

			$spreadsheet = IOFactory::load($file_path);
			$worksheet = $spreadsheet->getActiveSheet();

			$row = 4;
			$importDataPegawai = array();
			while ($worksheet->getCell('B' . $row)->getValue() !== null) {
				$niy_pegawai = $worksheet->getCell('C' . $row)->getValue();
				$nik_pegawai = $worksheet->getCell('D' . $row)->getValue();
				$nama_lengkap = $worksheet->getCell('E' . $row)->getValue();
				$tempat_lahir = $worksheet->getCell('F' . $row)->getValue();
				$tanggal_lahir = $worksheet->getCell('G' . $row)->getValue();
				$jenis_kelamin = $worksheet->getCell('H' . $row)->getValue();
				$agama = $worksheet->getCell('I' . $row)->getValue();
				$status_kawin = $worksheet->getCell('J' . $row)->getValue();
				$no_telp_wa = $worksheet->getCell('K' . $row)->getValue();
				$email = $worksheet->getCell('L' . $row)->getValue();
				$tahun_masuk = $worksheet->getCell('M' . $row)->getValue();
				$status_pegawai = $worksheet->getCell('N' . $row)->getValue();
				$role_pegawai = $worksheet->getCell('O' . $row)->getValue();

				$importDataPegawai[] = array(
					'niy_pegawai' => $niy_pegawai,
					'nik_pegawai' => $nik_pegawai,
					'nama_lengkap' => $nama_lengkap,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama_id' => $agama,
					'status_perkawinan' => $status_kawin,
					'no_wa_telp' => $no_telp_wa,
					'email_pegawai' => $email,
					// 'foto' => 'akun.jpg',
					'tahun_masuk' => $tahun_masuk,
					'status_pegawai_id' => $status_pegawai,
					'role_pegawai' => $role_pegawai,
					// 'aktif_pegawai' => 1,
				);

				$row++;
			}

			foreach ($importDataPegawai as $data) {

				$DataPegawaiUpload = [

					'niy_pegawai' => $data['niy_pegawai'],
					'nik_pegawai' => $data['nik_pegawai'],
					'nama_lengkap' => $data['nama_lengkap'],
					'tempat_lahir' => $data['tempat_lahir'],
					'tanggal_lahir' => $data['tanggal_lahir'],
					'jenis_kelamin' => $data['jenis_kelamin'],
					'agama_id' => $data['agama_id'],
					'status_perkawinan' => $data['status_perkawinan'],
					'no_wa_telp' => $data['no_wa_telp'],
					'email_pegawai' => $data['email_pegawai'],
					'foto' => 'akun.jpg',
					'tahun_masuk' => $data['tahun_masuk'],
					'status_pegawai_id' => $data['status_pegawai_id'],
					'aktif_pegawai' => 1,
				];

				$this->pm->insert_data($DataPegawaiUpload, 'pegawai_data');

				$idpegawai_insert = $this->db->insert_id();

				$DataAkunUser = [
					'pegawai_id' => $idpegawai_insert,
					'username' => $data['niy_pegawai'],
					'password' => password_hash($data['niy_pegawai'], PASSWORD_DEFAULT),
					'pass_tampil' => $data['niy_pegawai'],
					'role_id' => $data['role_pegawai'],
				];

				$this->pm->insert_data($DataAkunUser, 'pegawai_user');

				$dataBerkas = [
					'berkas_pegawai_id' => $idpegawai_insert,
					'file_lamaran_pdf' => '',
					'file_ktp_pdf' => '',
					'file_kk_pdf' => '',
					'file_komitmen_pdf' => '',
					'file_skck_pdf' => '',
					'file_sertifikat_pdf' => ''
				];

				$this->pm->insert_data($dataBerkas, 'pegawai_data_berkas');
			}

			if (file_exists($file_path)) {
				unlink($file_path);
			}

			$this->session->set_flashdata('message', 'Data Pegawai Baru Berhasil Diunggah');
			return redirect('datapegawai');
		}
	}

	public function hapus_berkas_perpegawai($id_pegawai)
	{
		$berkas = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		if ($berkas) {
			$fields = array('file_ktp_pdf', 'file_kk_pdf');
			foreach ($fields as $field) {

				if (!empty($berkas[$field])) {
					$file_path = './assets/file_berkas/' . $berkas[$field];
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			}
			$dataBerkas = array(
				'file_ktp_pdf' => '',
				'file_kk_pdf' => ''
			);
		}

		$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);
		$this->session->set_flashdata('message', 'File KK dan KTP Berhasil Dihapus.');
		redirect('datapegawai/unggah_file');
	}

	public function detail_pegawai($id_pegawai)
	{
		$data['title'] = 'Detail Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['individu'] = $this->pm->data_individu_pegawai($id_pegawai);
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan_individu($id_pegawai);
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan_individu($id_pegawai);
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi_individu($id_pegawai);
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek_individu($id_pegawai);
		$data['riwayat_karir'] = $this->pm->riwayat_karir_individu($id_pegawai);
		$data['riwayat_pelatihan'] = $this->pm->riwayat_pelatihan_individu($id_pegawai);
		$data['data_keluarga'] = $this->pm->data_keluarga($id_pegawai);
		$data['berkas_pelamar'] = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/detail_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function nonaktif_pegawai()
	{

		$id_pegawai = $this->input->post('id_pegawai_update');
		$data = [
			'aktif_pegawai' => 0,
		];
		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $data);
		$this->session->set_flashdata('message', 'Pegawai Berhasil Dinon-aktifkan');
		return redirect('datapegawai');
	}

	public function data_diri()
	{
		$data['title'] = 'Data Diri Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['provinsi'] = $this->pm->show_data('pegawai_data_provinsi');
		$data['agama'] = $this->pm->show_data('pegawai_agama');
		$data['status_perkawinan'] = ['Kawin', 'Belum Kawin', 'Duda/Janda'];
		$data['jenis_kelamin'] = ['Laki - Laki', 'Perempuan'];
		$data['riwayat_pendidikan'] = $this->pm->riwayat_pendidikan_individu($data['pegawai']['id_pegawai']);
		$data['riwayat_pekerjaan'] = $this->pm->riwayat_pekerjaan_individu($data['pegawai']['id_pegawai']);
		$data['riwayat_organisasi'] = $this->pm->riwayat_organisasi_individu($data['pegawai']['id_pegawai']);
		$data['riwayat_proyek'] = $this->pm->riwayat_proyek_individu($data['pegawai']['id_pegawai']);
		$data['riwayat_karir'] = $this->pm->riwayat_karir_individu($data['pegawai']['id_pegawai']);
		$data['riwayat_pelatihan'] = $this->pm->riwayat_pelatihan_individu($data['pegawai']['id_pegawai']);
		$data['data_keluarga'] = $this->pm->data_keluarga($data['pegawai']['id_pegawai']);
		$data['berkas_pelamar'] = $this->pm->getId_data($data['pegawai']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');
		$cek_domisili = htmlspecialchars($this->input->post('cek_domisili'));

		$this->form_validation->set_rules('nik_peg_edit', 'NIK Pegawai', 'required|trim');
		$this->form_validation->set_rules('nama_pegedit', 'Nama Pegawai', 'required|trim');
		$this->form_validation->set_rules('jk_peg_edit', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir_pegedit', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir_pegedit', 'Tanggal Lahir', 'required|trim');
		if (empty($data['pegawai']['alamat'])) {
			$this->form_validation->set_rules('alamat_pegedit', 'Alamat Pegawai', 'required|trim');
			$this->form_validation->set_rules('prov_pegawai', 'Provinsi', 'required|trim');
			$this->form_validation->set_rules('kota_kab_pegawai', 'Kota/Kabupaten', 'required|trim');
			$this->form_validation->set_rules('kec_pegawai', 'Kecamatan', 'required|trim');
			$this->form_validation->set_rules('kel_pegawai', 'Kelurahan', 'required|trim');
		}
		if (empty($cek_domisili)) {
			if (empty($data['pegawai']['alamat_domisili'])) {
				$this->form_validation->set_rules('alamat_domisili_pegedit', 'Alamat Pegawai', 'required|trim');
				$this->form_validation->set_rules('prov_pegawai_dom', 'Provinsi', 'required|trim');
				$this->form_validation->set_rules('kotakab_pegawai_dom', 'Kota/Kabupaten', 'required|trim');
				$this->form_validation->set_rules('kec_pegawai_dom', 'Kecamatan', 'required|trim');
				$this->form_validation->set_rules('kel_pegawai_dom', 'Kelurahan', 'required|trim');
			}
		}
		$this->form_validation->set_rules('agama_pegedit', 'Agama', 'required|trim');
		$this->form_validation->set_rules('status_kawin_pegedit', 'Status Perkawinan', 'required|trim');
		$this->form_validation->set_rules('no_telp_pegedit', 'No Telepon / WA', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/data_diri', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$id_pegawai = $data['pegawai']['id_pegawai'];
			$nik_pegawai = htmlspecialchars($this->input->post('nik_peg_edit'));
			$nama_lengkap = htmlspecialchars($this->input->post('nama_pegedit'));
			$jenis_kelamin = htmlspecialchars($this->input->post('jk_peg_edit'));
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir_pegedit'));
			$tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir_pegedit'));
			$alamat = htmlspecialchars($this->input->post('alamat_pegedit'));
			$kel_id_pegawai = htmlspecialchars($this->input->post('kel_pegawai'));
			$alamat_domisili = htmlspecialchars($this->input->post('alamat_domisili_pegedit'));
			$kel_pegawai_dom = htmlspecialchars($this->input->post('kel_pegawai_dom'));
			$agama_id = htmlspecialchars($this->input->post('agama_pegedit'));
			$status_perkawinan = htmlspecialchars($this->input->post('status_kawin_pegedit'));
			$no_wa_telp = htmlspecialchars($this->input->post('no_telp_pegedit'));
			$email_pegawai = htmlspecialchars($this->input->post('email_pegedit'));

			if (empty($data['pegawai']['alamat']) || empty($data['pegawai']['alamat_domisili'])) {
				if ($cek_domisili) {
					$UpdateDataPegawai = [
						'nik_pegawai' => $nik_pegawai,
						'nama_lengkap' => $nama_lengkap,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat' => $alamat,
						'kel_id_pegawai' => $kel_id_pegawai,
						'alamat_domisili' => $alamat,
						'kel_id_domisili' => $kel_id_pegawai,
						'agama_id' => $agama_id,
						'status_perkawinan' => $status_perkawinan,
						'no_wa_telp' => $no_wa_telp,
						'email_pegawai' => $email_pegawai
					];
				} else {
					$UpdateDataPegawai = [
						'nik_pegawai' => $nik_pegawai,
						'nama_lengkap' => $nama_lengkap,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat' => $alamat,
						'kel_id_pegawai' => $kel_id_pegawai,
						'alamat_domisili' => $alamat_domisili,
						'kel_id_domisili' => $kel_pegawai_dom,
						'agama_id' => $agama_id,
						'status_perkawinan' => $status_perkawinan,
						'no_wa_telp' => $no_wa_telp,
						'email_pegawai' => $email_pegawai
					];
				}
			} else {
				$UpdateDataPegawai = [
					'nik_pegawai' => $nik_pegawai,
					'nama_lengkap' => $nama_lengkap,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama_id' => $agama_id,
					'status_perkawinan' => $status_perkawinan,
					'no_wa_telp' => $no_wa_telp,
					'email_pegawai' => $email_pegawai
				];
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $UpdateDataPegawai);
			$this->session->set_flashdata('message', 'Data Anda Berhasil Diperbarui');
			return redirect('datapegawai/data_diri');
		}
	}

	public function edit_alamat()
	{
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$id_pegawai = $data['pegawai']['id_pegawai'];

		$dataAlamat = [
			'alamat' => '',
			'kel_id_pegawai' => 0,
			'alamat_domisili' => '',
			'kel_id_domisili' => 0,
		];

		$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataAlamat);
		return redirect('datapegawai/data_diri');
	}

	public function unit_kerja()
	{
		$data['title'] = 'Unit Kerja Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['units'] = $this->pm->show_data('pegawai_unit');
		$data['mapels'] = $this->pm->show_data('pegawai_mapel_guru');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/unit_kerja', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function akun_pegawai()
	{
		$data['title'] = 'Akun Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$this->form_validation->set_rules('password_baru', 'Password', 'required|trim|min_length[8]|matches[password_baru2]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek! Minimal 8 Karakter.'
		]);
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|matches[password_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/akun_pegawai', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$id_pegawai = $data['pegawai']['id_pegawai'];

			$dataPegawai = [
				'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
				'pass_tampil' => htmlspecialchars($this->input->post('password_baru')),
			];

			$this->pm->update_data('pegawai_id', $id_pegawai, 'pegawai_user', $dataPegawai);
			$this->session->set_flashdata('message', 'Password Telah Diperbarui');
			return redirect('datapegawai/akun_pegawai');
		}
	}

	public function uploadFile_foto()
	{
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));;

		$config['upload_path'] = './assets/file_foto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 512;
		$config['file_name'] = uniqid();

		$this->load->library('upload', $config);
		// $this->upload->initialize($config);

		if (!$this->upload->do_upload('foto_profile')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			return redirect('datapegawai/akun_pegawai');
		} else {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$id_pegawai = $data['pegawai']['id_pegawai'];
			if ($id_pegawai['foto'] && file_exists('./assets/file_foto/' . $id_pegawai['foto'])) {
				unlink('./assets/file_foto/' . $id_pegawai['foto']);
			}

			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', array('foto' => $file_name));

			$this->session->set_flashdata('message', 'Foto Berhasil Diperbarui.');
			redirect('datapegawai/akun_pegawai');
		}
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

	public function data_keluarga()
	{
		$data['title'] = 'Data Keluarga Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['anggota_keluarga'] = $this->pm->data_keluarga($data['pegawai']['id_pegawai']);
		$data['jenis_kelamin'] = ['Laki - Laki', 'Perempuan'];
		$data['status_hubungan'] = $this->pm->show_data('pegawai_hubungan_keluarga');

		$this->form_validation->set_rules('nik_anggota_keluarga', 'NIK Anggota Keluarga', 'required|trim');
		$this->form_validation->set_rules('nama_anggota_keluarga', 'Nama Anggota Keluarga', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir_anggota', 'Tempat Lahir Anggota Keluarga', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir_anggota', 'Tanggal Lahir Anggota Keluarga', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin_anggota', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('hubungan_pegawai_id', 'Status Hubungan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/data_keluarga', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$id_pegawai = $data['pegawai']['id_pegawai'];
			$nik_anggota_keluarga = htmlspecialchars($this->input->post('nik_anggota_keluarga'));
			$nama_anggota_keluarga = htmlspecialchars($this->input->post('nama_anggota_keluarga'));
			$tempat_lahir_anggota = htmlspecialchars($this->input->post('tempat_lahir_anggota'));
			$tanggal_lahir_anggota = htmlspecialchars($this->input->post('tanggal_lahir_anggota'));
			$jenis_kelamin_anggota = htmlspecialchars($this->input->post('jenis_kelamin_anggota'));
			$hubungan_pegawai_id = htmlspecialchars($this->input->post('hubungan_pegawai_id'));

			$dataKeluarga = [
				'pegawai_id_anggota' => $id_pegawai,
				'nik_anggota_keluarga' => $nik_anggota_keluarga,
				'nama_anggota_keluarga' => $nama_anggota_keluarga,
				'hubungan_pegawai_id' => $hubungan_pegawai_id,
				'jenis_kelamin_anggota' => $jenis_kelamin_anggota,
				'tempat_lahir_anggota' => $tempat_lahir_anggota,
				'tanggal_lahir_anggota' => $tanggal_lahir_anggota
			];

			$this->pm->insert_data($dataKeluarga, 'pegawai_data_keluarga');
			$this->session->set_flashdata('message', 'Data Keluarga Berhasil Ditambahkan');
			return redirect('datapegawai/data_keluarga');
		}
	}

	public function hapus_data_keluarga()
	{
		$id_anggota_keluarga = $this->input->post('id_anggota_keluarga');
		if ($this->pm->delete_data('pegawai_data_keluarga', 'id_anggota_keluarga', $id_anggota_keluarga)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function unduh_datapegawai()
	{
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$Judul = 'Data Pegawai dan Guru';
		$data_pegawai = $this->pm->data_pegawai_download();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->mergeCells('A1:U1');
		$sheet->setCellValue('A1', $Judul);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
		$sheet->mergeCells('A2:U2');
		$sheet->setCellValue('A2', 'Yayasan Pondok Pesantren Bayt Al-hikmah');
		$sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A2')->getFont()->setBold(true)->setSize(14);
		$sheet->mergeCells('A3:U3');
		$sheet->setCellValue('A3', 'Pasuruan - Jawa Timur');
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A3')->getFont()->setBold(true)->setSize(14);

		$headerData = array(
			'A4' => array('NO', 5),
			'B4' => array('NIY', 15),
			'C4' => array('NIK', 30),
			'D4' => array('NAMA PEGAWAI', 50),
			'E4' => array('TEMPAT TANGGAL LAHIR', 33),
			'F4' => array('ALAMAT KTP', 35),
			'G4' => array('KELURAHAN', 22),
			'H4' => array('KECAMATAN', 22),
			'I4' => array('KOTA/KABUPATEN', 22),
			'J4' => array('ALAMAT DOMISILI', 35),
			'K4' => array('KELURAHAN', 22),
			'L4' => array('KECAMATAN', 22),
			'M4' => array('KOTA/KABUPATEN', 22),
			'N4' => array('JABATAN', 20),
			'O4' => array('UNIT KERJA', 30),
			'P4' => array('MATA PELAJARAN(GURU)', 35),
			'Q4' => array('STATUS PEGAWAI', 18),
			'R4' => array('NO TELP / WA', 21),
			'S4' => array('EMAIL PEGAWAI', 27),
			'T4' => array('PENDIDIKAN TERAKHIR', 35),
			'U4' => array('TAHUN MASUK', 15)
		);

		foreach ($headerData as $cell => $data) {
			$sheet->setCellValue($cell, $data[0])->getColumnDimension(substr($cell, 0, 1))->setWidth($data[1]);
			$sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle($cell)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			$sheet->getStyle($cell)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle($cell)->getFill()->getStartColor()->setARGB('70deb1');
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
		$sheet->getStyle('A4:U250')->applyFromArray($borderStyle);

		$row = 5;
		$no = 1;
		foreach ($data_pegawai as $pegawai) {
			$sheet->setCellValue('A' . $row, $no++);
			$sheet->setCellValue('B' . $row, $pegawai['niy_pegawai']);
			$sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('C' . $row, $pegawai['nik_pegawai']);
			$sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('D' . $row, $pegawai['nama_lengkap']);
			$sheet->setCellValue('E' . $row, $pegawai['tempat_lahir'] . ', ' . $pegawai['tanggal_lahir']);
			$sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('F' . $row, $pegawai['alamat']);
			$sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('G' . $row, $pegawai['nama_kelurahan_pegawai']);
			$sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('H' . $row, $pegawai['nama_kecamatan_pegawai']);
			$sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('I' . $row, $pegawai['nama_kotakab_pegawai']);
			$sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('J' . $row, $pegawai['alamat_domisili']);
			$sheet->getStyle('J' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('K' . $row, $pegawai['nama_kelurahan_domisili']);
			$sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('L' . $row, $pegawai['nama_kecamatan_domisili']);
			$sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('M' . $row, $pegawai['nama_kotakab_domisili']);
			$sheet->getStyle('M' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('N' . $row, $pegawai['ket_role']);
			$sheet->getStyle('N' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('O' . $row, $pegawai['nama_unit']);
			$sheet->getStyle('O' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			if ($pegawai['ket_guru_id'] != 0) {
				$sheet->setCellValue('P' . $row, $pegawai['mata_pelajaran']);
				$sheet->getStyle('P' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			} else {
				$sheet->setCellValue('P' . $row, 'Belum Memilih Mata Pelajaran');
				$sheet->getStyle('P' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			}
			$sheet->setCellValue('Q' . $row, $pegawai['ket_status_pegawai']);
			$sheet->getStyle('Q' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('R' . $row, $pegawai['no_wa_telp']);
			$sheet->getStyle('R' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('S' . $row, $pegawai['email_pegawai']);
			$sheet->getStyle('S' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('T' . $row, $pegawai['tingkat_pendidikan']);
			$sheet->getStyle('T' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('U' . $row, $pegawai['tahun_masuk']);
			$sheet->getStyle('U' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

			$sheet->getStyle('A' . $row . ':U' . $row)->applyFromArray($borderStyle);

			$row++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = $Judul  . '.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function unggah_file()
	{
		$data['title'] = 'Unggah File';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['file_pegawai'] = $this->pm->getId_data($data['pegawai']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/unggah_file', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function unggah_berkas()
	{
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$id_pegawai = $data['pegawai']['id_pegawai'];
		$berkaslama = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		$files = array('peg_kk', 'peg_ktp');
		$upload_data = array();
		$uploadallberkas = true;

		foreach ($files as $file) {
			$config['upload_path'] = './assets/file_berkas/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 512;

			$new_file_name = $id_pegawai . '-' . $data['pegawai']['niy_pegawai'] . '-file_peg-' . $data['pegawai']['nama_lengkap'];
			$config['file_name'] = $new_file_name;

			// $this->upload->initialize($config);

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($file)) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				$uploadallberkas = false;
				break;
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
				'file_ktp_pdf' => $upload_data['peg_ktp'],
				'file_kk_pdf' => $upload_data['peg_kk']
			);
			$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);

			$this->session->set_flashdata('message', 'File KK dan KTP Berhasil Diunggah.');
		} else {
			foreach ($upload_data as $uploaded_file) {
				$file_path = './assets/file_berkas/' . $uploaded_file;
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		}
		redirect('datapegawai/unggah_file');
	}

	public function hapus_berkas()
	{
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$id_pegawai = $data['pegawai']['id_pegawai'];

		$berkas = $this->pm->getId_data($id_pegawai, 'pegawai_data_berkas', 'berkas_pegawai_id');

		if ($berkas) {
			$fields = array('file_ktp_pdf', 'file_kk_pdf');
			foreach ($fields as $field) {

				if (!empty($berkas[$field])) {
					$file_path = './assets/file_berkas/' . $berkas[$field];
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			}
			$dataBerkas = array(
				'file_ktp_pdf' => '',
				'file_kk_pdf' => ''
			);
		}

		$this->pm->update_data('berkas_pegawai_id', $id_pegawai, 'pegawai_data_berkas', $dataBerkas);
		$this->session->set_flashdata('message', 'File KK dan KTP Berhasil Dihapus.');
		redirect('datapegawai/unggah_file');
	}

	public function data_pendidikan()
	{
		$data['title'] = 'Data Pendidikan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['file_pegawai'] = $this->pm->getId_data($data['pegawai']['id_pegawai'], 'pegawai_data_berkas', 'berkas_pegawai_id');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('coming_soon_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function data_pelatihan()
	{
		$data['title'] = 'Data Pelatihan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('coming_soon_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function jabatan_pegawai($id_pegawai)
	{
		$data['title'] = 'Jabatan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['individu'] = $this->pm->data_individu_pegawai($id_pegawai);
		$data['jabatanAll'] = $this->pm->show_data('pegawai_jabatan');
		$data['unitAll'] = $this->pm->show_data('pegawai_unit');
		$data['jabatanAktif'] = $this->pm->data_karir_aktif($id_pegawai);

		$this->form_validation->set_rules('jabatan_karir_id', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('unit_karir_id', 'Unit', 'required|trim');
		$this->form_validation->set_rules('tahun_pengabdian_awal', 'Tahun Periode', 'required|trim');
		$this->form_validation->set_rules('validasi_jabatan', 'Tahun Periode', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('data_pegawai/jabatan_pegawai', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$jabatan_karir_id = htmlspecialchars($this->input->post('jabatan_karir_id'));
			$unit_karir_id = htmlspecialchars($this->input->post('unit_karir_id'));
			$tahun_pengabdian_awal = htmlspecialchars($this->input->post('tahun_pengabdian_awal'));
			$validasi_jabatan = htmlspecialchars($this->input->post('validasi_jabatan'));

			if ($validasi_jabatan == 1) {
				$Datakarir = [
					'pegawai_id_hiskar' => $id_pegawai,
					'urutan_jabatan' => $validasi_jabatan,
					'jabatan_karir_id' => $jabatan_karir_id,
					'unit_karir_id' => $unit_karir_id,
					'tahun_pengabdian_awal' => $tahun_pengabdian_awal,
					'tahun_pengabdian_akhir' => '',
					'karir_aktif' => 1
				];

				$this->pm->insert_data($Datakarir, 'pegawai_history_karir');

				$getIdkarir = $this->db->insert_id();

				$jabatan1 = [
					'jabatan_1' => $getIdkarir,
				];

				$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $jabatan1);
				$this->session->set_flashdata('message', 'Data Jabatan Berhasil Ditambahkan');
				return redirect('datapegawai');
			} elseif ($validasi_jabatan == 2) {
				$Datakarir = [
					'pegawai_id_hiskar' => $id_pegawai,
					'urutan_jabatan' => $validasi_jabatan,
					'jabatan_karir_id' => $jabatan_karir_id,
					'unit_karir_id' => $unit_karir_id,
					'tahun_pengabdian_awal' => $tahun_pengabdian_awal,
					'tahun_pengabdian_akhir' => '',
					'karir_aktif' => 1
				];

				$this->pm->insert_data($Datakarir, 'pegawai_history_karir');

				$getIdkarir = $this->db->insert_id();

				$jabatan2 = [
					'jabatan_2' => $getIdkarir,
				];

				$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $jabatan2);
				$this->session->set_flashdata('message', 'Data Jabatan Berhasil Ditambahkan');
				return redirect('datapegawai');
			} elseif ($validasi_jabatan == 3) {
				$Datakarir = [
					'pegawai_id_hiskar' => $id_pegawai,
					'urutan_jabatan' => $validasi_jabatan,
					'jabatan_karir_id' => $jabatan_karir_id,
					'unit_karir_id' => $unit_karir_id,
					'tahun_pengabdian_awal' => $tahun_pengabdian_awal,
					'tahun_pengabdian_akhir' => '',
					'karir_aktif' => 1
				];

				$this->pm->insert_data($Datakarir, 'pegawai_history_karir');

				$getIdkarir = $this->db->insert_id();

				$jabatan2 = [
					'jabatan_3' => $getIdkarir,
				];

				$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $jabatan2);
				$this->session->set_flashdata('message', 'Data Jabatan Berhasil Ditambahkan');
				return redirect('datapegawai');
			}
		}
	}

	public function hapus_jabatan()
	{
		$id_pegawai = htmlspecialchars($this->input->post('id_pegawai_jabatan'));
		$urutanjabatan = htmlspecialchars($this->input->post('urutanjabatan'));
		$idhiskar = htmlspecialchars($this->input->post('idhiskar'));
		$current_year = htmlspecialchars($this->input->post('tahun_pengabdian_akhir'));

		if ($urutanjabatan == 1) {
			$dataJabatan = [
				'jabatan_1' => '',
			];
			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataJabatan);

			$Datakarir = [
				'tahun_pengabdian_akhir' => $current_year,
				'urutan_jabatan' => 0,
				'karir_aktif' => 0,
			];

			$this->pm->update_data('id_history_karir', $idhiskar, 'pegawai_history_karir', $Datakarir);
			$this->session->set_flashdata('message', 'Data Jabatan Berhasil Dihapus');
			return redirect('datapegawai');
		} elseif ($urutanjabatan == 2) {
			$dataJabatan = [
				'jabatan_2' => '',
			];
			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataJabatan);

			$Datakarir = [
				'tahun_pengabdian_akhir' => $current_year,
				'urutan_jabatan' => 0,
				'karir_aktif' => 0,
			];

			$this->pm->update_data('id_history_karir', $idhiskar, 'pegawai_history_karir', $Datakarir);
			$this->session->set_flashdata('message', 'Data Jabatan Berhasil Dihapus');
			return redirect('datapegawai');
		} elseif ($urutanjabatan == 3) {
			$dataJabatan = [
				'jabatan_3' => '',
			];
			$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataJabatan);

			$Datakarir = [
				'tahun_pengabdian_akhir' => $current_year,
				'urutan_jabatan' => 0,
				'karir_aktif' => 0,
			];

			$this->pm->update_data('id_history_karir', $idhiskar, 'pegawai_history_karir', $Datakarir);
			$this->session->set_flashdata('message', 'Data Jabatan Berhasil Dihapus');
			return redirect('datapegawai');
		}
		// if ($jabatan_1) {
		// 	$dataJabatan = [
		// 		'jabatan_1' => '',
		// 	];
		// 	$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataJabatan);

		// 	$Datakarir = [
		// 		'tahun_pengabdian_akhir' => $current_year,
		// 	];

		// 	$this->pm->update_data('id_history_karir', $jabatan_1, 'pegawai_history_karir', $Datakarir);
		// 	$this->session->set_flashdata('message', 'Data Jabatan Berhasil Dihapus');
		// 	return redirect('datapegawai');
		// } elseif ($jabatan_2) {
		// 	$dataJabatan = [
		// 		'jabatan_2' => '',
		// 	];
		// 	$this->pm->update_data('id_pegawai', $id_pegawai, 'pegawai_data', $dataJabatan);

		// 	$Datakarir = [
		// 		'tahun_pengabdian_akhir' => $current_year,
		// 	];

		// 	$this->pm->update_data('id_history_karir', $jabatan_2, 'pegawai_history_karir', $Datakarir);
		// 	$this->session->set_flashdata('message', 'Data Jabatan Berhasil Dihapus');
		// 	return redirect('datapegawai');
		// }
	}

	public function data_karir()
	{
		$data['title'] = 'Data Karir';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['riwayat_karir'] = $this->pm->riwayat_karir_individu($data['pegawai']['id_pegawai']);

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('data_pegawai/data_karir', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function slip_gaji()
	{
		$data['title'] = 'Data Pelatihan Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('coming_soon_pegawai', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}
}
