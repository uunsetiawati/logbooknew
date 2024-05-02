<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">
      <?php if($hasil!=null){?>
      <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($hasil[0]['foto'] != null) ? $hasil[0]['foto'] : "foto-default.png";?>" alt="User profile picture" width = "200px">
              </div>

              <h3 class="profile-username text-center"><?= $hasil[0]['nama']?></h3>

              <p class="text-muted text-center"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$hasil[0]['tipe_user'])?></p>
              <h4 class="text-muted text-center"><b>Total Poin<?= $hasil[0]['total_poin']?></b></h>
              
            </div>
          </div>
        </div>
        <?php if(!empty($hasil[1])){?>
        <div class="col-12 col-md-12 col-sm-12 col-lg-4">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($hasil[1]['foto'] != null) ? $hasil[1]['foto'] : "foto-default.png";?>" alt="User profile picture" width = "200px">
                </div>
                <!-- <div class="text-center">
                <i class="fas fa-trophy" style='font-size:100px;color:silver'></i>
                </div> -->

                <h3 class="profile-username text-center"><?= $hasil[1]['nama']?></h3>

                <p class="text-muted text-center"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$hasil[1]['tipe_user'])?></p>
                <h4 class="text-muted text-center"><b>Total Poin <?= $hasil[1]['total_poin']?></b></h>
                
              </div>
            </div>
          </div>
          <?php } if(!empty($hasil[2])){?>
          
          <div class="col-12 col-md-12 col-sm-12 col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($hasil[2]['foto'] != null) ? $hasil[2]['foto'] : "foto-default.png";?>" alt="User profile picture" width= "200px">
                </div>
                <!-- <div class="text-center">
                <i class="fas fa-trophy" style='font-size:100px;color:brown'></i>
                </div> -->

                <h3 class="profile-username text-center"><?= $hasil[2]['nama']?></h3>

                <p class="text-muted text-center"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$hasil[2]['tipe_user'])?></p>

                <h4 class="text-muted text-center"><b>Total Poin <?= $hasil[2]['total_poin']?></b></h>
                <?php }?>

              </div>
            </div>
          </div>         
        
      <?php }else{?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-info"></i> Tidak Ada Best Employee Bulan Ini !</h5>
          
        </div>
      <?php }?>  
      </div>
      <div class="card-body">
        <div class="post clearfix">
          <div class="user-block">
          <form action="<?= base_url("best_employee/filter")?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <!-- <input type="hidden" name="id" value="<?= $hasil[0]['id'] ?>"> -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
              </div>
              <select name="bulan" class="form-control" required>
                <option value="">Bulan :</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select name="tahun" class="form-control" required>
                <option value="">Tahun</option>
                <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >= 2018; $x--) {?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Tampilkan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --