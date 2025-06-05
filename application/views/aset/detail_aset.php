<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=base_url("aset/lihat_aset");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($user->foto != null) ? $user->foto : "foto-default.png";?>" alt="User profile picture" width = "200px">
              </div>
              <h3 class="profile-username text-center"><?= $user->nama?></h3>
              <p class="text-muted text-center"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$user->tipe_user)?></p>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-8">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fas fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Barang Yang di Bawa</span>
                <span class="info-box-number"><?= $total; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
      </div>
      

      <div class="card-header bg-primary">
        <h3 class="card-title">Detail Yang di Bawa</h3>
      </div>
      <div class="card">        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="20%">Nama Barang</th>                
                <th width="20%">Model</th>
                <th width="10%">Kategori</th>
                <th width="10%">Tanggal Beli</th>
                <th width="10%">Jumlah</th>
                <th width="10%">Kondisi</th>
                <th width="20%">Gambar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($aset as $key => $data) {;
              ?>
                <tr>
                  <td scope="row">
                    <p><?= $no++?></p>
                  </td>                  
                  <td scope="row">
                    <p><?= $data->nama_aset?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->model?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->kategori?></p>
                  </td>
                  <td scope="row">
                    <p><?= date("d - m - Y",strtotime($data->tgl_beli))?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->jumlah?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->kondisi?></p>
                  </td>
                  <td scope="row">
                    <?php 
                      $gambar = $data->gambar;
                      $gambar_url = base_url('assets/dist/img/foto-aset/' . $gambar);
                      if (!empty($gambar) && file_exists(FCPATH . 'assets/dist/img/foto-aset/' . $gambar)) : ?>
                          <img src="<?= $gambar_url ?>" alt="Gambar Aset" width="80">
                      <?php else: ?>
                          <span></span>
                      <?php endif; ?>
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
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --