<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    function getdata($tabel)
    {
        return $this->db->table($tabel)->get()->getResult();
    }
    function getlimit($tabel)
    {
        return $this->db->table($tabel)->limit(1)->get()->getResult();
    }
    function jointabel($tabel1, $tabel2, $join, $where)
    {
        return $this->db->table($tabel1)->join($tabel2, $join)->getWhere($where)->getResult();
    }
    function getfilter($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getResult();
    }
    function insertdata($tabel, $data)
    {
        return $this->db->table($tabel)->insert($data);
    }
    function updatedata($tabel, $data, $where)
    {
        return $this->db->table($tabel)->update($data, $where);
    }
    function hapusdata($tabel, $where)
    {
        return $this->db->table($tabel)->delete($where);
    }
}
