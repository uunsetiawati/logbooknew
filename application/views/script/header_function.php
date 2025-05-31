<?php
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3);

    if ($url_1 == "log_book" and $url_2 == null or $url_2 == "filter") {
      $this->load->view("script/datatables-header");
    } elseif ($url_1 == "log_book" and $url_2 == "kepala" or $url_1 == "log_book" and $url_2 == "pimpinan" or $url_1 == "log_book" and $url_2 == "detail") {
      $this->load->view("script/datatables-header");
    } elseif ($url_1 == "log_book" and $url_2 == "tugas_pimpinan") {
      $this->load->view("script/datatables-header");
    } elseif ($url_1 == "lihat_tugas" and $url_2 == "lihat") {
      $this->load->view("script/datatables-header");
    } elseif ($this->uri->segment(1) == "notulensi" and $this->uri->segment(2) == null) {
      $this->load->view("script/datatables-header");
    } elseif ($url_1 == "notulensi" and $url_2 == "tambah" or $url_1 == "notulensi" and $url_2 == "edit") {
      $this->load->view("script/summernote-header");
    } elseif ($url_1 == "log_book" and $url_2 == "tambah" or $url_1 == "log_book" and $url_2 == "edit" or $url_1 == "log_book" and $url_2 == "tugas" or $url_1 == "log_book" and $url_2 == "edit_tugas") {
      $this->load->view("script/summernote-header");
    } elseif ($this->uri->segment(1) == "link" and $this->uri->segment(2) == null) {
      $this->load->view("script/datatables-header");
    } elseif ($this->uri->segment(1) == "aset" and $this->uri->segment(2) == null) {
      $this->load->view("script/datatables-header");
    } elseif ($this->uri->segment(1) == "agenda" and $this->uri->segment(2) == null) {
      $this->load->view("script/datatables-header");
    } elseif ($this->uri->segment(1) == "publik" and $this->uri->segment(2) == "agenda") {
      $this->load->view("script/datatables-header");
    } elseif ($url_1 == "best_employee") {
      $this->load->view("script/datatables-header");
    } elseif ($this->uri->segment(1) == "logbook" and $this->uri->segment(2) == "tambah_data" or $url_1 == "logbook" and $url_2 == "edit_data") {
      $this->load->view("script/datatables-header");
    }
  ?>