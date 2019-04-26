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

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data User';
        $result['error'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('user/tambah',$result);
        $this->load->view('templates/footer');
    }

    private function _aksi_upload()
    {
        $config['upload_path']          = './assets/gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $result = array('upload_data' => $this->upload->data());
            return $result;
        }
    }

    public function aksi_tambah(){
      $data['judul'] = 'Form Tambah Data User';
      $data['error'] = '';

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
          'matches' => 'Password dont match!',
          'min_length' => 'Password too short!'
      ]);
      $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
      $this->form_validation->set_rules('gender', 'Gender', 'required',[
        'required' => 'tolong pilih gender'
      ]);
      $this->form_validation->set_rules('noTlp', 'No Telepon', 'required|numeric');
      $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required',[
        'required' => 'tolong pilih bro'
      ]);
      

      if ($this->form_validation->run() == false) {
          $this->load->view('templates/header', $data);
          $this->load->view('user/tambah',$data);
          $this->load->view('templates/footer');
      } else {

        $file = $this->_aksi_upload();

        if ($file['error']) {
          $result['error'] = $file['error'];
          $this->load->view('templates/header', $data);
          $this->load->view('user/tambah',$result);
          $this->load->view('templates/footer');

        }else{
          $file = $this->_aksi_upload();
          $img = $file['upload_data']['file_name'];
          $this->User_model->tambahDataUser($img);
          $this->session->set_flashdata('flash', 'Ditambahkan');
          redirect('users');
        }
      }
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('users');
    }
}
