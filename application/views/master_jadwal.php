<?php $this->load->view('header');?>
<body> 
    <!-- Begin page -->
    <div id="wrapper"> 
        <!-- Top Bar Start -->
        <?php $this->load->view('top_menu');?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view('sidebar');?>
        <!-- Left Sidebar End -->  
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Master jadwal Praktek</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Jadwal Praktek</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal*</label>
                                                <div class="input-group">
                                                    <input name="tgl" type="text" <?php if($title=="Edit"){ $datepick = $editjadwal->tgl_jadwal; $vtgl= date('m-d-Y', strtotime($datepick)); echo "value='".$vtgl."'"; } ?> class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Awal*</label>
                                                <div class="input-group m-b-15">
                                                    <div class="bootstrap-timepicker"><input name="jam_awal" id="timepicker2" type="text" <?php if($title=="Edit"){ $timepick1 = $editjadwal->jam_awal; $vtime= date('H:i', strtotime($timepick1)); echo "value='".$vtime."'"; } ?> class="form-control"/></div>
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Akhir*</label>
                                                <div class="input-group m-b-15">
                                                    <div class="bootstrap-timepicker"><input name="jam_akhir" id="timepicker3" type="text" <?php if($title=="Edit"){ $timepick2 = $editjadwal->jam_akhir; $vtime2= date('H:i', strtotime($timepick2)); echo "value='".$vtime2."'"; } ?> class="form-control"/></div>
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Poli*</label>
                                                <select name="poli" class="form-control" multiple="">
                                                <?php foreach ($poli as $poli) : ?>
                                                   <option <?php if($title=="Edit" && $poli->id_poli==$editjadwal->id_poli){ echo "selected"; } ?> value="<?php echo $poli->id_poli;?>"><?php echo $poli->nama_poli;?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label>Dokter*</label>
                                                <select name="dokter_utama" class="form-control" multiple="">
                                                <?php foreach ($dokter as $dokter4) : ?>
                                                   <option <?php if($title=="Edit" && $dokter4->kode_dokter==$editjadwal->dokter_utama){ echo "selected"; } ?> value="<?php echo $dokter4->kode_dokter;?>"><?php echo $dokter4->kode_dokter.' - '.$dokter4->nama_dokter;?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label>Petugas Medis*</label>
                                                <select name="petugas_medis" class="form-control" multiple="">
                                                <?php foreach ($karyawan as $karyawan) : ?>
                                                   <option <?php if($title=="Edit" && $karyawan->nik==$editjadwal->nik){ echo "selected"; } ?> value="<?php echo $karyawan->nik;?>"><?php echo $karyawan->nik.' - '.$karyawan->nama_kry;?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="form-group">
                                        <button name="save" class="btn btn-success waves-effect waves-light w-md pull-right" type="submit">Save</button>
                                    </div>
                                </div><!-- end panel-body -->
                            </div><!-- end panel -->
                            <?php echo form_close();?>
                        </div><!-- end col -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Jadwal Praktek <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/masterjadwal');?>"><i class="fa fa-plus-square"></i> Tambah Jadwal </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam Awal</th>
                                                        <th>Jam akhir</th>
                                                        <th>Poli</th>
                                                        <th>Dokter</th>
                                                        <th>Tenaga Medis</th>
                                                        <th>Kehadiran</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($jadwal as $jadwal):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $jadwal->tgl;?></td>
                                                        <td><?php echo $jadwal->h1;?></td>
                                                        <td><?php echo $jadwal->h2;?></td>
                                                        <td><?php echo $jadwal->nama_poli;?></td>
                                                        <td><?php foreach ($datadokter as $key => $dokter2) {
                                                            if($dokter2->kode_dokter==$jadwal->dokter_utama){ echo $dokter2->nama_dokter; }
                                                        } ?></td>
                                                        <td><?php echo $jadwal->nama_kry;?></td><td><?php echo $jadwal->status_kehadiran;?></td>
                                                        <td><a <?php if($jadwal->tgl < date('d/m/Y')){ echo"hidden";} ?> href="<?php echo site_url('welcome/editjadwal/'.$jadwal->id_jadwal); ?>"><i class="fa fa-pencil"></i> Edit </a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div> <!-- col -->
					</div> <!-- End widget-->
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>
    
