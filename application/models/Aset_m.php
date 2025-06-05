<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_aset');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('id', "desc");
		$query = $this->db->get();
		return $query;
	}

	public function get_spesifik($key = null, $tahun = null, $bulan = null) 
	{
		$this->db->from('tb_aset');
		if ($key != null) {
			// $this->db->where('keterangan',$key);
			$this->db->like('keterangan',$key);
		}
		
		$this->db->order_by("keterangan","ASC");
		$query = $this->db->get();
		return $query;
	}

	public function get_user($key = null, $tahun = null, $bulan = null) 
	{
		$this->db->from('tb_user');
		if ($key != null) {
			// Hilangkan gelar setelah koma jika ada
			$nama_bersih = explode(',', $key)[0];
			$this->db->like('nama', trim($nama_bersih), 'after'); // cocokkan bagian depan
			// $key = strtolower(trim($key)); // bersihkan input
        	// $this->db->like('LOWER(nama)', $key); // pencarian tidak case-sensitive
		}
		
		$this->db->order_by("nama","DESC");
		$query = $this->db->get();
		return $query;
	}

	

	// DATATABLES
	var $table = 'tb_aset'; //nama tabel dari database
	var $column_order = array(null, 'nama_aset', 'tgl_beli', 'keterangan'); //field yang ada di table user
	var $column_search = array('nama_aset', 'tgl_beli', 'keterangan'); //field yang diizin untuk pencarian 
	var $order = array('created' => 'desc', 'id' => 'asc'); // default order 

	private function _get_datatables_query()
	{
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{
				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_enum_values($field)
    {
        $query = $this->db->query("SHOW COLUMNS FROM {$this->table} LIKE '$field'");
        $row = $query->row();
        
        if (preg_match("/^enum\(\'(.*)\'\)$/", $row->Type, $matches)) {
            return explode("','", $matches[1]);
        }

        return [];
    }

	function simpan($post)
	{
		$params['id'] =  "";
		$params['nama_aset'] =  $post['nama_aset'];
		$params['kategori'] =  $post['kategori'];
		$params['model'] =  $post['model'];
		$params['jumlah'] =  $post['jumlah'];
		$params['tgl_beli'] =  $post['tgl_beli'];
		$params['kondisi'] =  $post['kondisi'];
		$params['lokasi'] =  $post['lokasi'];
		$params['keterangan'] =  $post['keterangan'];
		$params['gambar'] = $post['gambar'];
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_aset', $params);
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['nama_aset'] =  $post['nama_aset'];
	  $params['kategori'] =  $post['kategori'];
	  $params['model'] =  $post['model'];
	  $params['jumlah'] =  $post['jumlah'];
	  $params['tgl_beli'] =  $post['tgl_beli'];
	  $params['kondisi'] =  $post['kondisi'];
	  $params['lokasi'] =  $post['lokasi'];
	  $params['keterangan'] =  $post['keterangan'];
	  $params['modified'] =  date("Y:m:d:h:i:sa");
	  
	  if ($post['gambar'] != null) {
  	  	$params['gambar'] =  $post['gambar'];
	  } else {
	  	$params['gambar'] =  "";
	  }
	
	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_aset',$params);	  	 		  	 		   			
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_aset');
	}
	
}
