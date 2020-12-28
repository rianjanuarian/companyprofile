<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-P8cM531xM5TsCq1D_ZfIK8lH', 'production' => false);
        $this->load->library('Midtrans');
        $this->load->library('cart');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('M_admin');
    }

    public function index()
    {
        $this->load->view('user/chekout');
    }
    function insert()
    {
        $kode = json_decode($this->input->post('result_data'))->order_id;
        $alamat = $this->input->post('alamat');
        $kabupaten = $this->input->post('kabupaten');
        $kodepos = $this->input->post('kodepos');
        $total = json_decode($this->input->post('result_data'))->gross_amount;
        $data = [
            'kode_penjualan' => $kode,
            'username' => $this->session->userdata('username'),
            'total' => $total,
            'status' => 'pending',
            'alamat' => $alamat,
            'kabupaten' => $kabupaten,
            'kode_pos' => $kodepos
        ];
        $this->M_admin->insertdata('penjualan', $data);
        foreach ($this->cart->contents() as $a) {
            $detail_penjualan = [
                'kode_penjualan' => $kode,
                'kode_produk' => $a['id'],
                'jumlah' => $a['qty']
            ];
            $this->M_admin->insertdata('detail_penjualan', $detail_penjualan);
        }
        $this->cart->destroy();
        redirect(base_url('History'));
    }
}
