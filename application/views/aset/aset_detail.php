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
          <div class="card-body">
            <div class="form-group">
              <label>Nama Aset</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->nama_aset?>" readonly>
              </div>                              
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->kategori?>" readonly>
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
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->model?>" readonly>                            
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->jumlah?>" readonly>
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
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= date('d-m-Y', strtotime($row->tgl_beli));?>" readonly>
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
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->kondisi?>" readonly>
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
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->lokasi?>" readonly>
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
                <input type="text" class="form-control" name="nama_aset" placeholder="Ex: Laptop" value="<?= $row->keterangan?>" readonly>
              </div>                             
            </div>
            <div class="form-group">
              <label>Gambar : </label>
              <?php
              if(!empty($row->gambar)):?>
                <img src="<?=base_url('assets/dist/img/foto-aset/'.$row->gambar)?>" style="width: 50%"><br>
              <?php else :?>
                Tidak ada Gambar
              <?php endif;?>
              <br>                     
            </div>            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">        
            <a href="<?=site_url('aset/edit/'.$this->uri->segment(3))?>" class="btn btn-success">Edit</a>
          </div>
       
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

