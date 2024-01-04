<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("agenda_m");
		// check_not_login();
	}

	public function index()
	{
		$data['menu'] = "Fitur Khusus Penambahan Agenda";
		$this->templateadmin->load('template/tvlobby', 'page/shopee', $data);
	}

	public function jadwal()
	{
		$this->load->model('agenda_m');
		$data['menu'] = "Agenda Bulan ".date("F",strtotime(date("M")));		
		$data['row'] = $this->agenda_m->getExternalLast();

		$jumlah_agenda = $data['row']->num_rows();
		$data['jumlah'] = $jumlah_agenda;

		$data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-default";

		$this->templateadmin->load('template/tvlobby', 'agenda/agenda_external', $data);
	}

	public function tambah()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		$this->load->model('form_m');

		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Pembuatan Jadwal";
			$this->templateadmin->load('template/tvlobby', 'form/tayangan/shopee', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->form_m->simpanTayangan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Agenda Berhasil ditambahkan');
			}
			redirect('shopee/tambah/');
		}
	}

	public function edit($id)
	{			
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('pembahasan', 'pembahasan', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->agenda_m->getExternal($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data agenda";			
				$this->templateadmin->load('template/tvlobby','agenda/external_edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('shopee/jadwal')."';</script>";
			}

	    } else {
	      $post = $this->input->post(null, TRUE);
	      $this->agenda_m->updateExternal($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}	  	 	
	        redirect('shopee/jadwal/');
	    }	        
	}

	function hapus(){
		$id = $this->uri->segment(3);
		
		$this->agenda_m->hapusExternal($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('shopee/jadwal/');
	}

}
