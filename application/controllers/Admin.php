<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('id_role')) {
            // Jika sudah memiliki session id_role, maka arahkan pengguna ke halaman yang sesuai
            switch ($this->session->userdata('id_role')) {
                case 2:
                    redirect('pendaftaran');
                    break;
                case 3:
                    redirect('perawat');
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
        } else {
            redirect(base_url());
        }
    }

    public function index()
    {
        // Mengambil Data Jumlah Pegawai Berdasarkan Role
        $this->db->select('t_role.nama_role, COUNT(t_pegawai.id_role) as jumlah_pegawai');
        $this->db->from('t_role');
        $this->db->join('t_pegawai', 't_role.id_role = t_pegawai.id_role', 'left');
        $this->db->where_in('t_role.id_role', array(2, 3, 4, 5, 6, 7));
        $this->db->group_by('t_role.nama_role');
        $data['pegawai'] = $this->db->get()->result();

        $data['poliklinik'] = $this->db->get('t_poliklinik')->result();

        $this->db->select('jenis_pembayaran, COUNT(*) as total');
        $this->db->from('t_pendaftaran');
        $this->db->where("DATE_FORMAT(waktu_pendaftaran, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')");
        $this->db->group_by('jenis_pembayaran');
        $data['pendaftaran'] = $this->db->get()->result();


        $data['title'] = "Dashboard Pegawai";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/main/footer');
    }

    public function laporan()
    {
        $tahun = date('Y');
        $bulan_sekarang = date('m');
        $query_bulan = "SELECT 
                    LPAD(number, 2, '0') AS bulan, 
                    CASE
                        WHEN number = 1 THEN 'Januari'
                        WHEN number = 2 THEN 'Februari'
                        WHEN number = 3 THEN 'Maret'
                        WHEN number = 4 THEN 'April'
                        WHEN number = 5 THEN 'Mei'
                        WHEN number = 6 THEN 'Juni'
                        WHEN number = 7 THEN 'Juli'
                        WHEN number = 8 THEN 'Agustus'
                        WHEN number = 9 THEN 'September'
                        WHEN number = 10 THEN 'Oktober'
                        WHEN number = 11 THEN 'November'
                        WHEN number = 12 THEN 'Desember'
                    END AS nama_bulan
                FROM 
                    (SELECT 1 AS number 
                    UNION SELECT 2 
                    UNION SELECT 3 
                    UNION SELECT 4 
                    UNION SELECT 5 
                    UNION SELECT 6 
                    UNION SELECT 7 
                    UNION SELECT 8 
                    UNION SELECT 9 
                    UNION SELECT 10 
                    UNION SELECT 11 
                    UNION SELECT 12) AS months
                WHERE 
                    number <= $bulan_sekarang";

        $data_bulan = $this->db->query($query_bulan)->result_array();
        $query_jumlah_data = "SELECT 
            DATE_FORMAT(p.waktu_pendaftaran, '%m') AS bulan,
            SUM(CASE WHEN p2.bulan_pertama = DATE_FORMAT(p.waktu_pendaftaran, '%Y-%m') THEN 1 ELSE 0 END) AS pasien_baru,
            SUM(CASE WHEN p2.bulan_pertama != DATE_FORMAT(p.waktu_pendaftaran, '%Y-%m') THEN 1 ELSE 0 END) AS pasien_lama,
            COUNT(DISTINCT CASE WHEN p.jenis_pembayaran = 'BPJS' THEN p.id_pasien END) AS jumlah_bpjs,
            COUNT(DISTINCT CASE WHEN p.jenis_pembayaran = 'Bayar' THEN p.id_pasien END) AS jumlah_bayar,
            COUNT(DISTINCT CASE WHEN tp.jenis_kelamin = 'Laki-laki' THEN p.id_pasien END) AS jumlah_laki_laki,
            COUNT(DISTINCT CASE WHEN tp.jenis_kelamin = 'Perempuan' THEN p.id_pasien END) AS jumlah_perempuan,
            COUNT(DISTINCT pe2.diagnosa_utama) AS jumlah_diagnosa_utama,
            GROUP_CONCAT(DISTINCT pe2.diagnosa_utama SEPARATOR ', ') AS diagnosa_utama
        FROM t_pendaftaran p
        JOIN (
            SELECT 
                id_pasien,
                MIN(DATE_FORMAT(waktu_pendaftaran, '%Y-%m')) AS bulan_pertama
            FROM t_pendaftaran
            GROUP BY id_pasien
        ) p2 ON p.id_pasien = p2.id_pasien
        LEFT JOIN t_pasien tp ON p.id_pasien = tp.id_pasien
        LEFT JOIN t_pemeriksaan2 pe2 ON p.id_pendaftaran = pe2.id_pendaftaran
        WHERE YEAR(p.waktu_pendaftaran) = $tahun
        AND DATE_FORMAT(p.waktu_pendaftaran, '%m') <= $bulan_sekarang
        GROUP BY DATE_FORMAT(p.waktu_pendaftaran, '%m')";

        $data_jumlah_data = $this->db->query($query_jumlah_data)->result_array();

        $jumlah_data_per_bulan = array();

        foreach ($data_bulan as $bulan) {
            $jumlah_data_per_bulan[$bulan['bulan']] = array(
                'pasien_baru' => 0,
                'pasien_lama' => 0,
                'jumlah_bpjs' => 0,
                'jumlah_bayar' => 0,
                'jumlah_laki_laki' => 0,
                'jumlah_perempuan' => 0,
                'jumlah_diagnosa_utama' => 0,
                'diagnosa_utama' => array()
            );
        }

        foreach ($data_jumlah_data as $jumlah_data) {
            $bulan = $jumlah_data['bulan'];
            $jumlah_data_per_bulan[$bulan]['pasien_baru'] = $jumlah_data['pasien_baru'];
            $jumlah_data_per_bulan[$bulan]['pasien_lama'] = $jumlah_data['pasien_lama'];
            $jumlah_data_per_bulan[$bulan]['jumlah_bpjs'] = $jumlah_data['jumlah_bpjs'];
            $jumlah_data_per_bulan[$bulan]['jumlah_bayar'] = $jumlah_data['jumlah_bayar'];
            $jumlah_data_per_bulan[$bulan]['jumlah_laki_laki'] = $jumlah_data['jumlah_laki_laki'];
            $jumlah_data_per_bulan[$bulan]['jumlah_perempuan'] = $jumlah_data['jumlah_perempuan'];
            $jumlah_data_per_bulan[$bulan]['jumlah_diagnosa_utama'] = $jumlah_data['jumlah_diagnosa_utama'];

            $diagnosa_utama_array = explode(', ', $jumlah_data['diagnosa_utama']);
            foreach ($diagnosa_utama_array as $diagnosa) {
                $jumlah_data_per_bulan[$bulan]['diagnosa_utama'][] = $diagnosa;
            }
        }

        $data['data_bulan'] = $data_bulan;
        $data['jumlah_data_per_bulan'] = $jumlah_data_per_bulan;
        $data['diagnosa_utama'] = $jumlah_data_per_bulan;

        // Ambil data obat dari tabel t_obat
        $query = $this->db->get('t_obat')->result_array();

        // Bangun array untuk menyimpan data jumlah pengembalian obat per bulan
        $data_pengembalian_obat = array();

        // Inisialisasi array dengan 0 untuk setiap bulan untuk setiap obat
        foreach ($query as $row) {
            $data_pengembalian_obat[$row['id_obat']] = array(
                'nama_obat' => $row['nama_obat'],
                'stok_obat' => $row['stok_obat'],
                'jumlah_pengembalian_obat' => array_fill(1, date('m'), 0) // Hanya inisialisasi hingga bulan sekarang
            );
        }

        // Ambil data jumlah pengembalian obat dari tabel t_pengambilan_obat
        $tahun_sekarang = date('Y');
        $this->db->select('obat_yang_diambil, MONTH(waktu_pengambilan_obat) as bulan, SUM(jumlah) as jumlah_pengembalian');
        $this->db->where("YEAR(waktu_pengambilan_obat) = $tahun_sekarang");
        $this->db->group_by('obat_yang_diambil, MONTH(waktu_pengambilan_obat)');
        $result = $this->db->get('t_pengambilan_obat')->result_array();

        // Masukkan jumlah pengembalian obat ke dalam array yang sudah dibuat
        foreach ($result as $row) {
            $obat_yang_diambil = $row['obat_yang_diambil'];
            $bulan = $row['bulan'];
            $jumlah_pengembalian = $row['jumlah_pengembalian'];
            $data_pengembalian_obat[$obat_yang_diambil]['jumlah_pengembalian_obat'][$bulan] = $jumlah_pengembalian;
        }

        // Siapkan data untuk dikirimkan ke halaman view
        $data['data_pengembalian_obat'] = $data_pengembalian_obat;
        $data['nama_bulan_indonesia'] = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $data['bulan_sekarang'] = date('n');

        $data['title'] = "Laporan";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/main/footer');
    }

    public function cetak_laporan_pasien()
    {
        $tahun = date('Y');
        $bulan_sekarang = date('m');
        $query_bulan = "SELECT 
                    LPAD(number, 2, '0') AS bulan, 
                    CASE
                        WHEN number = 1 THEN 'Januari'
                        WHEN number = 2 THEN 'Februari'
                        WHEN number = 3 THEN 'Maret'
                        WHEN number = 4 THEN 'April'
                        WHEN number = 5 THEN 'Mei'
                        WHEN number = 6 THEN 'Juni'
                        WHEN number = 7 THEN 'Juli'
                        WHEN number = 8 THEN 'Agustus'
                        WHEN number = 9 THEN 'September'
                        WHEN number = 10 THEN 'Oktober'
                        WHEN number = 11 THEN 'November'
                        WHEN number = 12 THEN 'Desember'
                    END AS nama_bulan
                FROM 
                    (SELECT 1 AS number 
                    UNION SELECT 2 
                    UNION SELECT 3 
                    UNION SELECT 4 
                    UNION SELECT 5 
                    UNION SELECT 6 
                    UNION SELECT 7 
                    UNION SELECT 8 
                    UNION SELECT 9 
                    UNION SELECT 10 
                    UNION SELECT 11 
                    UNION SELECT 12) AS months
                WHERE 
                    number <= $bulan_sekarang";

        $data_bulan = $this->db->query($query_bulan)->result_array();
        $query_jumlah_data = "SELECT 
            DATE_FORMAT(p.waktu_pendaftaran, '%m') AS bulan,
            SUM(CASE WHEN p2.bulan_pertama = DATE_FORMAT(p.waktu_pendaftaran, '%Y-%m') THEN 1 ELSE 0 END) AS pasien_baru,
            SUM(CASE WHEN p2.bulan_pertama != DATE_FORMAT(p.waktu_pendaftaran, '%Y-%m') THEN 1 ELSE 0 END) AS pasien_lama,
            COUNT(DISTINCT CASE WHEN p.jenis_pembayaran = 'BPJS' THEN p.id_pasien END) AS jumlah_bpjs,
            COUNT(DISTINCT CASE WHEN p.jenis_pembayaran = 'Bayar' THEN p.id_pasien END) AS jumlah_bayar,
            COUNT(DISTINCT CASE WHEN tp.jenis_kelamin = 'Laki-laki' THEN p.id_pasien END) AS jumlah_laki_laki,
            COUNT(DISTINCT CASE WHEN tp.jenis_kelamin = 'Perempuan' THEN p.id_pasien END) AS jumlah_perempuan,
            COUNT(DISTINCT pe2.diagnosa_utama) AS jumlah_diagnosa_utama,
            GROUP_CONCAT(DISTINCT pe2.diagnosa_utama SEPARATOR ', ') AS diagnosa_utama
        FROM t_pendaftaran p
        JOIN (
            SELECT 
                id_pasien,
                MIN(DATE_FORMAT(waktu_pendaftaran, '%Y-%m')) AS bulan_pertama
            FROM t_pendaftaran
            GROUP BY id_pasien
        ) p2 ON p.id_pasien = p2.id_pasien
        LEFT JOIN t_pasien tp ON p.id_pasien = tp.id_pasien
        LEFT JOIN t_pemeriksaan2 pe2 ON p.id_pendaftaran = pe2.id_pendaftaran
        WHERE YEAR(p.waktu_pendaftaran) = $tahun
        AND DATE_FORMAT(p.waktu_pendaftaran, '%m') <= $bulan_sekarang
        GROUP BY DATE_FORMAT(p.waktu_pendaftaran, '%m')";

        $data_jumlah_data = $this->db->query($query_jumlah_data)->result_array();

        $jumlah_data_per_bulan = array();

        foreach ($data_bulan as $bulan) {
            $jumlah_data_per_bulan[$bulan['bulan']] = array(
                'pasien_baru' => 0,
                'pasien_lama' => 0,
                'jumlah_bpjs' => 0,
                'jumlah_bayar' => 0,
                'jumlah_laki_laki' => 0,
                'jumlah_perempuan' => 0,
                'jumlah_diagnosa_utama' => 0,
                'diagnosa_utama' => array()
            );
        }

        foreach ($data_jumlah_data as $jumlah_data) {
            $bulan = $jumlah_data['bulan'];
            $jumlah_data_per_bulan[$bulan]['pasien_baru'] = $jumlah_data['pasien_baru'];
            $jumlah_data_per_bulan[$bulan]['pasien_lama'] = $jumlah_data['pasien_lama'];
            $jumlah_data_per_bulan[$bulan]['jumlah_bpjs'] = $jumlah_data['jumlah_bpjs'];
            $jumlah_data_per_bulan[$bulan]['jumlah_bayar'] = $jumlah_data['jumlah_bayar'];
            $jumlah_data_per_bulan[$bulan]['jumlah_laki_laki'] = $jumlah_data['jumlah_laki_laki'];
            $jumlah_data_per_bulan[$bulan]['jumlah_perempuan'] = $jumlah_data['jumlah_perempuan'];
            $jumlah_data_per_bulan[$bulan]['jumlah_diagnosa_utama'] = $jumlah_data['jumlah_diagnosa_utama'];

            $diagnosa_utama_array = explode(', ', $jumlah_data['diagnosa_utama']);
            foreach ($diagnosa_utama_array as $diagnosa) {
                $jumlah_data_per_bulan[$bulan]['diagnosa_utama'][] = $diagnosa;
            }
        }

        $data['data_bulan'] = $data_bulan;
        $data['jumlah_data_per_bulan'] = $jumlah_data_per_bulan;
        $data['diagnosa_utama'] = $jumlah_data_per_bulan;

        $this->load->view('admin/cetak_laporan_pasien', $data);
    }

    public function cetak_laporan_obat()
    {
        // Ambil data obat dari tabel t_obat
        $query = $this->db->get('t_obat')->result_array();

        // Bangun array untuk menyimpan data jumlah pengembalian obat per bulan
        $data_pengembalian_obat = array();

        // Inisialisasi array dengan 0 untuk setiap bulan untuk setiap obat
        foreach ($query as $row) {
            $data_pengembalian_obat[$row['id_obat']] = array(
                'nama_obat' => $row['nama_obat'],
                'stok_obat' => $row['stok_obat'],
                'jumlah_pengembalian_obat' => array_fill(1, date('m'), 0) // Hanya inisialisasi hingga bulan sekarang
            );
        }

        // Ambil data jumlah pengembalian obat dari tabel t_pengambilan_obat
        $tahun_sekarang = date('Y');
        $this->db->select('obat_yang_diambil, MONTH(waktu_pengambilan_obat) as bulan, SUM(jumlah) as jumlah_pengembalian');
        $this->db->where("YEAR(waktu_pengambilan_obat) = $tahun_sekarang");
        $this->db->group_by('obat_yang_diambil, MONTH(waktu_pengambilan_obat)');
        $result = $this->db->get('t_pengambilan_obat')->result_array();

        // Masukkan jumlah pengembalian obat ke dalam array yang sudah dibuat
        foreach ($result as $row) {
            $obat_yang_diambil = $row['obat_yang_diambil'];
            $bulan = $row['bulan'];
            $jumlah_pengembalian = $row['jumlah_pengembalian'];
            $data_pengembalian_obat[$obat_yang_diambil]['jumlah_pengembalian_obat'][$bulan] = $jumlah_pengembalian;
        }

        // Siapkan data untuk dikirimkan ke halaman view
        $data['data_pengembalian_obat'] = $data_pengembalian_obat;
        $data['nama_bulan_indonesia'] = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $data['bulan_sekarang'] = date('n');

        $this->load->view('admin/cetak_laporan_obat', $data);
    }

    public function pegawai()
    {
        // Mengambil Data Peagwai
        $this->db->select('t_pegawai.*, t_role.nama_role, t_poliklinik.nama_poliklinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_role', 't_pegawai.id_role = t_role.id_role');
        $this->db->join('t_poliklinik', 't_pegawai.id_poliklinik = t_poliklinik.id_poliklinik', 'left');
        $this->db->where('t_pegawai.id_role !=', 1);
        $data['users'] = $this->db->get()->result_array();

        $data['title'] = "Manajemen Pegawai";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/pegawai');
        $this->load->view('templates/main/footer');
    }

    public function tambah_pegawai()
    {
        $data['poliklinik'] = $this->db->get('t_poliklinik')->result();
        $data['title'] = 'Manajemen Pegawai';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/tambah_pegawai', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pegawai()
    {
        $this->form_validation->set_rules('nomor_pegawai', 'Nomor Pegawai', 'required|trim|integer|is_unique[t_pegawai.nomor_pegawai]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_pegawai.username]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|min_length[10]|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[10]');

        if ($this->form_validation->run() == false) {
            $data['poliklinik'] = $this->db->get('t_poliklinik')->result();
            $data['title'] = 'Manajemen Pegawai';
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('admin/tambah_pegawai', $data);
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $datapegawai  = [
                'id_role' => $this->input->post('role'),
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'nomor_pegawai' => $this->input->post('nomor_pegawai'),
                'username' => $this->input->post('username'),
                'password' => password_hash("password", PASSWORD_DEFAULT),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'status_aktif' => 1,
                'foto' => "default.jpg",
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('t_pegawai', $datapegawai);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data pegawai baru berhasil ditambahkan!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
            redirect('admin/pegawai');
        }
    }

    public function edit_pegawai()
    {
        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $query = $this->db->get('t_pegawai');
        $data['editPegawai'] = $query->result();

        $data['poliklinik'] = $this->db->get('t_poliklinik')->result();
        $data['title'] = 'Manajemen Pegawai';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/edit_pegawai', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pegawai()
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status_aktif', 'Status Aktif', 'required');

        $id_pegawai = $this->input->post('id_pegawai');
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get('t_pegawai');
        $data['editUser'] = $query->result();
        $data['poliklinik'] = $this->db->get('t_poliklinik')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Manajemen Pegawai';
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('admin/edit_pegawai', $data);
            $this->load->view('templates/main/footer');
        } else {
            $data = array(
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'id_role' => $this->input->post('role'),
                'status_aktif'  => $this->input->post('status_aktif')
            );

            $this->db->where('id_pegawai', $id_pegawai);
            $this->db->update('t_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data pegawai berhasil diubah!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
            redirect('admin/pegawai');
        }
    }

    public function hapus_pegawai()
    {
        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->delete('t_pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data pegawai berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/pegawai');
    }

    public function poliklinik()
    {
        $data['poliklinik'] = $this->db->get('t_poliklinik')->result();

        $data['title'] = 'Manajemen Poliklinik';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/poliklinik', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_poliklinik()
    {
        $this->db->insert('t_poliklinik', array('nama_poliklinik' => $this->input->post('nama_poliklinik')));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data poliklinik baru berhasil ditambahkan!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/poliklinik');
    }

    public function proses_edit_poliklinik()
    {
        $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
        $this->db->update('t_poliklinik', array('nama_poliklinik' => $this->input->post('nama_poliklinik')));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data poliklinik berhasil diubah!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/poliklinik');
    }

    public function hapus_poliklinik()
    {
        $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
        $this->db->delete('t_poliklinik');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data Poliklinik berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/poliklinik');
    }

    public function biaya()
    {
        $data['biaya'] = $this->db->get('t_biaya')->result();

        $data['title'] = 'Manajemen Biaya';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/biaya', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_biaya()
    {
        $this->db->insert('t_biaya', array(
            'nama_biaya' => $this->input->post('nama_biaya'),
            'harga_biaya' => $this->input->post('harga_biaya')
        ));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data biaya baru berhasil ditambahkan!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/biaya');
    }

    public function proses_edit_biaya()
    {
        $this->db->where('id_biaya', $this->input->post('id_biaya'));
        $this->db->update('t_biaya', array(
            'nama_biaya' => $this->input->post('nama_biaya'),
            'harga_biaya' => $this->input->post('harga_biaya')
        ));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data biaya berhasil diubah!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/biaya');
    }

    public function hapus_biaya()
    {
        if ($this->input->post('id_biaya') != 1 && $this->input->post('id_biaya') != 2) {
            $this->db->where('id_biaya', $this->input->post('id_biaya'));
            $this->db->delete('t_biaya');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data biaya berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="display: inline-block;">
                            <div>
                                Data biaya ini tidak bisa dihapus!
                            </div>
                        </div>');
        }

        redirect('admin/biaya');
    }

    public function obat()
    {
        $data['obat'] = $this->db->get('t_obat')->result();

        $data['title'] = 'Manajemen Obat';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/obat', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_obat()
    {
        $this->db->insert('t_obat', array(
            'nama_obat' => $this->input->post('nama_obat'),
            'harga_obat' => $this->input->post('harga_obat'),
            'stok_obat' => $this->input->post('stok_obat'),
        ));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data obat baru berhasil ditambahkan!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/obat');
    }

    public function proses_edit_obat()
    {
        $this->db->where('id_obat', $this->input->post('id_obat'));
        $this->db->update('t_obat', array(
            'nama_obat' => $this->input->post('nama_obat'),
            'harga_obat' => $this->input->post('harga_obat'),
            'stok_obat' => $this->input->post('stok_obat')
        ));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data obat berhasil diubah!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/obat');
    }

    public function hapus_obat()
    {
        $this->db->where('id_obat', $this->input->post('id_obat'));
        $this->db->delete('t_obat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data obat berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/obat');
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
        $this->load->view('admin/profil', $data);
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
        $this->load->view('admin/edit_profil', $data);
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
            $this->load->view('admin/edit_profil', $data);
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
                    redirect('admin/profil');
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
            redirect('admin/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/ganti_password', $data);
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
            $this->load->view('admin/ganti_password', $data);
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
            redirect('admin/profil');
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
