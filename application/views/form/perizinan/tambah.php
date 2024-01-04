<?php $this->view('message') ?>

<?= form_open_multipart('')?>
  <div class="card-body">
    <?php $this->view("template/message/info_perizinan")?>
    <div class="form-group">
      <label>NAMA</label>
      <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" placeholder="Ex: FITRAH IZUL FALAQ" minlength="3" maxlength="50" required >
      </div>
      <?php echo form_error('nama')?>
    </div>
    <div class="form-group">
      <label>HP</label>
      <div class="input-group mb-3">
        <input type="number" name="hp" class="form-control" placeholder="Ex: 081231390340" value="<?= set_value('hp'); ?>" minlength="11" maxlength="13" required>
      </div>
      <?php echo form_error('hp')?>
    </div>
    <div class="form-group">
      <label>Asal Kota / Kabupaten</label>
      <select name="asal" class="form-control select2" id="asal" required>
        <option value="<?= set_value('asal');?>">Ketik Kota/Kabupaten</option>
        <?php
          $this->db->where("province_id =","35");
          $this->db->order_by("name","asc");
          foreach ($this->fungsi->pilihan("regencies")->result() as $key => $pilihan) {;
        ?>
        <option value="<?= $pilihan->name?>"><?= $pilihan->name?></option>
        <?php }?>
      </select>
      <?php echo form_error('asal')?>
    </div>
   <div class="form-group">
     <label>Jenis Perizinan</label>
     <select name="tipe" class="form-control" id="tipe" required>
       <option value="<?= set_value('tipe');?>">Pilihan : </option>
       <?php
         foreach ($this->fungsi->pilihan("ms_tipe_perizinan")->result() as $key => $pilihan) {;
       ?>
       <option value="<?= $pilihan->deskripsi?>" <?= $pilihan->status == '2' ? 'disabled' : ''?>><?= $pilihan->deskripsi?></option>
       <?php }?>
     </select>
     <?php echo form_error('tipe')?>
   </div> 
    <div class="form-group">
      <label>Tanggal</label>
      <div class="input-group mb-3">
        <input type="date" name="tgl" id="tgl" class="form-control" value="<?= set_value('tgl'); ?>" min="<?= date("Y-m-d")?>" max="<?= Date('Y-m-d', strtotime('+30 days'))?>" required>
      </div>
      <?php echo form_error('tgl')?>
    </div>
		<div class="form-group">
     <label>Teknis Pelaksanaan</label>
     <select name="teknis" class="form-control" id="teknis" required>
       <option value="<?= set_value('teknis');?>">Pilihan : </option>       
       <option value="offline">Offline (Datang ke Kantor)</option>
       <option value="online">Online (Melalui Zoom)</option>
     </select>
     <?php echo form_error('teknis')?>
   </div>
    <div class="form-group">
      <label>Sesi Tersedia</label>
      <select class="form-control" name="sesi" id="sesi" required>
        <option value="<?= set_value('sesi');?>">Pilihan : </option>                
      </select>                
      <?php echo form_error('sesi')?>
    </div>     
<!--     <div class="form-check">
      <input type="checkbox" class="form-check-input" required>
      <label class="form-check-label" for="exampleCheck1">Dengan ini saya menyatakan konfirmasi untuk mengikuti kegiatan sesuai jadwal yang ditetapkan.</label>
    </div> -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-success" id="daftar-btn"><i class="fas fa-print"></i> Cetak E-Ticket</button>
  </div>

  <div id="pageloader" class="text-center">
     <img src="<?=base_url()?>/assets/dist/img/loader-large.gif" alt="processing..." />
  </div>
<?= form_close() ?>
