<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('podcast_m');
	}
	
	function index()
	{
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);

		$this->load->model('sertifikat_m');

		$data['menu'] = "Data Sertifikat";
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-default";

		$query = $this->sertifikat_m->get();
		$data['row'] = $query;
		$this->templateadmin->load('template/dashboard', 'sertifikat/sertifikat_data', $data);
	}
}
