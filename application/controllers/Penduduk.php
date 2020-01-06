<?php
class Penduduk extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('PendudukModel');
    }

    public function index() {
        $result = $this->PendudukModel->getAllPenduduk();

        $data['penduduks'] = $result;

        $this->load->view('dashboard/penduduk', $data);
    }
}
