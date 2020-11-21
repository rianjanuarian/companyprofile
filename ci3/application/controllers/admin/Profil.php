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
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->helper('url');
        $this->form_validation->set_rules('nama','','required');
            
        if($this->form_validation->run() == false )
        {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/profil', $data);
        $this->load->view('admin/footer');
       }
       else{ 
                $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $foto = $_FILES['foto']['name'];
                if($foto)
                {
                    $config ['upload_path'] = './assets/img/profil/';
                    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config ['max_size'] = '2048';

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto'))
                    {
                        // perintah untuk menghapus foto lama jika ada foto baru yang diupload kecuali default.png
                        $foto_lama = $data['admin']['foto'];
                        if($foto_lama != 'default.png'){unlink(FCPATH.'/assets/img/profil/'.$foto_lama);}
                        $foto = $this->upload->data('file_name');
                        $this->db->set('foto', $foto);
                    }   
                    else{
                                echo $this->upload->display_errors();
                        }
                }

            $data = array(
                'nama' => $nama,
                
            );
            $where = array(
                'username' => $username
            );

            $this->M_admin->updatedata('admin',$where,$data);
            redirect('admin/Profil');
            } 
        
    }


  /*public function update()
    {
                
        $username = $this->input->post('username');
        $foto = $_FILES['foto']['name'];
                if ($foto =''){}else{
                    $confiq ['upload_path'] = './assets/img/profil/';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';
    
                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('foto')){
                        echo "Foto Yang Anda Upload Gagal Rek!!";
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                } 
        $nama = $this->input->post('nama');
        $data = [
            'nama' => $nama
            'foto' => $foto
        ]; 
      
        $this->M_admin->updatedata('admin', ['username' => $username], $data);
        redirect(base_url('admin/Profil'));
    } */

    

    public function ganti_password()
    {
        $username = $this->session->userdata['username'];


        $this->form_validation->set_rules('password','password baru','required');
        $this->form_validation->set_rules('cpw_baru','password kedua','required|matches[password]');

        $this->form_validation->set_message('required','%s wajib diisi');

        $this->form_validation->set_error_delimiters('<p class="alert">','</p>');

        if( $this->form_validation->run() == FALSE ){
            $this->load->view('admin/Profil');
        } else {
            
            $password = $this->input->post('password');
            
            $data = array(
                
                'password' => md5($password)
            );

            $this->M_admin->updatedata('admin',['username'=>$username], $data );
            redirect(base_url('admin/Profil'));


        }
    }

    function delete($id)
    {
        $this->M_admin->delete('produk', ['kode_produk' => $id]);
        redirect(base_url('admin/produk'));
    } 
} 

