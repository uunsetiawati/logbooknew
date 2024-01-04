<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_perizinan');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('tgl', "desc");
		$query = $this->db->get();
		return $query;
	}

	public function get_izin($id = null)
	{
		$this->db->from('tb_tugas');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getLast($id = null)
	{
		$this->db->from('tb_perizinan');
		$this->db->where('tgl >=', date("Y-m-d"));
		$this->db->order_by('tgl', "asc");
		$this->db->order_by('sesi', "asc");
		$query = $this->db->get();
		return $query;
	}

	public function getByCode($kode)
	{
		$this->db->from('tb_perizinan');
		$this->db->like('kode', $kode);
		$query = $this->db->get();
		return $query;
	}

	public function getThisDay()
	{
		$this->db->from('tb_perizinan');
		$this->db->like('tgl', date("m-d"));
		$query = $this->db->get();
		return $query;
	}

	function update($post)
	{

		$params['id'] =  $post['id'];
		$params['keterangan'] =  $post['keterangan'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_perizinan', $params);
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_perizinan');
	}
}
