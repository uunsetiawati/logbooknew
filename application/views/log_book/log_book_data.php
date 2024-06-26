<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="col-12">
				<div class="card-header">
					<a href="<?= base_url(""); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
				</div>
				<?php $this->load->view("template/message/status_log_book"); ?>
				<div class="info-box">
					<span class="info-box-icon bg-info"><i class="fas fa-book"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Logbook</span>
						<span class="info-box-number"><?= $this->fungsi->hitung_rows_multiple("tb_data_logbook", "user_id", $this->session->id, "no", 1) ?></span>
					</div>
					<span class="info-box-icon bg-info"><i class="far fa-gem"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">UPT Poin</span>
						<span class="info-box-number"><?=$this->fungsi->hitung_nilai("tb_poin", "nilai", "user_id", $this->session->id) ?></span>
					</div>
				</div>
				<form action="<?= base_url("log_book/filter_data/") ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?= $this->session->id ?>">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-calendar"></i></span>
						</div>
						<select name="bulan" class="form-control form-control-sm" required>
							<option value="">Bulan :</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						<select name="tahun" class="form-control form-control-sm" required>
							<option value="">Tahun</option>
							<?php $thn_skr = date('Y');
							for ($x = $thn_skr; $x >= 2018; $x--) { ?>
								<option value="<?php echo $x ?>"><?php echo $x ?></option>
							<?php } ?>
						</select>
						<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Filter</button>
					</div>
					<div class="input-group-append">
					</div>
				</form>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="list">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="10%">Tanggal</th>
										<th width="30%">Deskripsi Pekerjaan</th>
										<th width="10%">Waktu</th>
										<th width="10%">Realisasi</th>
										<th width="30%">Alasan</th>
										<th width="30%">Bukti</th>
										<th width="10%">#</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($row->result() as $key => $data) {;
									?>
										<tr>
											<td scope="row">
												<p><?= $no++ ?></p>
											</td>
											<td scope="row">
												<p><?= date("d - m - Y", strtotime($data->tgl)) ?></p>
											</td>
											<td scope="row">
												<p><?= $data->pekerjaan ?></p>
											</td>
											<td scope="row">
												<p><?= $data->waktu ?></p>
											</td>
											<td scope="row">
												<p><?= $data->realisasi ?></p>
											</td>
											<td scope="row">
												<p><?= $data->alasan ?></p>
											</td>
											<td scope="row">
												<p><?= $data->bukti ?></p>
											</td>
											<td>
												<a id="btn-edit-<?=$data->id?>" href="<?= site_url('log_book/edit_data/' . $data->id); ?>" class="btn btn-info btn-sm" onclick="return checkEditTime(<?= $data->id ?>)"><i class="fas fa-edit"></i></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

<script>
    // Fungsi untuk memeriksa waktu dan mengaktifkan tombol edit pada jam 3 sore
    function checkTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();

        // Periksa apakah waktu saat ini adalah jam 3 sore atau setelahnya
        if (hours >= 15) { // Jam 3 sore atau setelahnya
            // Aktifkan tombol edit
            // document.getElementById('btn-edit').classList.remove('disabled');
			// Aktifkan tombol edit untuk setiap ID tombol edit
            <?php foreach ($row->result() as $key => $data) { ?>
                document.getElementById('btn-edit-<?= $data->id ?>').classList.remove('disabled');
            <?php } ?>
        } else {
            // Nonaktifkan tombol edit
            // document.getElementById('btn-edit').classList.add('disabled');
			// Nonaktifkan tombol edit untuk setiap ID tombol edit
            <?php foreach ($row->result() as $key => $data) { ?>
                document.getElementById('btn-edit-<?= $data->id ?>').classList.add('disabled');
            <?php } ?>
        }
    }

	function checkEditTime(id) {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();

        // Periksa apakah waktu saat ini adalah jam 3 sore atau setelahnya
        if (hours < 14) { // Jam 3 sore atau setelahnya
            // return confirm('Apakah Anda yakin ingin mengedit data ini?');
			alert('Baru Bisa di Edit pada Pukul 14.00 WIB');
            return false;
        // } else {
        //     alert('Baru Bisa di Edit pada Pukul 15.00 WIB');
        //     return false;
        }
    }

    // Panggil fungsi checkTime saat halaman dimuat
    // document.addEventListener('DOMContentLoaded', function() {
    //     checkTime(); // Panggil fungsi untuk memeriksa waktu saat halaman dimuat
    // });
</script>
