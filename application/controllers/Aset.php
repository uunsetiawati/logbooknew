<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('aset_m');
	}
	
	function index()
	{
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);

		$data['menu'] = "Data Aset";
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-default";

		$query = $this->aset_m->get();
		$data['row'] = $query;
		$this->templateadmin->load('template/dashboard', 'aset/aset_data', $data);
	}

	public function detail()
	{
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment('3');
		$query = $this->aset_m->get($id);
		if ($query->num_rows() > 0) {
			$data['row'] = $query->row();
			$data['menu'] = "Data Aset";
			$this->templateadmin->load('template/dashboard', 'aset/aset_detail', $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('user') . "';</script>";
		}
	}

	// DATATABLES
	function get_data_aset()
	{
		$list = $this->aset_m->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nama_aset;
			$row[] = $field->jumlah;
			$row[] = date('d-m-Y', strtotime($field->tgl_beli));
			$row[] = $field->keterangan;
			$row[] = '<a href="' . base_url("aset/detail/" . $field->id) . '" class="btn btn-success btn-xs"><i class="fas fa-eye"></i> Lihat</a><a href="' . base_url("aset/edit/" . $field->id) . '" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
            		  <a href="' . base_url("aset/hapus/" . $field->id) . '" class="btn btn-danger btn-xs" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\');"><i class="fas fa-trash"></i> Hapus</a>
            		 ';
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->aset_m->count_all(),
			"recordsFiltered" => $this->aset_m->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}
	// DATATABLES
	
	// FORM EKSEKUSI
	public function tambah()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama_aset', 'nama_aset', 'min_length[3]');
		// Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['kategoriList'] = $this->aset_m->get_enum_values('kategori');
			$data['kondisiList'] = $this->aset_m->get_enum_values('kondisi');
			$data['menu'] = "Tambah Data Aset";
			$this->templateadmin->load('template/dashboard', 'aset/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$tgl = date('YmdHis');
			$config['upload_path']          = 'assets/dist/img/foto-aset';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['file_name']            = $tgl;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				$post['gambar'] = $this->upload->data('file_name');
			} else if($this->upload->do_upload('gambar') == null){
				$post['gambar'] = null;
			} else{
				$pesan = $this->upload->display_errors();
				$this->session->set_flashdata('danger', $pesan);
				redirect('aset/tambah/');
			}

			$this->aset_m->simpan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Aset Berhasil Ditambahkan');
			}
			redirect('aset');
		}
	}

	public function edit($id)
	{
		// check_right_user_edit($this->fungsi->pilihan_selected("tb_tugas",$id)->row("user_id"),$this->session->id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama_aset', 'nama_aset', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->aset_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Aset";
				$data['kategoriList'] = $this->aset_m->get_enum_values('kategori');
				$data['kondisiList'] = $this->aset_m->get_enum_values('kondisi');
				$this->templateadmin->load('template/dashboard', 'aset/aset_edit', $data);
				
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('aset') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$tgl = $tgl = date('d-m-Y');
			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/img/foto-aset/';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf|doc|docx|ppt|pptx';
			$config['max_size']             = 100000;
			$config['file_name']            = $tgl;

			$this->load->library('upload', $config);
			if (@$_FILES['gambar']['name'] != null) {
				if ($this->upload->do_upload('gambar')) {
					$itemfoto = $this->aset_m->get($post['id'])->row();
					if ($itemfoto->gambar != null) {
						$target_file = 'assets/dist/img/foto-aset/' . $itemfoto->gambar;
						unlink($target_file);
					}

					$post['gambar'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('aset/edit_aset/' . $id);
				}
			}

			$this->aset_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('aset');
		}
	}

	function hapus()
	{
		$id = $this->uri->segment(3);
		$itemfoto = $this->aset_m->get($id)->row();
		if ($itemfoto->gambar != null) {
			$target_file = 'assets/dist/img/foto-aset/' . $itemfoto->gambar;
			unlink($target_file);
		}
		$this->aset_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('aset');
	}

	function hapusgambar()
	{
		//Mencegah user yang bukan haknya
		// check_right_user($this->session->id,$this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('aset_m');
		$itemfoto = $this->aset_m->get($id)->row();
		if ($itemfoto->gambar != null) {
			$target_file = 'assets/dist/img/foto-aset/' . $itemfoto->gambar;
			unlink($target_file);
		}
		$params['gambar'] = null;
		$this->db->where('id', $id);
		$this->db->update('tb_aset', $params);
		redirect('aset/edit/' . $id);
	}

}
