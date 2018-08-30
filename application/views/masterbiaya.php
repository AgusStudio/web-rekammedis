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
								<li class="active">Master Biaya</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Master Biaya </h3>
                                </div>
                                <div class="panel-body" style="overflow: scroll">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Biaya Adm</th>
                                                        <th>Biaya Jasa</th>
                                                        <th>Biaya Lab</th>
                                                        <th>Biaya Radiologi</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($biaya as $biaya): ?> 
                                                    <tr>
                                                        <td><?php echo number_format($biaya->biaya_adm,0,',','.');?></td>
                                                        <td><?php echo number_format($biaya->biaya_jasa,0,',','.');?></td>
                                                        <td><?php echo number_format($biaya->biaya_lab,0,',','.');?></td>
                                                        <td><?php echo number_format($biaya->biaya_radiologi,0,',','.');?></td>
                                                        <td><a href="<?php echo site_url('welcome/editbiaya/'.$biaya->id_biaya);?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit </a></td>
                                                    </tr>   
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div> <!-- col -->
                        <div class="col-sm-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h3 class="panel-title">Form Master Biaya</h3></div>
                             <?php echo form_open_multipart($action);?>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="Username"><?php echo $message;?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Biaya Administrasi*</label>
                                                <input type="text" name="biaya_adm" <?php if($title=="Edit"){ echo "value='".$editbiaya->biaya_adm."'"; }else{ echo "disabled";} ?> class="form-control" placeholder="Biaya Administrasi">
                                            </div>
                                            <div class="form-group">
                                                <label >Biaya Jasa*</label>
                                                <input type="text" name="biaya_jasa" <?php if($title=="Edit"){ echo "value='".$editbiaya->biaya_jasa."'"; }else{ echo "disabled";} ?> class="form-control" placeholder="Biaya Jasa">
                                            </div>
                                            <div class="form-group">
                                                <label >Biaya Laboratorium*</label>
                                                <input type="text" name="biaya_lab" <?php if($title=="Edit"){ echo "value='".$editbiaya->biaya_lab."'"; }else{ echo "disabled";} ?> class="form-control" placeholder="Biaya Laboratorium">
                                            </div>
                                            <div class="form-group">
                                                <label >Biaya Radiologi*</label>
                                               <input type="text" name="biaya_radiologi" <?php if($title=="Edit"){ echo "value='".$editbiaya->biaya_radiologi."'"; }else{ echo "disabled";} ?> class="form-control" placeholder="Biaya Radiologi">
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
					</div> <!-- End widget-->
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
    </div><!-- END wrapper -->
<?php $this->load->view('footer');?>

    
