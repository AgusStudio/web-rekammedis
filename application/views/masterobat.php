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
								<li class="active">Master Obat</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Data Obat</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Obat*</label>
                                                <input type="text" name="kode_obat" <?php if($title=="Edit"){ echo "value='".$editobat->kode_obat."'"; echo "disabled"; } ?> class="form-control" placeholder="Kode Obat">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama obat*</label>
                                                <input type="text" name="nama_obat" <?php if($title=="Edit"){ echo "value='".$editobat->nama_obat."'"; } ?> class="form-control" placeholder="Nama obat">
                                            </div>
                                            <div class="form-group">
                                                <label >Jenis obat*</label>
                                                <input type="text" name="jenis_obat" <?php if($title=="Edit"){ echo "value='".$editobat->jenis_obat."'"; } ?> class="form-control" placeholder="Jenis obat">
                                            </div>
                                            <div class="form-group">
                                                <label >Harga*</label>
                                               <input type="text" name="harga" <?php if($title=="Edit"){ echo "value='".$editobat->harga_obat."'"; } ?> class="form-control" placeholder="Harga obat">
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
                                    <h3 class="panel-title">Data Obat <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/administrator');?>"><i class="fa fa-plus-square"></i> Tambah Data Obat </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Obat</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Obat</th>
                                                        <th>Harga</th>
                                                        <th>Action 1</th>
                                                        <th>Action 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($obat as $obat): ?> 
                                                    <tr>
                                                        <td><?php echo $obat->kode_obat;?></td>
                                                        <td><?php echo $obat->nama_obat;?></td>
                                                        <td><?php echo $obat->jenis_obat;?></td>
                                                        <td><?php echo number_format($obat->harga_obat,0,',','.');?></td>
                                                        <td><a href="<?php echo site_url('welcome/editobat/'.$obat->kode_obat);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
                                                        <td><form action="<?php echo site_url('welcome/delobat/'.$obat->kode_obat);?>" method="post"> <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"><i class="fa fa-trash"></i> Hapus </button>
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

    
