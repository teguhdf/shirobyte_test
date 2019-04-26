<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Users';
        $data['user'] = $this->User_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    function do_upload()
    {
        $config['upload_path'] = "./assets/images";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;


        if ($this->upload->do_upload("file")) {
            $data = array('upload_data' => $this->upload->data());


            $image = $data['upload_data']['file_name'];

            $result = $this->User_model->tambahDataUser($image);
            return json_decode($result);
        }
    }

    public function aksi_upload()
    {
        $config['upload_path']          = './assets/gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/tambah', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
        }
        var_dump($image);
        die;
    }


    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data User';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('noTlp', 'No Telepon', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        // $this->form_validation->set_rules('photo', 'Photo', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {

            $this->User_model->tambahDataUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('users');
        }
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('users');
    }
}
