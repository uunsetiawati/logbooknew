<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_book extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);
		$this->load->model('log_book_m');
	}

	public function index()
	{
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;
		} elseif ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}

		// $query="SELECT * FROM tb_";

		$data['menu'] = "Kegiatan Harian";
		$data['row'] = $this->log_book_m->get_data_bulan_sekarang($id);
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data', $data);
	}

	function coba()
{
    // Ambil id dari sesi
    $id = $this->session->id;

    // Query SQL
    $query = "SELECT * FROM tb_data_logbook WHERE user_id = $id";

    // Lakukan query ke database
    $hasil = $this->db->query($query);

    // Periksa apakah query berhasil dieksekusi
    if ($hasil) {
        // Ambil hasil query sebagai objek
        $hasil = $hasil->row();

        // Cek apakah ada hasil dari query
        if ($hasil) {
            // Tampilkan tanggal dari hasil query
            echo $hasil->tgl;
        } else {
            // Tampilkan pesan jika tidak ada hasil dari query
            echo "Data tidak ditemukan";
        }
    } else {
        // Tampilkan pesan jika query gagal dieksekusi
        echo "Gagal mengeksekusi query";
    }
}

function coba2()
{
    // Ambil id dari sesi
    $user_id = $this->session->id;

    // Query SQL
    $query = "SELECT tgl, COUNT(*) AS total FROM tb_data_logbook WHERE user_id = ? GROUP BY tgl";
    
    // Lakukan query ke database
    $hasil = $this->db->query($query, array($user_id));

    // Periksa apakah query berhasil dieksekusi
    if ($hasil) {
        // Ambil hasil query sebagai array objek
        $hasil = $hasil->result();

        // Cek apakah ada hasil dari query
        if ($hasil) {
            // Tampilkan hasil
            foreach ($hasil as $data) {
                echo "Tanggal: " . $data->tgl . ", Total: " . $data->total . "<br>";
            }
        } else {
            // Tampilkan pesan jika tidak ada hasil dari query
            echo "Data tidak ditemukan";
        }
    } else {
        // Tampilkan pesan jika query gagal dieksekusi
        echo "Gagal mengeksekusi query";
    }
}

