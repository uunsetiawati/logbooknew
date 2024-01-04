<?php
require_once 'vendor/autoload.php';
// Extend the TCPDF class to create custom Header and Footer
// class MYPDF extends TCPDF {
// 	//Page header
// 	public function Header() {
// 		// get the current page break margin
// 		$bMargin = $this->getBreakMargin();
// 		// get current auto-page-break mode
// 		$auto_page_break = $this->AutoPageBreak;
// 		// disable auto-page-break
// 		$this->SetAutoPageBreak(false, 0);
// 		$img_file = FCPATH.'assets/dist/files/sertifikat/semnasharkop755.jpg';
// 		$this->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
// 		// set bacground image
// 		// $img_file = K_PATH_IMAGES.'image_demo.jpg';
// 		// $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// 		// restore auto-page-break status
// 		$this->SetAutoPageBreak($auto_page_break, $bMargin);
// 		// set the starting point for the page content
// 		$this->setPageMark();
// 	}
// }

class Cetak
{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function formLuring($konten, $filename, $data)
	{
		require_once 'vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf(
			[
				'mode' => 'utf-8',
				'format' => 'A4',
				'orientation' => 'P',
				'margin_left' => 20,
				'margin_right' => 10,
				'margin_top' => 10,
				'margin_bottom' => 10,
				'default_font_size' => 12,
				'default_font' => 'calibri'
			]
		);

		$content = $this->ci->load->view($konten, $data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename . ".pdf", "I");
	}

	function sertifikat($konten, $filename, $data)
	{
		require_once 'vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf(
			[
				'mode' => 'utf-8',
				'format' => [317.5, 564.4],
				'orientation' => 'L',
				'margin_left' => 45,
				'margin_right' => 10,
				'margin_top' => 110,
				'margin_bottom' => 10,
				'default_font_size' => 12,
				'default_font' => 'calibri'
			]
		);

		$content = $this->ci->load->view($konten, $data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename . ".pdf", "I");
	}

	function exportToExcel($konten, $filename, $data)
	{
		$content = $this->ci->load->view($konten, $data, true);
		// test($content);
		header("Content-Type: application/vnd.ms-excel");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		header("Content-disposition: attachment; filename=\"" . $filename . ".xls\"");
		echo $content;
	}

	function signed($konten, $filename, $data)
	{
		require_once 'vendor/autoload.php';
		
		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->setCreator('Fitrah Izul Falaq');
		$pdf->setAuthor('UPT Pelatihan Koperasi dan UKM Provinsi Jawa Timur');
		$pdf->setTitle('Sertifikat');
		$pdf->setSubject('E-Sertifikat');
		$pdf->setKeywords('this Project Develop by Fitrah Izul Falaq');

		// set default monospaced font
		$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(25, 0, 0);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);
		$pdf->SetAutoPageBreak(TRUE, 0);

		// remove default footer
		$pdf->setPrintFooter(false);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// Certificate
		$certificate = 'file://' . FCPATH . '/assets/certs/upt.crt';
		// $certificate2 = 'file://' . FCPATH . '/vendor/tecnickcom/tcpdf/examples/data/cert/fitrah.crt';
		
		// set additional information
		$info = array(
			'Name' => 'UPT KUKM JATIM',
			'Location' => 'UPT Pelatihan Koperasi dan UKM Provinsi Jawa Timur',
			'Reason' => $filename.' === Certified System by Fitrah Izul Falaq',
			'ContactInfo' => 'http://uptkukm.id',
		);
		
		// set document signature
		$pdf->setSignature($certificate, $certificate, $filename.' === Certified System by Fitrah Izul Falaq', '', 1, $info);
		// set font. 'helvetica' MUST be used to avoid a PHP notice from PHP 7.4+
		$pdf->setFont('helvetica', '', 12);
		// add a page
		
		$pdf->AddPage('L');

		$content = $this->ci->load->view($konten, $data, true);
		// print a line of text
		$pdf->writeHTML($content, true, 0, true, 0);

		// create content for signature (image and/or text)
		$pdf->Image(FCPATH . 'vendor/tecnickcom/tcpdf/examples/images/tcpdf_signature.png', 200, 120, 30, 30, 'PNG');
		// define active area for signature appearance
		$pdf->setSignatureAppearance(180, 60, 15, 15);

		// *** set an empty signature appearance ***
		$pdf->addEmptySignatureAppearance(180, 80, 15, 15);

		//Close and output PDF document
		$pdf->Output($filename.".pdf", 'I');
	}
}
