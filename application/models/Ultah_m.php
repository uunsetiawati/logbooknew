<?php
 
class Ultah_m extends CI_Model {
	public function get($id = null)
  {
    $this->db->from('tb_agenda');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_by_kode($kode = null)
  {
    $this->db->from('tb_agenda');
    $this->db->where('kode',$kode);
    $query = $this->db->get();
    return $query;
  }

  public function getLastMouth()
  {
    $this->db->from('tb_agenda');
    $this->db->like('tgl',date("Y-m"));
    $this->db->where('tgl >=',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }

  public function getLast()
  {
    $this->db->from('tb_agenda');
    $this->db->where('tgl >=',date("Y-m-d"));
    $this->db->order_by('tgl',"asc");
    $this->db->order_by('waktu_mulai',"asc");
    $query = $this->db->get();
    return $query;
  }

  public function getThisDay()
  {
    $this->db->from('tb_user');
    $this->db->like('tgl_lahir',date("m-d"));
    $this->db->where('status',date("1"));
    $query = $this->db->get();
    return $query;
  }

  public function getThisMounth()
  {
    $this->db->from('tb_user');
    $this->db->where('MONTH("tgl_lahir")',date("m"));
    $this->db->where('status',"1");
    $query = $this->db->get();
    return $query;
  }

	
}