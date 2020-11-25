<?php
class Profil extends CI_Controller
{
    
    public function index()
    {
        $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')]);
        $this->load->view('user/header');
        $this->load->view('user/prof', $data);
        $this->load->view('user/footer');
        

            
    }
    public function edit_profil()
    {
        $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')]);
        $this->load->view('user/header');
        $this->load->view('user/editprof', $data);
        $this->load->view('user/footer');
        //membuat aturan atau syarat untuk mengubah data pada tabel mitra
        $this->form_validation->set_rules('username', 'Full Name', 'required');
        $this->form_validation->set_rules('nama', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Address', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Phone Number', 'required');

        if($this->form_validation->run() == false ){
            $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')]);
            $this->load->view('user/header',$data);
            $this->load->view('user/editprof', $data);
            $this->load->view('user/footer',$data);

        }else{ 
            //perintah untuk menginputkan data dengan input->post
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_hp = $this->input->post('nomor_hp');

        $this->db->where('username',$username);
        $this->db->set('nama',$nama);
        $this->db->set('email',$email);
        $this->db->set('nomor_hp',$nomor_hp);
        $this->db->update('user');
       
        $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Profil Telah di Ubah</div>');
        redirect('profil');
    }
    }

}
