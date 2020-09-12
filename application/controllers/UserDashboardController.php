<?php
class UserDashboardController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAduan');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'masyarakat') {
            $data['report'] = $this->ModelAduan->getLaporan();
            $this->load->view('user/userdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }
}