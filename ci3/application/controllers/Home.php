<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('user/index');
	}

	public function toko()
	{
		$this->load->view('user/toko');
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username1', 'Username', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'email already registered!'
		]);
		$this->form_validation->set_rules('nomor_hp', 'No Hp', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|mathces[password1]');

			if($this->form_validation->run() == false ){
				$this->load->view('user/login');
				
			}else{
				echo 'MANTAPPPP';
			}
	}

	public function artikel()
	{
		$this->load->view('user/artikel');
	}
}
