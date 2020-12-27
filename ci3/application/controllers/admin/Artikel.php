<?php
class Artikel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->helper('string');
        if ($this->session->userdata('admin') != true) {
            redirect(base_url('Auth'));
        }
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['artikel'] = $this->M_admin->showartikel('tblposts', 'tblcategory', 'tblsubcategory', 'tblposts.CategoryId=tblcategory.CategoryId', 'tblposts.SubCategoryId=tblsubcategory.SubCategoryId');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/artikel', $data);
        $this->load->view('admin/footer');
    }
    public function sampah()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['artikel'] = $this->M_admin->showartikel1('tblposts', 'tblcategory', 'tblsubcategory', 'tblposts.CategoryId=tblcategory.CategoryId', 'tblposts.SubCategoryId=tblsubcategory.SubCategoryId');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/sampahartikel', $data);
        $this->load->view('admin/footer');
    }
    public function post()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->M_admin->getdata('tblcategory');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/postartikel', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id)
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->M_admin->getdata('tblcategory');
        // $data['artikel'] = $this->M_admin->getwhere('tblposts', ['id' => $id]);
        $data['artikel'] = $this->M_admin->showartikel2('tblposts', 'tblcategory', 'tblsubcategory', 'tblposts.CategoryId=tblcategory.CategoryId', 'tblposts.SubCategoryId=tblsubcategory.SubCategoryId', $id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/editartikel', $data);
        $this->load->view('admin/footer');
    }
    function add()
    {
        $title = $this->input->post('title');
        $kategori = $this->input->post('category');
        $subkategori = $this->input->post('subcategory');
        $postdescription = $this->input->post('postdescription');
        $arr = explode(" ", $title);
        $url = implode("-", $arr);
        $config = [
            'file_name' => random_string('alnum', 8),
            'upload_path' => './img/postimages',
            'allowed_types' => 'gif|jpg|png',
            // 'max_size' => 1000, 'max_width' => 1000,
            // 'max_height' => 1000
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('postimage')) //jika gagal upload
        {
            $error = array('error' => $this->upload->display_errors()); //tampilkan error
            print_r($error);
        } else {
            $file = $this->upload->data();
            $data = [
                'PostTitle' => $title,
                'CategoryId' => $kategori,
                'SubCategoryId' => $subkategori,
                'PostDetails' => $postdescription,
                'Is_Active' => 1,
                'PostUrl' => $url,
                'PostImage' => $file['file_name']
            ];
            $this->M_admin->insertdata('tblposts', $data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/Artikel/'));
        }
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $title = $this->input->post('title');
        $kategori = $this->input->post('category');
        $subkategori = $this->input->post('subcategory');
        $postdescription = $this->input->post('postdescription');
        $arr = explode(" ", $title);
        $url = implode("-", $arr);
        if ($_FILES['foto']['name'] != '') {
            $config = [
                'file_name' => random_string('alnum', 8),
                'upload_path' => './img/postimages',
                'allowed_types' => 'gif|jpg|png',
                // 'max_size' => 1000, 'max_width' => 1000,
                // 'max_height' => 1000
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) //jika gagal upload
            {
                $error = array('error' => $this->upload->display_errors()); //tampilkan error
                print_r($error);
            } else {
                $file = $this->upload->data();
                $data = [
                    'PostTitle' => $title,
                    'CategoryId' => $kategori,
                    'SubCategoryId' => $subkategori,
                    'PostDetails' => $postdescription,
                    'Is_Active' => 1,
                    'PostUrl' => $url,
                    'PostImage' => $file['file_name']
                ];
                $tblposts = $this->M_admin->getwhere('tblposts', ['id' => $kode]);
                if ($tblposts[0]->PostImage != '') {
                    unlink("./img/postimages" . $tblposts[0]->PostImage);
                }
                $where = ['id' => $kode];
                $this->M_admin->updatedata('tblposts', $where, $data);
            }
        } else {
            $data = [
                'PostTitle' => $title,
                'CategoryId' => $kategori,
                'SubCategoryId' => $subkategori,
                'PostDetails' => $postdescription,
                'Is_Active' => 1,
                'PostUrl' => $url,
            ];
            $where = ['id' => $kode];
            $this->M_admin->updatedata('tblposts', $where, $data);
        }
        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('admin/tblposts'));
    }
    function hapus($id)
    {
        $this->M_admin->updatedata('tblposts', ['id' => $id], ['Is_Active' => '0']);
        redirect(base_url('admin/Artikel/'));
    }
    function restore($id)
    {
        $this->M_admin->updatedata('tblposts', ['id' => $id], ['Is_Active' => '1']);
        redirect(base_url('admin/Artikel/sampah'));
    }
    function delete($id)
    {
        $this->M_admin->delete('tblposts', ['id' => $id]);
        redirect(base_url('admin/Artikel'));
    }
}
