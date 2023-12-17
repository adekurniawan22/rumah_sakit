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
        $this->db->select('t_pendaftaran.*, t_pasien.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien', 'left');
        $this->db->where('status_pembayaran', "0");
        $this->db->or_where('perlu_pemeriksaan_lanjut', "1");
        $this->db->order_by('id_pendaftaran', 'ASC'); // Urutkan berdasarkan id_pendaftaran terkecil
        $this->db->limit(5);
        $query = $this->db->get()->result();
        $data['a_pembayaran'] = $query;

        $data['biaya'] = $this->db->get('t_biaya')->result();

        $data['title'] = "Antrian Pembayaran";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pembayaran()
    {
        $id_poliklinik = $this->input->post('id_poliklinik');
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $id_biaya = $this->input->post('id_biaya');

        if ($this->input->post('perlu_pemeriksaan_lanjut') == '1') {

            $this->db->where('id_pendaftaran', $id_pendaftaran);
            $this->db->update('t_pendaftaran', array(
                'status_pemeriksaan_lanjut' => '1',
                'perlu_pemeriksaan_lanjut' => '0'
            ));

            date_default_timezone_set('Asia/Jakarta');
            $data_pembayaran  = [
                'id_pendaftaran' => $id_pendaftaran,
                'id_biaya' => $id_biaya,
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'nomor_antri' => '0',
                'waktu_pembayaran' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('t_pembayaran', $data_pembayaran);
            $id_pembayaran = $this->db->insert_id();

            $this->db->select_max('nomor_antri');
            $this->db->where('id_poliklinik', $id_poliklinik);
            $nomor_antri = $this->db->get('t_antrian')->row()->nomor_antri + 1;

            $this->db->where('id_pembayaran', $id_pembayaran);
            $this->db->update('t_pembayaran', array('nomor_antri' => $nomor_antri));

            $data_nomor_antri = [
                'id_pendaftaran' => $id_pendaftaran,
                'id_poliklinik' => $id_poliklinik,
                'nomor_antri' => $nomor_antri
            ];

            $this->db->insert('t_antrian', $data_nomor_antri);
        } else {
            $this->db->where('id_pendaftaran', $id_pendaftaran);
            $this->db->update('t_pendaftaran', array('status_pembayaran' => '1'));

            $data_pembayaran  = [
                'id_pendaftaran' => $id_pendaftaran,
                'id_biaya' => $id_biaya,
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'nomor_antri' => '0',
                'waktu_pembayaran' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('t_pembayaran', $data_pembayaran);
            $id_pembayaran = $this->db->insert_id();

            $this->db->select_max('nomor_antri');
            $this->db->where('id_poliklinik', $id_poliklinik);
            $nomor_antri = $this->db->get('t_antrian')->row()->nomor_antri + 1;

            $this->db->where('id_pembayaran', $id_pembayaran);
            $this->db->update('t_pembayaran', array('nomor_antri' => $nomor_antri));

            $data_nomor_antri = [
                'id_pendaftaran' => $id_pendaftaran,
                'id_poliklinik' => $id_poliklinik,
                'nomor_antri' => $nomor_antri
            ];

            $this->db->insert('t_antrian', $data_nomor_antri);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
            <div>
                Pembayaran berhasil!
                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
            </div>
        </div>');
        redirect('kasir');
    }

    public function pembayaran()
    {
        $this->db->select('t_pendaftaran.*, t_pasien.*, t_poliklinik.*, t_pembayaran.nomor_antri, t_pembayaran.*, t_biaya.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien', 'left');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik', 'left');
        $this->db->join('t_pembayaran', 't_pendaftaran.id_pendaftaran = t_pembayaran.id_pendaftaran', 'left');
        $this->db->join('t_biaya', 't_pembayaran.id_biaya = t_biaya.id_biaya', 'left');
        $this->db->where('status_pembayaran', "1");
        $query = $this->db->get()->result();
        $data['pembayaran'] = $query;

        $data['biaya'] = $this->db->get('t_biaya')->result();

        $data['title'] = "Data Pembayaran";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('kasir/pembayaran', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pembayaran()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');
        $id_biaya = (int)$this->input->post('id_biaya');

        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('t_pembayaran', array('id_biaya' => $id_biaya));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
            <div>
                Pembayaran berhasil dirubah!
                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
            </div>
        </div>');
        redirect('kasir/pembayaran');
    }

    public function cetak_surat_pemeriksaan_lanjut()
    {
        $data['nama_lengkap_pasien'] = $this->input->post('nama_lengkap_pasien');
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');

        $this->db->where('nama_biaya', "Pemeriksaan Lanjut");
        $data['nota'] = $this->db->get('t_biaya')->result();

        $this->load->view('kasir/cetak_nota', $data);
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
        $this->load->view('kasir/profil', $data);
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
        $this->load->view('kasir/edit_profil', $data);
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
            $this->load->view('kasir/edit_profil', $data);
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
                    redirect('kasir/profil');
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
            redirect('kasir/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('kasir/ganti_password', $data);
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
            $this->load->view('kasir/ganti_password', $data);
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
            redirect('kasir/profil');
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
