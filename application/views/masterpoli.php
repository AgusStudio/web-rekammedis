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
								<li class="active">Master Poli</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title;?> Data Master Poli</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nama Poli*</label>
                                                <input type="text" name="nama_poli" <?php if($title=="Edit"){ echo "value='".$editpoli->nama_poli."'";} ?> class="form-control" placeholder="Nama Poli">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4">Status Poli*</label> 
                                                <label class="col-md-2">
                                                    <input <?php if($title=="Edit" && $editpoli->status_poli=="ON"){ echo "checked"; } ?> type="radio" value="ON" name="Status" class="flat-red" >ON
                                                </label>
                                                <label>
                                                    <input <?php if($title=="Edit" && $editpoli->status_poli=="OFF"){ echo "checked"; } ?> type="radio" value="OFF" name="status" class="flat-red">OFF
                                                </label>
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
                                    <h3 class="panel-title">Data Master Poli <span class="pull-right"><a class="text-white" href="<?php echo site_url('welcome/masterpoli');?>"><i class="fa fa-plus-square"></i> Tambah Poli </a></span></h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Poli</th>
                                                        <th>Status Poli</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no=1; foreach ($poli as $poli): ?> 
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $poli->nama_poli;?></td>
                                                        <td><?php echo $poli->status_poli;?></td>
                                                        <td><a href="<?php echo site_url('welcome/editpoli/'.$poli->id_poli);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
                                                        <td>
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

    
