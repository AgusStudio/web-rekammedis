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
								<li class="active">Master ICD</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Data ICD</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode ICD *</label>
                                                <input type="text" name="kode_icd" <?php if($title=="Edit"){ echo "value='".$editicd->kode_icd."'"; echo "disabled"; } ?> class="form-control" placeholder="Kode ICD">
                                            </div>
                                            <div class="form-group">
                                                <label >Nama ICD*</label>
                                                <textarea type="text" class="form-control" name="nama_icd"><?php if($title=="Edit"){ echo $editicd->nama_icd; } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label >Keterangan</label>
                                               <textarea type="text" class="form-control" name="ket_icd"><?php if($title=="Edit"){ echo $editicd->keterangan_icd; } ?></textarea>
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
                                    <h3 class="panel-title">Data Master ICD <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/administrator');?>"><i class="fa fa-plus-square"></i> Tambah Data ICD </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode ICD</th>
                                                        <th>Nama</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($icd as $icd): ?> 
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $icd->kode_icd;?></td>
                                                        <td><?php echo $icd->nama_icd;?></td>
                                                        <td><?php echo $icd->keterangan_icd;?></td>
                                                        <td><a href="<?php echo site_url('welcome/editicd/'.$icd->kode_icd);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
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

    
