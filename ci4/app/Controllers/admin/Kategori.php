<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\M_admin;

class Kategori extends BaseController
{
    function __construct()
    {
        helper('text');
        $this->model = new M_admin();
    }
    public function index()
    {
        $data['kategori'] = $this->model->getdata('kategori');
        echo view('admin/layout/header');
        echo view('admin/layout/script');
        echo view('admin/content/v_kategori', $data);
        echo view('admin/layout/footer');
    }
    function add()
    {
        if ($this->request->getPost()) {
            $nama_kategori =  $this->request->getPost('kategori');
            $kode = random_string('alnum', 3);
            $data = [
                'kode_kategori' => $kode,
                'nama_kategori' => $nama_kategori,
            ];
            $this->model->insertdata('kategori', $data);
            return redirect()->to(base_url('admin/kategori'));
        }
    }

    function update()
    {
        $id = $this->request->getPost('kode_kategori');
        $nama_kategori =  $this->request->getPost('nama_kategori');
        $data = [
            'nama_kategori' => $nama_kategori
        ];

        $data = $this->model->updatedata('kategori', $data, ['kode_kategori' => $id]);
        return redirect()->to(base_url('admin/kategori'));
    }
    function hapus()
    {
        $kode_kategori = $this->request->getPost('kode_kategori');
        $where = ['kode_kategori' => $kode_kategori];
        $data = $this->model->hapusdata('kategori', $where);
        return redirect()->to(base_url('admin/kategori'));
    }
}
