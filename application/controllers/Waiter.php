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
            $table = 'product';
            $data['product'] = $this->DataModel->readTable($table);
            $this->load->view('waiter/waiterdashboard', $data);
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
        header("Location:".base_url().'Waiter/dataproduct');
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
        header("Location:".base_url().'Waiter/dataproduct');
    }
}