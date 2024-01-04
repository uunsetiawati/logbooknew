<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notify extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("wa");
    }

    function index()
    {
        redirect("");
    }

    public function agenda()
    {
        $this->load->model("agenda_m");

        $data = $this->agenda_m->getThisDay();

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("081231390340", "Ada " . $data->num_rows() . " Agenda hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA AGENDA HARI INI BRO*");
            redirect();
        }
    }

    public function ultah()
    {
        $this->load->model("ultah_m");

        $data = $this->ultah_m->getThisDay();

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("081231390340", "Ada " . $data->num_rows() . " Ulang Tahun hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA Ulang Tahun HARI INI BRO*");
            redirect();
        }
    }

    public function ultahbulanan()
    {
        $this->load->model("ultah_m");

        $data = $this->ultah_m->getThisMounth();

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("081231390340", "Ada " . $data->num_rows() . " Ulang Tahun Bulan ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA Ulang Tahun BULAN INI BRO*");
            redirect();
        }
    }

    public function podcast()
    {
        $this->load->model("podcast_m");

        $data = $this->podcast_m->getThisDay();

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("081231390340", "Ada " . $data->num_rows() . " Podcast hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
            $this->wa->waWhacenter("083849319535", "Mas Aan,\n\nAda " . $data->num_rows() . " Podcast hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
            $this->wa->waWhacenter("081232757574", "Mas Rois,\n\nAda " . $data->num_rows() . " Podcast hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA PODCAST HARI INI*");
            $this->wa->waWhacenter("083849319535", "*TIDAK ADA PODCAST HARI INI*");
            redirect();
        }
    }

    public function perizinan()
    {
        $this->load->model("perizinan_m");

        $data = $this->perizinan_m->getThisDay();
        // test($data->num_rows());

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("085235142348", "Ada " . $data->num_rows() . " Perizinan hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
            $this->wa->waWhacenter("081231390340", "Ada " . $data->num_rows() . " Perizinan hari ini. Langsung di cek ya.\n\nhttps://logbook.uptkukm.id/");
            // $this->wa->waWhacenter("081231390340","Ada Perizinan hari ini. Langsung di cek ya.");
        } else {
            $this->wa->waWhacenter("085235142348", "*TIDAK ADA PERIZINAN HARI INI*");
            redirect();
        }
    }

    public function waUltahPersonal()
    {
        $this->load->model("ultah_m");

        $data = $this->ultah_m->getThisDay();

        // test($data->num_rows());
        $agenda = "";
        foreach ($data->result() as $key => $x) {
            $agenda = $agenda . "\n" . $x->judul;
        }
        $kalimat = "*Hari Penting Tanggal " . date("d-m-Y") . "*\n" . $agenda . "\n\nSelamat Bekerja Pejuang!!!";
        // test($kalimat);

        if ($data->num_rows() != null) {
            foreach ($data->result() as $key => $x) {
                $kalimat = "*Selamat Ulang Tahun*\n" . $agenda . "\n\nSelamat Bekerja Pejuang!!!";
                $agenda = $agenda . "\n" . $x->judul;
                $this->wa->waWhacenter($x->hp, "$kalimat");
            }
            // $this->wa->waWhacenter("081231390340","Ada haripenting hari ini. Langsung di cek ya.");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA PENTING HARI INI*");
            redirect();
        }
    }

    public function haripenting()
    {
        $this->load->model("haripenting_m");

        $data = $this->haripenting_m->getThisDay();
        // test($data->num_rows());
        $agenda = "";
        foreach ($data->result() as $key => $x) {
            $agenda = $agenda . "\n" . $x->judul;
        }
        $kalimat = "*Hari Penting Tanggal " . date("d-m-Y") . "*\n" . $agenda . "\n\nSelamat Bekerja Pejuang!!!";
        // test($kalimat);

        if ($data->num_rows() != null) {
            $this->wa->waWhacenter("081231390340", $kalimat);
            // $this->wa->waWhacenter("081231390340","Ada haripenting hari ini. Langsung di cek ya.");
        } else {
            $this->wa->waWhacenter("081231390340", "*TIDAK ADA PENTING HARI INI*");
            redirect();
        }
    }

    function reportWebsite()
    {
        $listWebsite = array("v3.malangtimes.com","wtw.jatimtimes.com","risetcdn.jatimtimes.com","bikinkarya.com", "jatimtimes.com", "malangtimes.com","tp.uptkukm.id","giriprapancaloka.or.id","ispijatim.org","api.or.id","uptkukm.id","fitrah.sch.id","galeri.bikinkarya.com","pustakaguru.id","captwapri.id","kelas.pustakaguru.id");
        $pesan = null;
        foreach ($listWebsite as $value) {
            if ($socket = @fsockopen($value, 80, $errno, $errstr, 30)) {
                $pesan = $pesan . $value . ' is online!' . "\n";
                fclose($socket);
            } else {
                $pesan = $pesan . '*' . $value . '*' . ' OFFLINE' . "\n";
            }            
        }
        $kalimat = "[MONITORING WEBSITE PER JAM ".date("H:i:s d-m-Y")."]\n\n\n" . $pesan;
        // echo $kalimat;
        $this->wa->waWhacenter("081231390340", $kalimat);
    }
}
