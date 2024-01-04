<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Podcast_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_podcast');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('tgl', "desc");
		$query = $this->db->get();
		return $query;
	}

	public function getThisDay()
	{
		$this->db->from('tb_podcast');
		$this->db->like('tgl', date("m-d"));
		$query = $this->db->get();
		return $query;
	}

	public function getLast()
	{
		//Untukmengambilyangterbaru
		$this->db->from('tb_podcast');
		$this->db->where('tgl >=', date("Y-m-d"));
		$this->db->order_by('tgl', "asc");
		$query = $this->db->get();
		return $query;
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_podcast');
	}
}
