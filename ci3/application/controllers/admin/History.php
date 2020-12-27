<?php
class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin') != true) {
            redirect(base_url('Auth'));
        }
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['penjualan'] = $this->M_admin->getdata('penjualan');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/history', $data);
        $this->load->view('admin/footer');
    }
}
