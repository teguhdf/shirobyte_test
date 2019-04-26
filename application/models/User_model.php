<?php

class User_model extends CI_model
{

    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }

    public function tambahDataUser()
    {

        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "gender" => $this->input->post('gender', true),
            "noTlp" => $this->input->post('noTlp', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "photo" => 'assets/user.png',
        ];

        $this->db->insert('users', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users', ['id' => $id]);
    }
}
