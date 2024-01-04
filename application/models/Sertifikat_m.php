<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_sertifikat');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('id', "desc");
		$query = $this->db->get();
		return $query;
	}
	
}
