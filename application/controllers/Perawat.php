<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('id_role')) {
            // Jika sudah memiliki session id_role, maka arahkan pengguna ke halaman yang sesuai
            switch ($this->session->userdata('id_role')) {
                case 1:
                    redirect('admin');
                    break;
                case 2:
                    redirect('pendaftaran');
                    break;
                case 4:
                    redirect('dokter');
                    break;
                case 5:
                    redirect('kasir');
                    break;
                case 6:
                    redirect('rekam_medis');
                    break;
                case 7:
                    redirect('farmasi');
                    break;
            }
        }
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today_date = date('Y-m-d');

        $id_pegawai = $this->session->userdata('id_pegawai');
        $this->db->select('t_pegawai.*, t_poliklinik.nama_poliklinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_poliklinik', 't_pegawai.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->where('t_pegawai.id_pegawai', $id_pegawai);
        $data['pegawai'] = $this->db->get()->row();

        // Data jumlah semua antrian
        $this->db->where('id_poliklinik', $data['pegawai']->id_poliklinik);
        $data['panjang_antri'] = $this->db->get('t_antrian')->num_rows();

        //Data nomor antri sekarang
        $this->db->select_max('nomor_antri_sekarang');
        $this->db->where('id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->from('t_antrian');
        $data['nomor_antri_sekarang'] = $this->db->get()->row();

        //Data Antrian Pasien Berikutnya
        $this->db->select('t_pendaftaran.*, t_pasien.*, t_pembayaran.nomor_antri');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pembayaran', 't_pendaftaran.id_pendaftaran = t_pembayaran.id_pendaftaran');
        $this->db->where('id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->where('status_pemeriksaan1', "0");
        $this->db->where('status_pembayaran', "1");
        // $this->db->where("DATE(waktu_pendaftaran) = '$today_date'");
        $this->db->order_by('t_pembayaran.nomor_antri', 'ASC'); // Urutkan berdasarkan id_pendaftaran terkecil
        $this->db->limit(1);
        $data['antrian'] = $this->db->get()->result();

        $data['title'] = "Antrian Pemeriksaan 1";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/index', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function tambah_pemeriksaan()
    {
        $data['nomor_antri'] = $this->input->post('nomor_antri');
        $data['id_pendaftaran'] = $this->input->post('id_pendaftaran');
        $data['id_pasien'] = $this->input->post('id_pasien');
        $data['title'] = "Antrian Pemeriksaan 1";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/tambah_pemeriksaan', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pemeriksaan()
    {
        $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'required|trim');
        $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required|trim');
        $this->form_validation->set_rules('gcs', 'GCS', 'required|trim');
        $this->form_validation->set_rules('e', 'E', 'required|trim');
        $this->form_validation->set_rules('v', 'V', 'required|trim');
        $this->form_validation->set_rules('m', 'M', 'required|trim');
        $this->form_validation->set_rules('keluhan_umum', 'Keluhan Umum', 'required|trim');
        $this->form_validation->set_rules('keluhan_lain', 'Keluhan Lain', 'required|trim');

        $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required|trim');
        $this->form_validation->set_rules('nadi', 'Nadi', 'required|trim');
        $this->form_validation->set_rules('temperatur', 'Temperatur', 'required|trim');
        $this->form_validation->set_rules('pernapasan', 'Pernapasan', 'required|trim');
        $this->form_validation->set_rules('nyeri', 'Nyeri', 'required|trim');
        $this->form_validation->set_rules('pencetus', 'Pencetus', 'required|trim');
        $this->form_validation->set_rules('kwalitas', 'Kwalitas', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('skala', 'Skala', 'required|trim');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');

        $this->form_validation->set_rules('pengetahuan_tentang_penyakit', 'Pengathuan tentang penyakit saat ini', 'required|trim');
        $this->form_validation->set_rules('perawatan_yg_dilakukan', 'Perawatan yang dilakukan', 'required|trim');
        $this->form_validation->set_rules('perasaan', 'Perasaan', 'required|trim');

        $this->form_validation->set_rules('status_aktivitas', 'Status Aktivitas', 'required|trim');
        $this->form_validation->set_rules('muskuloskeleta', 'Muskuloskeleta', 'required|trim');
        $this->form_validation->set_rules('kekuatan_otot', 'Kekuatan Otot', 'required|trim');

        $this->form_validation->set_rules('alergi', 'Alergi', 'required|trim');

        $this->form_validation->set_rules('tidur_siang', 'Tidur Siang', 'required|trim');
        $this->form_validation->set_rules('tidur_malam', 'Tidur Malam', 'required|trim');
        $this->form_validation->set_rules('gangguan_tidur', 'Gangguan Tidur', 'required|trim');
        $this->form_validation->set_rules('penerimaan_kondisi', 'Penerimaan Kondisi', 'required|trim');

        $this->form_validation->set_rules('tinggal_bersama', 'Tinggal bersama', 'required|trim');
        $this->form_validation->set_rules('kebiasaan', 'Kebiasaan', 'required|trim');

        $this->form_validation->set_rules('eliminasi', 'Eliminasi', 'required|trim');
        $this->form_validation->set_rules('pola_makan', 'Pola Makan', 'required|trim');
        $this->form_validation->set_rules('pola_minum', 'Pola Minum', 'required|trim');
        $this->form_validation->set_rules('bak', 'Buang Air Kecil', 'required|trim');
        $this->form_validation->set_rules('bab', 'Buang Air Besar', 'required|trim');

        $this->form_validation->set_rules('analisa_masalah_keperawatan', 'Analisa Masalah Keperawatan', 'required|trim');
        $this->form_validation->set_rules('planning', 'Planning', 'required|trim');
        $this->form_validation->set_rules('implementasi_dan_evaluasi', 'Implementasi dan Evaluasi', 'required|trim');
        $this->form_validation->set_rules('edukasi', 'Edukasi', 'required|trim');

        $data['id_pasien'] = $this->input->post('id_pasien');
        $data['id_pendaftaran'] = $this->input->post('id_pendaftaran');
        $data['nomor_antri'] = $this->input->post('nomor_antri');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Antrian Pemeriksaan 1";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('perawat/tambah_pemeriksaan', $data);
            $this->load->view('templates/main/footer');
        } else {

            $fields = array(
                'RTKB_sosial',
                'RTKB_motorik_halus',
                'RTKB_motorik_kasar',
                'RTKB_bahasa',
                'berkas_yang_diberikan',
                'info_edukasi_yang_diberikan'
            );

            foreach ($fields as $field) {
                $inputValue = $this->input->post($field);
                $$field = empty($inputValue) ? "" : implode(', ', $inputValue);
            }

            $umur = empty($this->input->post('umur')) ? "" : $this->input->post('umur');
            $skor_hm = empty($this->input->post('skor_hm')) ? "" : $this->input->post('skor_hm');
            $skor_mfs = empty($this->input->post('skor_mfs')) ? "" : $this->input->post('skor_mfs');
            $skor_omss = empty($this->input->post('skor_omss')) ? "" : $this->input->post('skor_omss');
            $status_laporan_hasil_SR = empty($this->input->post('status_laporan_hasil_SR')) ? "" : $this->input->post('status_laporan_hasil_SR');
            $berat_badan = empty($this->input->post('berat_badan')) ? "" : $this->input->post('berat_badan');
            $tinggi_badan = empty($this->input->post('tinggi_badan')) ? "" : $this->input->post('tinggi_badan');
            $imt = empty($this->input->post('imt')) ? "" : $this->input->post('imt');
            $skor_mst = empty($this->input->post('skor_mst')) ? "" : $this->input->post('skor_mst');
            $imunisasi_dasar = empty($this->input->post('imunisasi_dasar')) ? "" : $this->input->post('imunisasi_dasar');
            $imunisasi_lain = empty($this->input->post('imunisasi_lain')) ? "" : $this->input->post('imunisasi_lain');
            $keadaan_pasien_pulang = empty($this->input->post('keadaan_pasien_pulang')) ? "" : $this->input->post('keadaan_pasien_pulang');
            // $berkas_yang_diberikan = empty($this->input->post('berkas_yang_diberikan')) ? "" : $this->input->post('berkas_yang_diberikan');
            // $info_edukasi_yang_diberikan = empty($this->input->post('info_edukasi_yang_diberikan')) ? "" : $this->input->post('info_edukasi_yang_diberikan');
            $status_permintaan_pulang = empty($this->input->post('status_permintaan_pulang')) ? "" : $this->input->post('status_permintaan_pulang');
            $status_melarikan_diri = empty($this->input->post('status_melarikan_diri')) ? "" : $this->input->post('status_melarikan_diri');

            date_default_timezone_set('Asia/Jakarta');
            $data_pemeriksaan1  = [
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'id_pasien' => $this->input->post('id_pasien'),
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gcs' => $this->input->post('gcs'),
                'e' => $this->input->post('e'),
                'v' => $this->input->post('v'),
                'm' => $this->input->post('m'),
                'keluhan_umum' => $this->input->post('keluhan_umum'),
                'keluhan_lain' => $this->input->post('keluhan_lain'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'nadi' => $this->input->post('nadi'),
                'temperatur' => $this->input->post('temperatur'),
                'pernapasan' => $this->input->post('pernapasan'),
                'nyeri' => $this->input->post('nyeri'),
                'pencetus' => $this->input->post('pencetus'),
                'kwalitas' => $this->input->post('kwalitas'),
                'lokasi' => $this->input->post('lokasi'),
                'skala' => $this->input->post('skala'),
                'durasi' => $this->input->post('durasi'),
                'pengetahuan_tentang_penyakit' => $this->input->post('pengetahuan_tentang_penyakit'),
                'perawatan_yg_dilakukan' => $this->input->post('perawatan_yg_dilakukan'),
                'perasaan' => $this->input->post('perasaan'),
                'status_aktivitas' => $this->input->post('status_aktivitas'),
                'muskuloskeleta' => $this->input->post('muskuloskeleta'),
                'kekuatan_otot' => $this->input->post('kekuatan_otot'),
                'alergi' => $this->input->post('alergi'),
                'tidur_siang' => $this->input->post('tidur_siang'),
                'tidur_malam' => $this->input->post('tidur_malam'),
                'gangguan_tidur' => $this->input->post('gangguan_tidur'),
                'penerimaan_kondisi' => $this->input->post('penerimaan_kondisi'),
                'tinggal_bersama' => $this->input->post('tinggal_bersama'),
                'kebiasaan' => $this->input->post('kebiasaan'),
                'skor_hm' => $skor_hm,
                'skor_mfs' => $skor_mfs,
                'skor_omss' => $skor_omss,
                'status_laporan_hasil_SR' => $status_laporan_hasil_SR,
                'berat_badan' => $berat_badan,
                'tinggi_badan' => $tinggi_badan,
                'imt' => $imt,
                'skor_mst' => $skor_mst,
                'imunisasi_dasar' => $imunisasi_dasar,
                'imunisasi_lain' => $imunisasi_lain,
                'eliminasi' => $this->input->post('eliminasi'),
                'pola_makan' => $this->input->post('pola_makan'),
                'pola_minum' => $this->input->post('pola_minum'),
                'bak' => $this->input->post('bak'),
                'bab' => $this->input->post('bab'),
                'umur' => $umur,
                'RTKB_sosial' => $RTKB_sosial,
                'RTKB_motorik_halus' => $RTKB_motorik_halus,
                'RTKB_motorik_kasar' => $RTKB_motorik_kasar,
                'RTKB_bahasa' => $RTKB_bahasa,
                'analisa_masalah_keperawatan' => $this->input->post('analisa_masalah_keperawatan'),
                'planning' => $this->input->post('planning'),
                'implementasi_dan_evaluasi' => $this->input->post('implementasi_dan_evaluasi'),
                'edukasi' => $this->input->post('edukasi'),
                'keadaan_pasien_pulang' => $keadaan_pasien_pulang,
                'berkas_yang_diberikan' => $berkas_yang_diberikan,
                'info_edukasi_yang_diberikan' => $info_edukasi_yang_diberikan,
                'status_permintaan_pulang' => $status_permintaan_pulang,
                'status_melarikan_diri' => $status_melarikan_diri,
                'waktu_pemeriksaan' => date('Y-m-d H:i:s'),
                'id_pegawai' => $this->session->userdata('id_pegawai'),
            ];

            $this->db->insert('t_pemeriksaan1', $data_pemeriksaan1);

            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('t_pendaftaran', array('status_pemeriksaan1' => '1'));

            $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
            $data['user'] = $this->db->get('t_pegawai')->row();

            $this->db->where('id_poliklinik', $data['user']->id_poliklinik);
            $this->db->update('t_antrian', array('nomor_antri_sekarang' => $this->input->post('nomor_antri')));

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Data Pemeriksaan pasien berhasil ditambahkan!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('perawat');
        }
    }

    public function pemeriksaan()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $this->db->select('t_pegawai.*, t_poliklinik.nama_poliklinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_poliklinik', 't_pegawai.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->where('t_pegawai.id_pegawai', $id_pegawai);
        $data['user'] = $this->db->get()->row();

        $this->db->select('t_pemeriksaan1.*, t_pendaftaran.*, t_pasien.*');
        $this->db->from('t_pemeriksaan1');
        $this->db->join('t_pendaftaran', 't_pemeriksaan1.id_pendaftaran = t_pendaftaran.id_pendaftaran');
        $this->db->join('t_pasien', 't_pemeriksaan1.id_pasien = t_pasien.id_pasien');
        $data['pemeriksaan1'] = $this->db->get()->result();

        $data['title'] = "Data Pemeriksaan 1";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/pemeriksaan', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function edit_pemeriksaan()
    {
        $this->db->where('id_pemeriksaan1', $this->input->post('id_pemeriksaan1'));
        $data['e_pemeriksaan'] = $this->db->get('t_pemeriksaan1')->result();

        $data['title'] = "Data Pemeriksaan 1";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/edit_pemeriksaan', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pemeriksaan()
    {
        $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'required|trim');
        $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required|trim');
        $this->form_validation->set_rules('gcs', 'GCS', 'required|trim');
        $this->form_validation->set_rules('e', 'E', 'required|trim');
        $this->form_validation->set_rules('v', 'V', 'required|trim');
        $this->form_validation->set_rules('m', 'M', 'required|trim');
        $this->form_validation->set_rules('keluhan_umum', 'Keluhan Umum', 'required|trim');
        $this->form_validation->set_rules('keluhan_lain', 'Keluhan Lain', 'required|trim');

        $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required|trim');
        $this->form_validation->set_rules('nadi', 'Nadi', 'required|trim');
        $this->form_validation->set_rules('temperatur', 'Temperatur', 'required|trim');
        $this->form_validation->set_rules('pernapasan', 'Pernapasan', 'required|trim');
        $this->form_validation->set_rules('nyeri', 'Nyeri', 'required|trim');
        $this->form_validation->set_rules('pencetus', 'Pencetus', 'required|trim');
        $this->form_validation->set_rules('kwalitas', 'Kwalitas', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('skala', 'Skala', 'required|trim');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');

        $this->form_validation->set_rules('pengetahuan_tentang_penyakit', 'Pengathuan tentang penyakit saat ini', 'required|trim');
        $this->form_validation->set_rules('perawatan_yg_dilakukan', 'Perawatan yang dilakukan', 'required|trim');
        $this->form_validation->set_rules('perasaan', 'Perasaan', 'required|trim');

        $this->form_validation->set_rules('status_aktivitas', 'Status Aktivitas', 'required|trim');
        $this->form_validation->set_rules('muskuloskeleta', 'Muskuloskeleta', 'required|trim');
        $this->form_validation->set_rules('kekuatan_otot', 'Kekuatan Otot', 'required|trim');

        $this->form_validation->set_rules('alergi', 'Alergi', 'required|trim');

        $this->form_validation->set_rules('tidur_siang', 'Tidur Siang', 'required|trim');
        $this->form_validation->set_rules('tidur_malam', 'Tidur Malam', 'required|trim');
        $this->form_validation->set_rules('gangguan_tidur', 'Gangguan Tidur', 'required|trim');
        $this->form_validation->set_rules('penerimaan_kondisi', 'Penerimaan Kondisi', 'required|trim');

        $this->form_validation->set_rules('tinggal_bersama', 'Tinggal bersama', 'required|trim');
        $this->form_validation->set_rules('kebiasaan', 'Kebiasaan', 'required|trim');

        $this->form_validation->set_rules('eliminasi', 'Eliminasi', 'required|trim');
        $this->form_validation->set_rules('pola_makan', 'Pola Makan', 'required|trim');
        $this->form_validation->set_rules('pola_minum', 'Pola Minum', 'required|trim');
        $this->form_validation->set_rules('bak', 'Buang Air Kecil', 'required|trim');
        $this->form_validation->set_rules('bab', 'Buang Air Besar', 'required|trim');

        $this->form_validation->set_rules('analisa_masalah_keperawatan', 'Analisa Masalah Keperawatan', 'required|trim');
        $this->form_validation->set_rules('planning', 'Planning', 'required|trim');
        $this->form_validation->set_rules('implementasi_dan_evaluasi', 'Implementasi dan Evaluasi', 'required|trim');
        $this->form_validation->set_rules('edukasi', 'Edukasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->db->where('id_pemeriksaan1', $this->input->post('id_pemeriksaan1'));
            $data['e_pemeriksaan'] = $this->db->get('t_pemeriksaan1')->result();

            $data['title'] = "Data Pemeriksaan 1";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('perawat/edit_pemeriksaan', $data);
            $this->load->view('templates/main/footer');
        } else {
            $fields = array(
                'RTKB_sosial',
                'RTKB_motorik_halus',
                'RTKB_motorik_kasar',
                'RTKB_bahasa',
                'berkas_yang_diberikan',
                'info_edukasi_yang_diberikan'
            );

            foreach ($fields as $field) {
                $inputValue = $this->input->post($field);
                $$field = empty($inputValue) ? "" : implode(', ', $inputValue);
            }

            $status_laporan_hasil_SR = empty($this->input->post('status_laporan_hasil_SR')) ? "" : $this->input->post('status_laporan_hasil_SR');
            $imunisasi_dasar = empty($this->input->post('imunisasi_dasar')) ? "" : $this->input->post('imunisasi_dasar');
            $imunisasi_lain = empty($this->input->post('imunisasi_lain')) ? "" : $this->input->post('imunisasi_lain');
            $umur = empty($this->input->post('umur')) ? "" : $this->input->post('umur');
            $status_permintaan_pulang = empty($this->input->post('status_permintaan_pulang')) ? "" : $this->input->post('status_permintaan_pulang');

            date_default_timezone_set('Asia/Jakarta');
            $data_edit_pemeriksaan1  = [
                'keadaan_umum' => $this->input->post('keadaan_umum'),
                'kesadaran' => $this->input->post('kesadaran'),
                'gcs' => $this->input->post('gcs'),
                'e' => $this->input->post('e'),
                'v' => $this->input->post('v'),
                'm' => $this->input->post('m'),
                'keluhan_umum' => $this->input->post('keluhan_umum'),
                'keluhan_lain' => $this->input->post('keluhan_lain'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'nadi' => $this->input->post('nadi'),
                'temperatur' => $this->input->post('temperatur'),
                'pernapasan' => $this->input->post('pernapasan'),
                'nyeri' => $this->input->post('nyeri'),
                'pencetus' => $this->input->post('pencetus'),
                'kwalitas' => $this->input->post('kwalitas'),
                'lokasi' => $this->input->post('lokasi'),
                'skala' => $this->input->post('skala'),
                'durasi' => $this->input->post('durasi'),
                'pengetahuan_tentang_penyakit' => $this->input->post('pengetahuan_tentang_penyakit'),
                'perawatan_yg_dilakukan' => $this->input->post('perawatan_yg_dilakukan'),
                'perasaan' => $this->input->post('perasaan'),
                'status_aktivitas' => $this->input->post('status_aktivitas'),
                'muskuloskeleta' => $this->input->post('muskuloskeleta'),
                'kekuatan_otot' => $this->input->post('kekuatan_otot'),
                'alergi' => $this->input->post('alergi'),
                'tidur_siang' => $this->input->post('tidur_siang'),
                'tidur_malam' => $this->input->post('tidur_malam'),
                'gangguan_tidur' => $this->input->post('gangguan_tidur'),
                'penerimaan_kondisi' => $this->input->post('penerimaan_kondisi'),
                'tinggal_bersama' => $this->input->post('tinggal_bersama'),
                'kebiasaan' => $this->input->post('kebiasaan'),
                'skor_hm' => $this->input->post('skor_hm'),
                'skor_mfs' => $this->input->post('skor_mfs'),
                'skor_omss' => $this->input->post('skor_omss'),
                'status_laporan_hasil_SR' => $status_laporan_hasil_SR,
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'imt' => $this->input->post('imt'),
                'skor_mst' => $this->input->post('skor_mst'),
                'imunisasi_dasar' => $imunisasi_dasar,
                'imunisasi_lain' => $imunisasi_lain,
                'eliminasi' => $this->input->post('eliminasi'),
                'pola_makan' => $this->input->post('pola_makan'),
                'pola_minum' => $this->input->post('pola_minum'),
                'bak' => $this->input->post('bak'),
                'bab' => $this->input->post('bab'),
                'umur' => $umur,
                'RTKB_sosial' => $RTKB_sosial,
                'RTKB_motorik_halus' => $RTKB_motorik_halus,
                'RTKB_motorik_kasar' => $RTKB_motorik_kasar,
                'RTKB_bahasa' => $RTKB_bahasa,
                'analisa_masalah_keperawatan' => $this->input->post('analisa_masalah_keperawatan'),
                'planning' => $this->input->post('planning'),
                'implementasi_dan_evaluasi' => $this->input->post('implementasi_dan_evaluasi'),
                'edukasi' => $this->input->post('edukasi'),
                'keadaan_pasien_pulang' => $this->input->post('keadaan_pasien_pulang'),
                'berkas_yang_diberikan' => $berkas_yang_diberikan,
                'info_edukasi_yang_diberikan' => $info_edukasi_yang_diberikan,
                'status_permintaan_pulang' => $status_permintaan_pulang,
                'status_melarikan_diri' => $this->input->post('status_melarikan_diri'),
            ];
        }
        $this->db->where('id_pemeriksaan1', $this->input->post('id_pemeriksaan1'));
        $this->db->update('t_pemeriksaan1', $data_edit_pemeriksaan1);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Data Pemeriksaan pasien berhasil ditambahkan!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
        redirect('perawat/pemeriksaan');
    }

    public function profil()
    {
        $this->db->select('t_pegawai.*, t_role.nama_role');
        $this->db->from('t_pegawai');
        $this->db->join('t_role', 't_pegawai.id_role = t_role.id_role', 'left');
        $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
        $data['profile'] = $this->db->get()->result();

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/profil', $data);
        $this->load->view('templates/main/footer');
    }

    public function edit_profil()
    {
        $this->db->select('*');
        $this->db->from('t_pegawai');
        $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
        $data['profile'] = $this->db->get()->result();

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/edit_profil', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_profil()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $check_username = $this->db->get_where('t_pegawai', array('id_pegawai' => $id_pegawai))->row();

        if ($this->input->post('username') != $check_username->username) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_pegawai.username]');
        }
        $this->form_validation->set_rules('nomor_pegawai', 'Nomor Pegawai', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|min_length[10]|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[10]');

        if ($this->form_validation->run() == false) {
            $this->db->select('*');
            $this->db->from('t_pegawai');  // Ganti "nama_tabel" dengan nama tabel sesuai kebutuhan
            $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
            $data['profile'] = $this->db->get()->result();
            $data['title'] = 'Profil';
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('perawat/edit_profil', $data);
            $this->load->view('templates/main/footer');
        } else {
            if (!empty($_FILES['foto']['name'])) {
                // Konfigurasi upload
                $config['upload_path'] = './assets/img/profile';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    // Jika berhasil diupload, ambil nama file
                    $foto_data = $this->upload->data();
                    $foto = $foto_data['file_name'];

                    // // Update data user ke database termasuk nama foto baru
                    $this->db->where('id_pegawai', $id_pegawai);
                    $this->db->update('t_pegawai', array('foto' => $foto));
                } else {
                    // Jika gagal upload, tampilkan error
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    ' . $error['error'] . '
                                </div>
                            </div>');
                    redirect('perawat/profil');
                }
            }

            $data = array(
                'nomor_pegawai' => $this->input->post('nomor_pegawai'),
                'username'  => $this->input->post('username'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
                'alamat'  => $this->input->post('alamat'),
                'nomor_hp'  => $this->input->post('nomor_hp')
            );
            $this->db->where('id_pegawai', $id_pegawai);
            $this->db->update('t_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    Profil berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('perawat/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('perawat/ganti_password', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_ganti_password()
    {
        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim|callback_check_current_password');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|callback_check_new_password');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil';
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('perawat/ganti_password', $data);
            $this->load->view('templates/main/footer');
        } else {
            $hashed_password_baru = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
            $data = array(
                'password' => $hashed_password_baru
            );
            $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
            $this->db->update('t_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    Password berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('perawat/profil');
        }
    }

    public function check_current_password($current_password)
    {
        $id_pegawai = $this->session->userdata('id_pegawai'); // Gantilah dengan cara Anda menyimpan ID pengguna
        $db_password = $this->db
            ->select('password')
            ->where('id_pegawai', $id_pegawai)
            ->get('t_pegawai')
            ->row()
            ->password;

        if (!password_verify($current_password, $db_password)) {
            $this->form_validation->set_message('check_current_password', 'Password saat ini salah!');
            return false;
        }
        return true;
    }

    public function check_new_password($password_baru)
    {
        $password_sekarang = $this->input->post('password_sekarang'); // Ambil nilai dari form

        if ($password_sekarang === $password_baru) {
            $this->form_validation->set_message('check_new_password', 'Password baru harus berbeda dengan password saat ini!');
            return false;
        }
        return true;
    }
}
