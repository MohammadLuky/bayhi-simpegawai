<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model', 'pm');
		is_login(array('1', '2', '3', '4', '5', '6', '7', '8'));
	}

	public function index()
	{
		$data['title'] = 'Gaji Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['PeriodeGaji'] = $this->pm->periode_gaji();
		// $data['cekPegawai_perPeriode'] = $this->pm->checkIfExists();
		$tahun = date('Y');
		$tahun_aktif = $this->db->get_where('pegawai_keuangan_periode_gaji', ['tahun' => $tahun])->row_array();

		$data['is_tahun_aktif'] = $tahun_aktif ? true : false;

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('gaji/index', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function tambahPeriode()
	{
		$tahun_periode = $this->input->post('tahun_periode');

		$bulan = $this->pm->show_data('pegawai_data_bulan');

		$databulan = [];
		foreach ($bulan as $b) {
			$databulan[] = $b['id_bulan'];
		}

		foreach ($databulan as $bulan_id) {
			$dataPeriodeGaji = [
				'bulan_id' => $bulan_id,
				'tahun' => $tahun_periode,
			];
			if ($this->pm->insert_data($dataPeriodeGaji, 'pegawai_keuangan_periode_gaji')) {
				echo json_encode(['status' => 'success']);
			} else {
				echo json_encode(['status' => 'error']);
			}
		}
	}

	public function settingGajiSetahun()
	{
		$data['title'] = 'Kategori Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$tahun_aktif = date('Y');
		$data['GajiPegawaiSetahun'] = $this->pm->settingGajiSetahun($tahun_aktif);
		$data['AllPegawai'] = $this->pm->data_Allpegawai();
		$data['RincianPenerimaan'] = $this->pm->Settingrincian_penrimaanGaji();
		$data['BulanTahunAktif'] = $this->pm->BuanTahunAktif($tahun_aktif);
		$periode = $this->pm->show_data('pegawai_keuangan_periode_gaji');

		$ceksetahun = $this->input->post('ceklist_setahun');

		$this->form_validation->set_rules('rincian_penerimaan[]', 'Rincian Penerimaan', 'required');
		$this->form_validation->set_rules('pegawai_gaji[]', 'Pegawai', 'required', [
			'required' => 'Minimal satu pegawai harus dipilih.'
		]);
		if (!$ceksetahun) {
			$this->form_validation->set_rules('bulan_aktif[]', 'Bulan', 'required');
		}
		$this->form_validation->set_rules('angka_nominal_rincian', 'Nominal Rincian', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('gaji/setting_gaji', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$pegawai_gaji = $this->input->post('pegawai_gaji');
			$rincian_penerimaan = $this->input->post('rincian_penerimaan');
			$angka_nominal_rincian = $this->input->post('angka_nominal_rincian');
			$bulan_aktif = $this->input->post('bulan_aktif');
			$jumlah_rincian_gaji = 1;

			if ($ceksetahun) {
				foreach ($pegawai_gaji as $IDpegawai) {
					foreach ($rincian_penerimaan as $IDpenerimaan) {
						foreach ($periode as $p) {
							$DataGajiPegawai = [
								'pegawai_gaji_input_id' => $data['pegawai']['id_pegawai'],
								'pegawai_gaji_id' => $IDpegawai,
								'periode_gaji_id' => $p['id_periode_gaji'],
								'kategori_rincian_gaji_id' => $IDpenerimaan,
								'jumlah_rincian_gaji' => $jumlah_rincian_gaji,
								'nominal_rincian_gaji' => $angka_nominal_rincian,
								'total_rincian_gaji' => $jumlah_rincian_gaji * $angka_nominal_rincian,
								'tanggal_input' => date('Y-m-d H:i:s'),
							];

							$this->pm->insert_data($DataGajiPegawai, 'pegawai_keuangan_gaji');
						}
					}
				}
			} else {
				foreach ($pegawai_gaji as $IDpegawai) {
					foreach ($rincian_penerimaan as $IDpenerimaan) {
						foreach ($bulan_aktif as $periode) {
							$DataGajiPegawai = [
								'pegawai_gaji_input_id' => $data['pegawai']['id_pegawai'],
								'pegawai_gaji_id' => $IDpegawai,
								'periode_gaji_id' => $periode,
								'kategori_rincian_gaji_id' => $IDpenerimaan,
								'jumlah_rincian_gaji' => $jumlah_rincian_gaji,
								'nominal_rincian_gaji' => $angka_nominal_rincian,
								'total_rincian_gaji' => $jumlah_rincian_gaji * $angka_nominal_rincian,
								'tanggal_input' => date('Y-m-d H:i:s'),
							];

							$this->pm->insert_data($DataGajiPegawai, 'pegawai_keuangan_gaji');
						}
					}
				}
			}


			$this->session->set_flashdata('message', 'Data Anda Berhasil Ditambahkan');
			return redirect('gaji/settingGajiSetahun');
		}
	}

	public function update_settingGaji()
	{
		header('Content-Type: application/json');
		$id_gaji = $this->input->post('id_gaji');
		$jumlah_rincian_gaji = $this->input->post('jumlah_rincian_gaji');
		$nominal_rincian_gaji = $this->input->post('nominal_rincian_gaji');

		$DataGajiPegawai = [

			'jumlah_rincian_gaji' => htmlspecialchars($jumlah_rincian_gaji, ENT_QUOTES),
			'nominal_rincian_gaji' => htmlspecialchars($nominal_rincian_gaji, ENT_QUOTES),
			'total_rincian_gaji' => htmlspecialchars(($jumlah_rincian_gaji * $nominal_rincian_gaji), ENT_QUOTES),
			'tanggal_input' => date('Y-m-d H:i:s')

		];

		$this->pm->update_data('id_gaji', $id_gaji, 'pegawai_keuangan_gaji', $DataGajiPegawai);
		$dataTersimpan = $DataGajiPegawai;
		if ($dataTersimpan) {
			echo json_encode(array('status' => true, 'pesan' => 'Data berhasil diperbarui.'));
		} else {
			echo json_encode(array('status' => false, 'pesan' => 'Gagal memperbarui data.'));
		}
	}

	public function pegawai_perperiode_gaji($id_periode_gaji)
	{
		$data['title'] = 'Pegawai Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['periodeGaji'] = $id_periode_gaji;
		$data['PegawaiGaji'] = $this->pm->data_gajipegawai();
		// $data['PegawaiGaji'] = $this->pm->data_gajipegawai($id_periode_gaji);

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('gaji/pegawai_per_periode_gaji', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function InputGajiPegawai($id_periode_gaji, $id_pegawai)
	{
		$data['title'] = 'Gaji Pegawai';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GajiperPegawai'] = $this->pm->gaji_perperiode_perpegawai($id_periode_gaji, $id_pegawai);
		$data['RincianPenerimaan'] = $this->pm->rincian_penrimaanGaji();
		$data['RincianPotongan'] = $this->pm->rincian_potonganGaji();
		$data['JabatanPegawai'] = $this->pm->data_karir_aktif($id_pegawai);
		$data['id_pegawaiGaji'] = $id_pegawai;
		$data['idPeriodeGaji'] = $id_periode_gaji;

		$totalPenerimaanJabatan = $this->pm->jumlah_penerimaanJabatanGajiPegawai($id_periode_gaji, $id_pegawai);
		$TotalPenerimaanGaji = $this->pm->jumlah_penerimaanGajiPegawai($id_periode_gaji, $id_pegawai);
		$data['TotalAllPenerimaanGaji'] = $TotalPenerimaanGaji + $totalPenerimaanJabatan;
		$data['TotalAllPotongan'] = $this->pm->jumlah_potonganGajiPegawai($id_periode_gaji, $id_pegawai);
		$data['Totalditerima'] = $data['TotalAllPenerimaanGaji'] - $data['TotalAllPotongan'];

		$this->form_validation->set_rules('penerimaan_pegawai[]', 'Rincian Penerimaan', 'required');
		$this->form_validation->set_rules('potongan_pegawai[]', 'Rincian Potongan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('gaji/input_gaji', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {
			$penerimaan_pegawai = $this->input->post('penerimaan_pegawai');
			$potongan_pegawai = $this->input->post('potongan_pegawai');
			$jabatan_gaji = $this->input->post('jabatan_gaji');

			$DataGajiPegawai = [];

			foreach ($penerimaan_pegawai as $terima) {
				$DataGajiPegawai[] = [
					'pegawai_gaji_input_id' => $data['pegawai']['id_pegawai'],
					'pegawai_gaji_id' => $id_pegawai,
					'periode_gaji_id' => $id_periode_gaji,
					'kategori_rincian_gaji_id' => $terima,
					'jabatan_gaji_id' => 0,
					'jumlah_rincian_gaji' => 0,
					'nominal_rincian_gaji' => 0,
					'total_rincian_gaji' => 0,
					'tanggal_input' => date('Y-m-d H:i:s'),
				];
			}

			foreach ($jabatan_gaji as $jabatan) {
				$DataGajiPegawai[] = [
					'pegawai_gaji_input_id' => $data['pegawai']['id_pegawai'],
					'pegawai_gaji_id' => $id_pegawai,
					'periode_gaji_id' => $id_periode_gaji,
					'kategori_rincian_gaji_id' => 0,
					'jabatan_gaji_id' => $jabatan,
					'jumlah_rincian_gaji' => 0,
					'nominal_rincian_gaji' => 0,
					'total_rincian_gaji' => 0,
					'tanggal_input' => date('Y-m-d H:i:s'),
				];
			}

			foreach ($potongan_pegawai as $potong) {
				$DataGajiPegawai[] = [
					'pegawai_gaji_input_id' => $data['pegawai']['id_pegawai'],
					'pegawai_gaji_id' => $id_pegawai,
					'periode_gaji_id' => $id_periode_gaji,
					'kategori_rincian_gaji_id' => $potong,
					'jabatan_gaji_id' => 0,
					'jumlah_rincian_gaji' => 0,
					'nominal_rincian_gaji' => 0,
					'total_rincian_gaji' => 0,
					'tanggal_input' => date('Y-m-d H:i:s'),
				];
			}

			$this->pm->insert_data_batch($DataGajiPegawai, 'pegawai_keuangan_gaji');

			$this->session->set_flashdata('message', 'Data Anda Berhasil Ditambahkan');
			return redirect('gaji/InputGajiPegawai/' . $id_periode_gaji . '/' . $id_pegawai);
		}
	}

	public function update_gajiPegawai()
	{
		header('Content-Type: application/json');
		$id_gaji_input = $this->input->post('id_gaji_input');
		$jumlah_rincian_gaji_input = $this->input->post('jumlah_rincian_gaji_input');
		$nominal_rincian_gaji_input = $this->input->post('nominal_rincian_gaji_input');

		$DataGajiPegawai = [

			'jumlah_rincian_gaji' => htmlspecialchars($jumlah_rincian_gaji_input, ENT_QUOTES),
			'nominal_rincian_gaji' => htmlspecialchars($nominal_rincian_gaji_input, ENT_QUOTES),
			'total_rincian_gaji' => htmlspecialchars(($jumlah_rincian_gaji_input * $nominal_rincian_gaji_input), ENT_QUOTES),
			'tanggal_input' => date('Y-m-d H:i:s')

		];

		$this->pm->update_data('id_gaji', $id_gaji_input, 'pegawai_keuangan_gaji', $DataGajiPegawai);
		$dataTersimpan = $DataGajiPegawai;
		if ($dataTersimpan) {
			echo json_encode(array('status' => true, 'pesan' => 'Data berhasil diperbarui.'));
		} else {
			echo json_encode(array('status' => false, 'pesan' => 'Gagal memperbarui data.'));
		}
	}

	public function katGaji()
	{
		$data['title'] = 'Kategori Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['KategoriGaji'] = $this->pm->show_data('pegawai_keuangan_kategori_gaji');

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('gaji/kat_gaji', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
	}

	public function rincianGaji($id_kategori_gaji)
	{
		$data['title'] = 'Rincian Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetKat_Gaji'] = $this->pm->getId_data($id_kategori_gaji, 'pegawai_keuangan_kategori_gaji', 'id_kategori_gaji');
		$data['Rincian_KategoriGaji'] = $this->pm->rincian_kategoriGaji($id_kategori_gaji);

		$this->form_validation->set_rules('rincian_gaji', 'Rincian Gaji', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('gaji/rincian_gaji', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {

			$rincian_gaji = $this->input->post('rincian_gaji');

			$DataRincianGaji = [
				'kategori_gaji_id' => $id_kategori_gaji,
				'rincian_gaji' => $rincian_gaji,
			];

			$this->pm->insert_data($DataRincianGaji, 'pegawai_keuangan_rincian_gaji');
			$this->session->set_flashdata('message', 'Data Anda Berhasil Ditambahkan');
			return redirect('gaji/rincianGaji/' . $id_kategori_gaji);
		}
	}

	public function edit_rincianGaji($id_rincian_gaji, $id_kategori_gaji)
	{
		$data['title'] = 'Rincian Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetKat_Gaji'] = $this->pm->getId_data($id_kategori_gaji, 'pegawai_keuangan_kategori_gaji', 'id_kategori_gaji');
		$data['GetRincian_Gaji'] = $this->pm->getId_data($id_rincian_gaji, 'pegawai_keuangan_rincian_gaji', 'id_rincian_gaji');
		$data['Rincian_KategoriGaji'] = $this->pm->rincian_kategoriGaji($id_kategori_gaji);

		$this->form_validation->set_rules('rincian_gaji_edit', 'Rincian Gaji', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('manage_pegawai/pegawai_header', $data);
			$this->load->view('manage_pegawai/pegawai_sidebar', $data);
			$this->load->view('gaji/rincian_gaji', $data);
			$this->load->view('manage_pegawai/pegawai_footer', $data);
		} else {

			$rincian_gaji = $this->input->post('rincian_gaji_edit');

			$DataRincianGaji = [
				'kategori_gaji_id' => $id_kategori_gaji,
				'rincian_gaji' => $rincian_gaji,
			];

			$this->pm->update_data('id_rincian_gaji', $id_rincian_gaji, 'pegawai_keuangan_rincian_gaji', $DataRincianGaji);
			$this->session->set_flashdata('message', 'Data Anda Berhasil Diubah');
			return redirect('gaji/rincianGaji/' . $id_kategori_gaji);
		}
	}

	public function hapus_rincianGaji()
	{
		$id_rincian_gaji = $this->input->post('id_rincian_gaji');
		if ($this->pm->delete_data('pegawai_keuangan_rincian_gaji', 'id_rincian_gaji', $id_rincian_gaji)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	public function slip_gaji($id_periode_gaji, $id_pegawai)
	{
		$data['title'] = 'Slip Gaji';
		$data['pegawai'] = $this->pm->data_pegawai($this->session->userdata('username'));
		$data['GetPegawai'] = $this->pm->data_individu_pegawai($id_pegawai);
		$data['PenerimaanGaji'] = $this->pm->penerimaan_perPegawai($id_periode_gaji, $id_pegawai);
		$data['PenerimaanJabatanGaji'] = $this->pm->penerimaanJabatan_perPegawai($id_periode_gaji, $id_pegawai);
		$data['PotonganGaji'] = $this->pm->potongan_perPegawai($id_periode_gaji, $id_pegawai);

		$totalPenerimaanJabatan = $this->pm->jumlah_penerimaanJabatanGajiPegawai($id_periode_gaji, $id_pegawai);
		$TotalPenerimaanGaji = $this->pm->jumlah_penerimaanGajiPegawai($id_periode_gaji, $id_pegawai);
		$data['TotalAllPenerimaanGaji'] = $TotalPenerimaanGaji + $totalPenerimaanJabatan;
		// $data['TotalAllPenerimaanGaji'] = $TotalPenerimaanGaji;
		$data['TotalAllPotongan'] = $this->pm->jumlah_potonganGajiPegawai($id_periode_gaji, $id_pegawai);
		$data['Totalditerima'] = $data['TotalAllPenerimaanGaji'] - $data['TotalAllPotongan'];

		$this->load->view('manage_pegawai/pegawai_header', $data);
		$this->load->view('manage_pegawai/pegawai_sidebar', $data);
		$this->load->view('gaji/slip_gaji', $data);
		$this->load->view('manage_pegawai/pegawai_footer', $data);
		// $this->load->view('gaji/slip_gaji');
	}
}
