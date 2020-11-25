<?php

class Prof extends CI_Controller
{
    public function index(){
        
        //$data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')]);
       // $data['profil'] = $this->M_admin->getwhere('user', ['username' => $this->session->userdata('username')]);
       
        $this->load->view('user/header');
        $this->load->view('user/prof');
        $this->load->view('user/footer');
    }

}