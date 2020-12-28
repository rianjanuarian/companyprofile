<?php
class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_artikel');
        $this->load->library('cart');
    }
    public function index()
    {
        if ($this->input->post('search')) {
            $data['artikel'] = $this->M_admin->search('tblposts', 'PostTitle', $this->input->post('search'));
        } else {
            $data['artikel'] = $this->M_admin->getdata('tblposts');
        }
        $data['kategori'] = $this->M_admin->getdata('tblcategory');
        $data['terbaru'] = $this->M_artikel->latest();
        $this->load->view('user/header2');
        $this->load->view('user/artikeluser', $data);
        $this->load->view('user/footer');
    }
    public function detail($id)
    {
        $data['artikel'] = $this->M_admin->getjoinfilter('tblposts', 'tblcategory', 'tblposts.CategoryId=tblcategory.CategoryId', ['PostUrl' => $id]);
        $data['komen'] = $this->M_admin->getwhere('tblcomments', ['postId' => $data['artikel'][0]->id, 'status' => '1']);
        $this->load->view('user/header2');
        $this->load->view('user/detailartikel', $data);
        $this->load->view('user/footer');
    }
}
