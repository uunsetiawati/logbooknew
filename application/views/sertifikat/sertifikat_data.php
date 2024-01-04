<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="col-12">
				<div class="card-header">
					<a href="<?= base_url(""); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="publicTable">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="25%">Kode</th>
										<th width="35%">Nama</th>
										<th width="10%">Action</th>
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
											<td><?= $data->kode ?></td>
											<td>
												<?= $data->nama ?>
											</td>
											<td>
												<a href="https://logbook.uptkukm.id/printsertifikat/seminar/<?= $data->id ?>" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>
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