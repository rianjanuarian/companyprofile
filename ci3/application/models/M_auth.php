<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    function ceklogin($tabel, $data)
    {
        return $this->db->get_where($tabel, $data);
    }
    function register($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }
}
