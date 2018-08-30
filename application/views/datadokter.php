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
								<li class="active">Data Dokter</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Dokter</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Dokter*</label>
                                                <input type="text" name="kd_dokter" <?php if($title=="Edit"){ echo "value='".$editdokter->kode_dokter."'"; echo "disabled"; } ?> class="form-control" placeholder="Kode dokter">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama Dokter*</label>
                                                <input type="text" name="nama_dokter" <?php if($title=="Edit"){ echo "value='".$editdokter->nama_dokter."'"; } ?> class="form-control" placeholder="Nama Dokter">
                                            </div>
                                            <div class="form-group">
                                                <label >Jenis Kelamin*</label>
                                                <select name="jenis_kelamin" class="form-control">
                                                   <option value="">---Jenis Kelamin---</option>
                                                   <option <?php if($title=="Edit" && $editdokter->jk_dokter=="L"){ echo "selected"; } ?> value="L">Laki-Laki</option> 
                                                   <option <?php if($title=="Edit" && $editdokter->jk_dokter=="P"){ echo "selected"; } ?> value="P">Perempuan</option> 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Telepon/HP*</label>
                                                <input type="text" name="tlp" <?php if($title=="Edit"){ echo "value='".$editdokter->tlp_dokter."'"; } ?> class="form-control" placeholder="No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label >Alamat* </label>
                                                <textarea class="form-control" type="text" name="alamat"><?php if($title=="Edit"){ echo $editdokter->alamat_dokter; } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Keahlian* </label>
                                                <input type="text" name="keahlian" <?php if($title=="Edit"){ echo "value='".$editdokter->keahlian."'"; } ?> class="form-control" placeholder="Keahlian">
                                            </div>
                                            <div class="form-group">
                                                <label >Password</label>
                                                <input type="password" name="password" <?php if($title=="Edit"){ echo "value='".$editdokter->password."'"; echo "disabled"; } ?> class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="form-group">
                                        <button name="save" class="btn btn-success waves-effect waves-light w-md pull-right" type="submit">Save</button>
                                    </div>
                                </div><!-- end panel-body -->
                            </div><!-- end panel -->
                            <?php echo form_close();?>
                        </div><!-- end col -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data dokter <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/datadokter');?>"><i class="fa fa-plus-square"></i> Tambah Dokter </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Dokter</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>TLP</th>
                                                        <th>Alamat</th>
                                                        <th>Keahlian</th>
                                                        <th>Foto</th>
                                                        <th>Action 1</th><th>Action 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($dokter as $dokter): ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $dokter->kode_dokter;?></td>
                                                        <td><?php echo $dokter->nama_dokter;?></td>
                                                        <td><?php echo $dokter->jk_dokter;?></td>
                                                        <td><?php echo $dokter->tlp_dokter;?></td>
                                                        <td><?php echo $dokter->alamat_dokter;?></td>
                                                        <td><?php echo $dokter->keahlian;?></td>
                                                        <td><img class="thumb-md" src="<?php if($dokter->foto_dokter==""){ echo base_url('assets/users/userdefault.png'); }else{ echo base_url('assets/users/'.$dokter->foto_dokter);} ?>" alt="Photo"></td>
                                                        <td>
                                                        <a href="<?php echo site_url('welcome/editdokter/'.$dokter->kode_dokter);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
                                                        <td><form method="post" action="<?php echo site_url('welcome/deldokter/'.$dokter->kode_dokter);?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"><i class="fa fa-trash"></i> Hapus </button>
                                                        </form></td>
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

    
