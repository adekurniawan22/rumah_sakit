<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
    }

    public function buat_qr_code()
    {
        $qrcode['nomor_antri'] = $this->input->post('nomor_antri');
        $qrcode['id_poliklinik'] = $this->input->post('id_poliklinik');
        $data = "http://localhost/rumah_sakit/qr/antrian_live?nomor_antri=" . $qrcode['nomor_antri'] . "&id_poliklinik=" . $qrcode['id_poliklinik'];

        $hex_data   = bin2hex($data);
        $save_name  = $hex_data . '.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255, 255, 255);
        $config['white']        = array(255, 255, 255);
        $this->ciqrcode->initialize($config);

        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

        $this->ciqrcode->generate($params);
        $qrcode['nama_file'] = $save_name;

        // Tampilkan QR Code
        $this->load->view('pendaftaran/qr_code', $qrcode);
    }

    public function antrian_live()
    {
        $data['nomor_antri'] = $this->input->get('nomor_antri');
        $id_poliklinik = $this->input->get('id_poliklinik');

        // Nama poliklinik
        $this->db->where('id_poliklinik', $id_poliklinik);
        $data['nama_poliklinik'] = $this->db->get('t_poliklinik')->row();

        //Data nomor antri sekarang
        $this->db->select_max('nomor_antri_sekarang');
        $this->db->where('id_poliklinik', $id_poliklinik);
        $this->db->from('t_antrian');
        $data['nomor_antri_sekarang'] = $this->db->get()->row();

        $this->load->view('auth/antrian', $data);
    }
}
