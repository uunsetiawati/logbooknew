<?php $this->view('message') ?>

<?= form_open_multipart('')?>
  <div class="card-body">
    <div class="form-group">
      <label>HP</label>
      <div class="input-group mb-3">
        <input type="number" name="hp" class="form-control" placeholder="Ex: 081231390340" value="<?= set_value('hp'); ?>" minlength="11" maxlength="13" required>
      </div>
      <?php echo form_error('hp')?>
    </div>    
    <!-- <div class="form-group">
      <label>Tanggal</label>
      <div class="input-group mb-3">
        <input type="date" name="tgl" id="tgl" class="form-control" value="<?= set_value('tgl'); ?>" min="<?= date("Y-m-d")?>" max="<?= Date('Y-m-d', strtotime('+30 days'))?>" required>
      </div>
      <?php echo form_error('tgl')?>
    </div>  -->      
<!--     <div class="form-check">
      <input type="checkbox" class="form-check-input" required>
      <label class="form-check-label" for="exampleCheck1">Dengan ini saya menyatakan konfirmasi untuk mengikuti kegiatan sesuai jadwal yang ditetapkan.</label>
    </div> -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-success" id="daftar-btn"><i class="fas fa-eye"></i> Cari</button>
  </div>

  <div id="pageloader" class="text-center">
     <img src="<?=base_url()?>/assets/dist/img/loader-large.gif" alt="processing..." />
  </div>
<?= form_close() ?>
