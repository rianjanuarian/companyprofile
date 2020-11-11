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
		$this->form_validation->set_rules('username1', 'Username', 'required|trim|is_unique[user.username]',[
			'is_unique' => 'username already registered'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'email already registered!'
		]);
		$this->form_validation->set_rules('nomor_hp', 'No Hp', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

			if($this->form_validation->run() == false ){
				$this->load->view('user/login');
				$this->session->set_flashdata('message_error','<div class="alert alert-success">
				<strong>Failed!</strong> Your account failed to create. Try again
			  </div>
			  ');
			}else{
				$data = [
					'username' => htmlspecialchar($this->input->post('username1', true)),
					'nama'	=>	htmlspecialchar($this->input->post('name', true)),
					'email'	=>	htmlspecialchar($this->input->post('email', true)),
					'nomor_hp' => htmlspecialchar($this->input->post('nomor_hp', true)),
					'password' =>$this->input->post('password1'),
				];
				$this->db->insert('user', $data);
				$this->session->set_flashdata('message','<div class="alert alert-success">
				<strong>Success!</strong> Your account has been created. Please login
			  </div>
			  ');
				redirect ('home/login');
			}
	}

	public function artikel()
	{
		$this->load->view('user/artikel');
	}
}
