<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->db->select('t_pendaftaran.*, t_poliklinik.nama_poliklinik, t_pasien.*, t_pembayaran.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik', 'left');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien', 'left');
        $this->db->join('t_pembayaran', 't_pendaftaran.id_pendaftaran = t_pembayaran.id_pendaftaran', 'left');
        $query = $this->db->get()->result();
        $data['pembayaran'] = $query;

        $data['title'] = "Kasir";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/main/footer');
    }
}
