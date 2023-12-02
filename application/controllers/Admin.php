<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //Middleware Role
        if ($this->session->userdata('id_role') == 2) {
            redirect('pendaftaran');
        } elseif ($this->session->userdata('id_role') == 3) {
            redirect('perawat');
        } else {
            if ($this->session->userdata('id_role') != 1) {
                redirect(base_url('auth/login'));
            }
        }
    }

    public function index()
    {
        $this->db->select('t_role.nama_role, COUNT(t_pegawai.id_role) as jumlah_pegawai');
        $this->db->from('t_role');
        $this->db->join('t_pegawai', 't_role.id_role = t_pegawai.id_role', 'left');
        $this->db->where_in('t_role.id_role', array(2, 3, 4, 5, 6, 7));
        $this->db->group_by('t_role.nama_role');
        $query = $this->db->get();
        $result = $query->result();

        $data['title'] = "Dashboard Pegawai";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/index', ['result' => $result]);
        $this->load->view('templates/main/footer');
    }


    public function pegawai()
    {
        $this->db->select('t_pegawai.*, t_role.nama_role, poliklinik.nama_klinik');
        $this->db->from('t_pegawai');
        $this->db->join('t_role', 't_pegawai.id_role = t_role.id_role');
        $this->db->join('poliklinik', 't_pegawai.id_poliklinik = poliklinik.id_poliklinik', 'left');
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
        $data['poliklinik'] = $this->db->get('poliklinik')->result();
        $data['title'] = 'Manajemen User';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/tambah_pegawai', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pegawai()
    {
        $this->form_validation->set_rules('nomor_pegawai', 'Nomor Pegawai', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_pegawai.username]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|min_length[10]|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[10]');

        if ($this->form_validation->run() == false) {
            $data['poliklinik'] = $this->db->get('poliklinik')->result();
            $data['title'] = 'Manajemen User';
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('admin/tambah_pegawai', $data);
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $datauser  = [
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

            $this->db->insert('t_pegawai', $datauser);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                Data Pegawai baru berhasil ditambahkan!
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
        $data['editUser'] = $query->result();

        $data['poliklinik'] = $this->db->get('poliklinik')->result();
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
        $data['poliklinik'] = $this->db->get('poliklinik')->result();

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
                                Data Pegawai berhasil diubah!
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
                                Data Pegawai berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/pegawai');
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
                                    Profile berhasil diubah!
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
