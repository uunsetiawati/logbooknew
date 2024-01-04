<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SendWA extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index($nomor = null, $kalimat = null)
	{
        $kalimat = urldecode($this->input->get("kalimat"));
        $nomor = urldecode($this->input->get("nomor"));

        $this->fungsi->sendWA($nomor,$kalimat);
	}

}
