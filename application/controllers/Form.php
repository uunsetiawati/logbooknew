<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//check_already_login();
		$this->load->library("wa");
	}

	public function index()
	{
		$data['menu'] = "Selamat datang di APlikasi E-UPT";
		$this->templateadmin->load('template/publik', 'page/landing_publik', $data);
	}

	public function daftarLuring()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		$this->load->model('formluring_m');
		//Atur validasinya
		$this->form_validation->set_rules('nik', 'nik', 'min_length[16]|max_length[16]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[12]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Modul";

			$this->templateadmin->load('template/iframe', 'formluring/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/files/formluring/foto/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 6000;
			$config['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/daftarluring/');
				}
			}

			//CEK GAMBAR
			$config2['upload_path']          = 'assets/dist/files/formluring/spt/';
			$config2['allowed_types']        = 'pdf';
			$config2['max_size']             = 6000;
			$config2['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$upload_2 = $this->load->library('upload', $config2);
			if (@$_FILES['spt']['name'] != null) {
				$this->upload->initialize($config2);
				if ($this->upload->do_upload('spt')) {
					$post['spt'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/daftarluring/');
				}
			}

			//CEK GAMBAR
			$config3['upload_path']          = 'assets/dist/files/formluring/ktp/';
			$config3['allowed_types']        = 'jpg|png|jpeg';
			$config3['max_size']             = 6000;
			$config3['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$upload_3 = $this->load->library('upload', $config3);
			if (@$_FILES['ktp']['name'] != null) {
				$this->upload->initialize($config3);
				if ($this->upload->do_upload('ktp')) {
					$post['ktp'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/daftarluring/');
				}
			}

			//CEK GAMBAR
			$config4['upload_path']          = 'assets/dist/files/formluring/ttd/';
			$config4['allowed_types']        = 'jpg|png|jpeg';
			$config4['max_size']             = 6000;
			$config4['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$upload_4 = $this->load->library('upload', $config4);
			if (@$_FILES['ttd']['name'] != null) {
				$this->upload->initialize($config4);
				if ($this->upload->do_upload('ttd')) {
					$post['ttd'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/daftarluring/');
				}
			}

			$this->formluring_m->simpan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil... <br><h3><a href="' . base_url("publik/cetakpdf/" . $post['nik'] . "/pelatihan/" . $post['pelatihan_id']) . '" target="blank"> Silahkan Klik untuk Mengunduh Formulir Anda</a></h3>');
			}
			redirect('form/daftarluring/');
		}
	}

	// Untuk Mendownload formulir secara langsung
	// Menggunakan nik dan pelatihan id
	public function cetakpdf()
	{
		$this->load->library("cetak");
		$pelatihan_id = $this->uri->segment(5);
		$token = $this->uri->segment(3);
		$templateform = $this->fungsi->pilihan_selected("tb_pelatihan_luring", $pelatihan_id)->row("template");
		$konten = "formluring/template/pdf/" . $templateform;
		$filename = "Formulir Pendaftaran - " . $this->fungsi->pilihan_advanced_multiple("frm_peserta_pelatihan", "nik", $token, "pelatihan_id", $pelatihan_id)->row("nama");
		$getData = $this->fungsi->pilihan_advanced_multiple("frm_peserta_pelatihan", "nik", $token, "pelatihan_id", $pelatihan_id);
		$data['row'] = $getData->row();

		if ($getData->num_rows() != null) {
			//BUlan Lahir
			$xbulan = date("m", strtotime($data['row']->tgl_lahir));
			if ($xbulan == "1") {
				$data['bulanlahir'] = "Januari";
			} elseif ($xbulan == "2") {
				$data['bulanlahir'] = "Februari";
			} elseif ($xbulan == "3") {
				$data['bulanlahir'] = "Maret";
			} elseif ($xbulan == "4") {
				$data['bulanlahir'] = "April";
			} elseif ($xbulan == "5") {
				$data['bulanlahir'] = "Mei";
			} elseif ($xbulan == "6") {
				$data['bulanlahir'] = "Juni";
			} elseif ($xbulan == "7") {
				$data['bulanlahir'] = "Juli";
			} elseif ($xbulan == "8") {
				$data['bulanlahir'] = "Agustus";
			} elseif ($xbulan == "9") {
				$data['bulanlahir'] = "September";
			} elseif ($xbulan == "10") {
				$data['bulanlahir'] = "Oktober";
			} elseif ($xbulan == "11") {
				$data['bulanlahir'] = "November";
			} elseif ($xbulan == "12") {
				$data['bulanlahir'] = "Desember";
			}

			//Bulan TTD
			$ybulan = date("m", strtotime($data['row']->created));
			if ($ybulan == "1") {
				$data['bulanttd'] = "Januari";
			} elseif ($ybulan == "2") {
				$data['bulanttd'] = "Februari";
			} elseif ($ybulan == "3") {
				$data['bulanttd'] = "Maret";
			} elseif ($ybulan == "4") {
				$data['bulanttd'] = "April";
			} elseif ($ybulan == "5") {
				$data['bulanttd'] = "Mei";
			} elseif ($ybulan == "6") {
				$data['bulanttd'] = "Juni";
			} elseif ($ybulan == "7") {
				$data['bulanttd'] = "Juli";
			} elseif ($ybulan == "8") {
				$data['bulanttd'] = "Agustus";
			} elseif ($ybulan == "9") {
				$data['bulanttd'] = "September";
			} elseif ($ybulan == "10") {
				$data['bulanttd'] = "Oktober";
			} elseif ($ybulan == "11") {
				$data['bulanttd'] = "November";
			} elseif ($ybulan == "12") {
				$data['bulanttd'] = "Desember";
			}
			$this->cetak->formLuring($konten, $filename, $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('publik') . "';</script>";
		}
	}

	public function culinarybc()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		$this->load->model('formluring_m');
		//Atur validasinya
		$this->form_validation->set_rules('nik', 'nik', 'min_length[16]|max_length[16]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[12]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Modul";

			$this->templateadmin->load('template/iframe', 'formluring/form_culinarybc', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/files/formluring/foto/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 6000;
			$config['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/culinarybc/');
				}
			}

			//CEK GAMBAR
			$config4['upload_path']          = 'assets/dist/files/formluring/ttd/';
			$config4['allowed_types']        = 'jpg|png|jpeg';
			$config4['max_size']             = 6000;
			$config4['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

			$upload_4 = $this->load->library('upload', $config4);
			if (@$_FILES['ttd']['name'] != null) {
				$this->upload->initialize($config4);
				if ($this->upload->do_upload('ttd')) {
					$post['ttd'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/culinarybc/');
				}
			}

			$this->formluring_m->simpan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil... <br><h3><a href="' . base_url("form/cetakpdf/" . $post['nik'] . "/pelatihan/" . $post['pelatihan_id']) . '" target="blank"> Silahkan Klik untuk Mengunduh Formulir Anda</a></h3>');
			}
			redirect('form/culinarybc/');
		}
	}

	public function siBantu()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		$this->load->model('sibantu_m');
		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[10]|max_length[12]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Permohonan Bimbingan & Konsultasi";

			$this->templateadmin->load('template/iframe', 'formluring/form_sibantu', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/files/formluring/foto/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 6000;
			$config['file_name']            = "siBantu - " . $post['hp'] . date("ymd");

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('foto')) {
					$post['foto'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/siBantu/');
				}
			}

			//CEK GAMBAR
			$config4['upload_path']          = 'assets/dist/files/formluring/ttd/';
			$config4['allowed_types']        = 'jpg|png|jpeg';
			$config4['max_size']             = 6000;
			$config4['file_name']            = "siBantu - " . $post['hp'] . date("ymd");

			$upload_4 = $this->load->library('upload', $config4);
			if (@$_FILES['ttd']['name'] != null) {
				$this->upload->initialize($config4);
				if ($this->upload->do_upload('ttd')) {
					$post['ttd'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('form/siBantu/');
				}
			}

			$this->sibantu_m->simpan($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil... <br><h3><a href="' . base_url("form/siBantuPrint/" . $post['hp'] . date("ymd")) . '" target="blank"> Silahkan Klik untuk Mengunduh Formulir Anda</a></h3>');
			}
			redirect('form/siBantu/');
		}
	}

	// Untuk Mendownload formulir secara langsung
	// Menggunakan nik dan pelatihan id
	public function siBantuPrint()
	{
		$this->load->library("cetak");
		$token = $this->uri->segment(3);
		$konten = "formluring/template/pdf/siBantu_form";
		$getData = $this->fungsi->pilihan_advanced("frm_permohonan", "kode", $token);
		$filename = "Formulir Permohonan - " . $getData->row("nama");
		$data['row'] = $getData->row();

		if ($getData->num_rows() != null) {
			$this->cetak->formLuring($konten, $filename, $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('publik') . "';</script>";
		}
	}

	// ADD TIKET PERIZINAN
	public function perizinan()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		$this->load->model('form_m');
		//Atur validasinya
		$this->form_validation->set_rules('pembahasan', 'pembahasan', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Ajukan Jadwal Pembuatan Perizinan";
			$data['footer_script'] = "pendaftaran_perizinan";
			$this->templateadmin->load('template/iframe', 'form/perizinan/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->form_m->simpanJadwalPerizinan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', '<h3><a href="' . base_url("form/perizinanPrint/" . $post['hp'] . date("dmy", strtotime($post['tgl'])) . str_replace([".", " - "], "", $post['sesi'])) . '" target="blank"> DOWNLOAD TIKET</a></h3>');

				//Kirim WA Ke Admin
				$kalimat = "*Seseorang baru saja mendaftarkan Perizinan " . $post['tipe'] . "*, adapun detail data sebagai berikut: \n\n" . $post['nama'] . "\nAsal " . $post['asal'] . "\nNomor HP " . $post['hp'] . "\nRencana tanggal " . $post['tgl'] . "\nJam " . $post['sesi'] . " secara " . $post['teknis'] . "\n\nuptkukm.id\nSemangat selalu BerKhidmat untuk Lembaga, Bangsa, dan Negara";
				$this->wa->waWhacenter("085235142348", $kalimat); // Mbak UUN
				$this->wa->waWhacenter("081231390340", $kalimat); // Fitrah
				$this->wa->waWhacenter("081232757574", $kalimat); //Mas Rois
				$this->wa->waWhacenter("082331513590", $kalimat); // Mbak Dara
				$this->wa->waWhacenter("082242899015", $kalimat); // Intan
				//Kirim WA Ke Pelanggan
				// $this->wa->waWhacenter($post['hp'],"Terima kasih, ".$post['nama']." telah melakukan pendaftaran. Selanjutnya anda akan dikonfirmasi oleh admin. Apabila ada pertanyaan bisa menghubungi Call Center kami di 081331220006. Terima Kasih.\n\nKoperasi Jaya Sejahtera!");
				redirect('publik/cekPerizinanSukses/suksess');
			}
			redirect('form/perizinan/');
		}
	}

	public function perizinanPrint()
	{
		$this->load->library("cetak");
		$token = $this->uri->segment(3);
		$konten = "templatecetak/perizinan/tiket";
		$getData = $this->fungsi->pilihan_advanced("tb_perizinan", "kode", $token);
		$filename = "ETIKET PERIZINAN - " . $getData->row("nama");
		$data['row'] = $getData->row();

		if ($getData->num_rows() != null) {
			$this->cetak->formLuring($konten, $filename, $data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='" . site_url('publik') . "';</script>";
		}
	}

	public function podcast()
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
			$data['menu'] = "Form Pendaftaran Acara Bincang jawara UKM";
			$data['footer_script'] = "pendaftaran_podcast";
			$this->templateadmin->load('template/iframe', 'form/podcast/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->form_m->simpanPodcast($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil, Sampai Jumpa di Malang...');
				//Kirim Notifikasi WA
				$kalimat = "*Seseorang baru saja mendaftarkan Podcast*, adapun detail data sebagai berikut: \n\n" . $post['nama'] . "\nNomor HP " . $post['hp'] . "\nRencana tanggal " . $post['tgl'] . "\n\nSemangat selalu BerKhidmat untuk Lembaga, Bangsa, dan Negara";
				$this->wa->waWhacenter("081231390340", $kalimat); // FItrah
				$this->wa->waWhacenter("083849319535", $kalimat); // Aan
				$this->wa->waWhacenter("081232757574", $kalimat); // Mas Rois
				$this->wa->waWhacenter("081331208584", $kalimat); // Pak Anom

				// Kirim WA Ke Pelanggan
				// $this->wa->waWhacenter($post['hp'],"Terima Kasih, ".$post['nama']." telah melakukan pendaftaran. Kami tunggu kehadirannya di Malang ya. Apabila ada pertanyaan bisa menghubungi Call Center kami di 081331220006. Terima Kasih.\n\nuptkukm.id\nKoperasi Jaya Sejahtera!");
			}
			redirect('form/podcast/');
		}
	}
}
