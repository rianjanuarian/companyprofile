<?php
class Subkategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->M_admin->getdata('tblCategory');
        $data['subkategori'] = $this->M_admin->getdata('tblsubcategory');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/subkategori', $data);
        $this->load->view('admin/footer');
    }
    function getkategori()
    {
        $id = $this->input->get('id');
        $data = $this->M_admin->getwhere('tblsubcategory', ['SubCategoryId' => $id]);
        echo json_encode($data);
    }
    function add()
    {
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $data = ['CategoryId' => $kategori, 'Subcategory' => $nama, 'SubCatDescription' => $deskripsi];
        $proses = $this->M_admin->insertdata('tblsubcategory', $data);
        redirect(base_url('admin/Subkategori'));
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $data = ['CategoryId' => $kategori, 'Subcategory' => $nama, 'SubCatDescription' => $deskripsi];
        $update = $this->M_admin->updatedata('tblsubcategory', ['SubCategoryId' => $kode], $data);

        redirect(base_url('admin/Subkategori'));
    }
    public function delete($id)
    {
        $this->M_admin->delete('tblsubcategory', ['SubCategoryId' => $id]);
        redirect(base_url('admin/KategoriArtikel'));
    }
}
