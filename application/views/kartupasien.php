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
                                <li class="active">Kartu Pasien</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    <h4>Invoice</h4>
                                </div> -->
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <h4 class="text-left"><img src="<?php echo base_url('assets/images/LOGOPAD.png');?>" alt="RSPAD GS" class="thumb-md"></h4><strong>RSPAD Gatot Soebroto</strong>
                                            
                                        </div>
                                        <div class="pull-right">
                                            <h4>Kartu Pasien
                                            </h4><?php echo "P-".$pasien->id_pasien;?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="m-h-20"></div>
                                    <div class="row">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <table>
                                                    <tr>
                                                        <td width="120">Kode Pasien </td><td width="10">:</td><td width="150"><?php echo "P-".$pasien->id_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No KTP </td><td>:</td><td><?php echo $pasien->ktp_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien </td><td>:</td><td><?php echo $pasien->nama_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>TTL Pasien </td><td>:</td><td><?php echo $pasien->tempat_lahir_pasien."/".date('d-m-Y', strtotime($pasien->tgl_lahir_pasien));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td><td>:</td><td><?php if($pasien->jk_pasien=="L"){ echo "Laki-Laki"; }else{ echo "Perempuan";} ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Alamat Pasien </td><td>:</td><td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td><td></td><td><?php echo $pasien->alamat_pasien;?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="pull-right">
                                                <table>
                                                    <tr>
                                                        <td width="120">Usia </td><td width="10">:</td><td width="150"><?php $thn = date('Y', strtotime($pasien->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gol Darah </td><td>:</td><td><?php echo $pasien->ktp_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien </td><td>:</td><td><?php echo $pasien->gol_darah;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Perkawinan </td><td>:</td><td><?php echo $pasien->status_nikah;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama </td><td>:</td><td><?php echo $pasien->agama_pasien;?></td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Tlp/HP </td><td>:</td><td><?php echo $pasien->tlp_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan </td><td>:</td><td><?php echo $pasien->pekerjaan_pasien;?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="clearfix">
                                            <div class="pull-left">
                                            <p>RSPAD Gatot Soebroto<br/>Jl.Pahlawan Revolusi, Jakatar Pusat, DKI Jakarta</p>
                                            </div>
                                            <div class="pull-right">
                                            <p>TLP: (021)423565<br/>
                                            E-mail: rspad_gatotsoebroto@rspadgs.com</p>
                                            </div>
                                        </div>
                                    </div>                                               
                                </div>
                            </div>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="<?php echo site_url('welcome/printkartupasien/'.$pasien->id_pasien); ?>" target="_blank" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>