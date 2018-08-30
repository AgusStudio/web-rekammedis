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
								<li class="active"><a href="#">Home</a></li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12"><h4 class="pull-left page-title">Hello <?php echo $dok->nama_dokter;?>, Selamat datang di Sistem Rekam Medis RS.Pusat Angkatan Darat Gatot Subroto.</h4>
                        </div>
                        <div class="col-md-12">
                            <img src="<?php echo base_url('assets/images/pad gs.jpg');?>" class="col-md-8">
                            <div class="col-md-4">
                                <div class="panel panel-color panel-info">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Papan Peringatan</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <p>Jangan lupa untuk segera mengganti password dan melengkapi Profil Anda setelah menerima username dan password dari Administrator. Pastikan hanya Anda sendiri yang mengetahui password tersebut.</p><br/>
                                        <a href="<?php echo base_url('dokter/profile'); ?>"><button class="btn btn-icon waves-effect btn-danger m-b-5"> <i class="fa fa-lock"></i><span> Ubah Password </span> </button> </a>
                                        <a href="<?php echo site_url('dokter/profile'); ?>"><button class="btn btn-icon waves-effect waves-light btn-info m-b-5"> <i class="fa fa-remove"></i><span> Ubah Profil </span> </button></a>
                                    </div> 
                                </div>
                            </div>
                        </div>
					</div> <!-- End widget-->
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>