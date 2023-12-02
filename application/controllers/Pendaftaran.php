<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }
        $this->db->select('pendaftaran.*, poliklinik.nama_klinik');
        $this->db->from('pendaftaran');
        $this->db->join('poliklinik', 'pendaftaran.id_poliklinik = poliklinik.id_poliklinik', 'left');
        $query = $this->db->get()->result();
        $data['pendaftaran'] = $query;

        $data['title'] = "Pendaftaran";
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/pendaftaran', $data);
        $this->load->view('templates/main/footer');
    }

    public function tambah_pendaftaran()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $data['poliklinik'] = $this->db->get('poliklinik')->result();

        $data['title'] = "Pendaftaran";
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/tambah_pendaftaran', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pendaftaran()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->form_validation->set_rules('nomor_rekam_medis', 'Nomor Rekam Medis', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap_pasien', 'Nomor Lengkap Pasien', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|callback_validate_date');
        $this->form_validation->set_rules('kartu_identitas', 'Kartu Identitas', 'required');
        $this->form_validation->set_rules('nomor_kartu_identitas', 'Nomor Kartu Identitas', 'required|trim|integer');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Nomor Lengkap Pasien', 'required|trim');
        $this->form_validation->set_rules('warga_negara', 'Warga Negara', 'required|trim');
        $this->form_validation->set_rules('suku', 'Suku', 'required|trim');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|regex_match[/^[0-9-]+$/]|trim', array(
            'regex_match' => 'Kolom RT harus berisi bulangan bilat atau tanda strip "-"'
        ));
        $this->form_validation->set_rules('rw', 'RW', 'required|regex_match[/^[0-9-]+$/]|trim', array(
            'regex_match' => 'Kolom RW harus berisi bulangan bilat atau tanda strip "-"'
        ));
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|integer');
        $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required|trim');


        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('nama_penanggung_jawab', 'Nama Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('hubungan', 'Hubungan Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('alamat_penanggung_jawab', 'Alamat Lengkap Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('rt_penanggung_jawab', 'RT', 'required|regex_match[/^[0-9-]+$/]|trim', array(
            'regex_match' => 'Kolom RT harus berisi bulangan bilat atau tanda strip "-"'
        ));
        $this->form_validation->set_rules('rw_penanggung_jawab', 'RW', 'required|regex_match[/^[0-9-]+$/]|trim', array(
            'regex_match' => 'Kolom RW harus berisi bulangan bilat atau tanda strip "-"'
        ));
        $this->form_validation->set_rules('kelurahan_penanggung_jawab', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan_penanggung_jawab', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten_penanggung_jawab', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi_penanggung_jawab', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('nomor_hp_penanggung_jawab', 'Nomor HP Penanggung Jawab', 'required|trim|integer');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('ketentuan_rs_ke_pasien', 'Ketentuan Rumah Sakit ke Pasien / Keluarga', 'required');

        if ($this->form_validation->run() == false) {
            $data['poliklinik'] = $this->db->get('poliklinik')->result();
            $data['title'] = 'Pendaftaran';
            $data['tanggal_lahir'] = $_POST['nomor_kartu_identitas'];
            $this->load->view('templates/main/header', $data);
            $this->load->view('pendaftaran/sidebar', $data);
            $this->load->view('pendaftaran/tambah_pendaftaran', $data);
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data_pendaftaran  = [
                'nomor_rekam_medis' => $this->input->post('nomor_rekam_medis'),
                'nama_lengkap_pasien' => $this->input->post('nama_lengkap_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'kartu_identitas' => $this->input->post('kartu_identitas'),
                'nomor_kartu_identitas' => $this->input->post('nomor_kartu_identitas'),
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'pekerjaan' => $this->input->post('pekerjaan'),
                'warga_negara' => $this->input->post('warga_negara'),
                'suku' => $this->input->post('suku'),
                'alamat_lengkap' => $_POST['alamat_lengkap'] . ', RT ' . $_POST['rt'] . ', RW ' . $_POST['rw'] . ', Kelurahan ' . $_POST['kelurahan'] . ', Kecamatan ' . $_POST['kecamatan'] . ', Kabupaten ' . $_POST['kabupaten'] . ', Provinsi ' . $_POST['provinsi'],
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'agama' => $this->input->post('agama'),
                'bahasa' => $this->input->post('bahasa'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),

                'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab'),
                'hubungan' => $this->input->post('hubungan'),
                'alamat_penanggung_jawab' => $_POST['alamat_penanggung_jawab'] . ', RT ' . $_POST['rt_penanggung_jawab'] . ', RW ' . $_POST['rw_penanggung_jawab'] . ', Kelurahan ' . $_POST['kelurahan_penanggung_jawab'] . ', Kecamatan ' . $_POST['kecamatan_penanggung_jawab'] . ', Kabupaten ' . $_POST['kabupaten_penanggung_jawab'] . ', Provinsi ' . $_POST['provinsi_penanggung_jawab'],
                'nomor_hp_penanggung_jawab' => $this->input->post('nomor_hp_penanggung_jawab'),
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'ketentuan_rs_ke_pasien' => $this->input->post('ketentuan_rs_ke_pasien'),
                'waktu_pendaftaran' => date('Y-m-d H:i:s'),
                'status_pemeriksaan' => '0',
                'user_id' => $this->session->userdata('user_id'),
            ];

            $this->db->insert('pendaftaran', $data_pendaftaran);
            $id_terakhir = $this->db->insert_id();

            $this->db->select_max('nomor_antri');
            $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
            $nomor_antri = $this->db->get('antrian')->row()->nomor_antri + 1;

            $this->db->where('id_pendaftaran', $id_terakhir);
            $this->db->update('pendaftaran', array('nomor_antri' => $nomor_antri));

            $data_nomor_antri = [
                'id_pendaftaran' => $id_terakhir,
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'nomor_antri' => $nomor_antri
            ];
            $this->db->insert('antrian', $data_nomor_antri);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Pendaftaran pasien baru berhasil ditambahkan!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('pendaftaran');
        }
    }

    public function edit_pendaftaran()
    {

        $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
        $data['pendaftaran'] = $this->db->get('pendaftaran')->result();

        $data['title'] = "Pendaftaran";
        $data['poliklinik'] = $this->db->get('poliklinik')->result();
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/edit_pendaftaran', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pendaftaran()
    {
        $this->form_validation->set_rules('nomor_rekam_medis', 'Nomor Rekam Medis', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap_pasien', 'Nomor Lengkap Pasien', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|callback_validate_date');
        $this->form_validation->set_rules('kartu_identitas', 'Kartu Identitas', 'required');
        $this->form_validation->set_rules('nomor_kartu_identitas', 'Nomor Kartu Identitas', 'required|trim|integer');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Nomor Lengkap Pasien', 'required|trim');
        $this->form_validation->set_rules('warga_negara', 'Warga Negara', 'required|trim');
        $this->form_validation->set_rules('suku', 'Suku', 'required|trim');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|integer');
        $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required|trim');

        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('nama_penanggung_jawab', 'Nama Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('hubungan', 'Hubungan Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('alamat_penanggung_jawab', 'Alamat Lengkap Penanggung Jawab', 'required|trim');
        $this->form_validation->set_rules('nomor_hp_penanggung_jawab', 'Nomor HP Penanggung Jawab', 'required|trim|integer');
        $this->form_validation->set_rules('id_poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('ketentuan_rs_ke_pasien', 'Ketentuan Rumah Sakit ke Pasien / Keluarga', 'required');

        if ($this->form_validation->run() == false) {
            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $data['pendaftaran'] = $this->db->get('pendaftaran')->result();
            $data['title'] = "Pendaftaran";
            $data['poliklinik'] = $this->db->get('poliklinik')->result();
            $this->load->view('templates/main/header', $data);
            $this->load->view('pendaftaran/sidebar', $data);
            $this->load->view('pendaftaran/edit_pendaftaran', $data);
            $this->load->view('templates/main/footer');
        } else {

            $data_edit_pendaftaran  = [
                'nomor_rekam_medis' => $this->input->post('nomor_rekam_medis'),
                'nama_lengkap_pasien' => $this->input->post('nama_lengkap_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'kartu_identitas' => $this->input->post('kartu_identitas'),
                'nomor_kartu_identitas' => $this->input->post('nomor_kartu_identitas'),
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'pekerjaan' => $this->input->post('pekerjaan'),
                'warga_negara' => $this->input->post('warga_negara'),
                'suku' => $this->input->post('suku'),
                'alamat_lengkap' => $_POST['alamat_lengkap'],
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'agama' => $this->input->post('agama'),
                'bahasa' => $this->input->post('bahasa'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),

                'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab'),
                'hubungan' => $this->input->post('hubungan'),
                'alamat_penanggung_jawab' => $_POST['alamat_penanggung_jawab'],
                'nomor_hp_penanggung_jawab' => $this->input->post('nomor_hp_penanggung_jawab'),
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'ketentuan_rs_ke_pasien' => $this->input->post('ketentuan_rs_ke_pasien'),
            ];

            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('pendaftaran', $data_edit_pendaftaran);

            $this->db->select_max('nomor_antri');
            $this->db->where('id_poliklinik', $this->input->post('id_poliklinik'));
            $nomor_antri = $this->db->get('antrian')->row()->nomor_antri + 1;

            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('pendaftaran', array('nomor_antri' => $nomor_antri));

            $data_nomor_antri = [
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'nomor_antri' => $nomor_antri
            ];
            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('antrian', $data_nomor_antri);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                                <div>
                                    Pendaftaran pasien berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('pendaftaran');
        }
    }

    public function hapus_pendaftaran()
    {
        $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
        $this->db->delete('pendaftaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                User berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('pendaftaran');
    }

    public function profil()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->db->select('user.*, role.nama_role');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.role_id', 'left');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data['profile'] = $this->db->get()->result();

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/profil', $data);
        $this->load->view('templates/main/footer');
    }

    public function edit_profil()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->db->select('*');
        $this->db->from('user');  // Ganti "nama_tabel" dengan nama tabel sesuai kebutuhan
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data['profile'] = $this->db->get()->result();

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/edit_profil', $data);
        $this->load->view('templates/main/footer');
    }


    public function proses_edit_profil()
    {

        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $check_username = $this->db->get_where('user', array('user_id' => $user_id))->row();

        if ($this->input->post('username') != $check_username->username) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        }
        $this->form_validation->set_rules('nomor_pegawai', 'Nomor Pegawai', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|min_length[3]|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->db->select('*');
            $this->db->from('user');  // Ganti "nama_tabel" dengan nama tabel sesuai kebutuhan
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $data['profile'] = $this->db->get()->result();
            $data['title'] = 'Profil';
            $this->load->view('templates/main/header', $data);
            $this->load->view('pendaftaran/sidebar', $data);
            $this->load->view('pendaftaran/edit_profil', $data);
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
                    $this->db->where('user_id', $user_id);
                    $this->db->update('user', array('foto' => $foto));
                } else {
                    // Jika gagal upload, tampilkan error
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    ' . $error['error'] . '
                                </div>
                            </div>');
                    redirect('pendaftaran/profil');
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
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    Profile berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('pendaftaran/profil');
        }
    }

    public function ganti_password()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('pendaftaran/sidebar', $data);
        $this->load->view('pendaftaran/ganti_password', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_ganti_password()
    {
        if ($this->session->userdata('role_id') != 2) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }
        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim|callback_check_current_password');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|callback_check_new_password');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil';
            $this->load->view('templates/main/header', $data);
            $this->load->view('pendaftaran/sidebar', $data);
            $this->load->view('pendaftaran/ganti_password', $data);
            $this->load->view('templates/main/footer');
        } else {
            $hashed_password_baru = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
            $data = array(
                'password' => $hashed_password_baru
            );
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert" style="display: inline-block;">
                                <div>
                                    Password berhasil diubah!
                                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                                </div>
                            </div>');
            redirect('pendaftaran/profil');
        }
    }

    public function check_current_password($current_password)
    {
        $user_id = $this->session->userdata('user_id'); // Gantilah dengan cara Anda menyimpan ID pengguna
        $db_password = $this->db
            ->select('password')
            ->where('user_id', $user_id)
            ->get('user')
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

    public function validate_date($str)
    {
        $date_format = 'Y-m-d';
        if (empty($str)) {
            return TRUE;
        }

        $date = DateTime::createFromFormat($date_format, $str);
        return $date && $date->format($date_format) === $str;
    }
}
