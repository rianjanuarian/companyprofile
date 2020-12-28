<?php
class Komen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        if ($this->session->userdata('admin') != true) {
            redirect(base_url('Auth'));
        }
    }
    public function index()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['komen'] = $this->M_admin->getjoinfilter('tblcomments', 'tblposts', 'tblcomments.postId=tblposts.id', ['status' => 1]);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/komen', $data);
        $this->load->view('admin/footer');
    }
    function pengajuan()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['komen'] = $this->M_admin->getjoinfilter('tblcomments', 'tblposts', 'tblcomments.postId=tblposts.id', ['status' => 0]);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/komenpengajuan', $data);
        $this->load->view('admin/footer');
    }
    function sampah()
    {
        $data1['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['komen'] = $this->M_admin->getjoinfilter('tblcomments', 'tblposts', 'tblcomments.postId=tblposts.id', ['status' => 2]);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data1);
        $this->load->view('admin/komensampah', $data);
        $this->load->view('admin/footer');
    }
    function setuju($id)
    {
        $proses = $this->M_admin->updatedata('tblcomments', ['no' => $id], ['status' => '1']);
        if ($proses) {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-success" role="alert">
                Berhasil Menyetujui Komen
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-danger" role="alert">
                Gagal Menyetujui Komen
            </div>'
            );
        }
        redirect(base_url('admin/Komen/pengajuan'));
    }
    function hapus($id)
    {
        $proses = $this->M_admin->updatedata('tblcomments', ['no' => $id], ['status' => '2']);
        $this->session->set_flashdata(
            'msg',
            ' <div class="alert alert-success" role="alert">
                Berhasil Menghapus Komen
            </div>'
        );
        redirect(base_url('admin/Komen'));
    }
    function restore($id)
    {
        $proses = $this->M_admin->updatedata('tblcomments', ['no' => $id], ['status' => '1']);
        if ($proses) {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-success" role="alert">
                Berhasil Mengembalikan Komen
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-danger" role="alert">
                Gagal Menghapus
            </div>'
            );
        }
        redirect(base_url('admin/Komen/sampah'));
    }
    public function delete($id)
    {
        $proses = $this->M_admin->delete('tblcomments', ['no' => $id]);
        if ($proses) {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-success" role="alert">
                Berhasil Menghapus Komen Secara Permanen
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                ' <div class="alert alert-danger" role="alert">
                Gagal Menghapus Komen
            </div>'
            );
        }
        redirect(base_url('admin/Komen/sampah'));
    }
}
