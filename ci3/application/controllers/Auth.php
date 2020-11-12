<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/login');
        } else {
            $this->proses_login();
        }
    }
    private function proses_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $data = ['username' => $username, 'password' => $password];

        $cekuser = $this->M_auth->ceklogin('user', $data)->num_rows();
        $cekadmin = $this->M_auth->ceklogin('admin', $data)->num_rows();
        if ($cekadmin > 0) {
            $dataadmin = $this->M_auth->ceklogin('admin', $data)->result_array();
            $data_session = array(
                'username' => $dataadmin[0]['username'],
                'foto' => $dataadmin[0]['foto']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('admin/dashboard'));
        } elseif ($cekuser > 0) {
            $datauser = $this->M_auth->ceklogin('user', $data)->result_array();
            $data_session = array(
                'username' => $datauser[0]['username'],
                'foto' => $datauser[0]['foto']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('Home'));
        } else {
            $this->session->set_flashdata('gagal', 'Username atau Password salah!!!');
            redirect(base_url('auth'));
        }
    }
    function register()
    {
        $this->load->view('register');
    }
    function proses_register()
    {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no = $this->input->post('no');
        $password = md5($this->input->post('password'));
        $data = [
            'username_cs' => $username,
            'nama_cs' => $nama,
            'email_cs' => $email,
            'no_cs' => $no,
            'password_cs' => $password
        ];
        $this->M_auth->register('data_customer', $data);
        redirect(base_url('home/'));
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth/'));
    }
}
