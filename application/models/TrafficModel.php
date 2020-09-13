<?php
class TrafficModel extends CI_Model{

    public function loginModel($account)
    {
        return $this->db->get_where('user',$account);
    }

    public function registerModel()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama_user' => $this->input->post('nama_user'),
            'id_level' => $this->input->post('position'),
            'status' => 'waiting',
        );

        $this->db->insert('user', $data);
    }
}