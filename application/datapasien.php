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
								<li class="active">Data Pasien</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Pasien</h3></div>
                            <form action="<?php echo $action;?>" method="post" name="pasien">
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Pasien : <?php if($title=="Edit"){ echo "P-".$editpasien->id_pasien; }else{ echo "P-".$next_inc->Auto_increment;}?> </label><br/>
                                                <input type="text" name="id_pasien" <?php if($title=="Edit"){ echo "value='".$editpasien->id_pasien."'"; }else{ echo "value='".$next_inc->Auto_increment."'"; } ?>" hidden>
                                                <label>Nama*</label>
                                                <input type="text" name="nama" <?php if($title=="Edit"){ echo "value='".$editpasien->nama_pasien."'"; } ?> class="form-control" placeholder="Nama Pasien">
                                            </div>
                                            <div class="form-group">
                                                <label >No KTP*</label>
                                                <input type="text" name="ktp" <?php if($title=="Edit"){ echo "value='".$editpasien->ktp_pasien."'"; } ?> class="form-control" placeholder="No KTP">
                                            </div>
                                            <div class="form-group">
                                                <label >Tempat, Tanggal lahir* </label>
                                                <div class="row col-sm-12">
                                                    <div class="col-md-6">
                                                    <input type="text" name="tempat_lahir" <?php if($title=="Edit"){ echo "value='".$editpasien->tempat_lahir_pasien."'"; } ?> class="form-control col-md-6" placeholder="Tempat lahir">
                                                    </div>
                                                    <div class="input-group col-md-6"><input name="tgl_lahir" type="text" <?php if($title=="Edit"){ $datepick = $editjadwal->tgl_jadwal; $vtgl= date('m-d-Y', strtotime($datepick)); echo "value='".$vtgl."'"; } ?> class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >Jenis Kelamin*</label>
                                                <select name="jenis_kelamin" class="form-control">
                                                   <option value="">---Jenis Kelamin---</option>
                                                   <option <?php if($title=="Edit" && $editpasien->jk_pasien=="L"){ echo "selected"; } ?> value="L">Laki-Laki</option> 
                                                   <option <?php if($title=="Edit" && $editpasien->jk_pasien=="P"){ echo "selected"; } ?> value="P">Perempuan</option> 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Status Perkawinan*</label>
                                                <select name="status_nikah" class="form-control">
                                                   <option value="">---Status Perkawinan---</option>
                                                   <option <?php if($title=="Edit" && $editpasien->status_nikah=="Sudah Kawin"){ echo "selected";} ?> value="Sudah Kawin">Sudah Kawin</option> 
                                                   <option <?php if($title=="Edit" &&  $editpasien->status_nikah=="Belum Kawin"){ echo "selected";} ?> value="Belum Kawin">Belum Kawin</option>  
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Gol Darah</label>
                                                <input type="text" name="gol_darah" <?php if($title=="Edit"){ echo "value='".$editpasien->gol_darah."'"; } ?> class="form-control" placeholder="Golongan Darah">
                                            </div>
                                            <div class="form-group">
                                                <label >Agama*</label>
                                                <input type="text" name="agama" <?php if($title=="Edit"){ echo "value='".$editpasien->agama_pasien."'"; } ?> class="form-control" placeholder="Agama">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Telepon/HP*</label>
                                                <input type="text" name="tlp" <?php if($title=="Edit"){ echo "value='".$editpasien->tlp_pasien."'"; } ?> class="form-control" placeholder="No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label >Alamat* </label>
                                                <textarea class="form-control" type="text" name="alamat"><?php if($title=="Edit"){ echo $editpasien->alamat_pasien; } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label >Pekerjaan</label>
                                                <input type="text" name="pekerjaan" <?php if($title=="Edit"){ echo "value='".$editpasien->pekerjaan_pasien."'"; } ?> class="form-control" placeholder="Pekerjaan Pasien">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama Orang Tua </label>
                                                <input type="text" name="nama_ortu" <?php if($title=="Edit"){ echo "value='".$editpasien->nama_ortu."'"; } ?> class="form-control" placeholder="Nama Orang Tua">
                                            </div>
                                            <div class="form-group">
                                                <label >No KTP Orang Tua*</label>
                                                <input type="text" name="ktp_ortu" <?php if($title=="Edit"){ echo "value='".$editpasien->ktp_ortu."'"; } ?> class="form-control" placeholder="No KTP Orang Tua">
                                            </div>
                                            <div class="form-group">
                                                <label >Alamat Orang Tua</label>
                                                <textarea class="form-control" type="text" name="alamat_ortu"><?php if($title=="Edit"){ echo $editpasien->alamat_ortu; } ?></textarea>
                                            </div>
                                        </div>
                                    </div><hr/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Rujukan*</label>
                                                <input type="text" name="id_berobat" <?php if($title=="Edit"){ echo "value='".$editpasien->id_berobat."'"; }else{ echo "value='".$next_riwayat->Auto_increment."'"; } ?>" hidden>
                                                <select name="status_rujukan" class="form-control" multiple="">
                                                   <option onclick="displayRS()" value="Rujukan">* Rujukan</option> 
                                                   <option value="Non Rujukan">* Non Rujukan</option> 
                                                </select>
                                            </div>    
                                            <div class="form-group">
                                                <p id="rs_rujukan"></p>
                                            </div>
                                            <div class="form-group">
                                                <label >Asuransi</label>
                                                <input type="text" name="asuransi" class="form-control" placeholder="Asuransi">
                                            </div>
                                            <div class="form-group">
                                                <label>No Asuransi</label>
                                                <input type="text" name="no_asuransi" class="form-control" placeholder="No Asuransi">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tujuan Poli*</label>
                                                <select name="tuj_poli" class="form-control" multiple="" onclick="javascript:
                        var val = pasien.tuj_poli.value;
                        if(val!=''){
                        var data = val.split(',', 4);
                        pasien.poli.value=data[0];
                        pasien.kode_dokter.value=data[1];
                        pasien.dokter_utama.value=data[2];
                        pasien.kehadiran.value=data[3];
                        } if (val=0){
                        pasien.poli.value='';
                        pasien.kode_dokter.value='';
                        pasien.dokter_utama.value='';
                        pasien.kehadiran.value='';
                        }
                        ">
                                                <?php foreach ($jadwal as $jadwal):
                                                foreach ($dokter as $key => $dokter) {
                                                    if($dokter->kode_dokter==$jadwal->dokter_utama){ $dokter1st = $dokter->nama_dokter;}
                                                }
                                                 ?>
                                                   <option value="<?php echo $jadwal->id_poli.','.$jadwal->dokter_utama.','.$dokter1st.','.$jadwal->status_kehadiran;?>"><?php echo $jadwal->nama_poli;?></option> 
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Dokter</label>
                                                <input type="text" name="poli" hidden >
                                                <input type="text" name="kode_dokter" hidden >
                                                <input type="text" name="dokter_utama" class="form-control" placeholder="Dokter Utama">
                                                <input type="text" name="kehadiran" class="form-control" disabled placeholder="Kehadiran">
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="form-group">
                                        <button name="save" class="btn btn-success waves-effect waves-light w-md pull-right" type="submit">Save</button>
                                    </div>
                                </div><!-- end panel-body -->
                                </form>
                            </div><!-- end panel -->
                        </div><!-- end col -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pasien <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/datapasien');?>"><i class="fa fa-plus-square"></i> Pasien Baru </a></span></h3>
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
                                                        <th>Pekerjaan</th>
                                                        <th>Nama Ortu</th>
                                                        <th>KTP Ortu</th>
                                                        <th>Alamat Ortu</th>
                                                        <th>Action</th>
                                                        <th>Action</th>
                                                    </tr>
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
                                                        <td><?php echo $pasien->pekerjaan_pasien;?></td>
                                                        <td><?php echo $pasien->nama_ortu;?></td>
                                                        <td><?php echo $pasien->ktp_ortu;?></td>
                                                        <td><?php echo $pasien->alamat_ortu;?></td>
                                                        <td><a href="<?php echo site_url('welcome/editpasien/'.$pasien->id_pasien); ?>"><i class="fa fa-pencil"></i> Edit </a></td>
                                                        <td><a href="<?php echo site_url('welcome/kartupasien/'.$pasien->id_pasien); ?>"><i class="fa fa-print"></i> Kartu Pasien </a></td>
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
<script type="text/javascript">
    function displayRS() {
    document.getElementById("rs_rujukan").innerHTML ="<label>Rumah Sakit Asal</label><input type='text' class='form-control' name='rs_asal' placeholder='Rumah Sakit Rujukan bila ada'>" 
    }
</script>
    
