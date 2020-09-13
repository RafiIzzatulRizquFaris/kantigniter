<?php

class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    
    }
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            // $data['pengaduan'] = $this->ModelAction->get_pengaduan();
            // $this->load->view('admin/admindashboard', $data);
            $this->load->view('admin/admindashboard');
        } else {
            header("Location:".base_url().'Login/index');
        }
    }
}