<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert_data_batch($data, $table)
    {
        $this->db->insert_batch($table, $data);
    }

    public function show_data($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function delete_data($table, $id_field, $id_data)
    {
        $this->db->where($id_field, $id_data);
        $this->db->delete($table);
    }

    public function getId_data($id, $table, $id_table)
    {
        return $this->db->get_where($table, [$id_table => $id])->row_array();
    }

    public function update_data($field_id_tb, $id_in_input, $table, $data)
    {
        $this->db->where($field_id_tb, $id_in_input);
        $this->db->update($table, $data);
    }

    public function join2_tables($tb_utama, $tb_tujuan, $id_tb_tujuan, $field_id_join)
    {
        return $this->db->from($tb_utama)
            ->join($tb_tujuan, $tb_tujuan . '.' . $id_tb_tujuan . '=' . $field_id_join)
            ->order_by($id_tb_tujuan, 'asc')
            ->get()
            ->result_array();
    }

    public function count_rows($tabel)
    {
        $query = $this->db->get($tabel);
        return $query->num_rows();
    }

    public function getdata_byID($table, $get_field_id, $id)
    {
        $this->db->where($get_field_id, $id);
        return $this->db->get($table)->result_array();
    }

    public function count_by_category($field_category, $tabel, $category)
    {
        $this->db->where($field_category, $category);
        return $this->db->count_all_results($tabel);
    }

    public function getnext_data($tabel, $id_currentData, $field_id)
    {
        $this->db->where($field_id . '>', $id_currentData);
        $this->db->order_by($field_id, 'ASC');
        $this->db->limit(1);
        return $this->db->get($tabel)->row_array();
    }

    public function getsession_auth($username)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_history_karir AS karir_jbt1', 'karir_jbt1.id_history_karir=pegawai_data.jabatan_1', 'left')
            ->join('pegawai_history_karir AS karir_jbt2', 'karir_jbt2.id_history_karir=pegawai_data.jabatan_2', 'left')
            ->join('pegawai_history_karir AS karir_jbt3', 'karir_jbt3.id_history_karir=pegawai_data.jabatan_3', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->select('
            pegawai_user.*,
            pegawai_data.*,
            pegawai_role_user.*,
            pegawai_unit.*,
            karir_jbt1.unit_karir_id AS unit_jabatan1,
            karir_jbt2.unit_karir_id AS unit_jabatan2,
            karir_jbt3.unit_karir_id AS unit_jabatan3,
            karir_jbt1.jabatan_karir_id AS jabatan1,
            karir_jbt2.jabatan_karir_id AS jabatan2,
            karir_jbt3.jabatan_karir_id AS jabatan3,
            pegawai_status.*
            ')
            // ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            // ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            // ->join('pegawai_unit AS unit_jbt1', 'unit_jbt1.id_unit=karir_jbt1.unit_karir_id', 'left')
            // ->join('pegawai_jabatan AS jbt1', 'jbt1.id_jabatan=karir_jbt1.jabatan_karir_id', 'left')
            ->where(['username' => $username])
            ->get()
            ->row_array();
    }

    public function checkIfExists($id_tabel, $field_id, $tabel)
    {
        $this->db->where($field_id, $id_tabel);
        $query = $this->db->get($tabel);
        return $query->num_rows() > 0;
    }

    public function hitung_staff()
    {
        $this->db->select('COUNT(*) AS total_staff');
        $this->db->from('pegawai_data');
        $this->db->join('pegawai_user', 'pegawai_user.pegawai_id=id_pegawai');
        $this->db->where_in('status_pegawai_id', [1, 2, 3, 5]);
        $this->db->where('aktif_pegawai', 1);
        $this->db->where('pegawai_user.role_id', 7);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->total_staff;
        } else {
            return 0;
        }
    }

    public function hitung_guru()
    {
        $this->db->select('COUNT(*) AS total_guru');
        $this->db->from('pegawai_data');
        $this->db->join('pegawai_user', 'pegawai_user.pegawai_id=id_pegawai');
        $this->db->where_in('status_pegawai_id', [1, 2, 3, 5]);
        $this->db->where('aktif_pegawai', 1);
        $this->db->where('pegawai_user.role_id', 8);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->total_guru;
        } else {
            return 0;
        }
    }

    public function hitung_kebrek_tahun_ini()
    {
        $tahun_ini = date('Y');

        $this->db->select('COUNT(*) AS total_kebrek');
        $this->db->from('pegawai_kebutuhan_rekrutmen');
        $this->db->where('tahun_rekrutmen', $tahun_ini);
        $this->db->where('keb_rek_aktif', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->total_kebrek;
        } else {
            return 0;
        }
    }

    public function get_status_pegawai($username)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->where(['username' => $username])
            ->get()
            ->row_array();
    }

    public function data_pegawai($username)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left')
            ->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec=kel2.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left')
            ->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pegawai, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pegawai, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pegawai, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*')
            ->where(['username' => $username])
            ->get()
            ->row_array();
    }

    public function data_individu_pegawai($id_pegawai)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left')
            ->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec=kel2.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left')
            ->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pegawai, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pegawai, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pegawai, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*')
            ->where(['pegawai_data.id_pegawai' => $id_pegawai])
            ->get()
            ->row_array();
    }

    public function data_Allpegawai()
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left')
            ->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->where_not_in('pegawai_data.status_pegawai_id', [4])
            ->where_not_in('pegawai_user.role_id', [1])
            ->where('pegawai_data.aktif_pegawai', 1)
            ->get()
            ->result_array();
    }

    public function data_pegawai_download()
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left')
            ->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec=kel2.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left')
            ->join('pegawai_history_pendidikan', 'pegawai_history_pendidikan.id_history_pendidikan=pegawai_data.pend_aktif_id', 'left')
            ->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pegawai_history_pendidikan.pendidikan_pegawai_id', 'left')
            ->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pegawai, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pegawai, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pegawai, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*, pegawai_history_pendidikan.*, pegawai_pendidikan.*')
            ->where_not_in('pegawai_data.status_pegawai_id', [4])
            ->where_not_in('pegawai_user.role_id', [1])
            ->where('pegawai_data.aktif_pegawai', 1)
            ->get()
            ->result_array();
    }

    public function jumlah_pegawai()
    {
        $this->db->where_not_in('status_pegawai_id', [1, 4]);
        return $this->db->count_all_results('pegawai_data');
    }

    public function data_status_seleksi()
    {
        return array(
            '1' => 'Diterima',
            '2' => 'Proses',
            '0' => 'Ditolak'
        );
    }

    public function get_value_status_seleksi($id_status_seleksi)
    {
        $status_seleksi = $this->data_status_seleksi();
        return isset($status_seleksi[$id_status_seleksi]) ? $status_seleksi[$id_status_seleksi] : "Data Tidak Ada";
    }

    public function data_jenis_perkawinan()
    {
        return array(
            '1' => 'Kawin',
            '2' => 'Belum Kawin',
            '3' => 'Duda / Janda'
        );
    }

    public function data_jenis_kelamin()
    {
        return array(
            '1' => 'Laki - Laki',
            '2' => 'Perempuan',
        );
    }

    public function data_kebutuhan_rekurtmen()
    {
        return $this->db->from('pegawai_kebutuhan_rekrutmen')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=kebutuhan_role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=kebutuhan_unit_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=kebutuhan_mapel_id', 'left')
            ->get()
            ->result_array();
    }

    public function kebutuhan_byposisi($role_id, $tahun_berjalan)
    {
        return $this->db->from('pegawai_kebutuhan_rekrutmen')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=kebutuhan_role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=kebutuhan_unit_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=kebutuhan_mapel_id', 'left')
            ->where(['kebutuhan_role_id' => $role_id])
            ->where(['tahun_rekrutmen' => $tahun_berjalan])
            ->get()
            ->result_array();
    }

    public function tahap_seleksi($id_pegawai)
    {
        return $this->db->from('pegawai_history_rekrutmen')
            ->join('pegawai_tahap_rekrutmen', 'pegawai_tahap_rekrutmen.id_tahap_rekrutmen=tahap_id_hisrek', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hisrek', 'left')
            ->where(['pegawai_id_hisrek' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_seleksi($pegawai_id_hisrek)
    {
        return $this->db->from('pegawai_history_rekrutmen')
            ->join('pegawai_tahap_rekrutmen', 'pegawai_tahap_rekrutmen.id_tahap_rekrutmen=tahap_id_hisrek', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hisrek', 'left')
            ->where('pegawai_id_hisrek', $pegawai_id_hisrek)
            ->order_by('tahap_id_hisrek', 'asc')
            ->get()
            ->result_array();
    }

    public function Alltahap_seleksi()
    {
        return $this->db->from('pegawai_history_rekrutmen')
            ->join('pegawai_tahap_rekrutmen', 'pegawai_tahap_rekrutmen.id_tahap_rekrutmen=tahap_id_hisrek', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hisrek', 'left')
            ->order_by('tahap_id_hisrek', 'asc')
            ->get()
            ->result_array();
    }

    public function datanext_tahap($id_tahap_rekrutmen)
    {
        $this->db->where('id_tahap_rekrutmen >', $id_tahap_rekrutmen);
        $this->db->order_by('id_tahap_rekrutmen', 'ASC');
        $this->db->limit(1);
        return $this->db->get('pegawai_tahap_rekrutmen')->row_array();
    }

    public function data_pelamar($username)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left')
            ->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec = kel2.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left')
            ->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pelamar, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pelamar, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pelamar, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*')
            ->where(['username' => $username])
            ->get()
            ->row_array();
    }

    public function data_individu_pelamar($id_pegawai)
    {
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=ket_guru_id', 'left')
            ->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left')
            ->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left')
            ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left')
            ->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec = kel2.kec_id', 'left')
            ->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left')
            ->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pelamar, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pelamar, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pelamar, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*')
            ->where(['pegawai_data.id_pegawai' => $id_pegawai])
            ->get()
            ->row_array();
    }

    public function riwayat_pendidikan_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_pendidikan')
            ->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pendidikan_pegawai_id', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispen', 'left')
            ->where(['pegawai_id_hispen' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_pekerjaan_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_pekerjaan')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispek', 'left')
            ->where(['pegawai_id_hispek' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_organisasi_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_organisasi')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hisor', 'left')
            ->join('pegawai_data_tingkatan', 'pegawai_data_tingkatan.id_tingkatan=tingkat_organisasi_id', 'left')
            ->where(['pegawai_id_hisor' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_proyek_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_proyek')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispro', 'left')
            ->join('pegawai_data_tingkatan', 'pegawai_data_tingkatan.id_tingkatan=tingkat_proyek_id', 'left')
            ->where(['pegawai_id_hispro' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_pelatihan_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_pelatihan')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispel', 'left')
            // ->join('pegawai_data_pelatihan', 'pegawai_data_pelatihan.id_unit=pelatihan_id', 'left')
            ->where(['pegawai_id_hispel' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function riwayat_karir_individu($id_pegawai)
    {
        return $this->db->from('pegawai_history_karir')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hiskar', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=jabatan_karir_id', 'left')
            ->where(['pegawai_id_hiskar' => $id_pegawai])
            ->get()
            ->result_array();
    }

    public function data_keluarga($id_pegawai)
    {
        return $this->db->from('pegawai_data_keluarga')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_anggota', 'left')
            ->join('pegawai_hubungan_keluarga', 'pegawai_hubungan_keluarga.id_hubungan_keluarga=hubungan_pegawai_id', 'left')
            ->where(['pegawai_id_anggota' => $id_pegawai])
            ->get()
            ->result_array();
    }

    // public function data_jabatan_satu($id_pegawai)
    // {
    //     return $this->db->from('pegawai_data')
    //         ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_1', 'left')
    //         ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
    //         ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
    //         ->where(['pegawai_id_hiskar' => $id_pegawai])
    //         ->get()
    //         ->row_array();
    // }

    public function data_karir_aktif($id_pegawai)
    {
        return $this->db->from('pegawai_history_karir')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hiskar', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
            ->where(['pegawai_id_hiskar' => $id_pegawai])
            ->where(['karir_aktif' => 1])
            ->get()
            ->result_array();
    }

    // public function data_jabatan_dua($id_pegawai)
    // {
    //     return $this->db->from('pegawai_data')
    //         ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_2', 'left')
    //         ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
    //         ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
    //         ->where(['pegawai_id_hiskar' => $id_pegawai])
    //         ->get()
    //         ->row_array();
    // }

    // public function data_jabatan_tiga($id_pegawai)
    // {
    //     return $this->db->from('pegawai_data')
    //         ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_3', 'left')
    //         ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
    //         ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
    //         ->where(['pegawai_id_hiskar' => $id_pegawai])
    //         ->get()
    //         ->row_array();
    // }

    public function data_Allpelamar()
    {
        $this->db->from('pegawai_data');
        $this->db->join('pegawai_user', 'pegawai_user.pegawai_id=id_pegawai', 'left');
        $this->db->join('pegawai_role_user', 'pegawai_role_user.id_role=pegawai_user.role_id', 'left');
        $this->db->join('pegawai_unit', 'pegawai_unit.id_unit=unit_kerja_id', 'left');
        $this->db->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=kel_id_pegawai', 'left');
        $this->db->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left');
        $this->db->join('pegawai_agama', 'pegawai_agama.id_agama=agama_id', 'left');
        $this->db->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=ket_guru_id', 'left');
        $this->db->join('pegawai_history_pendidikan', 'pegawai_history_pendidikan.id_history_pendidikan=pend_aktif_id', 'left');
        $this->db->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pegawai_history_pendidikan.pendidikan_pegawai_id', 'left');
        $this->db->join('pegawai_status', 'pegawai_status.id_status_pegawai=status_pegawai_id', 'left');
        $this->db->where(['status_pegawai_id' => 4]);
        // $this->db->where(['aktif_pegawai' => 1]);
        $this->db->where(['progres_lamaran' => 1]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pelamar_kirimData()
    {
        $this->db->from('pegawai_data');
        $this->db->join('pegawai_user', 'pegawai_user.pegawai_id=id_pegawai', 'left');
        $this->db->join('pegawai_role_user', 'pegawai_role_user.id_role=pegawai_user.role_id', 'left');
        $this->db->join('pegawai_unit', 'pegawai_unit.id_unit=unit_kerja_id', 'left');
        $this->db->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=kel_id_pegawai', 'left');
        $this->db->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left');
        $this->db->join('pegawai_agama', 'pegawai_agama.id_agama=agama_id', 'left');
        $this->db->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=ket_guru_id', 'left');
        $this->db->join('pegawai_history_pendidikan', 'pegawai_history_pendidikan.id_history_pendidikan=pend_aktif_id', 'left');
        $this->db->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pegawai_history_pendidikan.pendidikan_pegawai_id', 'left');
        $this->db->join('pegawai_status', 'pegawai_status.id_status_pegawai=status_pegawai_id', 'left');
        $this->db->where(['status_pegawai_id' => 4]);
        $this->db->where(['progres_lamaran' => 1]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function filter_Allpelamar($tahun)
    {
        $this->db->from('pegawai_data');
        $this->db->join('pegawai_user', 'pegawai_user.pegawai_id=id_pegawai', 'left');
        $this->db->join('pegawai_role_user', 'pegawai_role_user.id_role=pegawai_user.role_id', 'left');
        $this->db->join('pegawai_unit', 'pegawai_unit.id_unit=unit_kerja_id', 'left');
        $this->db->join('pegawai_data_kelurahan AS kel1', 'kel1.id_kel = pegawai_data.kel_id_pegawai', 'left');
        $this->db->join('pegawai_data_kecamatan AS kec1', 'kec1.id_kec=kel1.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab AS kotakab1', 'kotakab1.id_kota_kab=kec1.kota_kab_id', 'left');
        $this->db->join('pegawai_data_kelurahan AS kel2', 'kel2.id_kel = pegawai_data.kel_id_domisili', 'left');
        $this->db->join('pegawai_data_kecamatan AS kec2', 'kec2.id_kec = kel2.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab AS kotakab2', 'kotakab2.id_kota_kab=kec2.kota_kab_id', 'left');
        $this->db->join('pegawai_agama', 'pegawai_agama.id_agama=agama_id', 'left');
        $this->db->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=ket_guru_id', 'left');
        $this->db->join('pegawai_history_pendidikan', 'pegawai_history_pendidikan.id_history_pendidikan=pend_aktif_id', 'left');
        $this->db->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pegawai_history_pendidikan.pendidikan_pegawai_id', 'left');
        $this->db->select('pegawai_user.*, pegawai_data.*, pegawai_role_user.*, pegawai_unit.*, pegawai_mapel_guru.*, kel1.nama_kelurahan AS nama_kelurahan_pelamar, kel2.nama_kelurahan AS nama_kelurahan_domisili, kec1.nama_kecamatan AS nama_kecamatan_pelamar, kec2.nama_kecamatan AS nama_kecamatan_domisili, kotakab1.nama_kota_kab AS nama_kotakab_pelamar, kotakab2.nama_kota_kab AS nama_kotakab_domisili, pegawai_agama.*, pegawai_status.*, pegawai_history_pendidikan.*, pegawai_pendidikan.*');
        $this->db->join('pegawai_status', 'pegawai_status.id_status_pegawai=status_pegawai_id', 'left');
        $this->db->where(['tahun_masuk' => $tahun]);
        $this->db->where(['status_pegawai_id' => 4]);
        $this->db->where(['progres_lamaran' => 1]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function riwayat_pendidikan($username)
    {
        return $this->db->from('pegawai_history_pendidikan')
            ->join('pegawai_pendidikan', 'pegawai_pendidikan.id_pendidikan=pendidikan_pegawai_id', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispen', 'left')
            ->join('pegawai_user', 'pegawai_user.pegawai_id=pegawai_data.id_pegawai', 'left')
            ->where(['username' => $username])
            ->get()
            ->result_array();
    }

    public function riwayat_pekerjaan($username)
    {
        return $this->db->from('pegawai_history_pekerjaan')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispek', 'left')
            ->join('pegawai_user', 'pegawai_user.pegawai_id=pegawai_data.id_pegawai', 'left')
            ->where(['username' => $username])
            ->get()
            ->result_array();
    }

    public function riwayat_organisasi($username)
    {
        return $this->db->from('pegawai_history_organisasi')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hisor', 'left')
            ->join('pegawai_data_tingkatan', 'pegawai_data_tingkatan.id_tingkatan=tingkat_organisasi_id', 'left')
            ->join('pegawai_user', 'pegawai_user.pegawai_id=pegawai_data.id_pegawai', 'left')
            ->where(['username' => $username])
            ->get()
            ->result_array();
    }

    public function riwayat_proyek($username)
    {
        return $this->db->from('pegawai_history_proyek')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id_hispro', 'left')
            ->join('pegawai_data_tingkatan', 'pegawai_data_tingkatan.id_tingkatan=tingkat_proyek_id', 'left')
            ->join('pegawai_user', 'pegawai_user.pegawai_id=pegawai_data.id_pegawai', 'left')
            ->where(['username' => $username])
            ->get()
            ->result_array();
    }

    public function jumlah_potonganGajiPegawai($id_periode_gaji, $id_pegawai)
    {
        $this->db->select_sum('total_rincian_gaji');
        $this->db->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left');
        $this->db->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left');
        $this->db->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 2);
        $this->db->where('periode_gaji_id', $id_periode_gaji);
        $this->db->where('pegawai_gaji_id', $id_pegawai);
        $query = $this->db->get('pegawai_keuangan_gaji');
        return $query->row()->total_rincian_gaji;
    }

    public function jumlah_penerimaanGajiPegawai($id_periode_gaji, $id_pegawai)
    {
        $this->db->select_sum('total_rincian_gaji');
        $this->db->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left');
        $this->db->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left');
        $this->db->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 1);
        $this->db->where('periode_gaji_id', $id_periode_gaji);
        $this->db->where('pegawai_gaji_id', $id_pegawai);
        $query = $this->db->get('pegawai_keuangan_gaji');
        return $query->row()->total_rincian_gaji;
    }

    public function jumlah_penerimaanJabatanGajiPegawai($id_periode_gaji, $id_pegawai)
    {
        $this->db->select_sum('total_rincian_gaji');
        $this->db->where_not_in('jabatan_gaji_id', [0]);
        $this->db->where('periode_gaji_id', $id_periode_gaji);
        $this->db->where('pegawai_gaji_id', $id_pegawai);
        $query = $this->db->get('pegawai_keuangan_gaji');
        return $query->row()->total_rincian_gaji;
    }

    public function rincian_kategoriGaji($id_kategori_gaji)
    {
        return $this->db->from('pegawai_keuangan_rincian_gaji')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=kategori_gaji_id', 'left')
            ->where('kategori_gaji_id', $id_kategori_gaji)
            ->get()
            ->result_array();
    }

    public function rincian_penrimaanGaji()
    {
        return $this->db->from('pegawai_keuangan_rincian_gaji')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=kategori_gaji_id', 'left')
            ->where('kategori_gaji_id', 1)
            ->where_not_in('id_rincian_gaji', [1])
            ->get()
            ->result_array();
    }

    public function rincian_potonganGaji()
    {
        return $this->db->from('pegawai_keuangan_rincian_gaji')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=kategori_gaji_id', 'left')
            ->where('kategori_gaji_id', 2)
            ->get()
            ->result_array();
    }

    public function Settingrincian_penrimaanGaji()
    {
        return $this->db->from('pegawai_keuangan_rincian_gaji')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=kategori_gaji_id', 'left')
            ->where('kategori_gaji_id', 1)
            ->where('id_rincian_gaji', 1)
            ->get()
            ->result_array();
    }

    public function periode_gaji()
    {
        return $this->db->from('pegawai_keuangan_periode_gaji')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=bulan_id', 'left')
            ->get()
            ->result_array();
    }

    public function data_gajipegawai()
    // public function data_gajipegawai($id_periode_gaji)
    {
        // return $this->db->from('pegawai_data')
        // return $this->db->from('pegawai_keuangan_gaji')
        // ->join('pegawai_keuangan_gaji', 'pegawai_keuangan_gaji.pegawai_gaji_id=id_pegawai', 'left')
        // ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_gaji_id', 'left')
        // ->select('pegawai_data.nama_lengkap, pegawai_data.id_pegawai')
        // ->select('pegawai_data.nama_lengkap, pegawai_data.id_pegawai')
        // ->where('periode_gaji_id', $id_periode_gaji)
        // ->where_not_in('pegawai_data.status_pegawai_id', [4])
        // ->where_not_in('pegawai_user.role_id', [1])
        // ->where('pegawai_data.aktif_pegawai', 1)
        // ->get()
        // ->result_array();
        return $this->db->from('pegawai_user')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left')
            ->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left')
            ->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left')
            // ->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=pegawai_data.kel_id_pegawai', 'left')
            // ->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left')
            // ->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left')
            // ->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left')
            // ->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left')
            ->where_not_in('pegawai_data.status_pegawai_id', [4])
            ->where_not_in('pegawai_user.role_id', [1])
            ->where('pegawai_data.aktif_pegawai', 1)
            ->get()
            ->result_array();
    }

    public function gaji_perperiode_perpegawai($id_periode_gaji, $id_pegawai)
    {
        return $this->db->from('pegawai_keuangan_gaji')
            // ->join('pegawai_data AS penggaji', 'penggaji.id_pegawai=pegawai_gaji_input_id', 'left')
            // ->join('pegawai_data AS semua_peg', 'semua_peg.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_keuangan_periode_gaji', 'pegawai_keuangan_periode_gaji.id_periode_gaji=periode_gaji_id', 'left')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=pegawai_keuangan_periode_gaji.bulan_id', 'left')
            ->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left')
            ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_gaji_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
            ->select('pegawai_data.nama_lengkap, pegawai_data_bulan.nama_bulan, pegawai_keuangan_periode_gaji.tahun, pegawai_keuangan_gaji.kategori_rincian_gaji_id, pegawai_keuangan_gaji.jabatan_gaji_id,pegawai_keuangan_rincian_gaji.rincian_gaji, pegawai_jabatan.nama_jabatan, pegawai_keuangan_gaji.jumlah_rincian_gaji, pegawai_keuangan_gaji.nominal_rincian_gaji, pegawai_keuangan_gaji.total_rincian_gaji, pegawai_keuangan_gaji.id_gaji')
            // ->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 1)
            ->where('pegawai_gaji_id', $id_pegawai)
            ->where('periode_gaji_id', $id_periode_gaji)
            // ->order_by('pegawai_keuangan_rincian_gaji.id_rincian_gaji', 'asc')
            // ->order_by('pegawai_history_karir.id_history_karir', 'asc')
            ->get()
            ->result_array();
    }

    public function penerimaan_perPegawai($id_periode_gaji, $id_pegawai)
    {
        return $this->db->from('pegawai_keuangan_gaji')
            ->join('pegawai_data AS penggaji', 'penggaji.id_pegawai=pegawai_gaji_input_id', 'left')
            ->join('pegawai_data AS semua_peg', 'semua_peg.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_keuangan_periode_gaji', 'pegawai_keuangan_periode_gaji.id_periode_gaji=periode_gaji_id', 'left')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=pegawai_keuangan_periode_gaji.bulan_id', 'left')
            ->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left')
            ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_gaji_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
            ->select('penggaji.nama_lengkap AS nama_penggaji, semua_peg.nama_lengkap AS nama_pegawai_gaji, pegawai_data_bulan.nama_bulan, pegawai_keuangan_periode_gaji.tahun, pegawai_keuangan_gaji.kategori_rincian_gaji_id, pegawai_keuangan_gaji.jabatan_gaji_id,pegawai_keuangan_rincian_gaji.rincian_gaji, pegawai_jabatan.nama_jabatan, pegawai_keuangan_gaji.jumlah_rincian_gaji, pegawai_keuangan_gaji.nominal_rincian_gaji, pegawai_keuangan_gaji.total_rincian_gaji, pegawai_keuangan_gaji.id_gaji')
            ->where('pegawai_gaji_id', $id_pegawai)
            ->where('periode_gaji_id', $id_periode_gaji)
            ->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 1)
            // ->where_not_in('jabatan_gaji_id', [0])
            ->order_by('id_gaji', 'asc')
            ->get()
            ->result_array();
    }

    public function penerimaanJabatan_perPegawai($id_periode_gaji, $id_pegawai)
    {
        return $this->db->from('pegawai_keuangan_gaji')
            ->join('pegawai_data AS penggaji', 'penggaji.id_pegawai=pegawai_gaji_input_id', 'left')
            ->join('pegawai_data AS semua_peg', 'semua_peg.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_keuangan_periode_gaji', 'pegawai_keuangan_periode_gaji.id_periode_gaji=periode_gaji_id', 'left')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=pegawai_keuangan_periode_gaji.bulan_id', 'left')
            ->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left')
            ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_gaji_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
            ->select('penggaji.nama_lengkap AS nama_penggaji, semua_peg.nama_lengkap AS nama_pegawai_gaji, pegawai_data_bulan.nama_bulan, pegawai_keuangan_periode_gaji.tahun, pegawai_keuangan_gaji.kategori_rincian_gaji_id, pegawai_keuangan_gaji.jabatan_gaji_id,pegawai_keuangan_rincian_gaji.rincian_gaji, pegawai_jabatan.nama_jabatan, pegawai_keuangan_gaji.jumlah_rincian_gaji, pegawai_keuangan_gaji.nominal_rincian_gaji, pegawai_keuangan_gaji.total_rincian_gaji, pegawai_keuangan_gaji.id_gaji')
            ->where('pegawai_gaji_id', $id_pegawai)
            ->where('periode_gaji_id', $id_periode_gaji)
            // ->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 1)
            ->where('kategori_rincian_gaji_id', 0)
            ->where_not_in('jabatan_gaji_id', [0])
            ->order_by('id_gaji', 'asc')
            ->get()
            ->result_array();
    }

    public function potongan_perPegawai($id_periode_gaji, $id_pegawai)
    {
        return $this->db->from('pegawai_keuangan_gaji')
            ->join('pegawai_data AS penggaji', 'penggaji.id_pegawai=pegawai_gaji_input_id', 'left')
            ->join('pegawai_data AS semua_peg', 'semua_peg.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_keuangan_periode_gaji', 'pegawai_keuangan_periode_gaji.id_periode_gaji=periode_gaji_id', 'left')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=pegawai_keuangan_periode_gaji.bulan_id', 'left')
            ->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left')
            ->join('pegawai_history_karir', 'pegawai_history_karir.id_history_karir=jabatan_gaji_id', 'left')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_history_karir.unit_karir_id', 'left')
            ->join('pegawai_jabatan', 'pegawai_jabatan.id_jabatan=pegawai_history_karir.jabatan_karir_id', 'left')
            ->select('penggaji.nama_lengkap AS nama_penggaji, semua_peg.nama_lengkap AS nama_pegawai_gaji, pegawai_data_bulan.nama_bulan, pegawai_keuangan_periode_gaji.tahun, pegawai_keuangan_gaji.kategori_rincian_gaji_id, pegawai_keuangan_gaji.jabatan_gaji_id,pegawai_keuangan_rincian_gaji.rincian_gaji, pegawai_jabatan.nama_jabatan, pegawai_keuangan_gaji.jumlah_rincian_gaji, pegawai_keuangan_gaji.nominal_rincian_gaji, pegawai_keuangan_gaji.total_rincian_gaji, pegawai_keuangan_gaji.id_gaji')
            // ->where_not_in('jabatan_gaji_id', [0])
            ->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 2)
            ->where('pegawai_gaji_id', $id_pegawai)
            ->where('periode_gaji_id', $id_periode_gaji)
            ->order_by('id_gaji', 'asc')
            ->get()
            ->result_array();
    }

    public function settingGajiSetahun($tahun_aktif)
    {
        return $this->db->from('pegawai_keuangan_gaji')
            // ->join('pegawai_data AS penggaji', 'penggaji.id_pegawai=pegawai_gaji_input_id', 'left')
            // ->join('pegawai_data AS semua_peg', 'semua_peg.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_gaji_id', 'left')
            ->join('pegawai_keuangan_periode_gaji', 'pegawai_keuangan_periode_gaji.id_periode_gaji=periode_gaji_id', 'left')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=pegawai_keuangan_periode_gaji.bulan_id', 'left')
            ->join('pegawai_keuangan_rincian_gaji', 'pegawai_keuangan_rincian_gaji.id_rincian_gaji=kategori_rincian_gaji_id', 'left')
            ->join('pegawai_keuangan_kategori_gaji', 'pegawai_keuangan_kategori_gaji.id_kategori_gaji=pegawai_keuangan_rincian_gaji.kategori_gaji_id', 'left')
            ->select('pegawai_data.nama_lengkap, pegawai_data_bulan.nama_bulan, pegawai_keuangan_periode_gaji.tahun, pegawai_keuangan_rincian_gaji.rincian_gaji, pegawai_keuangan_gaji.jumlah_rincian_gaji, pegawai_keuangan_gaji.nominal_rincian_gaji, pegawai_keuangan_gaji.total_rincian_gaji, pegawai_keuangan_gaji.id_gaji')
            ->where('pegawai_keuangan_rincian_gaji.kategori_gaji_id', 1)
            ->where('pegawai_keuangan_periode_gaji.tahun', $tahun_aktif)
            ->get()
            ->result_array();
    }

    public function BuanTahunAktif($tahun_aktif)
    {
        return $this->db->from('pegawai_keuangan_periode_gaji')
            ->join('pegawai_data_bulan', 'pegawai_data_bulan.id_bulan=bulan_id', 'left')
            ->where('tahun', $tahun_aktif)
            ->get()
            ->result_array();
    }

    public function posisi_unit($id_unit)
    {
        return $this->db->from('pegawai_posisi_unit')
            ->join('pegawai_unit', 'pegawai_unit.id_unit=unit_posisi_id', 'left')
            ->where('unit_posisi_id', $id_unit)
            ->get()
            ->result_array();
    }
}
