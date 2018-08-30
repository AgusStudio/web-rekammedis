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
                                <li class="active">Detail Tagihan</li>
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
                                            <h4>Kode Pasien : P-<?php echo $tagihan->id_pasien; ?>
                                            </h4>Tanggal : <?php echo date('d-F-Y H:i:s');?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="m-h-50"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead><tr><th colspan="2" class="text-center">TAGIHAN PASIEN</th></tr></thead>
                                                    <tbody>
                                                        <tr>
                                                            <th width="150px">Nama Pasien</th>
                                                            <td>: <?php if($tagihan->jk_pasien=="L"){ echo "Tuan "; }else{ echo "Nyonya ";} echo $tagihan->nama_pasien; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No. KTP</th>
                                                            <td>: <?php echo $tagihan->ktp_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Kelamin</th>
                                                            <td>: <?php if($tagihan->jk_pasien=="L"){ echo "Laki-Laki"; }else{ echo "Perempuan";} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TTL</th>
                                                            <td>: <?php echo $tagihan->tempat_lahir_pasien.",".date('d-m-Y', strtotime($tagihan->tgl_lahir_pasien));?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Usia</th>
                                                            <td>: <?php $thn = date('Y', strtotime($tagihan->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gol Darah</th>
                                                            <td>: <?php echo $tagihan->gol_darah;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Status Perkawinan</th>
                                                            <td>: <?php echo $tagihan->status_nikah;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Agama</th>
                                                            <td>: <?php echo $tagihan->agama_pasien;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Alamat</th>
                                                            <td>: <?php echo $tagihan->alamat_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No Tlp</th>
                                                            <td>: <?php echo $tagihan->tlp_pasien;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Pekerjaan</th>
                                                            <td>: <?php echo $tagihan->pekerjaan_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Asuransi</th>
                                                            <td>: <?php echo $tagihan->asuransi;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No. Asuransi</th>
                                                            <td>: <?php echo $tagihan->no_asuransi;?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Obat</th>
                                                            <th>Nama Obat</th>
                                                            <th>Dosis</th>
                                                            <th>QTY</th>
                                                            <th>Harga Unit</th>
                                                            <th>Total</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no=1; foreach ($resep as $resep): 
                                                    $total = $resep->qty*$resep->harga_obat;?>
                                                        <tr>
                                                            <td><?php echo $no++;?></td>
                                                            <td><?php echo $resep->kode_obat;?></td>
                                                            <td><?php echo $resep->nama_obat;?>
                                                            </td>
                                                            <td><?php echo $resep->dosis;?>
                                                            </td>
                                                            <td><?php echo $resep->qty;?></td>
                                                            <td><?php echo number_format($resep->harga_obat,0,',','.');?>
                                                            </td>
                                                            <td><?php echo number_format($total,0,',','.');?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-radius: 0px;">
                                        <div class="col-md-4 col-md-offset-8">
                                            <p class="text-right"><b>Sub Total </b><?php echo ": ".number_format($tagihan->tot_biaya_obat,0,',','.');?></p>
                                            <p class="text-right">Biaya Adm <?php echo ": ".number_format($tagihan->tot_biaya_adm,0,',','.');?> </p>
                                            <p class="text-right">Biaya Jasa <?php echo ": ".number_format($tagihan->tot_biaya_jasa,0,',','.');?> </p>
                                            <p class="text-right">Biaya Lab <?php echo ": ".number_format($tagihan->tot_biaya_lab,0,',','.');?></p>
                                            <p class="text-right">Biaya Radiologi <?php echo ": ".number_format($tagihan->tot_biaya_radiologi,0,',','.');?></p>
                                            <hr>
                                            <h3 class="text-right"><?php echo "Rp. ".number_format($tagihan->tot_biaya_obat+$tagihan->tot_biaya_adm+$tagihan->tot_biaya_jasa+$tagihan->tot_biaya_radiologi+$tagihan->tot_biaya_lab,0,',','.');?></h3>
                                        </div>
                                        <div class="col-md-8">
                                            <p>*Note: <?php if($tagihan->asuransi=="-"){ echo "Tagihan sudah Lunas";}else{ echo "Tagihan ditanggung oleh asuransi ".$tagihan->asuransi;} ?></p>
                                        </div>
                                    </div>
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('welcome/printtagihan/'.$tagihan->id_berobat); ?>" target="_blank" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        </div>
                                    </div>                                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>