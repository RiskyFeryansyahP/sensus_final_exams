<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('KKModel');
        $this->load->model('PendatangModel');
        $this->load->model('KematianModel');
        
        $this->load->library('session');

        $this->load->helper('url');

        if (!$this->session->has_userdata('id_petugas')) {
            redirect('http://localhost:8888/sensus/index.php', 'refresh');
        }
    }
    
    public function index() {
        $dataKK = $this->KKModel->getCountKK();
        $dataPendatang = $this->PendatangModel->getCountPendatang();
        $dataKematian = $this->KematianModel->getCountKematian();

        $data['kk'] = $dataKK;
        $data['kematian'] = $dataKematian;
        $data['pendatang'] = $dataPendatang;

        $this->load->view('dashboard/admin', $data);
    }
}
