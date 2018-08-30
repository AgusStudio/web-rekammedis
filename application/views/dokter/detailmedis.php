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
                                <li class="active">Detail Rekam Medis</li>
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
                                            <h4>Kode Pasien : P-<?php echo $pasien->id_pasien; ?>
                                            </h4>Tanggal : <?php echo date('d-F-Y H:i:s');?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="m-h-50"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead><tr><th colspan="2" class="text-center">DATA REKAM MEDIS PASIEN</th></tr></thead>
                                                    <tbody>
                                                        <tr>
                                                            <th width="150px">Nama Pasien</th>
                                                            <td>: <?php if($pasien->jk_pasien=="L"){ echo "Tuan "; }else{ echo "Nyonya ";} echo $pasien->nama_pasien; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No. KTP</th>
                                                            <td>: <?php echo $pasien->ktp_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Kelamin</th>
                                                            <td>: <?php if($pasien->jk_pasien=="L"){ echo "Laki-Laki"; }else{ echo "Perempuan";} ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TTL</th>
                                                            <td>: <?php echo $pasien->tempat_lahir_pasien.",".date('d-m-Y', strtotime($pasien->tgl_lahir_pasien));?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Usia</th>
                                                            <td>: <?php $thn = date('Y', strtotime($pasien->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gol Darah</th>
                                                            <td>: <?php echo $pasien->gol_darah;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Status Perkawinan</th>
                                                            <td>: <?php echo $pasien->status_nikah;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Agama</th>
                                                            <td>: <?php echo $pasien->agama_pasien;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Alamat</th>
                                                            <td>: <?php echo $pasien->alamat_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No Tlp</th>
                                                            <td>: <?php echo $pasien->tlp_pasien;?></td>
                                                        </tr>
                                                         <tr>
                                                            <th>Pekerjaan</th>
                                                            <td>: <?php echo $pasien->pekerjaan_pasien;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Orang Tua</th>
                                                            <td>: <?php echo $pasien->nama_ortu;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>No. KTP Orang Tua</th>
                                                            <td>: <?php echo $pasien->ktp_ortu;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td>: <?php echo $pasien->alamat_ortu;?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr><th colspan="8" class="text-center"> RIWAYAT MEDIS</th>
                                                        </tr>
                                                        <tr>
                                                            <th>No Check up</th>
                                                            <th>Dokter</th>
                                                            <th>Poli</th>
                                                            <th class="text-center">Diagnosa</th>
                                                            <th>TGl Check up</th>
                                                            <th>Status Rujukan</th>
                                                            <th>RS Asal</th>
                                                            <th>Ket Medis</th>   
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($riwayat as $riwayat): ?>
                                                        <tr>
                                                            <td><?php echo $riwayat->id_berobat;?></td>
                                                            <td><?php echo $riwayat->nama_dokter;?>
                                                            </td>
                                                            <td><?php echo $riwayat->nama_poli;?>
                                                            </td>
                                                            <td>
                                                            <table class="table">
                                                                <thead><tr><th class="text-center"  >Kode ICD</th><th class="text-center">Keterangan ICD</th></tr></thead>
                                                                <tbody>
                                                                <?php $riwayat_diagnosa = $this->Model_rekammedis->rekam_diagnosa($riwayat->id_berobat);
                                                        foreach ($riwayat_diagnosa as $diagnosa) :?>
                                                                <tr>
                                                                    <td><?php echo $diagnosa->kode_icd;?>
                                                                    </td>
                                                                    <td><?php echo $diagnosa->nama_icd."(".$diagnosa->keterangan_icd.")";?>
                                                                    </td>
                                                                </tr> <?php
                                                        endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                            <td><?php echo date('d/m/Y', strtotime($riwayat->tgl_berobat));?>
                                                            </td>
                                                            <td><?php echo $riwayat->status_rujukan;?>
                                                            </td>
                                                            <td><?php echo $riwayat->rs_asal;?>
                                                            </td>
                                                            <td><?php echo $riwayat->ket_medis;?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('dokter/printrekammedis/'.$pasien->id_pasien); ?>" target="_blank" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
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