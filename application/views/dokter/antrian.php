<?php $this->load->view('header');?>
<body> 
    <!-- Begin page -->
    <div id="wrapper"> 
        <!-- Top Bar Start -->
        <?php $this->load->view('dokter/top_menu');?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view('dokter/sidebar');?>
        <!-- Left Sidebar End -->  
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Antrian Pasien</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Antrian Pasien Anda, <?php echo $dok->nama_dokter.' tanggal '.DATE('d/m/Y'); ?> </h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kd Pasien</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Poli</th>
                                                        <th>Dokter</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($antrian as $antrian): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo 'P-'.$antrian->id_pasien;?></td>
                                                        <td><?php echo $antrian->nama_pasien;?></td>
                                                        <td><?php echo $antrian->nama_poli;?></td>
                                                        <td><?php echo $antrian->nama_dokter;?></td>
                                                        <td><a href="<?php echo site_url('dokter/diagnosa/'.$antrian->id_berobat);?>"><i class="fa fa-book"></i> Rekam Medis </a> <a href="<?php echo site_url('dokter/nextantrian/'.$antrian->id_berobat);?>"><i class="fa fa-mail-forward"><i> Next </a></td>
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

    
