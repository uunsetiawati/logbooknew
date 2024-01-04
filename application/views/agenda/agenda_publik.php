<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- /.col -->
			<div class="col-md-12 col-sm-12 col-12">
				<!-- Info Box -->
				<!-- <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Terima Kasih Kepada </span>
            <span class="info-box-number"><?= $this->fungsi->countValue("tb_agenda", "total_peserta"); ?> peserta dari <?= $this->fungsi->pilihan_advanced("tb_agenda", "tgl <=", date("Y-m-d"))->num_rows(); ?> agenda</span>
            <span class="info-box-text"><?= $this->fungsi->pilihan_advanced("tb_agenda", "tgl >", date("Y-m-d"))->num_rows(); ?> mendatang | <?= $this->fungsi->pilihan("tb_agenda")->num_rows(); ?> terlaksana</span>
          </div>
        </div> -->
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php $this->load->view("template/message/ultah_hariini", $ultah); ?>
				<?php 
					if ($haripenting->num_rows() != null) {
						$this->load->view("template/message/haripenting", $haripenting);
					}
				?>
				<div class="callout callout-info">
					<div class="table-responsive">
						<?php if ($jumlah <= 2) {
						} else { ?>
							<marquee width="100%" direction="up" height="300px" scrollamount="2">
							<?php } ?>
							<table class="table table-bordered" id="publicTable">
								<?php if ($jumlah >= 2) {
								} else { ?>
									<thead>
										<tr>
											<!-- <th width="5%">No</th> -->
											<th width="95%">Acara</th>
										</tr>
									</thead>
								<?php } ?>
								<tbody>
									<?php
									$no = 1;
									foreach ($row->result() as $key => $data) {;
									?>
										<tr bgcolor="#08e6b3">
											<!-- <td scope="row">
												<p><?= $no++ ?></p>
											</td> -->
											<td scope="row">
												<p>
													<small class="badge badge-warning"><?= $data->acara ?></small> <?= date("d- m-Y", strtotime($data->tgl)) ?><br>
													<i class="fas fa-clock"></i> <?= $data->waktu_mulai ?> s.d. <?= $data->waktu_selesai ?><br>
													<font size="5px"><?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>" ?></font><br>
													<i class="fas fa-user"></i> <b><?= $data->pimpinan ?></b>
												</p>
												<p></p>
											</td>
										</tr>
									<?php } ?>
									<?php
									$no = 1;
									foreach ($podcast->result() as $key => $data) {;
									?>
										<tr bgcolor="#08e6b3">
											<!-- <td scope="row">
												<p><?= $no++ ?></p>
											</td> -->
											<td scope="row">
												<p>
													<small class="badge badge-info">Bincang Jawara</small><br>
													<font size="5px">Podcast <?= $data->nama ?> - </i> <?= $data->asal ?></font><br>
													<i class="fas fa-clock"></i> <?= date("d- m-Y", strtotime($data->tgl)) ?> || <?= $data->sesi ?><br>
												</p>
												<p></p>
											</td>
										</tr>
									<?php } ?>
									<?php
									$no = 1;
									foreach ($perizinan->result() as $key => $data) {;
									?>
										<tr  bgcolor="#08e6b3">
											<!-- <td scope="row">
												<p><?= $no++ ?></p>
											</td> -->
											<td scope="row">
												<p>
													<small class="badge badge-secondary"><?= $data->tipe?></small><br>
													<font size="5px"><?= $data->tipe ?> <?= $data->nama ?> - </i> <?= $data->asal ?></font><br>
													<i class="fas fa-clock"></i> <?= date("d- m-Y", strtotime($data->tgl)) ?> || <?= $data->sesi ?><br>
												</p>
												<p></p>
											</td>
										</tr>
									<?php } ?>
									<?php
									$no = 1;
									foreach ($agenda_external->result() as $key => $data) {;
									?>
										<tr class="bg-orange">
											<!-- <td scope="row">
												<p><?= $no++ ?></p>
											</td> -->
											<td scope="row">
											<p>
													<small class="badge badge-secondary"><?= $data->acara ?> | <?= $data->pembuat ?></small> <?= date("d- m-Y", strtotime($data->tgl)) ?><br>
													<i class="fas fa-clock"></i> <?= $data->waktu_mulai ?> s.d. <?= $data->waktu_selesai ?><br>
													<font size="5px"><?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>" ?></font><br>
													<i class="fas fa-user"></i> <b><?= $data->pimpinan ?></b>
												</p>
												<p></p>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							</marquee>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
