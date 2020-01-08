<?php
class Penduduk extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->load->model('PendudukModel');
    }

    public function index() {
        $result = $this->PendudukModel->getAllPenduduk();

        $data['penduduks'] = $result;

        $this->load->view('dashboard/penduduk', $data);
    }

    public function editpenduduk($id = 0) {
        $result = $this->PendudukModel->getSpecificationPenduduk($id);

        $data['penduduk'] = $result;

        $this->load->view('penduduk/editpenduduk', $data);
    }

    public function doAddPenduduk() {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $tempat = $this->input->post('tempat');
        $tgl = $this->input->post('tgl');
        $jk = $this->input->post('jk');
        $rtrw = $this->input->post('rtrw');
        $pekerjaan = $this->input->post('pekerjaan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $pendidikanterakhir = $this->input->post('pendidikanterakhir');
        $agama = $this->input->post('agama');
        $golongandarah = $this->input->post('golongandarah');

        $result = $this->PendudukModel->saveDataPenduduk($nik, $nama, $tempat, $tgl, $jk, $rtrw, $pekerjaan, $kewarganegaraan, $pendidikanterakhir, $agama, $golongandarah);
        if ($result == true) {
            redirect('http://localhost:8888/sensus/index.php/penduduk/', 'refresh');
        }
    }

    public function doEditPenduduk() {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $tempat = $this->input->post('tempat');
        $tgl = $this->input->post('tgl');
        $jk = $this->input->post('jk');
        $rtrw = $this->input->post('rtrw');
        $pekerjaan = $this->input->post('pekerjaan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $pendidikanterakhir = $this->input->post('pendidikanterakhir');
        $agama = $this->input->post('agama');
        $golongandarah = $this->input->post('golongandarah');

        $result = $this->PendudukModel->editDataPenduduk($nik, $nama, $tempat, $tgl, $jk, $rtrw, $pekerjaan, $kewarganegaraan, $pendidikanterakhir, $agama, $golongandarah);
        if ($result == 1) {
            redirect('http://localhost:8888/sensus/index.php/penduduk/', 'refresh');
        }
    }
}
