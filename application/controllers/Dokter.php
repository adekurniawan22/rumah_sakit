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

        $this->db->select('t_pendaftaran.*, t_pasien.*, t_pemeriksaan1.*, t_pemeriksaan2.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan1', 't_pendaftaran.id_pendaftaran = t_pemeriksaan1.id_pendaftaran');
        $this->db->join('t_pemeriksaan2', 't_pendaftaran.id_pendaftaran = t_pemeriksaan2.id_pendaftaran');
        $this->db->where('t_pasien.id_pasien', $this->input->post('id_pasien'));
        $data['lengkap'] = $this->db->get()->result();

        $data['title'] = "Antrian Pemeriksaan 2";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/tambah_pemeriksaan', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pemeriksaan()
    {
        $this->form_validation->set_rules('keluhan_umum', 'Keluhan Umum', 'required|trim');
        $this->form_validation->set_rules('riwayat_penyakit_sekarang', 'Riwayat Penyakit Sekarang', 'required|trim');
        $this->form_validation->set_rules('riwayat_alergi', 'Riwayat Alergi', 'required|trim');
        $this->form_validation->set_rules('riwayat_penyakit_dahulu', 'Riwayat Penyakit Dahulu', 'required|trim');
        $this->form_validation->set_rules('riwayat_pengobatan', 'Riwayat Pengobatan', 'required|trim');
        $this->form_validation->set_rules('riwayat_penyakit_keluarga', 'Riwayat Penyakit Keluarga', 'required|trim');
        $this->form_validation->set_rules('pemeriksaan', 'Pemeriksaan', 'required|trim');
        $this->form_validation->set_rules('diagnosa_utama', 'Diagnosa Utama', 'required|trim');
        $this->form_validation->set_rules('diagnosa_tambahan', 'Diagnosa Tambahan', 'required|trim');
        $this->form_validation->set_rules('planning', 'Planning', 'required|trim');
        $this->form_validation->set_rules('tindakan', 'Tindakan', 'required|trim');
        $this->form_validation->set_rules('edukasi', 'Edukasi', 'required|trim');

        $data['nomor_antri'] = $this->input->post('nomor_antri');
        $data['id_pendaftaran'] = $this->input->post('id_pendaftaran');
        $data['id_pasien'] = $this->input->post('id_pasien');

        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $data['pasien'] = $this->db->get('t_pasien')->result();

        $this->db->select('t_pendaftaran.jenis_pembayaran, t_pasien.nama_lengkap_pasien, t_pemeriksaan1.*, t_pemeriksaan2.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan1', 't_pendaftaran.id_pendaftaran = t_pemeriksaan1.id_pendaftaran');
        $this->db->join('t_pemeriksaan2', 't_pendaftaran.id_pendaftaran = t_pemeriksaan2.id_pendaftaran');
        $this->db->where('t_pasien.id_pasien', $this->input->post('id_pasien'));
        $data['lengkap'] = $this->db->get()->result();


        if ($this->form_validation->run() == false) {
            $data['title'] = "Antrian Pemeriksaan 2";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('dokter/tambah_pemeriksaan', $data); // Kirim hasil query ke tampilan
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data_pemeriksaan2  = [
                'id_pasien' => $this->input->post('id_pasien'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'keluhan_umum' => $this->input->post('keluhan_umum'),
                'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
                'riwayat_alergi' => $this->input->post('riwayat_alergi'),
                'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
                'riwayat_pengobatan' => $this->input->post('riwayat_pengobatan'),
                'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
                'pemeriksaan' => $this->input->post('pemeriksaan'),
                'diagnosa_utama' => $this->input->post('diagnosa_utama'),
                'diagnosa_tambahan' => $this->input->post('diagnosa_tambahan'),
                'planning' => $this->input->post('planning'),
                'tindakan' => $this->input->post('tindakan'),
                'edukasi' => $this->input->post('edukasi'),
                'rencana_kontrol' => $this->input->post('rencana_kontrol'),
                'pelayanan_home_care' => $this->input->post('pelayanan_home_care'),
                'kontrol_ke_poliklinik' => $this->input->post('kontrol_ke_poliklinik'),
                'perlu_penggunaan_alat' => $this->input->post('perlu_penggunaan_alat'),
                'telah_memesan_alat' => $this->input->post('telah_memesan_alat'),
                'dirujuk_ke_komunitas' => $this->input->post('dirujuk_ke_komunitas'),
                'dirujuk_ke_terapis' => $this->input->post('dirujuk_ke_terapis'),
                'dirujuk_ke_ahli_gizi' => $this->input->post('dirujuk_ke_ahli_gizi'),
                'lain_lain' => $this->input->post('lain_lain'),
                'waktu_pemeriksaan2' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('t_pemeriksaan2', $data_pemeriksaan2);
            echo "<pre>";
            echo print_r($_POST);
            echo "<pre>";
        }
    }
}
