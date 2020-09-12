<?php
class OfficerDataController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $data['petugas'] = $this->ModelAction->get_masyarakat();
            $this->load->view('admin/officerdatadashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }
}