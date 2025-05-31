<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('aset');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Nama Aset</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= set_value('nama_aset');?>" required>
              </div>
              <?php echo form_error('nama_aset')?>                               
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <select name="kategori" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    <?php foreach ($kategoriList as $kategori): ?>
                        <option value="<?= htmlspecialchars($kategori) ?>"><?= htmlspecialchars($kategori) ?></option>
                    <?php endforeach; ?>
                </select>
              </div>                               
            </div>
            <div class="form-group">
              <label>Merk / Model</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="model" placeholder="Ex: Dell Latitude 5420" value="<?= set_value('model');?>" required>
              </div>                             
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="number" class="form-control" name="jumlah" placeholder="Ex: 5" value="<?= set_value('jumlah');?>" required>
              </div>                             
            </div>
            <div class="form-group">
              <label>Tanggal Beli</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="tgl_beli" placeholder="Ex: 01/01/2023" value="<?= set_value('tgl_beli');?>" required>
              </div>                             
            </div>
            <div class="form-group">
              <label>Kondisi</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <select name="kondisi" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Kondisi --</option>
                    <?php foreach ($kondisiList as $kondisi): ?>
                        <option value="<?= htmlspecialchars($kondisi) ?>"><?= htmlspecialchars($kondisi) ?></option>
                    <?php endforeach; ?>
                </select>
              </div>                                          
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="lokasi" placeholder="Ex: Ruang IT" value="<?= set_value('lokasi');?>" required>
              </div>                             
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="keterangan" placeholder="Ex: Digunakan staf IT" value="<?= set_value('keterangan');?>" required>
              </div>                             
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="gambar">
              <small>Maksimal ukuran file 10 Mb</small>
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

