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
								<li class="active">Data Petugas Medis</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Petugas Medis</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input type="text" name="nik" <?php if($title=="Edit"){ echo "value='".$editkaryawan->nik."'"; echo "disabled"; } ?> class="form-control" placeholder="NIK karyawan">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama karyawan*</label>
                                                <input type="text" name="nama_kry" <?php if($title=="Edit"){ echo "value='".$editkaryawan->nama_kry."'"; } ?> class="form-control" placeholder="Nama karyawan">
                                            </div>
                                            <div class="form-group">
                                                <label >Jenis Kelamin*</label>
                                                <select name="jenis_kelamin" class="form-control">
                                                   <option value="">---Jenis Kelamin---</option>
                                                   <option <?php if($title=="Edit" && $editkaryawan->jk_kry=="L"){ echo "selected"; } ?> value="L">Laki-Laki</option> 
                                                   <option <?php if($title=="Edit" && $editkaryawan->jk_kry=="P"){ echo "selected"; } ?> value="P">Perempuan</option> 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Telepon/HP*</label>
                                                <input type="text" name="tlp" <?php if($title=="Edit"){ echo "value='".$editkaryawan->tlp_kry."'"; } ?> class="form-control" placeholder="No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label >Alamat* </label>
                                                <textarea class="form-control" type="text" name="alamat"><?php if($title=="Edit"){ echo $editkaryawan->alamat_kry; } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan </label>
                                                <input type="text" name="jabatan" <?php if($title=="Edit"){ echo "value='".$editkaryawan->jabatan."'"; } ?> class="form-control" placeholder="Jabatan">
                                            </div>
                                            <div class="form-group">
                                                <label >Status Admin*</label>
                                                <select name="status_admin" multiple="" class="form-control">
                                                    <option value="">---Pilih Status Admin---</option>
                                                    <option <?php if($title=="Edit" && $editkaryawan->status_admin == 1){ echo "selected"; } ?> value="1"> Super Admin </option>
                                                    <option <?php if($title=="Edit" && $editkaryawan->status_admin == 2){ echo "selected"; } ?> value="2"> General Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Password</label>
                                                <input type="password" name="password" <?php if($title=="Edit"){ echo "value='".$editkaryawan->password."'"; echo "disabled"; } ?> class="form-control" placeholder="Password">
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
                                    <h3 class="panel-title">Data Petugas Medis <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/petugasmedis');?>"><i class="fa fa-plus-square"></i> Tambah Petugas Medis </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>TLP</th>
                                                        <th>Alamat</th>
                                                        <th>Jabatan</th>
                                                        <th>Status Admin</th>
                                                        <th>Foto</th>
                                                        <th>Action 1</th><th>Action 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($karyawan as $karyawan): ?> 
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $karyawan->nik;?></td>
                                                        <td><?php echo $karyawan->nama_kry;?></td>
                                                        <td><?php echo $karyawan->jk_kry;?></td>
                                                        <td><?php echo $karyawan->tlp_kry;?></td>
                                                        <td><?php echo $karyawan->alamat_kry;?></td>
                                                        <td><?php echo $karyawan->jabatan;?></td>
                                                        <td><?php if($karyawan->status_admin==1){ echo "Super Admin"; }else{ echo "General Admin"; }?></td>
                                                        <td><img class="thumb-md" src="<?php if($karyawan->foto_kry==""){ echo base_url('assets/users/userdefault.png'); }else{ echo base_url('assets/users/'.$karyawan->foto_kry);} ?>" alt="Photo"></td>
                                                        <td>
                                                        <a href="<?php echo site_url('welcome/editpetugasmedis/'.$karyawan->nik);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
                                                        <td><form action="<?php echo site_url('welcome/delpetugasmedis/'.$karyawan->nik);?>" method="post"> <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"><i class="fa fa-trash"></i> Hapus </button>
                                                        </form> </td>
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

    
