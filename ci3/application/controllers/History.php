<?php
class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-P8cM531xM5TsCq1D_ZfIK8lH', 'production' => false);
        $this->load->library('Midtrans');
        $this->midtrans->config($params);
        $this->load->model('M_admin');
        $this->load->library('cart');
    }
    public function index()
    {
        $status = ['selesai', 'pending'];
        $data['proses'] = $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status !=' => 'selesai',]);
        $data['selesai'] =  $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status' => 'selesai']);
        $data['gagal'] =  $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status' => 'gagal']);
        $this->load->view('user/header');
        $this->load->view('user/history', $data);
        $this->load->view('user/footer');
    }
    public function detail($id)
    {
        $data['payment'] = $this->midtrans->status($id);
        $data['penerima'] = $this->M_admin->getjoinfilter('penjualan', 'user', 'penjualan.username=user.username', ['kode_penjualan' => $id]);
        $data['item'] = $this->M_admin->getjoinfilter('detail_penjualan', 'produk', 'detail_penjualan.kode_produk=produk.kode_produk', ['kode_penjualan' => $id]);
        $this->load->view('user/header');
        $this->load->view('user/detail', $data);
        $this->load->view('user/footer');
    }
}
