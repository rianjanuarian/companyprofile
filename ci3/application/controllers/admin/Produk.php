<?php
class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->helper('string');
    }
    public function index()
    {
        $data['kategori'] = $this->M_admin->getdata('kategori');
        $data['produk'] = $this->M_admin->getjoin('produk', 'kategori', 'produk.kode_kategori=kategori.kode_kategori');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/produk', $data);
        $this->load->view('admin/footer');
    }
    function getproduk()
    {
        $id = $this->input->get('id');
        $data = $this->M_admin->getwhere('produk', ['kode_produk' => $id]);
        echo json_encode($data);
    }
    function add()
    {
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $merk = $this->input->post('merk');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $config = [
            'file_name' => random_string('alnum', 8),
            'upload_path' => './img/',
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
                'kode_produk' => uniqid(),
                'nama_produk' => $nama,
                'kode_kategori' => $kategori,
                'merk' => $merk,
                'stok' => $stok,
                'harga' => $harga,
                'foto_produk' => $file['file_name']
            ];
            $this->M_admin->insertdata('produk', $data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/produk'));
        }
    }
    function update()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $merk = $this->input->post('merk');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        if ($_FILES['foto']['name'] != '') {
            $config = [
                'file_name' => random_string('alnum', 8),
                'upload_path' => './img/',
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
                    'nama_produk' => $nama,
                    'kode_kategori' => $kategori,
                    'merk' => $merk,
                    'stok' => $stok,
                    'harga' => $harga,
                    'foto_produk' => $file['file_name']
                ];
                $produk = $this->M_admin->getwhere('produk', ['kode_produk' => $kode]);
                if ($produk[0]->foto_produk != '') {
                    unlink("./img/" . $produk[0]->foto_produk);
                }
                $where = ['kode_produk' => $kode];
                $this->M_admin->updatedata('produk', $where, $data);
            }
        } else {
            $data = [
                'nama_produk' => $nama,
                'kode_kategori' => $kategori,
                'merk' => $merk,
                'stok' => $stok,
                'harga' => $harga
            ];
            $where = ['kode_produk' => $kode];
            $this->M_admin->updatedata('produk', $where, $data);
        }
        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(base_url('admin/produk'));
    }
    function delete($id)
    {
        $this->M_admin->delete('produk', ['kode_produk' => $id]);
        redirect(base_url('admin/produk'));
    }
}
