<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		
		$this->load->model("agenda_m");
		$this->load->model("ultah_m");
		$this->load->model("perizinan_m");
		$this->load->model("podcast_m");
		$this->load->model("haripenting_m");
		$data['menu'] = "Dashboard E-UPT";
		$data['row'] = $this->agenda_m->getThisDay();
		$data['ultah'] = $this->ultah_m->getThisDay();
		$data['perizinan'] = $this->perizinan_m->getThisDay();
		$data['podcast'] = $this->podcast_m->getThisDay();
		$data['haripenting'] = $this->haripenting_m->getThisDay();

		// $data['ultah'] = $this->ultah_m->getThisMounth();
		// test($data['ultah']);		
		$this->templateadmin->load('template/dashboard', 'page/beranda', $data);
	}
	
}
