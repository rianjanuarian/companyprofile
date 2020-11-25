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
        $data['proses'] = $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status !="selesai" OR status!="gagal"']);
        $data['selesai'] =  $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status=' => 'selesai']);
        $data['gagal'] =  $this->M_admin->getwhere('penjualan', ['username' => $this->session->userdata('username'), 'status=' => 'gagal']);
        $this->load->view('user/header');
        $this->load->view('user/history', $data);
        $this->load->view('user/footer');
    }
    public function detail($id)
    {
        $data['payment'] = $this->midtrans->status($id);
    }
}
