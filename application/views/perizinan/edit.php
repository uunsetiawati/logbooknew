<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('perizinan');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama" placeholder="Ex: upt-data" value="<?= $this->input->post('nama') ?? $row->nama ?>" readonly>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>    
            <div class="form-group">
              <label>Hp</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="hp" placeholder="Ex: upt-data" value="<?= $this->input->post('hp') ?? $row->hp ?>" readonly>
              </div>                            
              <?php echo form_error('hp')?>                        
            </div>  
            <div class="form-group">
              <label>Asal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="asal" placeholder="Ex: upt-data" value="<?= $this->input->post('asal') ?? $row->asal ?>" readonly>
              </div>                            
              <?php echo form_error('asal')?>                        
            </div>          
            <div class="form-group">
              <label>Keterangan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>                  
                </div>
                <select name="keterangan">
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </select>
              </div>                            
                                
            </div>                       
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">validasi</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
