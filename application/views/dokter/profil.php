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
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('<?php echo base_url('assets/images/bg.jpg');?>')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?php if($dok->foto_dokter==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$dok->foto_dokter); } ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php echo $dok->nama_dokter; ?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs">
                            <li class="<?php echo $a;?> tab">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="<?php echo $a;?>"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">Profil</span> 
                                </a> 
                            </li> 
                            <li class="<?php echo $b;?> tab"> 
                                <a href="#profile-2" data-toggle="tab" aria-expanded="false" class="<?php echo $b;?>"> 
                                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                    <span class="hidden-xs">Ubah Password</span> 
                                </a> 
                            </li> 
                            <li class="<?php echo $c;?> tab"> 
                                <a href="#messages-2" data-toggle="tab" aria-expanded="false" class="<?php echo $c;?>"> 
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                    <span class="hidden-xs">Ubah Profil</span> 
                                </a> 
                            </li> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane <?php echo $a;?>" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Kode Dokter</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $dok->kode_dokter; ?></p>
                                                </div>
                                                <div cl
                                                <div class="about-info-p">
                                                    <strong>Nama</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $dok->nama_dokter; ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Jenis Kelamin</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php if($dok->jk_dokter=="L"){ echo "Laki-Laki";}else{ echo "Perempuan";}?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Keahlian</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $dok->keahlian; ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Telepon/HP</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $dok->tlp_dokter; ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Alamat</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php echo $dok->alamat_dokter; ?></p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> <!--- End Col-4 -->
                                </div>
                            </div> 
                            <div class="tab-pane <?php echo $b;?>" id="profile-2">
                                 <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Ganti Password</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <?php echo form_open_multipart($ubahpassword);?>
                                            <div class="form-group">
                                                <label for="Username"><?php echo $message_b;?></label><br/>
                                                <label for="Username">Password Lama*</label>
                                                <input type="password" name="passlama" placeholder="Your Current Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password Baru*</label>
                                                <input type="password" placeholder="6 - 15 Characters" name="passbaru" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">Konfirmasi Password*</label>
                                                <input type="password" placeholder="6 - 15 Characters" name="pass_konfirm" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button name="ubahpass" value="<?php echo $dok->kode_dokter; ?>"  class="btn btn-success waves-effect waves-light w-md" type="submit">Save</button>
                                            </div>
                                        <?php echo form_close();?>
                                    </div> 
                                </div>
                            </div> 
                            <div class="tab-pane <?php echo $c;?>" id="messages-2">
                            <?php echo form_open_multipart($ubahprofil);?>
                                 <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="form-group">
                                            <label for="Username"><?php echo $message_c;?></label>
                                            <label for="FullName">Nama*</label>
                                            <input type="text" name="nama" value="<?php echo $dok->nama_dokter; ?>" class="form-control" placeholder="Nama Karyawan">
                                        </div>
                                        <div class="form-group">
                                            <label for="FullName">Jenis Kelamin*</label>
                                            <select name="jenis_kelamin" class="form-control">
                                               <option <?php if($dok->jk_dokter==""){ echo "selected";} ?> value="">---Jenis Kelamin---</option>
                                               <option <?php if($dok->jk_dokter=="L"){ echo "selected";} ?> value="L">Laki-Laki</option> 
                                               <option <?php if($dok->jk_dokter=="P"){ echo "selected";} ?> value="P">Perempuan</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keahlian </label>
                                            <input type="text" name="keahlian" value="<?php echo $dok->keahlian; ?>" class="form-control" placeholder="Keahlian">
                                        </div>
                                        <div class="form-group">
                                            <label for="FullName">Tlp/HP</label>
                                            <input type="text" name="tlp" value="<?php echo $dok->tlp_dokter; ?>" class="form-control" placeholder="No Telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Alamat </label>
                                            <textarea class="form-control" type="text" name="alamat"> <?php echo $dok->alamat_dokter; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Photo</label>
                                            <input type="file" name="userfile" class="btn btn-primary waves-effect waves-light w-md">
                                        </div>
                                        <div class="form-group">
                                            <button name="ubahprofil" value="<?php echo $dok->kode_dokter; ?>" class="btn btn-success waves-effect waves-light w-md" type="submit">Save</button>
                                        </div>
                                    </div> 
                                </div>
                                <?php echo form_close();?>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div><!-- END wrapper -->
<?php $this->load->view('footer');?>