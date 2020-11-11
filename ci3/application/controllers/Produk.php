<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['produk'] = $this->M_admin->getdata('produk');
        $this->load->view('user/header');
        $this->load->view('user/produk', $data);
        $this->load->view('user/footer');
    }
}
