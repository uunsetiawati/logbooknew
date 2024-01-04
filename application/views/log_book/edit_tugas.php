<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('log_book');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
        <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Deskripsi Tugas</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="5" col="5" name="des_tugas" id="summernote3" required minlength="100"><?= $this->input->post('des_tugas') ?? $row->des_tugas ?></textarea>
                <?php echo form_error('des_tugas')?>                
              </div>                                                                  
            </div>

            <?php if($row->gambar != null) {?>
            <div>
              <img src="<?=base_url('assets/dist/img/foto-tugas/'.$row->gambar)?>" style="width: 50%"><br>
              <input type="hidden" name="gambar" value="<?= $this->input->post('gambar') ?? $row->gambar; ?>">
              <a href="<?= site_url('log_book/hapusgambar/'.$row->id);?>"><small>Hapus gambar?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="gambar">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>
                                    
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
