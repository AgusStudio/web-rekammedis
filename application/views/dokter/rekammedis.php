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
                                                        <th>Nama</th>
                                                        <th>KTP</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Status Perkawinan</th>
                                                        <th>Gol Darah</th>
                                                        <th>TTL</th>
                                                        <th>Usia</th>
                                                        <th>Agama</th>
                                                        <th>TLP</th>
                                                        <th>Alamat</th>
                                                        <th>Detail</th>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($pasien as $pasien): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo "P-".$pasien->id_pasien;?>
                                                        <td><?php echo $pasien->nama_pasien;?></td>
                                                        <td><?php echo $pasien->ktp_pasien;?></td>
                                                        <td><?php echo $pasien->jk_pasien;?></td>
                                                        <td><?php echo $pasien->status_nikah;?></td>
                                                        <td><?php echo $pasien->gol_darah;?></td>
                                                        <td><?php echo $pasien->tempat_lahir_pasien.','.date('d-F-Y', strtotime($pasien->tgl_lahir_pasien));?></td>
                                                        <td><?php $thn = date('Y', strtotime($pasien->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
                                                        <td><?php echo $pasien->agama_pasien;?></td>
                                                        <td><?php echo $pasien->tlp_pasien;?></td>
                                                        <td><?php echo $pasien->alamat_pasien;?></td>
                                                        <td><a href="<?php echo site_url($action_to.'/'.$pasien->id_pasien);?>"><i class="fa fa-book"></i> Rekam Medis </a></td>
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

    
