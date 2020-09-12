<?php

class ModelAction extends CI_Model{

    public function save_database()
    {
        // $config['upload_path'] = './assets/';
        // $config['allowed_types'] = 'jpg|png|gif';
        // $config['max_size'] = '2048000';
        // $config['file_name'] = url_title($this->input->post('gambar'));
        // $filename = $this->upload->file_name;
        // $this->upload->initialize($config);
        // $this->upload->do_upload('gambar');
        // $data = $this->upload->data();

        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('first_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'telp' => $this->input->post('telepon'),
        );

        $this->db->insert('masyarakat', $data);
        header("Location:".base_url().'LoginController/index');
    }

    public function save_petugas()
    {
        $data = array(
            'nama_petugas' => $this->input->post('nama_officer'),
            'username' => $this->input->post('username_officer'),
            'password' => $this->input->post('password_officer'),
            'telp' => $this->input->post('telepon_officer'),
            'level' => $this->input->post('position_officer'),
        );

        $this->db->insert('Petugas', $data);
        header("Location:".base_url().'OfficerInputController/index');
    }

    public function delete_officer()
    {
        $data = array(
            'id_petugas' => $this->input->post('petugas_id')
        );

        $this->db->delete('Petugas', $data);
        header("Location:".base_url().'OfficerDataController/index');
    }

    public function update_officer()
    {
        $data = array(
            'nama_petugas' => $this->input->post('name_officer'),
            'username' => $this->input->post('username_officer'),
            'password' => $this->input->post('password_officer'),
            'telp' => $this->input->post('telepon_officer'),
            'level' => $this->input->post('position_officer'),
        );

        $where = array('id_petugas' => $this->input->post('id_officer'),);

        $this->db->update('Petugas', $data, $where);
        header("Location:".base_url().'OfficerDataController/index');
    }

    public function get_masyarakat()
    {
        $data = $this->db->get('Petugas');
        return $data->result();
    }

    public function count_masyarakat()
    {
        $data = $this->db->get('Petugas');
        return $data->num_rows();
    }

    public function get_pengaduan()
    {
        $data = $this->db->get('pengaduan');
        return $data->result();
    }

    public function login_database($account)
    {
        $petugas = $this->db->get_where('Petugas',$account);
        $masyarakat = $this->db->get_where('masyarakat',$account);
        if ($petugas->result() == null) {
            return $masyarakat;
        }else{
            return $petugas;
        }
        
    }

}