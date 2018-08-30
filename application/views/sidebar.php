<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php if($kry->foto_kry==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$kry->foto_kry); } ?>" alt="Photo" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $kry->nama_kry;?></a>
                </div>
                <p class="text-muted m-0"><?php echo $kry->jabatan;?></p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('welcome/datapasien');?>" class="waves-effect"><i class="fa fa-users"></i><span> Data Pasien </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/antrian');?>" class="waves-effect"><i class="fa fa-users"></i><span> Antrian Pasien </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/tagihan');?>" class="waves-effect"><i class="fa  fa-calculator"></i><span> Tagihan </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/datamedis');?>" class="waves-effect"><i class="fa fa-bed"></i> Data Rekam Medis  </a>
                </li>
				<li>
                    <a href="<?php echo site_url('welcome/jadwalpraktek');?>" class="waves-effect"><i class="fa fa-calendar"></i><span> Jadwal Praktek </span></a>
                </li>
                <li <?php if($kry->status_admin=='2'){ $hidden="hidden"; echo $hidden;} ?> class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-cogs"></i><span> Data Master </span><i class="fa fa-angle-down pull-right"></i></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('welcome/datadokter');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master Dokter </a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/masterpoli');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master Poli </a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/petugasmedis');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Petugas Medis </a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/masterjadwal');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master Jadwal </a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/masterobat');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master Obat </a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/mastericd');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master ICD</a>
                        </li>
                        <li><a href="<?php echo site_url('welcome/masterbiaya');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Master Biaya</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-book"></i><span> Laporan </span><i class="fa fa-angle-down pull-right"></i></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('welcome/laporan');?>" class="waves-effect"><i class="fa fa-plus-square"></i> Laporan Kunjungan </a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="<?php echo site_url('welcome/logout');?>" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>