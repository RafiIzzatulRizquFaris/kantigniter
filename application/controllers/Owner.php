<?php
class Owner extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '4' && $this->session->userdata('state') == 'aktif')  {
            $table = 'customer';
            $data['customer'] = $this->DataModel->readTable($table);
            $this->load->view('owner/ownerdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function product()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '4' && $this->session->userdata('state') == 'aktif')  {
            $table = 'product';
            $data['product'] = $this->DataModel->readTable($table);
            $this->load->view('owner/productdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function user()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == '4' && $this->session->userdata('state') == 'aktif')  {
            $table = 'user';
            $data['user'] = $this->DataModel->readTable($table);
            $this->load->view('owner/userdashboard', $data);
        } else {
            header("Location:".base_url().'Login/index');
        }
    }

    public function exportPdfCustomer()
    {
        $data['customer'] = $this->DataModel->readTable('customer');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-customer.pdf";
		$this->pdf->load_view('preview/previewcustomer', $data);
    }

    public function exportPdfProduct()
    {
        $data['product'] = $this->DataModel->readTable('product');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-product.pdf";
		$this->pdf->load_view('preview/previewproduct', $data);
    }

    public function exportPdfUser()
    {
        $data['user'] = $this->DataModel->readTable('user');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-user.pdf";
		$this->pdf->load_view('preview/previewuser', $data);
    }

}