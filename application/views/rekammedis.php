<?php $this->load->view('header');?>
<body> 
    <!-- Begin page -->
    <div id="wrapper"> 
        <!-- Top Bar Start -->
        <?php $this->load->view($topmenu);?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view($sidebar);?>
        <!-- Left Sidebar End -->  
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Data Rekam Medis</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Rekam Medis Pasien</h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kd Pasien</th>
                                                        <th>Nama Pasien</th>
                                                        <th>KTP</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>TLP</th>
                                                        <th>Alamat</th>
                                                        <th>Tgl Berobat</th>
                                                        <th>Kode ICD</th>
                                                        <th>Detail</th>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($riwayat as $riwayat): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo "P-".$riwayat->id_pasien;?></td>
                                                        <td><?php echo $riwayat->nama_pasien;?></td>
                                                        <td><?php echo $riwayat->ktp_pasien;?></td>
                                                        <td><?php echo $riwayat->jk_pasien;?></td>
                                                        <td><?php echo $riwayat->tlp_pasien;?></td>
                                                        <td><?php echo $riwayat->alamat_pasien;?></td>
                                                        <td><?php echo $riwayat->tgl_berobat;?></td>
                                                        <td><?php echo $riwayat->kode_icd;?></td>
                                                        <td><a href="<?php echo site_url('dokter/detail_rekam_medis/'.$riwayat->id_riwayat);?>"><i class="fa fa-book"></i> Detail </a></td>
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

    
