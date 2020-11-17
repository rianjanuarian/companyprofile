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
    }

    public function index()
    {
        $this->load->view('user/chekout');
    }
    function show()
    {
        print_r($this->input->post());
    }
}
