<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->select('t_pendaftaran.*, t_poliklinik.*, t_pasien.*, t_pemeriksaan1.*, t_pemeriksaan2.*, t_pengambilan_obat.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan1', 't_pendaftaran.id_pendaftaran = t_pemeriksaan1.id_pendaftaran');
        $this->db->join('t_pemeriksaan2', 't_pendaftaran.id_pendaftaran = t_pemeriksaan2.id_pendaftaran');
        $this->db->join('t_pengambilan_obat', 't_pendaftaran.id_pendaftaran = t_pengambilan_obat.id_pendaftaran');
        $this->db->where('status_pembayaran', "1");
        $this->db->where('status_pemeriksaan1', "1");
        $this->db->where('status_pemeriksaan2', "1");
        $this->db->where('status_pengambilan_obat', "1");
        $data['rekam_medis'] = $this->db->get()->result();

        $data['title'] = "Data Rekam Medis";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('rekam_medis/index', $data);
        $this->load->view('templates/main/footer');
    }

    public function tes()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');

        $this->db->select('t_pendaftaran.*, t_pegawai.nama_lengkap, t_poliklinik.*, t_pasien.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pegawai', 't_pendaftaran.id_pegawai = t_pegawai.id_pegawai');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->where('t_pendaftaran.id_pendaftaran', (int)$id_pendaftaran);
        $data['pendaftaran'] = $this->db->get()->result();

        $this->db->select('t_pemeriksaan1.*, t_pegawai.nama_lengkap');
        $this->db->from('t_pemeriksaan1');
        $this->db->join('t_pegawai', 't_pemeriksaan1.id_pegawai = t_pegawai.id_pegawai');
        $this->db->where('t_pemeriksaan1.id_pendaftaran', (int)$id_pendaftaran);
        $data['pemeriksaan1'] = $this->db->get()->result();

        $this->db->select('t_pemeriksaan2.*, t_pegawai.nama_lengkap');
        $this->db->from('t_pemeriksaan2');
        $this->db->join('t_pegawai', 't_pemeriksaan2.id_pegawai = t_pegawai.id_pegawai');
        $this->db->where('t_pemeriksaan2.id_pendaftaran', (int)$id_pendaftaran);
        $data['pemeriksaan2'] = $this->db->get()->result();


        $this->load->view('rekam_medis/cetak_rekam_medis', $data);
    }
}
