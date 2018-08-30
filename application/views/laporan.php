<?php $this->load->view('header');?>
<body> 
    <div id="wrapper"> 
		<!-- Top Bar Start -->
		<?php $this->load->view('top_menu');?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php $this->load->view('sidebar');?>
		<!-- Left Sidebar End --> 
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="#">Home</a></li>
								<li class="active">Laporan Kunjungan Pasien</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title text-white">Pilih Tanggal Kunjungan</h3>
								</div>
								<div class="panel-body">
									<?php echo form_open_multipart($action);?>
									<div class="row">
										<div class="col-md-4">
											<div class="control-group"> 
				                                <label class="control-label">Tanggal Awal*</label>
				                                <div class="input-group">
				                                    <input name="tglawal" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
				                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				                                </div><!-- input-group -->
				                            </div>
				                        </div>
				                        <div class="control-group col-md-4">
				                        	<label class="control-label">Tanggal Akhir*</label>
			                                <div class="input-group">
			                                    <input name="tglakhir" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker2">
			                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			                                </div>
				                        </div>
				                        <div class="control-group col-md-2"><br/><button type="submit" value='1' name="tampil" class="btn btn-success btn-rounded waves-effect waves-light m-b-2" >Tampil</button></div>
				                    </div>
									<?php echo form_close();?>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Laporan Kunjungan Pasien Periode : <?php echo date('d/m/Y', strtotime($tglawal))." - ".date('d/m/Y', strtotime($tglakhir));?> </h3>
								</div>
								<div class="panel-body" style="overflow: scroll">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="datatable" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>No Check Up</th>
														<th>Tgl</th>
														<th>Kode Pasien</th>
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
                                                        <th>Asuransi</th>
                                                        <th>No Asuransi</th>
                                                        <th>Kode Dokter</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Poli</th>
                                                        <th>Diagnosa</th>
													</tr>
												</thead>
												<tbody>
												<?php $no=1; foreach ($laporan as $laporan) : ?>
													<tr>
														<td><?php echo $no++;?></td>
														<td><?php echo $laporan->id_berobat;?></td>
														<td><?php echo date('d/m/Y', strtotime($laporan->tgl_berobat));?></td>
														<td><?php echo "P-".$laporan->id_pasien;?></td>
														<td><?php echo $laporan->nama_pasien;?></td>
                                                        <td><?php echo $laporan->ktp_pasien;?></td>
                                                        <td><?php echo $laporan->jk_pasien;?></td>
                                                        <td><?php echo $laporan->status_nikah;?></td>
                                                        <td><?php echo $laporan->gol_darah;?></td>
                                                        <td><?php echo $laporan->tempat_lahir_pasien.",".date('d/m/Y', strtotime($laporan->tgl_lahir_pasien));?></td>
                                                        <td><?php $thn = date('Y', strtotime($laporan->tgl_lahir_pasien)); $u = date('Y'); echo $u-$thn;?></td>
                                                        <td><?php echo $laporan->agama_pasien;?></td>
                                                        <td><?php echo $laporan->tlp_pasien;?></td>
                                                        <td><?php echo $laporan->alamat_pasien;?></td>
                                                        <td><?php echo $laporan->pekerjaan_pasien;?></td>
                                                        <td><?php echo $laporan->asuransi;?></td>
                                                        <td><?php echo $laporan->no_asuransi;?></td>
                                                        <td><?php echo $laporan->kode_dokter;?></td>
                                                        <td><?php echo $laporan->nama_dokter;?></td>
                                                        <td><?php echo $laporan->nama_poli;?></td>
                                                        <td><?php $riwayat_diagnosa = $this->Model_rekammedis->rekam_diagnosa($laporan->id_berobat);
                                                        foreach ($riwayat_diagnosa as $diagnosa) :
                                                        echo $diagnosa->kode_icd." | ".$diagnosa->nama_icd."( ".$diagnosa->keterangan_icd." ) <br/>";
                                                    	endforeach; ?>
                                                        </td>
													</tr>
												<?php endforeach;?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('welcome/download/'.$tglawal.'/'.$tglakhir); ?>" target="_blank" class="btn btn-inverse waves-effect waves-light"><i class="fa  fa-download"></i></a>
                                    </div>
                                </div> 
							</div>
						</div>						
					</div> <!-- End Row -->				
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('footer');?>