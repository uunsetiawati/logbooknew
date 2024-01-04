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
									<th width="25%">Tgl</th>
									<th width="35%">Nama</th>
									<th width="5%">#</th>
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
										<td><?= date("d-m-Y", strtotime($data->tgl)) ?> <br> <?= $data->sesi ?></td>
										<td>
											<?= $data->nama ?> <br> <small><?= $data->asal ?></small><br>
											<a href="https://wa.me/+62<?=$data->hp?>"><?= $data->hp ?></a>
										</td>
										<td>
												<a href="<?= site_url('podcast/hapus/'.$data->id); ?>" onclick="alert('Yakin mau dihapus ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
