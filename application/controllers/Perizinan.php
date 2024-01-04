<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('perizinan_m');
	}

	function index()
	{
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);

		$this->load->model('perizinan_m');

		$data['menu'] = "Jadwal Perizinan";
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-default";
		
		$query = $this->perizinan_m->get();
		$data['row'] = $query;
		$this->templateadmin->load('template/dashboard', 'perizinan/perizinan_data', $data);
	}

	public function edit($id)
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[1]');
		$this->form_validation->set_rules('keperluan', 'keperluan', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->perizinan_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Perizinan";
				$this->templateadmin->load('template/dashboard', 'perizinan/edit', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('perizinan') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->perizinan_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('perizinan');
		}
		
	}

	function hapus(){
		$id = $this->uri->segment(3);
		
		$this->perizinan_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('perizinan');
	}

}
