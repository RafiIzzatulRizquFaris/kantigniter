<?php
class AduanController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAduan');
    }

    public function prosesLaporan()
    {
        $this->ModelAduan->prosesLaporanModel();
    }

    public function selesaiLaporan()
    {
        $this->ModelAduan->selesaiLaporanModel();
    }

    public function insertLaporan()
    {
        $this->ModelAduan->insertLaporanModel();
    }

    public function detailLaporan()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){
            $records = $this->ModelAduan->detailLaporanModel($id);
            $output = '';
            $data = $records->result_array();
            if (!empty($data)) {
                foreach($data as $row){
                    $output .= '
                    <p class="font-weight-bold">Tanggal  Tanggapan</p>
                    <div class="text-justify">'.$row["tgl_tanggapan"].'</div>
                    <br>
                    <p class="font-weight-bold">Isi Tanggapan</p>
                    <div class="text-justify">'.$row["tanggapan"].'</div>
                    ';
                   }    
                   echo $output;
            }else{
                echo 'Belum ditanggapi';
            }
        }
        else {
         echo 'Tidak ada tanggapan';
        }
    }
}