<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->load->view("template/message/agenda_terbaru", $row); ?>
		<?php $this->load->view("template/message/ultah_hariini", $ultah); ?>
		<?php $this->load->view("template/message/perizinan_hariini", $perizinan); ?>
		<?php $this->load->view("template/message/podcast_hariini", $podcast); ?>
		<?php if ($haripenting->num_rows() != null) { ?>
		<?php $this->load->view("template/message/haripenting", $haripenting); ?>
		<?php } ?>
		<div class="row">
			<!-- Menu-->
			<div class="col-lg-4 col-4">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('profil') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/profil.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('profil') ?>" class="btn btn-success d-block">
						<i class="fas fa-user"></i><span>Profil</span>
					</a>
				</div>
			</div>
			<!-- Menu-->
			<div class="col-lg-4 col-4">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('log_book') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/log_book.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('log_book') ?>" class="btn btn-success d-block">
						<i class="fas fa-book-reader"></i> <span>Log Book</span>
					</a>
				</div>
			</div>
			<!-- Menu-->
			<div class="col-lg-4 col-4">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('notulensi') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/notulensi.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('notulensi') ?>" class="btn btn-success d-block">
						<i class="fas fa-file-alt"></i> <span>Notulensi</span>
					</a>
				</div>
			</div>					
			
			<?php if ($this->session->tipe_user == '4') { ?>
				<!-- Menu-->
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('podcast') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/podcast.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('podcast') ?>" class="small-box-footer">
							Podcast
						</a>
					</div>
				</div>
				<!-- Menu-->
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('perizinan') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/perizinan.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('perizinan') ?>" class="small-box-footer">
							Perizinan
						</a>
					</div>
				</div>	
				<!-- Menu-->
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('page/clouddoc') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/cloudoc.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('page/clouddoc') ?>" class="small-box-footer">
							Cloud Doc
						</a>
					</div>
				</div>			
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('agenda') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/agenda.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('agenda') ?>" class="small-box-footer">
							Agenda
						</a>
					</div>
				</div>
				<!-- Menu-->
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('page/tentang') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/tentang.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('page/tentang') ?>" class="small-box-footer">
							Tentang
						</a>
					</div>
				</div>
			<?php } ?>
			<!-- Menu-->
			<!-- <?php if ($this->fungsi->hitung_rows("akses_link", "user_id", $this->session->id) != null or $this->session->tipe_user == '4')  ?> -->
				<?php if ($this->session->tipe_user == '4') { ?>
				<div class="col-lg-2 col-4">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('link') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/link.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('link') ?>" class="small-box-footer">
							Link
						</a>
					</div>
				</div>
			<?php } ?>
			
		</div>
		<!-- /.row -->
	</div>
</section>
<!-- /.content
