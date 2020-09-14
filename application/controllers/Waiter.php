<?php 
class Waiter extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '2' && $this->session->userdata('state') == 'aktif')  {
            $this->load->view('waiter/waiterdashboard');
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function dataorder()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '2' && $this->session->userdata('state') == 'aktif')  {
            $table = 'order';
            $where = array('id_waiter' => $this->session->userdata('id'));
            $data['order'] = $this->DataModel->readWhereTable($table, $where);
            $this->load->view('waiter/orderdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function dataproduct()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '2' && $this->session->userdata('state') == 'aktif')  {
            $table = 'product';
            $data['product'] = $this->DataModel->readTable($table);
            $this->load->view('waiter/productdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function deleteProduct()
    {
        $table = 'product';
        $data = array(
            'id_product' => $this->input->post('product_id')
        );
        $this->DataModel->deleteTable($table, $data);
        header("Location:".base_url().'Waiter/dataproduct');
    }

    public function updateProduct()
    {
        $table = 'product';
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
        );

        $where = array('id_product' => $this->input->post('id_product'),);
        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Waiter/dataproduct');
    }

    public function insertProduct()
    {
        $table = 'product';
        $data = array(
            'nama_product' => $this->input->post('name_product'),
            'harga_product' => $this->input->post('price_product'),
            'stok_product' => $this->input->post('stock_product'),
        );

        $this->DataModel->insertTable($table, $data);
        header("Location:".base_url().'Waiter/dataproduct');
    }
}