<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->db->select('role.nama_role, COUNT(user.role_id) as jumlah_user');
        $this->db->from('role');
        $this->db->join('user', 'role.role_id = user.role_id', 'left');
        $this->db->where_in('role.role_id', array(2, 3, 4, 5, 6, 7));
        $this->db->group_by('role.nama_role');
        $query = $this->db->get();
        $result = $query->result(); // Simpan hasil query ke dalam variabel

        $data['title'] = "Dashboard";
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/index', ['result' => $result]); // Kirim hasil query ke tampilan
        $this->load->view('templates/main/footer');
    }


    public function user()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->db->select('user.*, role.nama_role, poliklinik.nama_klinik'); // Menambahkan kolom nama_poliklinik
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.role_id');
        $this->db->join('poliklinik', 'user.id_poliklinik = poliklinik.id_poliklinik', 'left'); // JOIN dengan tabel poliklinik
        $this->db->where('user.role_id !=', 1);
        $data['users'] = $this->db->get()->result_array();


        $data['title'] = "Manajemen User";
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/user');
        $this->load->view('templates/main/footer');
    }

    public function tambah_user()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $data['poliklinik'] = $this->db->get('poliklinik')->result();
        $data['title'] = 'Manajemen User';
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_user', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_user()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->form_validation->set_rules('nomor_pegawai', 'Nomor Pegawai', 'required|trim|integer');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|min_length[3]|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['poliklinik'] = $this->db->get('poliklinik')->result();
            $data['title'] = 'Manajemen User';
            $this->load->view('templates/main/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $datauser  = [
                'role_id' => $this->input->post('role'),
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

            $this->db->insert('user', $datauser);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                User baru berhasil ditambahkan!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
            redirect('admin/user');
        }
    }

    public function edit_user()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $user_id = $this->input->post('user_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        $data['editUser'] = $query->result();

        $data['poliklinik'] = $this->db->get('poliklinik')->result();
        $data['title'] = 'Manajemen User';
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_user()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status_aktif', 'Status Aktif', 'required');

        $user_id = $this->input->post('user_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        $data['editUser'] = $query->result();
        $data['poliklinik'] = $this->db->get('poliklinik')->result();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Manajemen User';
            $this->load->view('templates/main/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/edit_user', $data);
            $this->load->view('templates/main/footer');
        } else {
            $data = array(
                'id_poliklinik' => $this->input->post('id_poliklinik'),
                'role_id' => $this->input->post('role'),
                'status_aktif'  => $this->input->post('status_aktif')
            );

            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                User berhasil diubah!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
            redirect('admin/user');
        }
    }

    public function hapus_user()
    {
        $this->db->where('user_id', $this->input->post('user_id'));
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                            <div>
                                User berhasil dihapus!
                                <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                            </div>
                        </div>');
        redirect('admin/user');
    }

    public function profil()
    {
        if ($this->session->userdata('role_id') != 1) {
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
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/main/footer');
    }

    public function edit_profil()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $this->db->select('*');
        $this->db->from('user');  // Ganti "nama_tabel" dengan nama tabel sesuai kebutuhan
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data['profile'] = $this->db->get()->result();

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/edit_profil', $data);
        $this->load->view('templates/main/footer');
    }


    public function proses_edit_profil()
    {

        if ($this->session->userdata('role_id') != 1) {
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
            $this->load->view('admin/sidebar', $data);
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
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
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
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }

        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/ganti_password', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_ganti_password()
    {
        if ($this->session->userdata('role_id') != 1) {
            $this->load->view('errors/html/error_403'); // Menampilkan halaman error 403
            return;
        }
        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim|callback_check_current_password');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|callback_check_new_password');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil';
            $this->load->view('templates/main/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/ganti_password', $data);
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
            redirect('admin/profil');
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
}
