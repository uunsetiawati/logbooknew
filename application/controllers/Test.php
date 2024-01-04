<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//check_already_login();
	}

	public function index()
	{
		$data['menu'] = "Selamat datang di APlikasi E-UPT";
		$this->templateadmin->load('template/publik', 'page/landing_publik', $data);
	}

    function cetak()
    {
        $this->load->library("cetak");
        $this->cetak->signed();
    }

	public function seminar()
	{
		$this->load->library("cetak");
		$this->load->library('encryption');
		$token = $this->uri->segment(3);
		$konten = "template/sertifikat/tcpdf";
		$getData = $this->fungsi->pilihan_advanced("tb_sertifikat", "id", $token);
		$filename = "SERTIFIKAT - " . $getData->row("nama");
		$data['row'] = $getData->row();
		$data['bg'] = $getData->row("template");

		if ($getData->num_rows() != null) {
			// $this->cetak->sertifikat($konten, $filename, $data);
			$this->cetak->signed($konten, $filename, $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('publik') . "';</script>";
		}
	}

}
