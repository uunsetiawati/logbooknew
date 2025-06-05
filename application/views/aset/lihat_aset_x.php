<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">
      <div class="card-header">          
        <a href="<?=base_url("aset");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>


      <form action="<?= base_url("aset/lihat_aset/".$this->session->id)?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $this->session->id ?>">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
          </div>
          <div class="col-12">
              <select id="filterKeteranganTabel" class="form-control">
                  <option value="">Semua Keterangan</option>
                  <?php foreach ($keterangan as $kt): ?>
                      <option value="<?= $kt->kt ?>"><?= $kt->kt ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Filter</button>
        </div>  
      <div class="card-header bg-primary">
        <h3 class="card-title">Laporan Tugas Hari Ini (<?= date("d/m/Y")?>)</h3>
      </div>
      <div class="card">        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="10%">Tanggal</th>
                <th width="50%">Deskripsi Tugas</th>
                <th width="50%">Gambar</th>
                
                <th width="20%">#</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {
              ?>
                <tr>
                  <td scope="row">
                    <p><?= $no++?></p>
                  </td>                  
                  <td scope="row">
                    <p><?= date("d - m - Y",strtotime($data->tgl))?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->des_tugas?></p>
                  </td>
                  <td scope="row">
                  
                  <?php
                  $file = base_url('assets/dist/img/foto-tugas/'.$data->gambar);
                  $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                  ?>
                    <?php if(!empty($data->gambar)){?>
                    
                      <?php
                      if (in_array($file_extension, ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG'])): ?>
                        <img src="<?=base_url('assets/dist/img/foto-tugas/'.$data->gambar)?>" width="50%">	
                      <?php elseif (in_array($file_extension, ['pdf', 'doc', 'docx', 'ppt', 'pptx'])): 
                        echo anchor('assets/dist/img/foto-tugas/'.$data->gambar, 'Download Data', array('class'=>'button', 'target' => '_blank'));
                            endif; 
                    ?>  
                    <?php }else{ ?>
                     
                      <p>Tidak Ada Data </p>
                      <?php }?>
                  </td>
                  <td>
                   
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --