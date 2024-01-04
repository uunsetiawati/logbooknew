<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function tentang()
	{
		$data['menu'] = "Tentang Pengembang";
		$this->templateadmin->load('template/dashboard','page/tentang',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Biodata Pembuat";
		$this->templateadmin->load('template/dashboard','page/pembuat',$data);
	}

	public function clouddoc()
	{
		$data['menu'] = "Cloud Doc";
		$this->templateadmin->load('template/dashboard','page/clouddoc_menu',$data);
	}

	public function embed()
	{
		// Untuk page emded dari page lain
		// Sementara dibuat static dulu, kalau ada waktu kita buat otomatis
		// Script otomatis ambil dari database
		/*
		$kode = $this->uri->segment(3);
		$dataEmbed = $this->fungsi->pilihan_advanced("tb_embed","kode",$kode)->row();
		if ($dataEmbed == null) {
			$this->session->set_flashdata('warning', 'Data tidak ditemukan');
			redirect('dashboard');
		}
		$data['menu'] = $dataEmbed->deskripsi;
		$data['link'] = $dataEmbed->link;
		*/
		$kode = $this->uri->segment(3);
		if ($kode == "cloudfoto") {
			$url = "https://drive.google.com/embeddedfolderview?id=1-9ZX1r7HZMjfsHykfeD7SouhtmpGTJTq#list";
		} elseif ($kode == "cloudmateri") {
			$url = "https://drive.google.com/embeddedfolderview?id=1IJMlbi1UqBmv_vHHYClXLUFl9a_wwZiC#list";
		} elseif ($kode == "clouddesain") {
			$url = "https://drive.google.com/embeddedfolderview?id=11z9X6SihTqxkUxNT_57T15HQLtvtAmmc#list";
		} elseif ($kode == "clouddata") {
			$url = "https://drive.google.com/embeddedfolderview?id=1yT1sfvQ5Tjosr6rN9E3FqSVlwP9z0JWW#list";
		} elseif ($kode == "cloudvideo") {
			$url = "https://drive.google.com/embeddedfolderview?id=1cIfIhfuytLJzazBlCtN1VyF8yLQ7bqDV#list";
		} elseif ($kode == "cloudkirim") {
			$url = "https://drive.google.com/embeddedfolderview?id=13S7AQ1SjbE3BnyXiJ5C8fqiGJCEk_gmw#list";
		}
		$data['link'] = $url;
		$data['menu'] = "Cloud Doc";
		$this->templateadmin->load('template/dashboard','page/embed',$data);
	}
}
