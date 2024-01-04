<?php if ($ultah->num_rows() != null) { ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="fas fa-birthday-cake"></i> Selamat Ulang Tahun</h5>
    <?php
      $no = 1;
      foreach ($ultah->result() as $key => $data) {;
    ?>
      <?= $data->kelamin == "Laki-Laki" ? "Bapak" : "Ibu";?> <?= $data->nama?> <br>   
    <?php }?>    
</div>
<?php }?>
