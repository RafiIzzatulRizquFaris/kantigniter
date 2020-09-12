<?php
class Login extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            header("Location:".base_url().'AdminController/index');
		}else{
			$this->load->view('loginpage');
		}
	}
}
