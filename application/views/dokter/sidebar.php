<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php if($dok->foto_dokter==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$dok->foto_dokter); } ?>" alt="Photo" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $dok->nama_dokter;?></a>
                </div>
                <p class="text-muted m-0"><?php echo $dok->keahlian;?></p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('dokter/antrian');?>" class="waves-effect"><i class="md md-home"></i><span> Antrian Pasien </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('dokter/datamedis');?>" class="waves-effect"><i class="fa fa-bed"></i> Data Rekam Medis  </a>
                </li>
				<li>
                    <a href="<?php echo site_url('dokter/dataicd');?>" class="waves-effect"><i class="fa fa-book"></i><span> Data ICD </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('dokter/jadwalpraktek');?>" class="waves-effect"><i class="fa fa-calendar"></i><span> Jadwal Praktek </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('dokter/logout');?>" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>