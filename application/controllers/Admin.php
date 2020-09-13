<?php

class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    
    }
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            $data['customer'] = $this->DataModel->readCustomer();
            $this->load->view('admin/admindashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function dataproduct()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            $data['product'] = $this->DataModel->readProduct();
            $this->load->view('admin/productdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function datauser()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            $data['user'] = $this->DataModel->readUser();
            $this->load->view('admin/userdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function deleteCustomer()
    {
        $data = array(
            'id_customer' => $this->input->post('customer_id')
        );
        $this->DataModel->deleteCustomer($data);
        header("Location:".base_url().'Admin/index');
    }
    
    public function updateCustomer()
    {
        $data = array(
            'nama_customer' => $this->input->post('name_customer'),
            'username' => $this->input->post('username_customer'),
            'password' => md5($this->input->post('password_customer')),
            'saldo' => $this->input->post('balance_customer'),
            'status' => $this->input->post('status_customer'),
        );

        $where = array('id_customer' => $this->input->post('id_customer'),);
        $this->DataModel->updateCustomer($data, $where);
        header("Location:".base_url().'Admin/index');
    }

    public function insertCustomer()
    {
        $data = array(
            'nama_customer' => $this->input->post('name_customer'),
            'username' => $this->input->post('username_customer'),
            'password' => md5($this->input->post('password_customer')),
            'saldo' => $this->input->post('balance_customer'),
            'status' => $this->input->post('status_customer'),
        );

        $this->DataModel->insertCustomer($data);
        header("Location:".base_url().'Admin/index');
    }

    public function deleteProduct()
    {
        $data = array(
            'id_product' => $this->input->post('product_id')
        );
        $this->DataModel->deleteProduct($data);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function updateProduct()
    {
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
        );

        $where = array('id_product' => $this->input->post('id_product'),);
        $this->DataModel->updateProduct($data, $where);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function insertProduct()
    {
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
        );

        $this->DataModel->insertProduct($data);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function deleteUser()
    {
        $data = array(
            'id_user' => $this->input->post('user_id')
        );
        $this->DataModel->deleteUser($data);
        header("Location:".base_url().'Admin/datauser');
    }
    
    public function updateUser()
    {
        $data = array(
            'nama_user' => $this->input->post('name_user'),
            'username' => $this->input->post('username_user'),
            'password' => md5($this->input->post('password_user')),
            'id_level' => $this->input->post('level_user'),
            'status' => $this->input->post('status_user'),
        );

        $where = array('id_user' => $this->input->post('id_user'),);
        $this->DataModel->updateUser($data, $where);
        header("Location:".base_url().'Admin/datauser');
    }

    public function insertUser()
    {
        $data = array(
            'nama_user' => $this->input->post('name_user'),
            'username' => $this->input->post('username_user'),
            'password' => md5($this->input->post('password_user')),
            'id_level' => $this->input->post('level_user'),
            'status' => $this->input->post('status_user'),
        );

        $this->DataModel->insertUser($data);
        header("Location:".base_url().'Admin/datauser');
    }
}