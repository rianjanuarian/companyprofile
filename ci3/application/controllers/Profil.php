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
    public function ganti_password()
    {
        $data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'New Password', 'required|trim|min_length[6]|matches[password1]');
        

        if($this->form_validation->run() == false){
            $this->load->view('user/header', $data);
            $this->load->view('user/changepass', $data);
            $this->load->view('user/footer');
            
        }else{
            $current_password = $this->input->post('current_password');
            $lol = array(
                'password' =>md5($current_password)
            );
            $new_password = $this->input->post('password1');
            if(!password_verify($current_password, $data['profil']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-error" role=""alert>Current Password Wrong</div>');
                redirect('profil/ganti_password');
            }else{
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert alert-error" role=""alert>New password cannot matches with old password</div>');
                    redirect('profil/ganti_password');
                }else{
                    $password_hash = md5($new_password);

                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->set('password', $password_hash);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Password Telah di Ubah</div>');
                    redirect('profil');
                }
            }
        }
            
    }
    

}
