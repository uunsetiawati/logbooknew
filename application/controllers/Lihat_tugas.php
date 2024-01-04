<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_tugas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('log_book_m');
	}	

    public function lihat(){
		$post = $this->input->post(null, TRUE);
		$id_user = $this->uri->segment('3');
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;            
		} else {
			redirect('log_book');
		}

		$data['menu'] = "Catatan Pemberian Tugas";
		if ($post == null) {
			$data['row'] = $this->log_book_m->get_lihattugas_sekarang($id_user);
		} else {
			$data['row'] = $this->log_book_m->get_spesifiklihattugas($id_user, $post['tahun'], $post['bulan']);			
		}
		// $data['id_user'] = $id_user;
		// $data['row_user'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan","user_id",$this->session->id)->row("id") );
		// $data['tugas'] = $query = $this->log_book_m->get_tugas($id_user);	
		// $data['status_tugas'] = $this->log_book_m->cek_statustugas_harian($id);
		$this->templateadmin->load('template/dashboard','log_book/log_book_lihat_tugas',$data);
	}
}