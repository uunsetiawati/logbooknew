<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-info"></i> Peringatan Hari Penting !</h5>
  <?php
    $no = 1;
    foreach ($haripenting->result() as $key => $data) {;
  ?>
    <?= $data->judul ?><br>    
  <?php }?>
  <?=  $haripenting->result() == null ? "Tidak Peringatan Hari Penting" : ""?><br>
</div>