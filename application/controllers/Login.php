<?php
class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('TrafficModel');
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            header("Location:".base_url().'Admin/index');
		}else{
			$this->load->view('loginpage');
		}
	}

	public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $account = array(
            'username' => $username,
            'password' => $password
        );

        $check = $this->TrafficModel->loginModel($account)->num_rows();
        if ($check > 0) {
            $role = $this->TrafficModel->loginModel($account)->row(0)->id_level;
            if ($role == '1') {
				// admin
				$current_id = $this->TrafficModel->loginModel($account)->row(0)->id_user;
				$current_state = $this->TrafficModel->loginModel($account)->row(0)->status;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => $current_role,
					'status' => 'login',
					'state' => $current_state
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login' && $this->session->userdata('state') == "aktif") {
                    header("Location:".base_url().'Admin/index');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            } else if ($role == '2') {
				// waiter
			} else if ($role == '3') {
				// kasir
			} else if ($role == '4') {
				// owner
			} else{
				header("Location:".base_url().'Welcome/index');
			}
        } else {
            echo 'login gagal';
        }
	}
	
	public function logout()
	{
		$this->TrafficModel->logoutModel();
	}
}
