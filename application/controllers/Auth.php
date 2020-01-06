<?php

class Auth extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('AuthModel');

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->helper('url');
    }

    public function index() {
        if ($this->session->has_userdata('id_petugas')) {
            redirect('http://localhost:8888/sensus/index.php/dashboard', 'refresh');
        }
        $data['err'] = false;
        $this->load->view('auth/login', $data);
    }

    public function doSignin() {

        $id = $this->input->post('id');
        $password = $this->input->post('password');

        $data = array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $result = $this->AuthModel->signin($id, $password);
            if ($result > 0) {
                $dataSignin = array('id_petugas' => $id);
                $this->session->set_userdata($dataSignin);
                redirect('http://localhost:8888/sensus/index.php/dashboard', 'refresh');
            } else {
                $data['messageErr'] = 'Username Or Password is incorrect!';
                $data['err'] = true;
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function doLogout() {
        $this->session->sess_destroy();
        redirect('http://localhost:8888/sensus/index.php/', 'refresh');
    }
}
