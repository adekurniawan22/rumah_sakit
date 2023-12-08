<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $this->db->select('t_pegawai.*, t_poliklinik.nama_poliklinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_poliklinik', 't_pegawai.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->where('t_pegawai.id_pegawai', $id_pegawai);
        $data['pegawai'] = $this->db->get()->row();

        // Data jumlah semua antrian
        $this->db->select('t_antrian.*, t_pendaftaran.*');
        $this->db->from('t_antrian');
        $this->db->join('t_pendaftaran', 't_antrian.id_pendaftaran = t_pendaftaran.id_pendaftaran');
        $this->db->where('t_pendaftaran.id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->where('status_pemeriksaan1', "1");
        $data['panjang_antri'] = $this->db->get()->num_rows();

        //Data Antrian Pasien Berikutnya
        $this->db->select('t_pendaftaran.*, t_pasien.*, t_pemeriksaan1.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan1', 't_pendaftaran.id_pendaftaran = t_pemeriksaan1.id_pendaftaran');
        $this->db->where('id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->where('status_pemeriksaan1', "1");
        $this->db->where('status_pembayaran', "1");
        // $this->db->limit(1);
        $data['antrian'] = $this->db->get()->result();

        $data['title'] = "Antrian Pemeriksaan 2";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/index', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function tambah_pemeriksaan()
    {
        $data['nomor_antri'] = $this->input->post('nomor_antri');
        $data['id_pendaftaran'] = $this->input->post('id_pendaftaran');
        $data['id_pasien'] = $this->input->post('id_pasien');

        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $data['pasien'] = $this->db->get('t_pasien')->result();

        $data['title'] = "Antrian Pemeriksaan 2";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/tambah_pemeriksaan', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pemeriksaan()
    {
        echo "<pre>";
        echo print_r($_POST);
        echo "<pre>";
    }
}
