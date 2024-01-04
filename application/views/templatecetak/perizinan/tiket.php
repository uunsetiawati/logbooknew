<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>PENDAFTARAN PERIZINAN - <?= $row->nama ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="background-image: url(assets/dist/files/userCertificate.png); background-repeat: no-repeat; background-attachment: fixed; height: 100%; background-position: center; background-size: cover;">
	<!-- #######  YAY, I AM THE SOURCE EDITOR! #########-->
	<h1 style="color: #5e9ca0;">E-TIKET</h1>
	<h2 style="color: #2e6c80;">LAYANAN PERIZINAN UPT PELATIHAN DINAS KOPERASI DAN UKM PROVINSI JAWA TIMUR</h2>
	<p>Tanggal : <?= date("d-m-Y", strtotime($row->tgl)) ?> | <?= $row->sesi ?></p>
	<p>Keperluan : <?= $row->tipe ?></p>
	<br>
	<br>
	<h2 style="color: #2e6c80;">Informasi Pemohon</h2>
	<table class="editorDemoTable" style="width: 554px;">
		<thead>
			<tr>
				<td style="width: 232.65px;">Nama</td>
				<td style="width: 306.55px;"><?= $row->nama ?></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 232.65px;">HP</td>
				<td style="width: 306.55px;"><?= $row->hp ?></td>
			</tr>
			<tr>
				<td style="width: 232.65px;">Teknis</td>
				<td style="width: 306.55px;"><?= $row->teknis ?></td>
			</tr>
			<tr>
				<td style="width: 232.65px;">Asal</td>
				<td style="width: 306.55px;"><?= $row->asal ?></td>
			</tr>
		</tbody>
	</table>
	<p><strong>&nbsp;</strong></p>
	<p><strong>SIMPAN DAN BAWA E-TICKET INI SAAT PELAYANAN<br /></strong></p>
	<p><strong>BAWA KTP DAN NPWP (JIKA ADA)<br /></strong></p>
	<p><strong>HUBUNGI ADMIN JIKA ADA KENDALA : 081331220006<br /></strong></p>
	<p><strong>KODE : <?= $row->kode ?></strong></p>
	<p>Dicetak pada <?= date("d-m-Y") ?></p>
</body>

</html>
