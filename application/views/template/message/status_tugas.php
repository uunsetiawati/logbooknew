<?php if ($status_tugas == "1") { ?>
	<div class="alert alert-success alert-dismissible">
	  Anda Telah Memberikan Tugas Hari ini    
	</div>
<?php } else { ?>
	<div class="alert alert-danger alert-dismissible">
	  Anda Belum Memberi Tugas Hari ini
	  <a href="<?=site_url('log_book/tugas/'.$id_user);?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Beri Tugas</a>      
	</div>
<?php } ?>