<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">

		</div>
	</div>
</section>
<?php $this->view('message') ?>

<form action="<?= base_url("publik/cekjadwalperizinan/") ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	<div class="card-body">
		<div class="form-group">
			<label>Masukkan Nomor HP yang didaftarkan</label>
			<div class="input-group mb-3">
				<input type="number" name="hp" class="form-control" placeholder="Ex: 081231390340" minlength="11" maxlength="13" required>
			</div>
		</div>
		<!-- <div class="form-group">
      <label>Tanggal</label>
      <div class="input-group mb-3">
        <input type="date" name="tgl" id="tgl" class="form-control" required>
      </div>
    </div>  -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<button type="submit" class="btn btn-success" id="daftar-btn"><i class="fas fa-eye"></i> Cari</button>
	</div>

	<div id="pageloader" class="text-center">
		<img src="<?= base_url() ?>/assets/dist/img/loader-large.gif" alt="processing..." />
	</div>
</form>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="publicTable">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="20%">Tgl</th>
									<th width="20%">Nama</th>
									<th width="20%">Asal</th>
									<th width="20%">Teknis</th>
									<th width="20%">Keperluan</th>
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
										<td><?= date("d-m-Y", strtotime($data->tgl)) ?> | <?= $data->sesi ?></td>
										<td><?= $data->nama ?></td>
										<td><?= $data->asal ?></td>
										<td><?= $data->teknis ?></td>
										<td><?= $data->tipe ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
