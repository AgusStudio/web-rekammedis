<?php $this->load->view('header');?>
<body>
	<div class="wrapper-page" style="margin-top: 5px">
        <div class="panel panel-pages" style="background-color: #006400">
            <div> 
                <h3 class="text-center text-white"><img src="<?php echo base_url('assets/images/LOGOPAD.png');?>"><br/>Sistem Rekam Medis<br/>RSPAD Gatot Soebroto</h3>
            </div> 
            <div class="panel-body" style="padding-top: 0px">
            <form class="form-horizontal" action="<?php echo $action;?>" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="username" class="form-control input-lg " type="text" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" class="form-control input-lg" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">                    
	                    <label for="checkbox-signup" class="text-white">
	                        <?php echo $message;?>
	                    </label>
                    </div>                   
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup" class="text-white">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div> 
                <div class="form-group text-center">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-7">
                        <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form> 
            </div>                                 
            
        </div>
    </div>
<?php $this->load->view('footer');?>