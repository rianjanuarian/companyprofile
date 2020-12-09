<?php
class M_artikel extends CI_Model
{
    public function latest()
    {
        return $this->db->limit(10)->order_by('PostingDate', 'DESC')->get('tblposts')->result();
    }
}
