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
        $data['kategori'] = $this->M_admin->getdata('kategori');
        $data['produk'] = $this->M_admin->getjoin('produk', 'kategori', 'produk.kode_kategori=kategori.kode_kategori');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/produk', $data);
        $this->load->view('admin/footer');
    }
    function getproduk()
    {
        $id = $this->input->get('id');
        $data = $this->M_admin->getwhere('produk', ['kode_produk' => $id]);
        echo json_encode($data);
    }
    function add()
    {
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $merk = $this->input->post('merk');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $data = [
            'kode_produk' => uniqid(),
            'nama_produk' => $nama,
            'kode_kategori' => $kategori,
            'merk' => $merk,
            'stok' => $stok,
            'harga' => $harga
        ];
        $proses = $this->M_admin->insertdata('produk', $data);
        redirect(base_url('admin/produk'));
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $merk = $this->input->post('merk');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $data = [
            'nama_produk' => $nama,
            'kode_kategori' => $kategori,
            'merk' => $merk,
            'stok' => $stok,
            'harga' => $harga
        ];
        $proses = $this->M_admin->updatedata('produk', ['kode_produk' => $kode], $data);
        redirect(base_url('admin/produk'));
    }
    function delete($id)
    {
        $this->M_admin->delete('produk', ['kode_produk' => $id]);
        redirect(base_url('admin/produk'));
    }
}
