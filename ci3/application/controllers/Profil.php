<?php
class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['profil'] = $this->M_admin->getwhere('user', ['username' => $this->session->userdata('username')]);
        $this->load->view('user/header');
        $this->load->view('user/profil', $data);
        $this->load->view('user/footer');
            //membuat aturan atau syarat untuk mengubah data pada tabel mitra
            $this->form_validation->set_rules('username', 'Full Name', 'required');
            $this->form_validation->set_rules('nama', 'Email', 'required');
            $this->form_validation->set_rules('email', 'Address', 'required');
            $this->form_validation->set_rules('nomor_hp', 'Phone Number', 'required');

            if($this->form_validation->run() == false ){
                $data['profil'] = $this->M_admin->getwhere('user', ['username' => $this->session->userdata('username')]);
                $this->load->view('user/header');
                $this->load->view('user/profil', $data);
                $this->load->view('user/footer');

            }else{ 
                //perintah untuk menginputkan data dengan input->post
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nomor_hp = $this->input->post('nomor_hp');

            //membuat perintah agar bisa menginputkan foto kedalam database
            $foto = $_FILES['foto']['name'];
            if($foto){
                $config ['upload_path'] = './img';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                $config ['max_size'] = '2048';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto')){
                    // perintah untuk menghapus foto lama jika ada foto baru yang diupload kecuali default.png
                    $foto_lama = $data['user']['foto'];
                    if($foto_lama != 'default.png'){
                        unlink(FCPATH.'./img'.$foto_lama);
                    }
                    
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'nomor_hp ' => $nomor_hp,
            );
            $where = array(
                'username' => $username
            );

            $this->M_admin->updatedata($where,$data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Profil Telah di Ubah</div>');
            redirect('user/profil');
        }
    }

}
