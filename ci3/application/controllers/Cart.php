<?php
class Cart extends CI_Controller
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
        $this->load->view('user/cart', $data);
        $this->load->view('user/footer');
    }
}
