<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        // if ($_SESSION) {
        //     if ($this->session->userdata('id_role') == 2) {
        //         redirect('pendaftaran');
        //     } elseif ($this->session->userdata('id_role') == 3) {
        //         redirect('perawat');
        //     } elseif ($this->session->userdata('id_role') == 1) {
        //         redirect('admin');
        //     }
        // } else {
        //     redirect(base_url());
        // }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');;
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->db->where('username', $username);
            $user = $this->db->get('t_pegawai')->row_array();
            if ($user) {
                if ($user['status_aktif'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'username' => $user['username'],
                            'id_role' => $user['id_role'],
                            'id_pegawai' => $user['id_pegawai']
                        ];

                        $this->session->set_userdata($data);

                        if ($user['id_role'] == 1) {
                            redirect('admin');
                        } elseif ($user['id_role'] == 2) {
                            redirect('pendaftaran');
                        } elseif ($user['id_role'] == 3) {
                            redirect('perawat');
                        } elseif ($user['id_role'] == 4) {
                            redirect('dokter');
                        } elseif ($user['id_role'] == 5) {
                            redirect('kasir');
                        } elseif ($user['id_role'] == 6) {
                            redirect('rekam_medis');
                        } elseif ($user['id_role'] == 7) {
                            redirect('farmasi');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        <div class="d-flex justify-content-between align-items-center">
                        Password kamu salah!
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                    </div>');
                        redirect(base_url());
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <div class="d-flex justify-content-between align-items-center">
                        Akun kamu sudah tidak aktif!!
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                </div>');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    Akun tidak ditemukan!
                    <i class="bi bi-exclamation-circle-fill"></i>
                </div>
            </div>');
                redirect(base_url());
            }
        }
    }

    public function logout()
    {
        unset(
            $_SESSION['username'],
            $_SESSION['id_role'],
            $_SESSION['id_pegawai'],
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <div class="d-flex justify-content-between align-items-center">
            Kamu berhasil Logout!
            <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
        </div>
    </div>
    ');
        redirect(base_url());
    }
}
