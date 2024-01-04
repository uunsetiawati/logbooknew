<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">

		</div>
	</div>
</section>
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
