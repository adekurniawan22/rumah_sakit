<?php
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pdfgenerator');

        if ($this->session->userdata('id_role')) {
            // Jika sudah memiliki session id_role, maka arahkan pengguna ke halaman yang sesuai
            switch ($this->session->userdata('id_role')) {
                case 1:
                    redirect('admin');
                    break;
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

    public function print()
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

    public function pdf()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $nama_lengkap_pasien = $this->input->post('nama_lengkap_pasien');
        $nama_poliklinik = $this->input->post('nama_poliklinik');
        $nama_file_pdf = $id_pendaftaran . "_" . $nama_lengkap_pasien . "_" . $nama_poliklinik;

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

        $html = $this->load->view('rekam_medis/cetak_pdf', $data, true);
        $filename = $nama_file_pdf;
        $paper = 'A4';
        $orientation = 'portrait';
        $stream = true;

        // Pastikan $data['pendaftaran'] masih berisi data
        if (!empty($data['pendaftaran']) and !empty($data['pemeriksaan1']) and !empty($data['pemeriksaan2'])) {
            $this->pdfgenerator->generate($html, $filename, $paper, $orientation, $stream);
        } else {
            echo "Data PDF belum dimuat seluruhnya. Silahkan tunggu 5 detik setelah halaman menampilkan file PDF lalu coba download lagi!";
        }
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
        $this->load->view('rekam_medis/profil', $data);
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
        $this->load->view('rekam_medis/edit_profil', $data);
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
            $this->load->view('rekam_medis/edit_profil', $data);
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
                    redirect('rekam_medis/profil');
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
            redirect('rekam_medis/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('rekam_medis/ganti_password', $data);
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
            $this->load->view('rekam_medis/ganti_password', $data);
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
            redirect('rekam_medis/profil');
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
