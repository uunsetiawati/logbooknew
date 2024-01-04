<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Podcast extends CI_Controller
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

        $this->load->model('podcast_m');

        $data['menu'] = "Jadwal podcast";
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-default";

        $query = $this->podcast_m->get();
        $data['row'] = $query;
        $this->templateadmin->load('template/dashboard', 'podcast/podcast_data', $data);
    }

    function hapus(){
		$id = $this->uri->segment(3);
		
		$this->podcast_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('podcast');
	}
}
