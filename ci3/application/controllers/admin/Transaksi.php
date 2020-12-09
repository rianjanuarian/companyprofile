<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['penjualan'] = $this->M_admin->tampiltransaksi(['pending', 'proses']);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('admin/footer');
    }
    function proses($id)
    {
        $proses = $this->M_admin->updatedata('penjualan', ['kode_penjualan' => $id], ['status' => 'proses']);
        $this->session->set_flashdata(
            'msg',
            ' <div class="alert alert-success" role="alert">
            Berhasil Memproses Transaksi
        </div>'
        );

        redirect(base_url('admin/Transaksi'));
    }
    function selesai($id)
    {
        $proses = $this->M_admin->updatedata('penjualan', ['kode_penjualan' => $id], ['status' => 'selesai']);
        $this->session->set_flashdata(
            'msg',
            ' <div class="alert alert-success" role="alert">
            Transaksi telah selesai
        </div>'
        );

        redirect(base_url('admin/Transaksi'));
    }
}
