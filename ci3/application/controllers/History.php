<?php
class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('cart');
    }
    public function index()
    {
        $data['transaksi'] = $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username')]);
        $this->load->view('user/header');
        $this->load->view('user/history', $data);
        $this->load->view('user/footer');
    }
}
