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
            $where = array(
                'id_waiter' => $this->session->userdata('id'),
                'status_order' => 'menunggu',
            );
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

    public function updateOrder()
    {
        $data = array('status_order' => 'selesai',);
        $where = array('id_order' => $this->input->post('order_id'),);
        $this->DataModel->updateTable('order', $data, $where);
        header("Location:".base_url().'Waiter/dataorder');
    }

    public function exportPdfOrder()
    {
        $data['order'] = $this->DataModel->readTable('order');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-order.pdf";
		$this->pdf->load_view('preview/previeworder', $data);
    }

    public function inputOrder()
    {
        $tablecustomer = 'customer';
        $tableorder = 'order';
        $tabledetailorder = 'detail_order';

        $idproduct = $_POST['product_id'];
        $totalprice = $_POST['total_price'];
        $qtyproduct = $_POST['product_qty'];

        $wherecustomer = array(
            'username' => $this->input->post('username_customer'), 
            'password' => md5($this->input->post('password_customer')),
        );

        $idcustomer = $this->DataModel->readColumnTable($tablecustomer, $wherecustomer)->id_customer;
        $balancecustomer = $this->DataModel->readColumnTable($tablecustomer, $wherecustomer)->saldo;

        $dataorder = array(
            'id_waiter' => $this->session->userdata('id'),
            'id_customer' => $idcustomer,
            'keterangan' => 'tidak ada keterangan',
            'status_order' => 'menunggu',
            'total_bayar' => $totalprice,
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->DataModel->insertTable($tableorder, $dataorder);

        $whereorder = array(
            'id_customer' => $idcustomer, 
            'status_order' => 'menunggu',
        );

        $idorder = $this->DataModel->readColumnTable($tableorder, $whereorder)->id_order;

        $datadetailorder = array();
        $index = 0;
        foreach ($idproduct as $productid) {
            array_push($datadetailorder, array(
                'id_order' => $idorder,
                'id_product' => $productid,
                'qty_order' => $qtyproduct[$index],
            ));
            $index++;
        }

        $this->DataModel->insertBatchTable($tabledetailorder, $datadetailorder);

        $dataordercode = array(
            'kode' => 'NTR'.$idorder,
        );
        $whereidorder = array(
            'id_order' => $idorder,
        );
        $this->DataModel->updateTable($tableorder, $dataordercode, $whereidorder);

        $nowbalance = $balancecustomer - $totalprice;

        $whereupdatebalance = array('id_customer' => $idcustomer,);
        $dataupdatebalance = array('saldo' => $nowbalance,);
        $this->DataModel->updateTable($tablecustomer, $dataupdatebalance, $wherecustomer);

        header("Location:".base_url().'Waiter/index');
    }
}