<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekrutmen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
	}
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('homepelamar');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Recruitment | BAYHI';
			// $this->load->view('rekrutmen/index', $data);
			$this->load->view('maintenance', $data);
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('pegawai_user', ['username' => $username])->row_array();
		$status_pegawai = $this->db->get_where('pegawai_data', ['id_pegawai' => $user['pegawai_id']])->row_array();


		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role_id' => $user['role_id'],
					'status_pegawai_id' => $status_pegawai['status_pegawai_id']
				];
				$this->session->set_userdata($data);
				redirect('homepelamar');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<strong>Password Anda Salah</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('rekrutmen');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>Username Tidak Terdaftar. Coba Cek Kembali</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('rekrutmen');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message_logout', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Anda Berhasil Logout.</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
		redirect('rekrutmen');
	}

	public function daftar()
	{
		if ($this->session->userdata('role_id') == !null) {
			is_login_rekrutmen(array('2'));
		}
		$data['title'] = 'Recruitment | BAYHI';

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('posisi_melamar', 'Posisi Melamar', 'required|trim');
		$this->form_validation->set_rules('hp', 'Nomor HP', 'required|trim|is_unique[pegawai_user.username]', [
			'is_unique' => 'Nomor HP ini Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[8]|matches[re_pass]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek! Minimal 8 Karakter.'
		]);
		$this->form_validation->set_rules('re_pass', 'Konfirmasi Password', 'required|trim|matches[pass]');

		if ($this->form_validation->run() == false) {
			// $this->load->view('rekrutmen/daftar', $data);
			$this->load->view('maintenance', $data);
		} else {
			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
				'niy_pegawai' => '',
				'nik_pegawai' => '',
				'tempat_lahir' => '',
				'tanggal_lahir' => '',
				'jenis_kelamin' => '',
				'alamat' => '',
				'kel_id_pegawai' => 0,
				'agama_id' => 0,
				'status_perkawinan' => '',
				'no_wa_telp' => htmlspecialchars($this->input->post('hp')),
				'email_pegawai' => '',
				'unit_kerja_id' => 1,
				'status_pegawai_id' => 4,
				'ket_guru_id' => 0,
				'pend_aktif_id' => 0,
				'tahun_masuk' => htmlspecialchars($this->input->post('tahun_masuk')),
				'foto' => 'akun.jpg',
				'progres_lamaran' => 0,
				'aktif_pegawai' => 2, // untuk aktivasi data primer
			];

			$this->pm->insert_data($data, 'pegawai_data');


			$getIdPegawai = $this->db->insert_id();
			// var_dump($getIdPegawai);
			// die;

			$dataPengguna = [
				'pegawai_id' => $getIdPegawai,
				'username' => htmlspecialchars($this->input->post('hp')),
				'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
				'pass_tampil' => htmlspecialchars($this->input->post('pass')),
				'role_id' => htmlspecialchars($this->input->post('posisi_melamar')),
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

			$dataHistorySeleksi = [
				'pegawai_id_hisrek' => $getIdPegawai,
				'tahap_id_hisrek' => 1,
				'status_hisrek' => 1
			];

			$this->pm->insert_data($dataHistorySeleksi, 'pegawai_history_rekrutmen');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong>Selamat !!!</strong>
			<br> Anda Telah Terdaftar Di Sistem Bayt Al-Hikmah.
			<br> Segera lengkapi data Anda.
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			return redirect('rekrutmen');
		}
	}

	public function blocked()
	{
		$data['title'] = 'Page Not Found';
		$this->load->view('blocked', $data);
	}
}
