<?php
class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
	}
}
