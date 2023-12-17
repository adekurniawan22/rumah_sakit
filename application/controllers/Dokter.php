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
        $this->db->where('status_pemeriksaan2', "0");
        $data['panjang_antri'] = $this->db->get()->num_rows();

        //Data Antrian Pasien Berikutnya
        $this->db->select('t_pendaftaran.*, t_pasien.*, t_pemeriksaan1.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan1', 't_pendaftaran.id_pendaftaran = t_pemeriksaan1.id_pendaftaran');
        $this->db->where('id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->where('status_pemeriksaan1', "1");
        // $this->db->where('status_pemeriksaan2', "0");
        $this->db->where('status_pembayaran', "1");
        $this->db->limit(1);
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
        $data['id_poliklinik'] = $this->input->post('id_poliklinik');
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
        $this->form_validation->set_rules('rencana_kontrol', 'Rencana Kontrol', 'required|trim');
        $this->form_validation->set_rules('pelayanan_home_care', 'Pelayanan Home Care', 'required|trim');
        $this->form_validation->set_rules('kontrol_ke_poliklinik', 'Kontrol Ke Poliklinik', 'required|trim');
        $this->form_validation->set_rules('perlu_penggunaan_alat', 'Perlu Penggunaan Alat', 'required|trim');
        $this->form_validation->set_rules('telah_memesan_alat', 'Telah Memesan Alat', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_komunitas', 'Dirujuk Ke Komunitas', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_terapis', 'Dirujuk Ke Terapis', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_ahli_gizi', 'Dirujuk Ke Ahli Gizi', 'required|trim');
        $this->form_validation->set_rules('perlu_pemeriksaan_lanjut', 'Perlu Pemeriksaan Lanjut', 'required|trim');

        $data['nomor_antri'] = $this->input->post('nomor_antri');
        $data['id_poliklinik'] = $this->input->post('id_poliklinik');
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

            if (!empty($this->input->post('rencana_kontrol1'))) {
                $rencana_kontrol = "Sudah Ditetapkan " . $this->input->post('rencana_kontrol1');
            } else if (!empty($this->input->post('rencana_kontrol2'))) {
                $rencana_kontrol = "Belum Ditetapkan karena " . $this->input->post('rencana_kontrol2');
            } else {
                $rencana_kontrol = "";
            }

            $pelayanan_home_care = empty($this->input->post('pelayanan_home_care')) ? "" : $this->input->post('pelayanan_home_care');
            $kontrol_ke_poliklinik = empty($this->input->post('kontrol_ke_poliklinik')) ? "" : $this->input->post('kontrol_ke_poliklinik');
            $perlu_penggunaan_alat = empty($this->input->post('perlu_penggunaan_alat')) ? "" : $this->input->post('perlu_penggunaan_alat');
            $telah_memesan_alat = empty($this->input->post('telah_memesan_alat')) ? "" : $this->input->post('telah_memesan_alat');
            $dirujuk_ke_komunitas = empty($this->input->post('dirujuk_ke_komunitas')) ? "" : $this->input->post('dirujuk_ke_komunitas');
            $dirujuk_ke_terapis = empty($this->input->post('dirujuk_ke_terapis')) ? "" : $this->input->post('dirujuk_ke_terapis');
            $dirujuk_ke_ahli_gizi = empty($this->input->post('dirujuk_ke_ahli_gizi')) ? "" : $this->input->post('dirujuk_ke_ahli_gizi');
            $perlu_pemeriksaan_lanjut = empty($this->input->post('perlu_pemeriksaan_lanjut')) ? "" : $this->input->post('perlu_pemeriksaan_lanjut');
            $lain_lain = empty($this->input->post('lain_lain')) ? "" : $this->input->post('lain_lain');

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
                'rencana_kontrol' => $rencana_kontrol,
                'pelayanan_home_care' => $pelayanan_home_care,
                'kontrol_ke_poliklinik' => $kontrol_ke_poliklinik,
                'perlu_penggunaan_alat' => $perlu_penggunaan_alat,
                'telah_memesan_alat' => $telah_memesan_alat,
                'dirujuk_ke_komunitas' => $dirujuk_ke_komunitas,
                'dirujuk_ke_terapis' => $dirujuk_ke_terapis,
                'dirujuk_ke_ahli_gizi' => $dirujuk_ke_ahli_gizi,
                'perlu_pemeriksaan_lanjut' => $perlu_pemeriksaan_lanjut,
                'lain_lain' => $lain_lain,
                'waktu_pemeriksaan2' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('t_pemeriksaan2', $data_pemeriksaan2);

            if ($this->input->post('perlu_pemeriksaan_lanjut') == 'Ya') {
                $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                $cekBPJS = $this->db->get('t_pendaftaran')->result();

                if ($cekBPJS[0]->jenis_pembayaran == 'BPJS') {

                    $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                    $this->db->update('t_pendaftaran', array(
                        'status_pemeriksaan_lanjut' => '1'
                    ));

                    date_default_timezone_set('Asia/Jakarta');
                    $data_pembayaran  = [
                        'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                        'id_biaya' => '2',
                        'id_pegawai' => $this->session->userdata('id_pegawai'),
                        'nomor_antri' => '0',
                        'waktu_pembayaran' => date('Y-m-d H:i:s')
                    ];

                    $this->db->insert('t_pembayaran', $data_pembayaran);
                    $id_pembayaran = $this->db->insert_id();

                    $this->db->select_max('nomor_antri');
                    $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
                    $nomor_antri = $this->db->get('t_antrian')->row()->nomor_antri + 1;

                    $this->db->where('id_pembayaran', $id_pembayaran);
                    $this->db->update('t_pembayaran', array('nomor_antri' => $nomor_antri));

                    $data_nomor_antri = [
                        'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                        'id_poliklinik' => $this->input->post('id_poliklinik'),
                        'nomor_antri' => $nomor_antri
                    ];

                    $this->db->insert('t_antrian', $data_nomor_antri);
                } else {
                    $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                    $this->db->update('t_pendaftaran', array('perlu_pemeriksaan_lanjut' => '1'));
                }
            }

            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('t_pendaftaran', array('status_pemeriksaan2' => '1'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Data Pemeriksaan pasien berhasil ditambahkan!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('dokter');
        }
    }

    public function pemeriksaan()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $this->db->select('t_pegawai.*, t_poliklinik.nama_poliklinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_poliklinik', 't_pegawai.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->where('t_pegawai.id_pegawai', $id_pegawai);
        $data['pegawai'] = $this->db->get()->row();

        $this->db->select('t_pendaftaran.*, t_pasien.*, t_pemeriksaan2.*,t_poliklinik.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_pemeriksaan2', 't_pendaftaran.id_pendaftaran = t_pemeriksaan2.id_pendaftaran');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->where('t_pendaftaran.id_poliklinik', $data['pegawai']->id_poliklinik);
        $this->db->where('status_pemeriksaan1', "1");
        $this->db->where('status_pemeriksaan2', "1");
        $this->db->where('status_pembayaran', "1");
        $data['pemeriksaan2'] = $this->db->get()->result();

        $data['title'] = "Data Pemeriksaan 2";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/pemeriksaan', $data); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }

    public function edit_pemeriksaan()
    {
        $this->db->select('t_pemeriksaan2.*, t_pendaftaran.id_poliklinik');
        $this->db->from('t_pemeriksaan2');
        $this->db->join('t_pendaftaran', 't_pemeriksaan2.id_pendaftaran = t_pendaftaran.id_pendaftaran');
        $data['e_pemeriksaan'] = $this->db->get()->result();

        $data['title'] = "Data Pemeriksaan 2";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/edit_pemeriksaan', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pemeriksaan()
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
        // $this->form_validation->set_rules('rencana_kontrol', 'Rencana Kontrol', 'required|trim');
        $this->form_validation->set_rules('pelayanan_home_care', 'Pelayanan Home Care', 'required|trim');
        $this->form_validation->set_rules('kontrol_ke_poliklinik', 'Kontrol Ke Poliklinik', 'required|trim');
        $this->form_validation->set_rules('perlu_penggunaan_alat', 'Perlu Penggunaan Alat', 'required|trim');
        $this->form_validation->set_rules('telah_memesan_alat', 'Telah Memesan Alat', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_komunitas', 'Dirujuk Ke Komunitas', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_terapis', 'Dirujuk Ke Terapis', 'required|trim');
        $this->form_validation->set_rules('dirujuk_ke_ahli_gizi', 'Dirujuk Ke Ahli Gizi', 'required|trim');
        $this->form_validation->set_rules('perlu_pemeriksaan_lanjut', 'Perlu Pemeriksaan Lanjut', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->db->select('t_pemeriksaan2.*, t_pendaftaran.id_poliklinik');
            $this->db->from('t_pemeriksaan2');
            $this->db->join('t_pendaftaran', 't_pemeriksaan2.id_pendaftaran = t_pendaftaran.id_pendaftaran');
            $data['e_pemeriksaan'] = $this->db->get()->result();

            $data['title'] = "Data Pemeriksaan 2";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('dokter/edit_pemeriksaan', $data);
            $this->load->view('templates/main/footer');
        } else {
            if (!empty($this->input->post('rencana_kontrol1'))) {
                $rencana_kontrol = "Sudah Ditetapkan " . $this->input->post('rencana_kontrol1');
            } else if (!empty($this->input->post('rencana_kontrol2'))) {
                $rencana_kontrol = "Belum Ditetapkan karena " . $this->input->post('rencana_kontrol2');
            } else {
                if ($this->input->post('rencana_kontrol_lain')) {
                    $rencana_kontrol = $this->input->post('rencana_kontrol_lain');
                } else {
                    $rencana_kontrol = '';
                }
            }

            $pelayanan_home_care = empty($this->input->post('pelayanan_home_care')) ? "" : $this->input->post('pelayanan_home_care');
            $kontrol_ke_poliklinik = empty($this->input->post('kontrol_ke_poliklinik')) ? "" : $this->input->post('kontrol_ke_poliklinik');
            $perlu_penggunaan_alat = empty($this->input->post('perlu_penggunaan_alat')) ? "" : $this->input->post('perlu_penggunaan_alat');
            $telah_memesan_alat = empty($this->input->post('telah_memesan_alat')) ? "" : $this->input->post('telah_memesan_alat');
            $dirujuk_ke_komunitas = empty($this->input->post('dirujuk_ke_komunitas')) ? "" : $this->input->post('dirujuk_ke_komunitas');
            $dirujuk_ke_terapis = empty($this->input->post('dirujuk_ke_terapis')) ? "" : $this->input->post('dirujuk_ke_terapis');
            $dirujuk_ke_ahli_gizi = empty($this->input->post('dirujuk_ke_ahli_gizi')) ? "" : $this->input->post('dirujuk_ke_ahli_gizi');
            $perlu_pemeriksaan_lanjut = empty($this->input->post('perlu_pemeriksaan_lanjut')) ? "" : $this->input->post('perlu_pemeriksaan_lanjut');
            $lain_lain = empty($this->input->post('lain_lain')) ? "" : $this->input->post('lain_lain');

            date_default_timezone_set('Asia/Jakarta');
            $data_edit_pemeriksaan2  = [
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
                'rencana_kontrol' => $rencana_kontrol,
                'pelayanan_home_care' => $pelayanan_home_care,
                'kontrol_ke_poliklinik' => $kontrol_ke_poliklinik,
                'perlu_penggunaan_alat' => $perlu_penggunaan_alat,
                'telah_memesan_alat' => $telah_memesan_alat,
                'dirujuk_ke_komunitas' => $dirujuk_ke_komunitas,
                'dirujuk_ke_terapis' => $dirujuk_ke_terapis,
                'dirujuk_ke_ahli_gizi' => $dirujuk_ke_ahli_gizi,
                'lain_lain' => $lain_lain,
                'perlu_pemeriksaan_lanjut' => $perlu_pemeriksaan_lanjut
            ];

            $this->db->where('id_pemeriksaan2', $this->input->post('id_pemeriksaan2'));
            $this->db->update('t_pemeriksaan2', $data_edit_pemeriksaan2);

            if ($perlu_pemeriksaan_lanjut == 'Tidak') {
                $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                $this->db->where('id_biaya', '2');
                $this->db->delete('t_pembayaran');
            }

            if ($perlu_pemeriksaan_lanjut == 'Ya') {
                $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                $cekBPJS = $this->db->get('t_pendaftaran')->result();

                if ($cekBPJS[0]->jenis_pembayaran == 'BPJS') {

                    $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
                    $this->db->update('t_pendaftaran', array(
                        'status_pemeriksaan_lanjut' => '1'
                    ));

                    date_default_timezone_set('Asia/Jakarta');
                    $data_pembayaran  = [
                        'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                        'id_biaya' => '2',
                        'id_pegawai' => $this->session->userdata('id_pegawai'),
                        'nomor_antri' => '0',
                        'waktu_pembayaran' => date('Y-m-d H:i:s')
                    ];

                    $this->db->insert('t_pembayaran', $data_pembayaran);
                    $id_pembayaran = $this->db->insert_id();

                    $this->db->select_max('nomor_antri');
                    $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
                    $nomor_antri = $this->db->get('t_antrian')->row()->nomor_antri + 1;

                    $this->db->where('id_pembayaran', $id_pembayaran);
                    $this->db->update('t_pembayaran', array('nomor_antri' => $nomor_antri));

                    $data_nomor_antri = [
                        'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                        'id_poliklinik' => $this->input->post('id_poliklinik'),
                        'nomor_antri' => $nomor_antri
                    ];

                    $this->db->insert('t_antrian', $data_nomor_antri);
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Data Pemeriksaan pasien berhasil dirubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('dokter/pemeriksaan');
        }
    }

    public function cetak_surat_pemeriksaan_lanjut()
    {
        $data['nama_lengkap_pasien'] = $this->input->post('nama_lengkap_pasien');
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');

        $this->db->where('nama_biaya', "Pemeriksaan Lanjut");
        $data['nota'] = $this->db->get('t_biaya')->result();

        $this->load->view('dokter/cetak_nota', $data);
    }

    public function cetak_resep_obat()
    {
        $id_pemeriksaan2 = $this->input->post('id_pemeriksaan2');
        $data['nama_lengkap_pasien'] = $this->input->post('nama_lengkap_pasien');
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');
        $this->db->where('id_pemeriksaan2', $id_pemeriksaan2);
        $data['pemeriksaan2'] = $this->db->get('t_pemeriksaan2')->result();

        $this->load->view('dokter/cetak_resep_obat', $data);
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
        $this->load->view('dokter/profil', $data);
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
        $this->load->view('dokter/edit_profil', $data);
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
            $this->load->view('dokter/edit_profil', $data);
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
                    redirect('dokter/profil');
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
                                    Profile berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('dokter/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('dokter/ganti_password', $data);
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
            $this->load->view('dokter/ganti_password', $data);
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
            redirect('dokter/profil');
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
