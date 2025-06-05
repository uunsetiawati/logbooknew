<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">
      <div class="card-header">          
        <a href="<?=base_url("aset");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <form action="<?= base_url("aset/lihat_aset/")?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $this->session->id ?>">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
          </div>
            <select id="filterKeteranganTabel" class="form-control form-control-sm" name="ket">
                <option value="">Semua Nama</option>
                <?php foreach ($keterangan as $kt): ?>
                    <option value="<?= $kt->kt ?>"><?= $kt->kt ?></option>
                <?php endforeach; ?>
            </select>      
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Filter</button>
        </div>  
      </form>
            
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <!-- <th width="5%">No</th> -->
                <th width="20%">Nama</th>
                <th width="20%">Nama Barang</th>
                <th width="50%">Model</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row as $key => $data) {;
              ?>
                <tr>              
                  <td scope="row">
                    <p><?= $key?></p>
                  </td>
                  <td scope="row">
                    <?php
                    $nomer=1;$nomerk=1;
                      foreach ($data as $kt){
                        echo $nomer.". ".$kt->nama_aset. "<br>";
                        $nomer++;
                      }
                    ?>
                  </td>
                  <td scope="row">
                  <?php
                      foreach ($data as $kt) :
                        echo $nomerk.". ".$kt->model. "<br>";
                        $nomerk++;
                      endforeach;
                    ?>
                  </td>   
                  <td scope="row">
                    <?php $encoded = urlencode($key);?>
                    <a href="<?= site_url('aset/detail_aset/'.$encoded);?>" class="btn btn-info btn-sm"><i class="fas fa-list"></i> Detail</a><br>
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
<!-- /.content -->

