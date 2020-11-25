<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-P8cM531xM5TsCq1D_ZfIK8lH', 'production' => false);
        $this->load->library('Midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('M_admin');
    }
    function index()
    {
        // $orderId = '<your order id / transaction id>';

        // // Get transaction status to Midtrans API
        // try {
        //     $status = Transaction::status($orderId);
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        //     die();
        // }
        $data = $this->M_admin->transaksi('penjualan', ['username' => 'farhan', 'status !=' => 'pending']);
        echo '<pre>';
        print_r($data);
    }
}
