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
            $data['artikel'] = $this->M_admin->searchartikel('tblposts', 'PostTitle', $this->input->post('search'), ['Is_Active' => '1']);
        } else {
            $data['artikel'] = $this->M_admin->getwhere('tblposts', ['Is_Active' => '1']);
        }
        $data['kategori'] = $this->M_admin->getdata('tblcategory');
        $data['terbaru'] = $this->M_artikel->latest();
        $this->load->view('user/header2');
        $this->load->view('user/artikeluser', $data);
        $this->load->view('user/footer');
    }
    public function kategori($id)
    {
        if ($this->input->post('search')) {
            $data['artikel'] = $this->M_admin->searchartikel('tblposts', 'PostTitle', $this->input->post('search'), ['Is_Active' => '1', 'CategoryId' => $id]);
        } else {
            $data['artikel'] = $this->M_admin->getwhere('tblposts', ['Is_Active' => '1', 'CategoryId' => $id]);
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

        if ($this->input->post()) {
            $this->komen();
        } else {
            $this->load->view('user/header2');
            $this->load->view('user/detailartikel', $data);
            $this->load->view('user/footer');
        }
    }
    private function komen()
    {
        $kode = $this->input->post('kode');
        $url = $this->input->post('url');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $komen = $this->input->post('komen');
        $data = [
            'postId' => $kode,
            'name' => $nama,
            'email' => $email,
            'comment' => $komen,
            'status' => '0'
        ];
        $proses = $this->M_admin->insertdata('tblcomments', $data);
        if ($proses) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
         Komen Berhasil Dikirim!!!
        </div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
         Komen Gagal Dikirim!!!
        </div>');
        }

        redirect(base_url('Artikel/detail/') . $url);
    }
}
