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
              <label>Deskripsi Pekerjaan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: Membuat Rancangan Sitem Validasi Peserta" value="<?= $this->input->post('deskripsi') ?? $row->pekerjaan;?>" required>
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
                <input type="text" class="form-control" name="waktu" placeholder="Ex: Tiga Hari" value="<?= $this->input->post('waktu') ?? $row->waktu;?>" required>
              </div>                                         
            </div>

            <div class="form-group">
              <label>Realisasi</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <?php 
                if(!empty($row->realisasi)){?>
                <?php
                echo form_dropdown('realisasi', array( 'SELESAI'=>'SELESAI', 'TIDAK'=>'TIDAK'), $row->realisasi, "class='form-control' id='realisasi'");?>

                <?php }else{?>
                <select name="realisasi" class="form-control" required id="realisasi">
                  <option value="" selected disabled>--PILIH REALISASI--</option>
                  <option value="SELESAI" <?=$this->input->post('realisasi') == 'SELESAI' ? 'selected':''?>>SELESAI</option>
                  <option value="TIDAK" <?=$this->input->post('realisasi') == 'TIDAK' ? 'selected':''?>>TIDAK</option>
                </select>	
                <?php }?>  
              </div> 
            </div>
            
            <!-- <div class="form-group" id="alasan" style="display: none;">
              <label>Alasan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="alasan" placeholder="Ex: Kerumitan struktur data " value="<?= $this->input->post('alasan') ?? $row->alasan;?>" required>
              </div>                                         
            </div>

            <div class="form-group" id="bukti" style="display: none;">
              <label>Bukti</label>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="bukti" placeholder="Ex: Kerumitan struktur data " value="<?= $this->input->post('bukti') ?? $row->bukti;?>" required>
                </div>                                         
              </div>
            </div> -->

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <!-- <button type="reset" class="btn btn-danger">Ulangi</button>             -->
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
