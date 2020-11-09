<?php
class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['kategori'] = $this->M_admin->getdata('kategori');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/kategori', $data);
        $this->load->view('admin/footer');
    }
    function getkategori()
    {
        $id = $this->input->get('id');
        $data = $this->M_admin->getwhere('kategori', ['kode_kategori' => $id]);
        echo json_encode($data);
    }
    function add()
    {
        $nama = $this->input->post('nama');
        $data = ['kode_kategori' => uniqid(), 'nama_kategori' => $nama];
        $proses = $this->M_admin->insertdata('kategori', $data);
        redirect(base_url('admin/Kategori'));
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $update = $this->M_admin->updatedata('kategori', ['kode_kategori' => $kode], ['nama_kategori' => $nama]);

        redirect(base_url('admin/Kategori'));
    }
}