function coba3()
{
    // Ambil id dari sesi
    $user_id = $this->session->id;

    // Query SQL
    $query = "SELECT COUNT(*) AS total FROM tb_data_logbook WHERE user_id = ?";
    
    // Lakukan query ke database
    $hasil = $this->db->query($query, array($user_id));

    // Periksa apakah query berhasil dieksekusi
    if ($hasil) {
        // Ambil hasil query sebagai objek
        $hasil = $hasil->row();

        // Cek apakah ada hasil dari query
        if ($hasil) {
            // Tampilkan total
            echo "Total semua tanggal: " . $hasil->total;
        } else {
            // Tampilkan pesan jika tidak ada hasil dari query
            echo "Data tidak ditemukan";
        }
    } else {
        // Tampilkan pesan jika query gagal dieksekusi
        echo "Gagal mengeksekusi query";
    }
}



	public function indexx()
	{
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;
		} elseif ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}

		$data['menu'] = "Kegiatan Harian";
		$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data', $data);
	}

	public function filter()
	{
		$post = $this->input->post(null, TRUE);

		if ($post == null) {
			redirect('log_book');
		}

		$tahun = $post['tahun'];
		$bulan = $post['bulan'];

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;
		} elseif ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}

		$data['menu'] = "Kegiatan Harian Bulan " . $bulan . " Tahun " . $tahun;
		$data['row'] = $this->log_book_m->get_spesifik($id, $tahun, $bulan);
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data', $data);
	}

	public function filter_data()
	{
		$post = $this->input->post(null, TRUE);

		if ($post == null) {
			redirect('log_book');
		}

		$tahun = $post['tahun'];
		$bulan = $post['bulan'];

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;
		} elseif ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}

		$data['menu'] = "Kegiatan Harian Bulan " . $bulan . " Tahun " . $tahun;
		$data['row'] = $this->log_book_m->get_spesifik($id, $tahun, $bulan);
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data', $data);
	}

	public function admin()
	{
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} elseif ($tipe_user == '2') {
			$id = $this->session->id;
			$data['row'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan", "user_id", $this->session->id)->row("id"));
		} else {
			$id = $this->session->id;
			$data['row'] = $this->log_book_m->get_user_by_kepala();
		}

		$data['menu'] = "Catatan Log Book";
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data_admin', $data);
	}

	public function kepala()
	{
		$post = $this->input->post(null, TRUE);

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 3;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} else {
			$id = $this->session->id;
		}

		$data['menu'] = "Catatan Log Book";
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$data['row'] = $this->log_book_m->get_user_by_kepala();
		if ($post == null) {
			$data['row_self'] = $this->log_book_m->get_bulan_sekarang($this->session->id);
		} else {
			$data['row_self'] = $this->log_book_m->get_spesifik($this->session->id, $post['tahun'], $post['bulan']);
		}
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data_kepala', $data);
	}

	public function pimpinan()
	{
		$post = $this->input->post(null, TRUE);

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} else {
			$id = $this->session->id;
		}

		$data['menu'] = "Catatan Log Book";
		if ($post == null) {
			$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		} else {
			$data['row'] = $this->log_book_m->get_spesifik($this->session->id, $post['tahun'], $post['bulan']);
		}

		$data['row_user'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan", "user_id", $this->session->id)->row("id"));
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data_pimpinan', $data);
	}

	public function detail()
	{
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'Detail hanya bisa dilihat oleh admin');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		//Cek pimpinan
		$jabatan = $this->fungsi->pilihan_advanced("tb_pimpinan", "user_id", $this->session->id)->row("id");
		if ($this->fungsi->hitung_rows_multiple("tb_struktural", "pimpinan_id", $jabatan, "user_id", $id) == null and $this->session->tipe_user < 3) {
			$this->session->set_flashdata('warning', 'Hanya bisa melihat detail log book bawahannya');
			redirect('log_book');
		}

		//Cek Post
		$post = $this->input->post(null, TRUE);
		if ($post == null or $post['tahun'] == null or $post['bulan'] == null) {
			$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		} else {
			$data['row'] = $this->log_book_m->get_spesifik($post['id'], $post['tahun'], $post['bulan']);
		}

		// var_dump($data['row']->result());
		// die();

		$data['menu'] = "Kegiatan Harian";
		$data['data_user'] = $this->log_book_m->get_user($id);
		$data['ranking'] = $this->log_book_m->get_ranking($id);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_detail', $data);
	}

	function apresiasi()
	{

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'apresiasi hanya boleh dilakukan oleh kepala UPT');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		$nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "log_book")->row("nilai");
		$kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "log_book")->row("id");

		// Cek sudah input atau belum
		$cek_input = $this->fungsi->hitung_rows_triple("tb_poin", "user_id", $data->id, "penilai_id", $this->session->id, "tgl", date("Y-m-d"));
		if ($cek_input == null) {
			$this->log_book_m->apresiasi($id, $nilai, $kode);
			$this->session->set_flashdata('success', 'Telah diapresiasi');
			$this->log_book_m->redirect($this->session->tipe_user);
		} else {
			$this->session->set_flashdata('warning', 'Hanya bisa mengapresiasi satu kali');
			$this->log_book_m->redirect($this->session->tipe_user);
		}
	}

	function apresiasi_gold()
	{

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'apresiasi hanya boleh dilakukan oleh kepala UPT');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		$nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "gold")->row("nilai");
		$kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "gold")->row("id");

		// Cek sudah input atau belum
		$cek_input = $this->fungsi->hitung_rows_triple("tb_poin", "user_id", $data->id, "penilai_id", $this->session->id, "tgl", date("Y-m-d"));
		if ($cek_input == null) {
			$this->log_book_m->apresiasi($id, $nilai, $kode);
			$this->session->set_flashdata('success', 'Telah diapresiasi');
			$this->log_book_m->redirect($this->session->tipe_user);
		} else {
			$this->session->set_flashdata('warning', 'Hanya bisa mengapresiasi satu kali');
			$this->log_book_m->redirect($this->session->tipe_user);
		}
	}

	function apresiasi_silver()
	{

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'apresiasi hanya boleh dilakukan oleh kepala UPT');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		$nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "silver")->row("nilai");
		$kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "silver")->row("id");

		// Cek sudah input atau belum
		$cek_input = $this->fungsi->hitung_rows_triple("tb_poin", "user_id", $data->id, "penilai_id", $this->session->id, "tgl", date("Y-m-d"));
		if ($cek_input == null) {
			$this->log_book_m->apresiasi($id, $nilai, $kode);
			$this->session->set_flashdata('success', 'Telah diapresiasi');
			$this->log_book_m->redirect($this->session->tipe_user);
		} else {
			$this->session->set_flashdata('warning', 'Hanya bisa mengapresiasi satu kali');
			$this->log_book_m->redirect($this->session->tipe_user);
		}
	}

	function apresiasi_bronze()
	{

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'apresiasi hanya boleh dilakukan oleh kepala UPT');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		$nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "bronze")->row("nilai");
		$kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "bronze")->row("id");

		// Cek sudah input atau belum
		$cek_input = $this->fungsi->hitung_rows_triple("tb_poin", "user_id", $data->id, "penilai_id", $this->session->id, "tgl", date("Y-m-d"));
		if ($cek_input == null) {
			$this->log_book_m->apresiasi($id, $nilai, $kode);
			$this->session->set_flashdata('success', 'Telah diapresiasi');
			$this->log_book_m->redirect($this->session->tipe_user);
		} else {
			$this->session->set_flashdata('warning', 'Hanya bisa mengapresiasi satu kali');
			$this->log_book_m->redirect($this->session->tipe_user);
		}
	}

	function apresiasi_batal()
	{

		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'Pembatalan Apresiasi hanya boleh dilakukan oleh kepala UPT');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		$nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "log_book")->row("nilai");
		$kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian", "kode", "log_book")->row("id");

		// Cek sudah input atau belum
		$cek_input = $this->fungsi->hitung_rows_multiple("tb_poin", "user_id", $id, "tgl", date("Y-m-d"));
		if ($cek_input == null) {
			$this->session->set_flashdata('warning', 'Belum ada Apresiasi');
			$this->log_book_m->redirect($this->session->tipe_user);
		} else {
			$this->log_book_m->apresiasi_batal($id);
			$this->session->set_flashdata('success', 'Apresiasi Telah DIbatalkan');
			$this->log_book_m->redirect($this->session->tipe_user);
		}
	}

	public function tambah()
	{
		// Cek Udah Mengisi Atau Belum
		$status_log_book = $this->log_book_m->cek_status_harian($this->session->id);
		if ($status_log_book == 1) {
			$this->session->set_flashdata('warning', 'Anda Sudah Mengisi, hanya bisa mengisi satu kali');
			redirect('log_book', 'refresh');
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Log Book";
			$this->templateadmin->load('template/dashboard', 'log_book/tambah_data', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->log_book_m->simpan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Disimpan');
			}
			redirect('log_book');
		}
	}

	public function tambah_data()
	{
		// Cek Udah Mengisi Atau Belum
		// $status_log_book = $this->log_book_m->cek_status_harian($this->session->id);
		// if ($status_log_book == 1) {
		// 	$this->session->set_flashdata('warning', 'Anda Sudah Mengisi, hanya bisa mengisi satu kali');
		// 	redirect('log_book', 'refresh');
		// }

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[5]|max_length[5000]');
		// $this->form_validation->set_rules('waktu', 'waktu', 'min_length[5]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Log Book";
			$data['row'] = $this->log_book_m->get_tgl_sekarang($this->session->id);
			$this->templateadmin->load('template/dashboard', 'log_book/tambah_data', $data);
		} else {
			// $total_logbook = $this->db->where('user_id', $this->session->id, 'tgl',)->count_all_results('tb_data_peserta') + 1;
			$total = $this->db->get_where('tb_data_logbook', array('user_id' => $this->session->id,'tgl'=>date("Y-m-d")))->num_rows()+1;
			$post = $this->input->post(null, TRUE);
			$this->log_book_m->simpan_data($post,$total);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Disimpan');
			}
			redirect('log_book');
		}
	}

	public function tugas()
	{
		// Cek Udah Mengisi Atau Belum
		$id = $this->uri->segment('3');
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('des_tugas', 'Deskripsi Tugas', 'min_length[5]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->log_book_m->get_user($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Tambah Tugas";
				$this->templateadmin->load('template/dashboard', 'log_book/tugas', $data);
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$tgl = date('d-m-Y');
			$config['upload_path']          = 'assets/dist/img/foto-tugas';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['file_name']            = $id . '--' . $tgl;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				$post['gambar'] = $this->upload->data('file_name');
			} else if($this->upload->do_upload('gambar') == null)
			{
				$post['gambar'] = null;
			} else{
				$pesan = $this->upload->display_errors();
				$this->session->set_flashdata('danger', $pesan);
				redirect('log_book/tugas/' . $id);
			}

			$this->log_book_m->add_tugas($post, $id);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Disimpan');
			}
			redirect('log_book');
		}
	}

	public function edit($id)
	{
		check_right_user_edit($this->fungsi->pilihan_selected("tb_log_book", $id)->row("user_id"), $this->session->id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');
		$this->form_validation->set_rules('realisasi', 'realisasi', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->log_book_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Log Book";
				$this->templateadmin->load('template/dashboard', 'log_book/edit', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('log_book') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->log_book_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('log_book');
		}
	}

	public function edit_data($id)
	{
		check_right_user_edit($this->fungsi->pilihan_selected("tb_data_logbook", $id)->row("user_id"), $this->session->id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[5]|max_length[5000]');
		// $this->form_validation->set_rules('realisasi', 'realisasi', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->log_book_m->get_data($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Log Book";
				$this->templateadmin->load('template/dashboard', 'log_book/edit_data', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('log_book') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->log_book_m->update_data($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('log_book');
		}
	}

	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->log_book_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('log_book');
	}


	// New function pemberian tugass dari pimpinan
	public function tugas_pimpinan()
	{
		$post = $this->input->post(null, TRUE);
		$id_user = $this->uri->segment('3');
		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} else {
			$id = $this->session->id;
		}

		$data['menu'] = "Catatan Pemberian Tugas";
		if ($post == null) {
			$data['row'] = $this->log_book_m->get_bulantugas_sekarang($id, $id_user);
		} else {
			$data['row'] = $this->log_book_m->get_spesifiktugas($id, $id_user, $post['tahun'], $post['bulan']);
		}
		$data['id_user'] = $id_user;
		// $data['row_user'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan","user_id",$this->session->id)->row("id") );
		$data['tugas'] = $query = $this->log_book_m->get_tugas($id);
		$data['status_tugas'] = $this->log_book_m->cek_statustugas_harian($id, $id_user);
		$this->templateadmin->load('template/dashboard', 'log_book/log_book_data_tugas', $data);
	}


	public function edit_tugas($id)
	{
		// check_right_user_edit($this->fungsi->pilihan_selected("tb_tugas",$id)->row("user_id"),$this->session->id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('des_tugas', 'Deskripsi Tugas', 'min_length[5]|max_length[5000]');
		$this->form_validation->set_rules('realisasi', 'realisasi', 'min_length[5]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->log_book_m->get_tugas($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Tugas";
				$this->templateadmin->load('template/dashboard', 'log_book/edit_tugas', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('log_book') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$tgl = $tgl = date('d-m-Y');
			$query = $this->log_book_m->get_tugas($id);
			//CEK GAMBAR
			$config['upload_path']          = 'assets/dist/img/foto-tugas/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['file_name']            = $query->row('user_id') . '--' . $tgl;

			$this->load->library('upload', $config);
			if (@$_FILES['gambar']['name'] != null) {
				if ($this->upload->do_upload('gambar')) {
					$itemfoto = $this->log_book_m->get_tugas($post['id'])->row();
					if ($itemfoto->gambar != null) {
						$target_file = 'assets/dist/img/foto-tugas/' . $itemfoto->gambar;
						unlink($target_file);
					}

					$post['gambar'] = $this->upload->data('file_name');
				} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger', $pesan);
					redirect('log_book/edit_tugas/' . $id);
				}
			}

			$this->log_book_m->update_tugas($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Di Edit');
			}
			redirect('log_book');
		}
	}

	function hapusgambar()
	{
		//Mencegah user yang bukan haknya
		// check_right_user($this->session->id,$this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('log_book_m');
		$itemfoto = $this->log_book_m->get_tugas($id)->row();
		if ($itemfoto->gambar != null) {
			$target_file = 'assets/dist/img/foto-tugas/' . $itemfoto->gambar;
			unlink($target_file);
		}
		$params['gambar'] = null;
		$this->db->where('id', $id);
		$this->db->update('tb_tugas', $params);
		redirect('log_book/edit_tugas/' . $id);
	}
}
