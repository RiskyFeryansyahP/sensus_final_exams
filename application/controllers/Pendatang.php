<?php

class Pendatang extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('PendatangModel');
        $this->load->model('PendudukModel');

        $this->load->helper('url');
    }

    public function index() {
        $result = $this->PendatangModel->getAllPendatang();
        $penduduk = $this->PendudukModel->getAllPenduduk();
        
        $data['pendatangs'] = $result;
        $data['penduduks'] = $penduduk;

        $this->load->view('dashboard/pendatang', $data);
    }

    public function doAddPendatang() {
        $nik = $this->input->post('nik');
        $tgldatang = $this->input->post('tgldatang');
        $alamatasal = $this->input->post('alamatasal');
        $alamatsekarang = $this->input->post('alamatsekarang');

        $result = $this->PendatangModel->addPendatang($nik, $tgldatang, $alamatasal, $alamatsekarang);
        if ($result == true) {
            redirect('http://localhost:8888/sensus/index.php/pendatang', 'refresh');
        }
    }

    public function doEditPendatang() {
        $nopendatang = $this->input->post('nopendatang');
        $nik = $this->input->post('nik');
        $tgldatang = $this->input->post('tgldatang');
        $alamatasal = $this->input->post('alamatasal');
        $alamatsekarang = $this->input->post('alamatsekarang');

        $result = $this->PendatangModel->editPendatang($nopendatang, $nik, $tgldatang, $alamatasal, $alamatsekarang);
        if ($result == 1) {
            redirect('http://localhost:8888/sensus/index.php/pendatang', 'refresh');
        }
    }

    public function doDeletePendatang($nopendatang = 0) {
        $result = $this->PendatangModel->deletePendatang($nopendatang);
        if ($result == 1) {
            redirect('http://localhost:8888/sensus/index.php/pendatang', 'refresh');
        }
    }
}
