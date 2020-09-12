<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Action extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    }

    public function register()
    {
        $this->ModelAction->save_database();
    }

    public function insert_petugas()
    {
        $this->ModelAction->save_petugas();
    }

    public function delete_petugas()
    {
        $this->ModelAction->delete_officer();
    }

    public function update_petugas()
    {
        $this->ModelAction->update_officer();
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $account = array(
            'username' => $username,
            'password' => $password
        );

        $check = $this->ModelAction->login_database($account)->num_rows();
        if ($check > 0) {
            $role = $this->ModelAction->login_database($account)->row(0)->level;
            if ($role == 'admin' || $role == 'petugas') {
                $current_role = $this->ModelAction->login_database($account)->row(0)->level;
                $current_id = $this->ModelAction->login_database($account)->row(0)->id_petugas;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => $current_role,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'Admin/index');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            } else {
                $current_id = $this->ModelAction->login_database($account)->row(0)->nik;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => 'masyarakat',
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'UserDashboardController/index');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            }
        } else {
            echo 'login gagal';
        }
    }

    public function logout (){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function print_pdf()
    {
        $data['petugas'] = $this->ModelAction->get_masyarakat();
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data.pdf";
		$this->pdf->load_view('admin/preview_admin', $data);
    }

    public function print_pdf_aduan()
    {
        $data['pengaduan'] = $this->ModelAction->get_pengaduan();
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-pengaduan.pdf";
		$this->pdf->load_view('admin/preview_aduan', $data);
    }

    public function print_xls()
    {
        $data = $this->ModelAction->get_masyarakat();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $this->session->userdata('username'));
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Name');
        $sheet->setCellValue('C3', 'Position');
        $sheet->setCellValue('D3', 'Username');
        $sheet->setCellValue('E3', 'Telephone');
        $x = 4;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $row->id_petugas);
				$sheet->setCellValue('B'.$x, $row->nama_petugas );
				$sheet->setCellValue('C'.$x, $row->level);
				$sheet->setCellValue('D'.$x, $row->username);
				$sheet->setCellValue('E'.$x, $row->telp);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-excel';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }

    public function print_xls_aduan()
    {
        $data = $this->ModelAction->get_pengaduan();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $this->session->userdata('username'));
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Judul Pengaduan');
        $sheet->setCellValue('C3', 'Tanggal Pengaduan');
        $sheet->setCellValue('D3', 'Isi Pengaduan');
        $sheet->setCellValue('E3', 'Status');
        $x = 4;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $row->id_pengaduan);
				$sheet->setCellValue('B'.$x, $row->judul );
				$sheet->setCellValue('C'.$x, $row->tgl_pengaduan);
				$sheet->setCellValue('D'.$x, $row->isi_laporan);
				$sheet->setCellValue('E'.$x, $row->status);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-excel-pengaduan';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }
}