<?php
class Cashier extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '3' && $this->session->userdata('state') == 'aktif')  {
            $table = 'order';
            $where = array(
                'status_order' => 'selesai',
            );
            $data['order'] = $this->DataModel->readWhereTable($table, $where);
            $this->load->view('cashier/cashierdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function topup()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '3' && $this->session->userdata('state') == 'aktif')  {
            $table = 'customer';
            $data['customer'] = $this->DataModel->readTable($table);
            $this->load->view('cashier/topupdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function transaction()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '3' && $this->session->userdata('state') == 'aktif')  {
            $table = 'transaksi';
            $join = 'order.id_order = transaksi.id_order    ';
            $data['transaction'] = $this->DataModel->readJoinTable($table, $join);
            $this->load->view('cashier/transactiondashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function insertTransact()
    {
        $tabletransact = 'transaksi';
        $tableorder = 'order';
        $orderid = $this->input->post('order_id');

        $whereorder = array('id_order' => $orderid, );
        $dataorder = array('status_order' => 'dibayar', );

        $this->DataModel->updateTable($tableorder, $dataorder, $whereorder);

        $datatransact = array(
            'id_kasir' => $this->session->userdata('id'),
            'id_customer' => $this->input->post('customer_id'),
            'id_order' => $orderid,
            'total_bayar' => $this->input->post('total_price'),
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->DataModel->insertTable($tabletransact, $datatransact);
        header("Location:".base_url().'Cashier/index');
    }

    public function topupbalance()
    {
        $table = 'customer';
        $data = array(
            'saldo' => $this->input->post('customer_balance'),
        );
        $where = array(
            'id_customer' => $this->input->post('customer_id'),
        );

        $this->DataModel->updateTable($table, $data, $where);
        header("Location:".base_url().'Cashier/topup');
    }

    public function detailTransaction()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){

            $tabletransact = 'transaksi';
            $wheretransact = array('id_transaksi' => $id,);

            $idcustomer = $this->DataModel->readColumnTable($tabletransact, $wheretransact)->id_customer;
            $idorder = $this->DataModel->readColumnTable($tabletransact, $wheretransact)->id_order;
            $date = $this->DataModel->readColumnTable($tabletransact, $wheretransact)->tanggal;
            $totalprice = $this->DataModel->readColumnTable($tabletransact, $wheretransact)->total_bayar;

            $tablecustomer = 'customer';
            $wherecustomer = array('id_customer' => $idcustomer,);

            $namacustomer = $this->DataModel->readColumnTable($tablecustomer, $wherecustomer)->nama_customer;

            $tableorder = 'order';
            $whereorder = array('id_order' => $idorder,);

            $code = $this->DataModel->readColumnTable($tableorder, $whereorder)->kode;

            $output = '
                    <p class="font-weight-bold">Nama Customer :</p>
                    <div class="text-justify">'.$namacustomer.'</div>
                    <br>
                    <p class="font-weight-bold">Kode Order :</p>
                    <div class="text-justify">'.$code.'</div>
                    <br>
                    <p class="font-weight-bold">Tanggal Order :</p>
                    <div class="text-justify">'.$date.'</div>
                    <br>
                    <p class="font-weight-bold">Total Pembayaran :</p>
                    <div class="text-justify">'.$totalprice.'</div>
                    ';  
            echo $output;
        }
        else {
         echo 'Tidak ada transaksi';
        }
    }
}