<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('cart');
    }
    public function index()
    {
        $data['produk'] = $this->M_admin->getdata('produk');
        $this->load->view('user/header');
        $this->load->view('user/produk', $data);
        $this->load->view('user/footer');
    }
    function addcart()
    {
        $kode = $this->input->post('produk');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $berat = $this->input->post('berat');
        $gambar = $this->input->post('gambar');
        $data = array(
            'id'      => $kode,
            'qty'     => 1,
            'price'   => $harga,
            'name'    => $nama,
            'options' => array('berat' => $berat, 'gambar' => $gambar)
        );
        $this->cart->insert($data);
        $show = $this->cart->contents();
        echo json_encode($show);
    }
    function getproduk()
    {
        $keyword = $this->input->post('produk');
        $data = $this->M_admin->search('produk', 'nama_produk', $keyword);
        echo json_encode($data);
    }
}
