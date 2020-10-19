<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\M_admin;

class Merk extends BaseController
{
    function __construct()
    {
        helper('text', 'date');
        $this->model = new M_admin();
    }
    public function index()
    {
        $data['merk'] = $this->model->getdata('merk');
        echo view('admin/layout/header');
        echo view('admin/layout/script');
        echo view('admin/content/v_merk', $data);
        echo view('admin/layout/footer');
    }
    function add()
    {
        if ($this->request->getPost()) {
            $nama_merk =  $this->request->getPost('merk');
            $kode = random_string('alnum', 3);
            $data = [
                'kode_merk' => $kode,
                'nama_merk' => $nama_merk,
            ];
            $this->model->insertdata('merk', $data);
            return redirect()->to(base_url('admin/merk'));
        }
    }

    function update()
    {
        $id = $this->request->getPost('kode_merk');
        $nama_merk =  $this->request->getPost('nama_merk');
        $data = [
            'nama_merk' => $nama_merk
        ];

        $this->model->updatedata('merk', $data, ['kode_merk' => $id]);
        return redirect()->to(base_url('admin/merk'));
    }
    function hapus()
    {
        $kode_merk = $this->request->getPost('kode_merk');
        $where = ['kode_merk' => $kode_merk];
        $this->model->hapusdata('merk', $where);
        return redirect()->to(base_url('admin/merk'));
    }
}
