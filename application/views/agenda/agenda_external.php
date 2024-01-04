<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="col-12">
				<div class="card-header">
					<a href="<?= base_url("shopee"); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="publicTable">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="25%">Tgl</th>
										<th width="60%">Nama</th>
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
											<td>
												<small class="badge badge-warning"><?= $data->acara ?></small> <?= date("d- m-Y", strtotime($data->tgl)) ?><br>
												<i class="fas fa-clock"></i> <?= $data->waktu_mulai ?> s.d. <?= $data->waktu_selesai ?><br>
											</td>
											<td>
												<font size="5px"><?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>" ?></font><br>
												<i class="fas fa-user"></i> <b><?= $data->pimpinan ?></b>
											</td>
											<td>
											<a href="<?= base_url("shopee/edit/".$data->id)?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
            		  						<a href="<?= base_url("shopee/hapus/".$data->id)?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>
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
<!-- /.content --
