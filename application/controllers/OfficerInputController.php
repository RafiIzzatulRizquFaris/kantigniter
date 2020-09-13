<?php
class OfficerInputController extends CI_Controller{
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif') {
            $this->load->view('admin/officerinputdashboard');
        } else {
            header("Location:".base_url().'Login/index');
        }
    }
}