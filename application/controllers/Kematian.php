<?php

class Kematian extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('KematianModel');
        $this->load->model('PendudukModel');

        $this->load->helper('url');
    }

    public function index() {
        $result = $this->KematianModel->getAllKematian();
        $penduduk = $this->PendudukModel->getAllPenduduk();

        $data['kematians'] = $result;
        $data['penduduks'] = $penduduk;

        $this->load->view('dashboard/kematian', $data);
    }

    public function doAddKematian() {
        $nik = $this->input->post('nik');
        $tglkematian = $this->input->post('tglkematian');
        $penyebab = $this->input->post('penyebab');

        $result = $this->KematianModel->addDataKematian($nik, $tglkematian, $penyebab);
        if ($result == true) {
            redirect('http://localhost:8888/sensus/index.php/kematian', 'refresh');
        }
    }

    public function doEditKematian() {
        $nokematian = $this->input->post('nokematian');
        $nik = $this->input->post('nik');
        $tglkematian = $this->input->post('tglkematian');
        $penyebab = $this->input->post('penyebab');

        $result = $this->KematianModel->editDataKematian($nokematian, $nik, $tglkematian, $penyebab);
        if ($result == true) {
            redirect('http://localhost:8888/sensus/index.php/kematian', 'refresh');
        }
    }
}
