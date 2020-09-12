<?php
class InputDashboardController extends CI_Controller{
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'masyarakat') {
            $this->load->view('user/inputdashboard');
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }
}