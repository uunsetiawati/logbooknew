<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_m extends CI_Model
{

	function simpanJadwalPerizinan($post)
	{

		$params['id'] =  "";
		$params['nama'] =  strtoupper($post['nama']);
		$params['hp'] =  $post['hp'];
		$params['asal'] =  $post['asal'];
		$params['tipe'] =  $post['tipe'];
		$params['tgl'] =  $post['tgl'];
		$params['teknis'] =  $post['teknis'];
		$params['sesi'] =  $post['sesi'];
		$params['kode'] =  $post['hp'] . date("dmy", strtotime($post['tgl'])) . str_replace([".", " - "], "", $post['sesi']);
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_perizinan', $params);
	}

	function simpanPodcast($post)
	{

		$params['id'] =  "";
		$params['nama'] =  strtoupper($post['nama']);
		$params['hp'] =  $post['hp'];
		$params['jenis'] =  $post['jenis'];
		$params['brand'] =  $post['brand'];
		$params['asal'] =  $post['asal'];
		$params['tgl'] =  $post['tgl'];
		$params['vaksin'] =  $post['vaksin'];
		$params['kehadiran'] =  $post['kehadiran'];
		$params['sesi'] =  $post['sesi'];
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_podcast', $params);
	}

	function simpanTayangan($post)
	{
		
		$params['id'] =  "";
		$params['kode'] =  date("Ymd");
		$params['tgl'] =  $post['tgl'];
		$params['pimpinan'] =  $post['pimpinan'];
		$params['waktu_mulai'] =  $post['waktu_mulai'];
		$params['waktu_selesai'] =  $post['waktu_selesai'];
		$params['tempat'] =  $post['tempat'];
		$params['peserta'] =  $post['peserta'];
		$params['acara'] =  $post['acara'];
		$params['tema'] =  $post['tema'];
		$params['total_peserta'] =  $post['total_peserta'];
		$params['pembuat'] =  $post['pembuat'];
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_agenda_external', $params);
	}
}
