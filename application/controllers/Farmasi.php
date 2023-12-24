<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmasi extends CI_Controller
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
            }
        }
    }

    public function index()
    {
        // Data jumlah semua antrian
        $this->db->select('t_antrian.*, t_pendaftaran.*');
        $this->db->from('t_antrian');
        $this->db->join('t_pendaftaran', 't_antrian.id_pendaftaran = t_pendaftaran.id_pendaftaran');
        $this->db->where('status_pembayaran', "1");
        $this->db->where('status_pemeriksaan1', "1");
        $this->db->where('status_pemeriksaan2', "1");
        $this->db->where('status_pengambilan_obat', "0");
        $data['panjang_antri'] = $this->db->get()->num_rows();

        $this->db->select('t_pendaftaran.*, t_pasien.*, t_poliklinik.nama_poliklinik, t_pemeriksaan2.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->join('t_pemeriksaan2', 't_pendaftaran.id_pendaftaran = t_pemeriksaan2.id_pendaftaran');
        $this->db->where('status_pembayaran', "1");
        $this->db->where('status_pemeriksaan1', "1");
        $this->db->where('status_pemeriksaan2', "1");
        $this->db->where('status_pengambilan_obat', "0");
        $this->db->order_by('t_pemeriksaan2.id_pemeriksaan2', 'ASC'); // Urutkan berdasarkan id_pendaftaran terkecil
        $this->db->limit(5);
        $data['farmasi'] = $this->db->get()->result();

        $data['title'] = "Antrian Pengambilan Obat";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('farmasi/index', $data);
        $this->load->view('templates/main/footer');
    }

    public function tambah_pengambilan_obat()
    {
        $id_pemeriksaan2 = $this->input->post('id_pemeriksaan2');
        $this->db->where('id_pemeriksaan2', $id_pemeriksaan2);
        $data['farmasi'] = $this->db->get('t_pemeriksaan2')->result();

        $data['obat'] = $this->db->get('t_obat')->result();

        $data['title'] = "Antrian Pengambilan Obat";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('farmasi/tambah_pengambilan_obat', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_tambah_pengambilan_obat()
    {
        $this->form_validation->set_rules('select_obat[]', 'Nama Obat', 'required|callback_check_select_obat');

        $fields = array(
            'select_obat',
        );

        foreach ($fields as $field) {
            $inputValue = $this->input->post($field);
            $$field = empty($inputValue) ? "" : implode(', ', $inputValue);
        }

        if ($this->form_validation->run() == false) {
            $id_pemeriksaan2 = $this->input->post('id_pemeriksaan2');
            $this->db->where('id_pemeriksaan2', $id_pemeriksaan2);
            $data['farmasi'] = $this->db->get('t_pemeriksaan2')->result();

            $data['obat'] = $this->db->get('t_obat')->result();

            $data['title'] = "Antrian Pengambilan Obat";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('farmasi/tambah_pengambilan_obat', $data);
            $this->load->view('templates/main/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data_pengambilan_obat = [
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'id_pasien' => $this->input->post('id_pasien'),
                'id_pegawai' => $this->session->userdata('id_pegawai'),
                'obat_yang_diambil' => $select_obat,
                'keterangan_pengambilan_obat' => $this->input->post('keterangan_pengambilan_obat'),
                'catatan' => $this->input->post('catatan'),
                'waktu_pengambilan_obat' => date('Y-m-d H:i:s'),
            ];

            $selectedObats = $this->input->post('select_obat');
            foreach ($selectedObats as $obat) {
                $this->db->set('stok_obat', 'stok_obat - 1', FALSE); // Misalnya, mengurangkan stok_obat sebanyak 1
                $this->db->where('nama_obat', $obat);
                $this->db->update('t_obat');
            }

            $this->db->insert('t_pengambilan_obat', $data_pengambilan_obat);

            $this->db->where('id_pendaftaran', $this->input->post('id_pendaftaran'));
            $this->db->update('t_pendaftaran', array('status_pengambilan_obat' => '1'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                <div>
                    Data pengambilan obat berhasil ditambahkan!
                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                </div>
            </div>');
            redirect('farmasi');
        }
    }

    public function pengambilan_obat()
    {
        $this->db->select('t_pengambilan_obat.*, t_pasien.*');
        $this->db->from('t_pengambilan_obat');
        $this->db->join('t_pasien', 't_pengambilan_obat.id_pasien = t_pasien.id_pasien');
        $data['pengambilan_obat'] = $this->db->get()->result();

        $data['title'] = "Data Pengambilan Obat";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('farmasi/pengambilan_obat', $data);
        $this->load->view('templates/main/footer');
    }

    public function edit_pengambilan_obat()
    {
        $this->db->where('id_pengambilan_obat', $this->input->post('id_pengambilan_obat'));
        $data['pengambilan_obat'] = $this->db->get('t_pengambilan_obat')->result();

        $data['obat'] = $this->db->get('t_obat')->result();

        $data['title'] = "Data Pengambilan Obat";
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('farmasi/edit_pengambilan_obat', $data);
        $this->load->view('templates/main/footer');
    }

    public function proses_edit_pengambilan_obat()
    {
        $this->form_validation->set_rules('select_obat[]', 'Nama Obat', 'required|callback_check_select_obat');

        $fields = array(
            'select_obat',
        );

        foreach ($fields as $field) {
            $inputValue = $this->input->post($field);
            $$field = empty($inputValue) ? "" : implode(', ', $inputValue);
        }

        $this->db->where('id_pengambilan_obat', $this->input->post('id_pengambilan_obat'));
        $data['pengambilan_obat'] = $this->db->get('t_pengambilan_obat')->result();

        $data['obat'] = $this->db->get('t_obat')->result();

        if ($this->form_validation->run() == false) {

            $data['title'] = "Data Pengambilan Obat";
            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/sidebar', $data);
            $this->load->view('farmasi/edit_pengambilan_obat', $data);
            $this->load->view('templates/main/footer');
        } else {
            $data_pengambilan_obat = [
                'obat_yang_diambil' => $select_obat,
                'keterangan_pengambilan_obat' => $this->input->post('keterangan_pengambilan_obat'),
                'catatan' => $this->input->post('catatan')
            ];

            $obat_sebelumnya = $data['pengambilan_obat'][0]->obat_yang_diambil;
            $obat_baru  = $select_obat;

            $arrayA = explode(', ', $obat_sebelumnya);
            $arrayB = explode(', ', $obat_baru);

            // Cari kata yang tidak sama di antara kedua array
            $uncommonWordsA = array_diff($arrayA, $arrayB);
            $uncommonWordsB = array_diff($arrayB, $arrayA);

            // Gabungkan array kata yang tidak sama dari kedua sisi
            $uncommonWords = array_merge($uncommonWordsA, $uncommonWordsB);

            if (!empty($uncommonWords)) {
                foreach ($uncommonWords as $obat) {
                    $this->db->set('stok_obat', 'stok_obat - 1', FALSE);
                    $this->db->where('nama_obat', $obat);
                    $this->db->update('t_obat');
                }
            }

            $this->db->where('id_pengambilan_obat', $this->input->post('id_pengambilan_obat'));
            $this->db->update('t_pengambilan_obat', $data_pengambilan_obat);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="display: inline-block;">
                <div>
                    Data pengambilan obat berhasil diubah!
                    <i class="bi bi-check-circle-fill"></i> <!-- Menggunakan ikon tanda centang -->
                </div>
            </div>');
            redirect('farmasi/pengambilan_obat');
        }
    }

    public function cetak_nota()
    {
        $this->db->select('t_pendaftaran.id_poliklinik, t_pasien.*, t_poliklinik.nama_poliklinik, t_pengambilan_obat.*');
        $this->db->from('t_pendaftaran');
        $this->db->join('t_pasien', 't_pendaftaran.id_pasien = t_pasien.id_pasien');
        $this->db->join('t_poliklinik', 't_pendaftaran.id_poliklinik = t_poliklinik.id_poliklinik');
        $this->db->join('t_pengambilan_obat', 't_pendaftaran.id_pendaftaran = t_pengambilan_obat.id_pendaftaran');
        $this->db->where('id_pengambilan_obat', $this->input->post('id_pengambilan_obat'));
        $data['pengambilan_obat'] = $this->db->get()->result();

        $this->load->view('farmasi/cetak_nota', $data);
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
        $this->load->view('farmasi/profil', $data);
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
        $this->load->view('farmasi/edit_profil', $data);
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
            $this->load->view('farmasi/edit_profil', $data);
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
                    redirect('farmasi/profil');
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
            redirect('farmasi/profil');
        }
    }

    public function ganti_password()
    {
        $data['title'] = 'Profil';
        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('farmasi/ganti_password', $data);
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
            $this->load->view('farmasi/ganti_password', $data);
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
            redirect('farmasi/profil');
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

    public function check_select_obat($select_obat)
    {
        if (empty($select_obat)) {
            $this->form_validation->set_message('check_select_obat', 'Pilih setidaknya satu obat.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
