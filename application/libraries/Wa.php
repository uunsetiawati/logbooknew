<?php

class WA
{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function waWhatspie($hp = null, $pesan = null)
	{
		//API dari Whatpie
		$url   = 'https://app.whatspie.com/api/messages'; // URL API
		$device = '6281234381239'; // No.HP yang dikirim (No.HP Penerima)
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$data_post = [
			'device' => $device,
			'receiver'   => $no_hp,
			'message'   => $pesan,
			'type'   => 'chat'
		];

		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: Bearer MME5lzf8xzQRm1f9OxrSHcCvOe4uC2X2iUAC6Ai9xMW9p5rm5r',
		);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		echo $response;

		curl_close($curl);

		$data = json_decode($response);
		if ($data->kode == 200) {
			// $this->ci->session->set_flashdata('success', 'Pesan Terkirim');
		} else {
			// $this->ci->session->set_flashdata('warning', $data->message);
		}
	}

	function waWhacenter($hp = null, $pesan = null)
	{
		//API dari Whacenter
		$device_id = 'f75a80b9d2b38921c6134f029d3e8c71'; // Token dari Whacenter
		$no_hp = $hp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://app.whacenter.com/api/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('device_id' => $device_id, 'number' => $no_hp, 'message' => $pesan),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;

		$data = json_decode($response);
		if ($data->kode == 200) {
			// $this->ci->session->set_flashdata('success', 'Pesan Terkirim');
		} else {
			// $this->ci->session->set_flashdata('warning', $data->message);
		}
	}
}
