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
                                            </h4><?php echo date('d-F-Y H:i:s');?>
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
                                                            <td><?php $riwayat_diagnosa = $this->Model_rekammedis->rekam_diagnosa($riwayat->id_berobat); $temp = count($riwayat_diagnosa);?>
                                                            <table <?php if($temp==0){ echo "hidden";} ?> class="table">
                                                                <thead><tr><th class="text-center"  >Kode ICD</th><th class="text-center">Keterangan ICD</th></tr></thead>
                                                                <tbody>
                                                               <?php 
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form Tambah Riwayat Medis</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-2">Kode Pasien*</label>
                                                <div class="col-md-6">
                                                <input type="text" value="<?php echo 'P-'.$pasien->id_pasien;?>" class="form-control" placeholder="Kode Pasien" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">No Check Up*</label>
                                                <div class="col-md-6">
                                                <input type="text" value="<?php echo $id;?>" class="form-control" placeholder="Kode Pasien" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Keterangan Medis*</label>
                                                <div class="col-md-6">
                                                <textarea name="ket_medis" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <label for="Username"><?php echo $message;?></label>
                                            <div class="form-group table-bordered" style="padding: 10px">
                                                <label>Pilih Diagnosa ICD*</label>
                                                <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode ICD</th>
                                                        <th>Nama ICD</th>
                                                        <th>Ket ICD</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($icd as $icd): ?>
                                                    <tr>
                                                        <td><?php echo $icd->kode_icd;?></td>
                                                        <td><?php echo $icd->nama_icd;?></td>
                                                        <td><?php echo $icd->keterangan_icd;?></td>
                                                        <td><input type="checkbox" name="kd_icd[]" value="<?php echo $icd->kode_icd; ?>" class="form-control"> <label for="checkbox10"> Pilih </label></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                </table>
                                            </div>
                                            <label for="Username"><?php echo $message2;?></label>
                                            <div class="form-group table-bordered" style="padding: 10px">
                                                <label>Resep Obat*</label>
                                                <table id="datatable2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Obat</th>
                                                        <th>Nama Obat</th>
                                                        <th>Jenis Obat</th>
                                                        <th>Action</th>
                                                        <th>QTY</th>
                                                        <th>Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($obat as $obat): ?>
                                                    <tr>
                                                        <td><?php echo $obat->kode_obat;?></td>
                                                        <td><?php echo $obat->nama_obat;?></td>
                                                        <td><?php echo $obat->jenis_obat;?></td>
                                                        <td><input type="checkbox" name="kd_obat[]" value="<?php echo $obat->kode_obat; ?>" class="form-control"> <label for="checkbox10"> Pilih </label></td>
                                                        <td><input type="text" name="qty[]" class="form-control" style="width: 50px"></td>
                                                        <td><input type="text" name="dosis[]" class="form-control" placeholder="Dosis"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                                </table>
                                            </div>
                                           <div class="form-group">
                                                <label class="col-md-4">Penggunaan Lab*</label> 
                                                <label class="col-md-2">
                                                    <input type="radio" value="1" name="lab" class="flat-red" >Ya
                                                </label>
                                                <label>
                                                    <input type="radio" value="0" name="lab" class="flat-red">Tidak
                                                </label>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-4">Penggunaan Radiologi*</label> 
                                                <label class="col-md-2">
                                                    <input type="radio" value="1" name="radiologi" class="flat-red"> Ya
                                                </label>
                                                <label>
                                                    <input type="radio" value="0" name="radiologi" class="flat-red"> Tidak
                                                </label>
                                            </div>
                                            <div>
                                                <a class="btn btn-success waves-effect waves-light w-md pull-left" href="<?php echo site_url('dokter/antrian');?>"><i class="fa fa-share"></i> Back </a>
                                                <button name="save" class="btn btn-success waves-effect waves-light w-md pull-right" value="<?php echo $id; ?>">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php form_close();?>
                            </div>
                        </div>
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>