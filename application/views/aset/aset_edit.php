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
        <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Aset</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $this->input->post('nama_aset') ?? $row->nama_aset;?>" required>
              </div>
              <!-- <?php echo form_error('nama_aset')?>                                -->
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
                    <?php
                    // Asumsikan $itemToEdit->kategori berisi nilai kategori dari database untuk data yang sedang diedit
                    // Contoh: $itemToEdit->kategori = 'Elektronik';
                    ?>
                    <?php foreach ($kategoriList as $kategori): ?>
                        <option value="<?= htmlspecialchars($kategori) ?>"
                            <?php
                            // Periksa apakah kategori saat ini cocok dengan kategori dari database
                            if (isset($row) && $row->kategori === $kategori) {
                                echo 'selected';
                            }
                            ?>
                        >
                            <?= htmlspecialchars($kategori) ?>
                        </option>
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
                <input type="text" class="form-control" name="model" placeholder="Ex: Dell Latitude 5420" value="<?= $this->input->post('model') ?? $row->model;?>" required>
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
                <input type="number" class="form-control" name="jumlah" placeholder="Ex: 5" value="<?= $this->input->post('jumlah') ?? $row->jumlah;?>" required>
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
                <input type="date" class="form-control" name="tgl_beli" placeholder="Ex: 01/01/2023" value="<?= $this->input->post('tgl_beli') ?? $row->tgl_beli;?>" required>
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
                    <?php
                    // Asumsikan $row->kategori berisi nilai kategori dari database untuk data yang sedang diedit
                    // Contoh: $row->kategori = 'Elektronik';
                    ?>
                    <?php foreach ($kondisiList as $kondisi): ?>
                        <option value="<?= htmlspecialchars($kondisi) ?>"
                            <?php
                            // Periksa apakah kategori saat ini cocok dengan kategori dari database
                            if (isset($row) && $row->kondisi === $kondisi) {
                                echo 'selected';
                            }
                            ?>
                        >
                            <?= htmlspecialchars($kondisi) ?>
                        </option>
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
                <input type="text" class="form-control" name="lokasi" placeholder="Ex: Ruang IT" value="<?= $this->input->post('lokasi') ?? $row->lokasi;?>" required>
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
                <input type="text" class="form-control" name="keterangan" placeholder="Ex: Digunakan staf IT" value="<?= $this->input->post('keterangan') ?? $row->keterangan;?>" required>
              </div>                             
            </div>
            <?php
                  $file = base_url('assets/dist/img/foto-aset/'.$row->gambar);
                  $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                  ?>
            <?php if($row->gambar != null) {?>
            <div>
              
              <img src="<?=base_url('assets/dist/img/foto-aset/'.$row->gambar)?>" style="width: 50%"><br>
              <br>
                  
              <input type="hidden" name="gambar" value="<?= $this->input->post('gambar') ?? $row->gambar; ?>">
              
              <a href="<?= site_url('aset/hapusgambar/'.$row->id);?>"><medium class="text-danger">Hapus gambar?</medium></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="gambar">
              <small>Maksimal ukuran file 1 Mb</small>
              <br>                     
            </div>            
            <?php } ?>

            <!-- <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div> -->
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

