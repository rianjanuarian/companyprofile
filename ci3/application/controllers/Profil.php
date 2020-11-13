<?php
class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['profil'] = $this->M_admin->getwhere('user', ['username' => $this->session->userdata('username')]);
        $this->load->view('user/header');
        $this->load->view('user/produk', $data);
        $this->load->view('user/footer');
    }
}
