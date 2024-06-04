<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('log_book');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <?php $this->view('message') ?>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
        <div class="card-body">
            <div class="form-group">
              <label>Deskripsi Pekerjaan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: Membuat Rancangan Sitem Validasi Peserta" value="<?= set_value('deskripsi');?>" required>
              </div>                            
              <?php echo form_error('deskripsi')?>                        
            </div>
            <div class="form-group">
              <label>Waktu Penyelesaian</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="waktu" placeholder="Ex: Tiga Hari" value="<?= set_value('waktu');?>" required>
              </div>                                         
            </div>

            <!-- <div class="form-group">
              <label>Realisasi</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="tgl" palceholder="Ex: Tiga Hari" value="<?= set_value('tgl');?>" required>
              </div>                            
              <?php echo form_error('tgl')?>                        
            </div> -->
            
            <!-- <div class="form-group">
              <label>Alasan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div> -->
                <!-- <input type="text" class="form-control" name="waktu" placeholder="Ex: 13:00 s.d. Selesai" value="<?= set_value('waktu');?>" required> -->
                <!-- <textarea class="form-control" rows="3" name="realisasi" id="summernote" required style="width: 100%"><?php echo form_error('waktu')?></textarea>
              </div>                            
              <?php echo form_error('waktu')?>                        
            </div> -->
            <!-- <div class="form-group">
              <label>Tempat</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-building"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="tempat" placeholder="Ex: R. KA UPT" value="<?= set_value('tempat');?>" required>
              </div>                            
              <?php echo form_error('tempat')?>                        
            </div>
            <div class="form-group">
              <label>Undangan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="undangan" placeholder="Ex: Fitrah, UUN, Udhif, dll" value="<?= set_value('undangan');?>" required>
              </div>                            
              <?php echo form_error('undangan')?>                        
            </div>
            <div class="form-group">
              <label>Pimpinan Rapat</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="pimpinan" placeholder="Ex: Pengumuman Bagi Petani" value="<?= set_value('pimpinan');?>" required>
              </div>                            
              <?php echo form_error('pimpinan')?>                        
            </div> -->

            <!-- <div class="form-group">
              <label>Pembahasan</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="pembahasan" id="summernote" required style="width: 100%"><?php echo form_error('pembahasan')?></textarea>                
            </div> -->
            <!-- <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div> -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
                      
          </div>
        <?= form_close() ?>
        </div>
      <!-- /.card -->

        <!-- tabel -->
        <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="list">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="30%">Deskripsi</th>
										<th width="20%">Waktu</th>
                    <th width="20%">Realisasi</th>
                    <th width="30%">Alasan</th>
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
												<p><?=$data->no?></p>
											</td>
											<td scope="row">
												<!-- <p><?= date("d - m - Y", strtotime($data->tgl)) ?> -->
                        <p><?=$data->pekerjaan?></p>
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
                      <td>
												<!-- <a id="btn-edit" href="<?= site_url('log_book/edit_data/' . $data->id); ?>" class="btn btn-info btn-sm" disabled><i class="fas fa-edit"></i></a> -->
                        <a id="btn-edit-<?= $data->id ?>" href="<?= site_url('log_book/edit_data/' . $data->id); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
											</td>
										</tr>
                    <?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
        <!-- end tabel -->

          
      
    </div>
    </div>
  </div>
</section>

<script>
    // Fungsi untuk memeriksa waktu dan mengaktifkan tombol edit pada jam 3 sore
    function checkTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();

        // Periksa apakah waktu saat ini adalah jam 3 sore atau setelahnya
        if (hours >= 14) { // Jam 3 sore atau setelahnya
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

    // Panggil fungsi checkTime saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        checkTime(); // Panggil fungsi untuk memeriksa waktu saat halaman dimuat
    });
</script>

