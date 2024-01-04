<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge"><?= $this->fungsi->notifUltahDay()->num_rows() == 0 ? "" : $this->fungsi->notifUltahDay()->num_rows()?></span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">Notifikasi UPT</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-birthday-cake mr-2"></i> Ultah hari ini
<span class="float-right text-muted text-sm"><?= $this->fungsi->notifUltahDay()->num_rows()?> Orang</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-birthday-cake mr-2"></i> Ultah Bulan Ini
<span class="float-right text-muted text-sm"><?= $this->fungsi->notifUltahMonth()->num_rows()?> Orang</span>
</a>
<?php foreach ($this->fungsi->notifUltahMonth()->result() as $key => $data) {;?>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> <?= substr($data->nama, 0, 25)?>
<span class="float-right text-muted text-sm"><?= date("d",strtotime($data->tgl_lahir))?></span>
</a>
<?php } ?>
<!-- <div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div> -->
</li>
<li class="nav-item">
<a class="nav-link" href="<?=site_url('auth/logout')?>"><i class="fas fa-sign-out-alt"></i>Keluar</a>
</li>