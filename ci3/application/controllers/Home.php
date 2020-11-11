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
		$this->load->view('user/login');
	}
	public function artikel()
	{
		$this->load->view('user/artikel');
	}
}
