<?php

class KartuKeluarga extends CI_Controller 
{
    public function __construct() {
        parent::__construct();

        $this->load->model('KKModel');
        $this->load->model('PendudukModel');

        $this->load->helper('url');
    }

    public function index() {

        $result = $this->KKModel->getAllKK();
        $penduduk = $this->PendudukModel->getAllPenduduk();

        $data['kks'] = $result;
        $data['penduduks'] = $penduduk;

        $this->load->view('dashboard/kartukeluarga', $data);
    }

    public function doAddKartuKeluarga() {
        $nokk = $this->input->post('nokk');
        $nik = $this->input->post('nik');
        $status = $this->input->post('status');
        $ayah = $this->input->post('ayah');
        $ibu = $this->input->post('ibu');

        $res = $this->KKModel->addDataKK($nokk, $nik, $status, $ayah, $ibu);
        if ($res == true) {
            redirect('http://localhost:8888/sensus/index.php/kartukeluarga', 'refresh');
        }
    }

    public function doEditKartuKeluarga() {
        $id = $this->input->post('id');
        $nokk = $this->input->post('nokk');
        $nik = $this->input->post('nik');
        $status = $this->input->post('status');
        $ayah = $this->input->post('ayah');
        $ibu = $this->input->post('ibu');

        $result = $this->KKModel->editDataKK($id, $nokk, $nik, $status, $ayah, $ibu);
        if ($result == 1) {
            redirect('http://localhost:8888/sensus/index.php/kartukeluarga', 'refresh');
        }
    }

    public function doDeleteKartuKeluarga($id = 0) {
        $result = $this->KKModel->deleteDataKK($id);
        if ($result == 1) {
            redirect('http://localhost:8888/sensus/index.php/kartukeluarga', 'refresh');
        }
    }
}
