<?php
class Profil extends CI_Controller
{
    
    public function index()
    {
        $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('user/header', $data);
        $this->load->view('user/prof', $data);
        $this->load->view('user/footer');
        

            
    }
    public function edit_profil()
    {
        $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('user/header', $data);
        $this->load->view('user/editprof', $data);
        $this->load->view('user/footer');
        //membuat aturan atau syarat untuk mengubah data pada tabel mitra
        $this->form_validation->set_rules('username', 'Full Name', 'required');
        $this->form_validation->set_rules('nama', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Address', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Phone Number', 'required');
        

        if($this->form_validation->run() == false ){
            $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('user/header',$data);
            $this->load->view('user/editprof', $data);
            $this->load->view('user/footer');

        }else{ 

            
            
            //data diri    
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nomor_hp = $this->input->post('nomor_hp');
            
            //foto
            
            $upload_image = $_FILES['foto']['name'];
            
            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     =   '3000';
                $config['upload_path']  =   './assets/img/profil/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto')){
                    $old_image = $data['profil']['foto'];
                    if($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/'. $old_image);
                     }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                }else{
                    echo $this->upload->dispay_error();
                }
            }

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
