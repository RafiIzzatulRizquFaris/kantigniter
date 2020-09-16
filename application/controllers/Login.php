<?php
class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('TrafficModel');
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1') {
            header("Location:".base_url().'Admin/index');
		}else if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '2') {
			header("Location:".base_url().'Waiter/index');
		}else if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '3') {
			header("Location:".base_url().'Cashier/index');
		}else if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '4') {
			header("Location:".base_url().'Owner/index');
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
            'password' => md5($password)
        );

        $check = $this->TrafficModel->loginModel($account)->num_rows();
        if ($check > 0) {
            $role = $this->TrafficModel->loginModel($account)->row(0)->id_level;
            if ($role == '1') {
				// admin
				$current_id = $this->TrafficModel->loginModel($account)->row(0)->id_user;
				$current_state = $this->TrafficModel->loginModel($account)->row(0)->status;
				if ($current_state == "aktif") {
					$data_session = array(
						'id' => $current_id,
						'username' => $username,
						'role' => $role,
						'status' => 'login',
						'state' => $current_state
					);
					$this->session->set_userdata($data_session);
					if ($this->session->userdata('status') == 'login') {
						header("Location:".base_url().'Admin/index');
					} else {
						header("Location:".base_url().'Welcome/index');
					}
				}else {
					header("Location:".base_url().'Welcome/index');
				}
            } else if ($role == '2') {
				// waiter
				$current_id = $this->TrafficModel->loginModel($account)->row(0)->id_user;
				$current_state = $this->TrafficModel->loginModel($account)->row(0)->status;
				if ($current_state == "aktif") {
					$data_session = array(
						'id' => $current_id,
						'username' => $username,
						'role' => $role,
						'status' => 'login',
						'state' => $current_state
					);
					$this->session->set_userdata($data_session);
					if ($this->session->userdata('status') == 'login') {
						header("Location:".base_url().'Waiter/index');
					} else {
						header("Location:".base_url().'Welcome/index');
					}
				}else {
					header("Location:".base_url().'Welcome/index');
				}
			} else if ($role == '3') {
				// kasir
				$current_id = $this->TrafficModel->loginModel($account)->row(0)->id_user;
				$current_state = $this->TrafficModel->loginModel($account)->row(0)->status;
				if ($current_state == "aktif") {
					$data_session = array(
						'id' => $current_id,
						'username' => $username,
						'role' => $role,
						'status' => 'login',
						'state' => $current_state
					);
					$this->session->set_userdata($data_session);
					if ($this->session->userdata('status') == 'login') {
						header("Location:".base_url().'Cashier/index');
					} else {
						header("Location:".base_url().'Welcome/index');
					}
				}else {
					header("Location:".base_url().'Welcome/index');
				}
			} else if ($role == '4') {
				// owner
				$current_id = $this->TrafficModel->loginModel($account)->row(0)->id_user;
				$current_state = $this->TrafficModel->loginModel($account)->row(0)->status;
				if ($current_state == "aktif") {
					$data_session = array(
						'id' => $current_id,
						'username' => $username,
						'role' => $role,
						'status' => 'login',
						'state' => $current_state
					);
					$this->session->set_userdata($data_session);
					if ($this->session->userdata('status') == 'login') {
						header("Location:".base_url().'Owner/index');
					} else {
						header("Location:".base_url().'Welcome/index');
					}
				}else {
					header("Location:".base_url().'Welcome/index');
				}
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
        redirect(base_url());
	}
}
