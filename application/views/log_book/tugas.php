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
          <h3 class="card-title"><?="Beri Tugas Kepada "?><?=$row->nama?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Deskripsi Tugas</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="5" col="5" name="des_tugas" id="summernote3" required minlength="100"></textarea>
                <?php echo form_error('des_tugas')?>                
              </div>                                                                  
            </div>
                           
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="gambar">
              <small>Maksimal ukuran file 1 Mb</small>
              <br>                     
            </div> 

            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
