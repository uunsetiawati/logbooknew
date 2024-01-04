<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
        <div class="card-header">
          <!-- <a href="<?= site_url('link/tambah/') ?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a> -->
          <a href="<?= base_url("agenda"); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
        </div>
        <div class="card">
          <div class="card-header bg-info">
            <h3 class="card-title"><?= $menu ?></h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="publicTable">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="10%">Tanggal</th>
                    <th width="20%">Bulan</th>
                    <th width="65%">Judul</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no= "1";foreach ($row->result() as $key => $data) {; ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= date("d",strtotime($data->tgl))?></td>
                      <td><?= date("M",strtotime($data->tgl))?></td>
                      <td><?= $data->judul ?></td>
                    </tr>
                  <?php } ?>
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