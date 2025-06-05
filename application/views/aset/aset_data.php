<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <?php if ($this->fungsi->hitung_rows("akses_aset", "user_id", $this->session->id) != null || $this->session->tipe_user == '4') {  ?>        
        <a href="<?=site_url('aset/tambah/')?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a>
        <?php }?>
        <?php if ($this->fungsi->hitung_rows("akses_aset", "user_id", $this->session->id) != null || $this->session->tipe_user == '4') {  ?>        
        <a href="<?=site_url('aset/lihat_aset/')?>" class="btn btn-warning btn-sm"><i class='fas fa-list'></i> Lihat Rangkuman</a>
        <?php }?>
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="20%">Nama Aset</th>
                  <th width="20%">Model</th>
                  <th width="15%">Tahun Beli</th>
				          <th width="30%">Penanggung Jawab</th>
                  <?php if ($this->fungsi->hitung_rows("akses_aset", "user_id", $this->session->id) != null || $this->session->tipe_user == '4') {  ?>   
                  <th width="15%">Aksi</th>
                  <?php }else{?>
                    <th width="15%">Gambar</th>
                  <?php }?>
                </tr>
            </thead>
            <tbody>
            </tbody>             
          </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <span class="tableTools-container btn btn-sm"></span>
        </div>
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->