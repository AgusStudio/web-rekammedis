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
								<li class="active">Jadwal Praktek</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Jadwal Praktek </h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table class="table table-striped table-bordered">
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
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($jadwal as $jadwal): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $jadwal->tgl;?></td>
                                                        <td><?php echo $jadwal->h1;?></td>
                                                        <td><?php echo $jadwal->h2;?></td>
                                                        <td><?php echo $jadwal->nama_poli;?></td>
                                                        <td><?php echo $jadwal->nama_dokter;?></td>
                                                        <td><?php echo $jadwal->nama_kry;?></td>
                                                        <td><?php echo $jadwal->status_kehadiran;?></td>
                                                        <td><form method="post" action="<?php echo site_url('dokter/kehadiran/'.$jadwal->id_jadwal);?>"><button name="hadir" value="Hadir" type="submit" class="btn btn-info"><i class="fa fa-check-square"></i> Hadir </button></td>
                                                        <td><button name="absen" value="Absen" type="submit" class="btn btn-warning"><i class="fa fa-times"></i> Absen </button>          </form></td>
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

    
