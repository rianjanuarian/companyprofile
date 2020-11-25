<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('user/index');
	}

	

	public function register()
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
				
			}
			else
			{
				$data = [
					'username' => $this->input->post('username1', true),
					'nama'	=>	$this->input->post('name', true),
					'email'	=>	$this->input->post('email', true),
					'nomor_hp' => $this->input->post('nomor_hp', true),
					'password' =>$this->input->post('password1'),
				];
				$this->db->insert('user', $data);
				$this->session->set_flashdata('message','<div class="alert alert-success">
				<strong>Success!</strong> Your account has been created. Please login
			  </div>
			  ');
				redirect ('home/login');
			}

			if($this->form_validation->run() == false ){
			}
			else
			{
				$this->_login();
			}
			
				

			
	}
	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false ){
			$this->load->view('user/login');
			}
			else
			{
				$this->_login();
			}
	}
	

	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username'=> $username])->row_array();
		$password =$this->db->get_where('user', ['password'=> $password])->row_array();
		
		if($user){
			if($password){
				$data = [
					'username' => $user['username'],
					'nama'	=> $user['nama']

				];
				$this->session->set_userdata($data);
				redirect('home/toko');

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-success">
			<strong>Failed!</strong> Wrong Password
		  </div>
		  ');
			redirect ('home/login');
			}

			
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-success">
			<strong>Failed!</strong> Email is not registered
		  </div>
		  ');
			redirect ('home/login');

		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('message','<div class="alert alert-success">
			<strong>Succes</strong> You have been logged out
		  </div>
		  ');
			redirect ('home');
	}

	public function artikel()
	{
		$this->load->view('user/artikel');
	}
}
