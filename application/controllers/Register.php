<?php
class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('TrafficModel');
    }

	public function index()
	{
		$this->load->view('registerpage');
	}

	public function register()
	{
		$this->TrafficModel->registerModel();
		header("Location:".base_url().'Login/index');
	}
}
