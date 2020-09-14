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
            $table = 'customer';
            $data['customer'] = $this->DataModel->readTable($table);
            $this->load->view('admin/admindashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function dataproduct()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            $table = 'product';
            $data['product'] = $this->DataModel->readTable($table);
            $this->load->view('admin/productdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function datauser()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '1' && $this->session->userdata('state') == 'aktif')  {
            $table = 'user';
            $data['user'] = $this->DataModel->readTable($table);
            $this->load->view('admin/userdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function deleteCustomer()
    {
        $table = 'customer';
        $data = array('status' => 'suspen');
        $where = array('id_customer' => $this->input->post('customer_id'));
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Admin/index');
    }
    
    public function updateCustomer()
    {
        $table = 'customer';
        $data = array(
            'nama_customer' => $this->input->post('name_customer'),
            'username' => $this->input->post('username_customer'),
            'password' => md5($this->input->post('password_customer')),
            'saldo' => $this->input->post('balance_customer'),
            'status' => $this->input->post('status_customer'),
        );

        $where = array('id_customer' => $this->input->post('id_customer'),);
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Admin/index');
    }

    public function insertCustomer()
    {
        $table = 'customer';
        $data = array(
            'nama_customer' => $this->input->post('name_customer'),
            'username' => $this->input->post('username_customer'),
            'password' => md5($this->input->post('password_customer')),
            'saldo' => $this->input->post('balance_customer'),
            'status' => $this->input->post('status_customer'),
        );

        $this->DataModel->insertTable($table, $data);
        header("Location:".base_url().'Admin/index');
    }

    public function deleteProduct()
    {
        $table = 'product';
        $data = array(
            'id_product' => $this->input->post('product_id')
        );
        $this->DataModel->deleteTable($table, $data);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function updateProduct()
    {
        $table = 'product';
        $foto = $_FILES['image_product']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = FCPATH .'./assets/product';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size']  = '2048';

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_product')) {
                echo "gagal upload"; 
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
            'gambar_product' => $foto,
        );

        $where = array('id_product' => $this->input->post('id_product'),);
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function insertProduct()
    {
        $table = 'product';
        $foto = $_FILES['image_product']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = FCPATH .'./assets/product';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size']  = '2048';

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_product')) {
                echo "gagal upload"; 
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
            'gambar_product' => $foto,
        );

        $this->DataModel->insertTable($table, $data);
        header("Location:".base_url().'Admin/dataproduct');
    }

    public function deleteUser()
    {
        $table = 'user';
        $data = array('status' => 'suspen');
        $where = array('id_user' => $this->input->post('user_id'));
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Admin/datauser');
    }
    
    public function updateUser()
    {
        $table = 'user';
        $data = array(
            'nama_user' => $this->input->post('name_user'),
            'username' => $this->input->post('username_user'),
            'password' => md5($this->input->post('password_user')),
            'id_level' => $this->input->post('level_user'),
            'status' => $this->input->post('status_user'),
        );

        $where = array('id_user' => $this->input->post('id_user'),);
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Admin/datauser');
    }

    public function insertUser()
    {
        $table = 'user';
        $data = array(
            'nama_user' => $this->input->post('name_user'),
            'username' => $this->input->post('username_user'),
            'password' => md5($this->input->post('password_user')),
            'id_level' => $this->input->post('level_user'),
            'status' => $this->input->post('status_user'),
        );

        $this->DataModel->insertTable($table, $data);
        header("Location:".base_url().'Admin/datauser');
    }
}