<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function validasi_user($username, $password)
    {
        $this->db->from('pegawai_user');
        $this->db->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left');
        $this->db->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left');
        $this->db->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left');
        $this->db->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left');
        $this->db->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=pegawai_data.kel_id_pegawai', 'left');
        $this->db->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left');
        $this->db->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left');
        $this->db->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left');
        $this->db->where(['username' => $username]);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            // return $query->row_array();
            // } else {
            $user = $query->row_array();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    public function getone_user($username)
    {
        $this->db->from('pegawai_user');
        $this->db->join('pegawai_data', 'pegawai_data.id_pegawai=pegawai_id', 'left');
        $this->db->join('pegawai_role_user', 'pegawai_role_user.id_role=role_id', 'left');
        $this->db->join('pegawai_unit', 'pegawai_unit.id_unit=pegawai_data.unit_kerja_id', 'left');
        $this->db->join('pegawai_mapel_guru', 'pegawai_mapel_guru.id_mapel_guru=pegawai_data.ket_guru_id', 'left');
        $this->db->join('pegawai_data_kelurahan', 'pegawai_data_kelurahan.id_kel=pegawai_data.kel_id_pegawai', 'left');
        $this->db->join('pegawai_data_kecamatan', 'pegawai_data_kecamatan.id_kec=pegawai_data_kelurahan.kec_id', 'left');
        $this->db->join('pegawai_data_kota_kab', 'pegawai_data_kota_kab.id_kota_kab=pegawai_data_kecamatan.kota_kab_id', 'left');
        $this->db->join('pegawai_agama', 'pegawai_agama.id_agama=pegawai_data.agama_id', 'left');
        $this->db->join('pegawai_status', 'pegawai_status.id_status_pegawai=pegawai_data.status_pegawai_id', 'left');
        $this->db->where(['username' => $username]);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getAllpegawai()
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
            ->get()
            ->result_array();
    }

    public function datapegawai_beberapa()
    {
        $this->db->select('niy_pegawai, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin');
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
        $query = $this->db->get();
        return $query->result_array();
    }
}
