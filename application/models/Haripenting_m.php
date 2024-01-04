<?php

class Haripenting_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tb_haripenting');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_by_kode($kode = null)
    {
        $this->db->from('tb_haripenting');
        $this->db->where('kode', $kode);
        $query = $this->db->get();
        return $query;
    }

    public function getLastMouth()
    {
        $this->db->from('tb_haripenting');
        $this->db->like('tgl', date("Y-m"));
        $this->db->where('tgl >=', date("Y-m-d"));
        $this->db->order_by('tgl', "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getLast()
    {
        $this->db->from('tb_haripenting');
        $this->db->where('tgl >=', date("Y-m-d"));
        $this->db->order_by('tgl', "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getThisDay()
    {
        $this->db->from('tb_haripenting');
        $this->db->like('tgl', date("Y-m-d"));
        $this->db->order_by('tgl', "asc");
        $query = $this->db->get();
        return $query;
    }
}
