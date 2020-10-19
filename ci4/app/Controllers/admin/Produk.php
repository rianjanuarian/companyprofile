<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\M_admin;
use App\Models\M_table;

class Produk extends BaseController
{
    function __construct()
    {
        $this->model = new M_admin();
        $this->tabel = new M_table();
    }
    public function index()
    {
        $data['produk'] = $this->model->getdata('vproduk');
        $data['kategori'] = $this->model->getdata('kategori');
        $data['merk'] = $this->model->getdata('merk');
        echo view('admin/layout/header');
        echo view('admin/layout/script');
        echo view('admin/content/v_produk', $data);
        echo view('admin/layout/footer');
    }
    function add()
    {
        $nama_produk =  $this->request->getPost('nama_produk');
        $kategori =  $this->request->getPost('kategori');
        $merk =  $this->request->getPost('merk');
        $stok =  $this->request->getPost('stok');
        $harga =  $this->request->getPost('harga');
        $data = [
            'kode_produk' => uniqid(),
            'nama_produk' => $nama_produk,
            'kode_kategori' => $kategori,
            'kode_merk' => $merk,
            'stok' => $stok,
            'harga' => $harga
        ];
        $proses = $this->model->insertdata('produk', $data);
        return json_encode($proses);
    }
    function show()
    {
        $data = $this->model->getdata('produk');
        return json_encode($data);
    }
    function getproduk()
    {
        $id = $this->request->getGet('id');
        $where = ['kode_produk' => $id];
        $data = $this->model->getfilter('vproduk', $where);
        return json_encode($data);
    }
    function updateproduk()
    {
        if ($this->request->isAJAX()) {
            $kode_produk =  $this->request->getPost('kode_produk');
            $nama_produk =  $this->request->getPost('nama_produk');
            $kategori =  $this->request->getPost('kategori');
            $merk =  $this->request->getPost('merk');
            $stok =  $this->request->getPost('stok');
            $harga =  $this->request->getPost('harga');
            $data1 = [
                'nama_produk' => $nama_produk,
                'kode_kategori' => $kategori,
                'kode_merk' => $merk,
                'stok' => $stok,
                'harga' => $harga
            ];
            $where = ['kode_produk' => $kode_produk];

            $data = $this->model->updatedata('produk', $data1, $where);
            return json_encode($data);
        }
    }
    function hapus()
    {
        $barcode = $this->request->getPost('kode');
        $where = ['kode_produk' => $barcode];
        $data = $this->model->hapusdata('produk', $where);
        return json_encode($data);
    }
    function tampil_produk()
    {
        if ($this->request->getMethod(true) == 'POST') {
            $where = ['kode_produk !=' => 0];
            $column_order   = array('', 'kode_produk', 'nama_produk', 'nama_kategori', 'nama_merk', 'stok', 'harga');
            $column_search  = array('kode_produk', 'nama_produk', 'nama_kategori', 'nama_merk', 'stok', 'harga');
            $order = array('nama_produk' => 'ASC');
            $list = $this->tabel->get_datatables('vproduk', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[]  = $no;
                $row[]  = $lists->nama_produk;
                $row[]  = $lists->nama_kategori;
                $row[]  = $lists->nama_merk;
                $row[]  = $lists->stok;
                $row[]  = $lists->harga;
                $row[] = '<a href="javascript:;" data=' . $lists->kode_produk . ' class="fas fa-edit item_edit"></a><a href="javascript:;" data=' . $lists->kode_produk . ' class="fas fa-trash-alt item_hapus"></a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->tabel->count_all('vproduk', $where),
                "recordsFiltered" => $this->tabel->count_filtered('vproduk', $column_order, $column_search, $order, $where),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }
    //--------------------------------------------------------------------

}
