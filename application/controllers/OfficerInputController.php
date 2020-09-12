<?php
class OfficerInputController extends CI_Controller{
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $this->load->view('admin/officerinputdashboard');
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }
}