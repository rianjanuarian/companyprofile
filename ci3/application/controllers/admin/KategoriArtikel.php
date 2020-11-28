<?php
class KategoriArtikel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->M_admin->getdata('tblcategory');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/kategoriartikel', $data);
        $this->load->view('admin/footer');
    }
    function getkategori()
    {
        $id = $this->input->get('id');
        $data = $this->M_admin->getwhere('tblcategory', ['id' => $id]);
        echo json_encode($data);
    }
    function add()
    {
        $nama = $this->input->post('nama');
        $deksripsi = $this->input->post('deskripsi');
        $data = ['CategoryName' => $nama, 'Description' => $deksripsi, 'Is_Active' => 1];
        $proses = $this->M_admin->insertdata('tblcategory', $data);
        redirect(base_url('admin/KategoriArtikel'));
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $deksripsi = $this->input->post('deskripsi');
        $update = $this->M_admin->updatedata('tblcategory', ['id' => $kode], ['CategoryName' => $nama, 'Description' => $deksripsi, 'Is_Active' => 1]);

        redirect(base_url('admin/KategoriArtikel'));
    }
    public function delete($id)
    {
        $this->M_admin->delete('tblCategory', ['id' => $id]);
        redirect(base_url('admin/KategoriArtikel'));
    }
}
