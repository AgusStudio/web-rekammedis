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
                                <li class="active">Tagihan</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Tagihan Pasien </h3>
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
                                                        <th>No Check Up</th>
                                                        <th>Tgl Check Up</th>
                                                        <th>Poli</th>
                                                        <th>Asuransi</th>
                                                        <th>No Asuransi</th>
                                                        <th>Total Biaya</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($tagihan as $tagihan): ?> 
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo "P-".$tagihan->id_pasien;?></td>
                                                        <td><?php echo $tagihan->nama_pasien;?></td>
                                                        <td><?php echo $tagihan->id_berobat;?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($tagihan->tgl_berobat));?></td>
                                                        <td><?php echo $tagihan->nama_poli;?></td>
                                                        <td><?php echo $tagihan->asuransi;?></td>
                                                        <td><?php echo $tagihan->no_asuransi;?></td>
                                                        <td><?php echo $tagihan->tot_biaya_obat+$tagihan->tot_biaya_adm+$tagihan->tot_biaya_jasa+$tagihan->tot_biaya_radiologi+$tagihan->tot_biaya_lab;?></td>
                                                        <td><a href="<?php echo site_url('welcome/detailtagihan/'.$tagihan->id_berobat);?>" ><i class="fa fa-search"></i> Detail </a></td>
                                                    </tr>   
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div> <!-- col -->
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>