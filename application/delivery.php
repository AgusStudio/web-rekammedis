<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ERP oasis | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
     <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
      <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php include '../../proses/session.php';
include '../../proses/koneksi.php';
if(!isset($user)||!isset($user_kantor)){
	header('location:../../login.php');
}
if($user_status !='administrator'){
	$hiddlaporan="hidden='hidden'";
}
$location='../../';
?>
<div class="wrapper">
 <?php include '../../header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#fff">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:50px">
       <h1>
        Page Delivery Order
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="delivery.php">Distribusi </a></li>
        <li class="active">Delivery Order</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
<?php
$pick=$_GET['id'];
$pickSoOasis=mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='OASIS' and a.no_so=b.no_so and a.no_so='$pick'");
$r_pickOasis=mysql_fetch_assoc($pickSoOasis);
$pickSoAvion=mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='AVION' and a.no_so=b.no_so and a.no_so='$pick'");
$r_pickAvion=mysql_fetch_assoc($pickSoAvion);
$pickSoVides=mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='VIDES' and a.no_so=b.no_so and a.no_so='$pick'");
$r_pickVides=mysql_fetch_assoc($pickSoVides);
$TotKirimOasis=mysql_query("SELECT MAX(a.rit_ke) as last_rit,c.no_so, c.jml_order_240, c.jml_order_330, c.jml_order_600, c.jml_order_1500, SUM(a.jml_kirim_240) AS prod240, SUM(a.jml_kirim_330) AS prod330, SUM(a.jml_kirim_600) AS prod600, SUM(a.jml_kirim_1500) AS prod1500 FROM do_smallpack a,transaksi b,so_smallpack c WHERE b.no_so='$pick' AND b.no_so=c.no_so AND a.no_do=b.no_do AND b.kode_kantor='$userKode_kantor'");
$r_cekOasis=mysql_fetch_assoc($TotKirimOasis);
$TotKirimAvion=mysql_query("SELECT MAX(a.rit_ke) as last_rit,c.no_so, c.jml_order_240, c.jml_order_330, c.jml_order_600, c.jml_order_1500, SUM(a.jml_kirim_240) AS prod240, SUM(a.jml_kirim_330) AS prod330, SUM(a.jml_kirim_600) AS prod600, SUM(a.jml_kirim_1500) AS prod1500 FROM do_smallpack a,transaksi b,so_smallpack c WHERE b.no_so='$pick' AND b.no_so=c.no_so AND a.no_do=b.no_do AND b.kode_kantor='$userKode_kantor'");
$r_cekAvion=mysql_fetch_assoc($TotKirimAvion);
$TotKirimVides=mysql_query("SELECT MAX(a.rit_ke) as last_rit,c.no_so, c.jml_order_240, c.jml_order_330, c.jml_order_600, c.jml_order_1500, SUM(a.jml_kirim_240) AS prod240, SUM(a.jml_kirim_330) AS prod330, SUM(a.jml_kirim_600) AS prod600, SUM(a.jml_kirim_1500) AS prod1500 FROM do_smallpack a,transaksi b,so_smallpack c WHERE b.no_so='$pick' AND b.no_so=c.no_so AND a.no_do=b.no_do AND b.kode_kantor='$userKode_kantor'");
$r_cekVides=mysql_fetch_assoc($TotKirimVides);
if((!isset($tambah_Oasis)) && (!isset($tambah_Avion)) && (!isset($tambah_Vides)) && (!$r_pickVides) && (!$r_pickAvion) && (!$r_pickOasis)){
	$statusA="active"; $statusB=$statusC='';
}
if((!isset($tambah_Oasis)) && (!isset($tambah_Avion)) && (!isset($tambah_Vides)) && ($r_pickVides)){
	$statusC="active"; $statusB=$statusA='';
}
if((!isset($tambah_Oasis)) && (!isset($tambah_Avion)) && (!isset($tambah_Vides)) && ($r_pickAvion)){
	$statusB="active"; $statusC=$statusA='';
}
if((!isset($tambah_Oasis)) && (!isset($tambah_Avion)) && (!isset($tambah_Vides)) && ($r_pickOasis)){
	$statusA="active"; $statusC=$statusB='';
}
/*----SUBMIT-OASIS----*/
$tambah_Oasis =$_POST['tambah_Oasis'];
if (isset($tambah_Oasis)) {
		$statusA="active"; $statusB=$statusC='';
	$no_SoOasis =$r_pickOasis['no_so'];
	if(empty($_POST['no_DoOasis'])){
		$ErrorDoOasis ="*NO. DO harus diisi..!";
	} else{$DoOasis_test =test_input($_POST['no_DoOasis']);
		if (!preg_match("/^[0-9]*$/",$DoOasis_test)) {
		$ErrorDoOasis = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
		}
		else{ 
		$no_DoOasis =$_POST['no_DoOasis'];
		$nowyear = date("Y");$nowmonth = date("m");
		} 
	}
	if(empty($_POST['tgl_DoOasis'])){
		$ErrorTglOasis ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$tgl_DoOasis1 =$_POST['tgl_DoOasis'];$tgl_DoOasis= date('Y-m-d', strtotime($tgl_DoOasis1));
	}
	if(empty($_POST['jamOasis'])){
		$ErrorTglOasis ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$jamOasis1 =$_POST['jamOasis'];$jamOasis= date('H:i:s', strtotime($jamOasis1));
	}
	if(empty($_POST['no_PolisiOasis'])){
		$ErrorPolisiOasis ="*No Polisi harus diisi..!";
	} else{$PolisiOasis_test =test_input($_POST['nama_PolisiOasis']);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$PolisiOasis_test)) {
		$ErrorPolisiOasis ="*Hanya karakter 'a-zA-Z0-9 ' yang diijinkan..!";
		} else{$no_PolisiOasis =$_POST['no_PolisiOasis'];}
	}
	if(empty($_POST['nama_SopirOasis'])){
		$ErrorSopirOasis ="*Nama Sopir harus diisi..!";
	} else{$SopirOasis_test =test_input($_POST['nama_SopirOasis']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirOasis_test)) {
		$ErrorSopirOasis = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_SopirOasis =$_POST['nama_SopirOasis'];
		} 
	}
	if(empty($_POST['nama_HelperOasis'])){
		$ErrorHelperOasis ="*Nama Helper harus diisi..!";
	} else{$HelperOasis_test =test_input($_POST['nama_HelperOasis']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirOasis_test)) {
		$ErrorHelperOasis = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_HelperOasis =$_POST['nama_HelperOasis'];
		} 
	}
	$Oasis1500_test =test_input($_POST['Oasis1500']);
	if (!preg_match("/^[0-9]*$/",$Oasis1500_test)) {
	$Error1500Oasis = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Oasis1500']) > (($r_pickOasis['jml_order_1500']) - ($r_cekOasis['prod1500']))){
			$Error1500Oasis = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Oasis1500 =$_POST['Oasis1500'];}
	} 					
	$Oasis600_test =test_input($_POST['Oasis600']);
	if (!preg_match("/^[0-9]*$/",$Oasis600_test)) {
	$Error600Oasis = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Oasis600']) > (($r_pickOasis['jml_order_600']) - ($r_cekOasis['prod600']))){
			$Error600Oasis = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Oasis600 =$_POST['Oasis600'];}
	} 					
	$Oasis330_test =test_input($_POST['Oasis330']);
	if (!preg_match("/^[0-9]*$/",$Oasis330_test)) {
	$Error330Oasis = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Oasis330']) > (($r_pickOasis['jml_order_330']) - ($r_cekOasis['prod330']))){
			$Error330Oasis = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Oasis330 =$_POST['Oasis330'];}
	} 
	$Oasis240_test =test_input($_POST['Oasis240']);
	if (!preg_match("/^[0-9]*$/",$Oasis240_test)) {
	$Error240Oasis = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{
		if(($_POST['Oasis240']) > (($r_pickOasis['jml_order_240']) - ($r_cekOasis['prod240']))){
			$Error240Oasis = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Oasis240 =$_POST['Oasis240'];}
	} 					
	if(empty($_POST['Oasis240']) && empty($_POST['Oasis330']) && empty($_POST['Oasis600']) && empty($_POST['Oasis1500'])){
	$ErrorProdOasis ="*Produk kirim kosong, pastikan DO sesuai referensi SO..!";
	}
	if(empty($_POST['KodeRitOasis'])){
		$ErrorRitOasis ="*Urutan Pengiriman harus diisi..!";
	} else{
		if(($_POST['KodeRitOasis']) != ($r_cekOasis['last_rit'] + 1)){
			$ErrorRitOasis ="*Urutan Pengiriman harus benar..!";
		} else{
		$KodeRitOasis =$_POST['KodeRitOasis'];}
	}
	if(empty($ErrorDoOasis) and empty($ErrorTglOasis) and empty($ErrorPolisiOasis) and empty($ErrorSopirOasis) and empty($ErrorHelperOasis) and empty($Error240Oasis) and empty($Error330Oasis) and empty($Error600Oasis) and empty($Error1500Oasis) and empty($ErrorProdOasis) and empty($ErrorRitOasis) and $KodeRitOasis == 1){
		$tambahDo_Oasis =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do, jam_kirim, no_kendaraan, sopir, helper, 	jml_kirim_240, jml_kirim_330, jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager,status_do) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis','$tgl_DoOasis','$jamOasis','$no_PolisiOasis','$nama_SopirOasis','$nama_HelperOasis','$Oasis240','$Oasis330','$Oasis600','$Oasis1500','$KodeRitOasis','$user_nama','$user_rm','Progres')");
		
		if($tambahDo_Oasis){
$transOasis =mysql_query("UPDATE transaksi SET no_do ='DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis' WHERE no_so ='$no_SoOasis' AND kode_kantor ='$userKode_kantor'");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis')</script>";
		} else{ 
		$badOasis ='Koneksi Gagal, Hubungi administrator..!';}
	} 
	if(empty($ErrorDoOasis) and empty($ErrorTglOasis) and empty($ErrorPolisiOasis) and empty($ErrorSopirOasis) and empty($ErrorHelperOasis) and empty($Error240Oasis) and empty($Error330Oasis) and empty($Error600Oasis) and empty($Error1500Oasis) and empty($ErrorProdOasis) and empty($ErrorRitOasis) and $KodeRitOasis > 1){
		$tambahDo_Oasis =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do,jam_kirim, no_kendaraan, sopir, helper, 	jml_kirim_240, jml_kirim_330, jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager,status_do) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis','$tgl_DoOasis','$jamOasis','$no_PolisiOasis','$nama_SopirOasis','$nama_HelperOasis','$Oasis240','$Oasis330','$Oasis600','$Oasis1500','$KodeRitOasis','$user_nama','$user_rm','Progres')");
		
		if($tambahDo_Oasis){
$transOasis =mysql_query("INSERT INTO transaksi(no_do, no_so, kode_kantor) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis','$no_SoOasis','$userKode_kantor')");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoOasis')</script>";
		} else{ 
		$badOasis ='Koneksi Gagal, Hubungi administrator..!';}
	} 	
}
/*----SUBMIT-AVION----*/
$tambah_Avion =$_POST['tambah_Avion'];
if (isset($tambah_Avion)) {
		$statusB="active"; $statusA=$statusC='';
	$no_SoAvion =$r_pickAvion['no_so'];
	if(empty($_POST['no_DoAvion'])){
		$ErrorDoAvion ="*NO. DO harus diisi..!";
	} else{$DoAvion_test =test_input($_POST['no_DoAvion']);
		if (!preg_match("/^[0-9]*$/",$DoAvion_test)) {
		$ErrorDoAvion = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
		}
		else{ 
		$no_DoAvion =$_POST['no_DoAvion'];
		$nowyear = date("Y");$nowmonth = date("m");
		} 
	}
	if(empty($_POST['tgl_DoAvion'])){
		$ErrorTglAvion ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$tgl_DoAvion1 =$_POST['tgl_DoAvion'];$tgl_DoAvion= date('Y-m-d', strtotime($tgl_DoAvion1));
	}
	if(empty($_POST['jamAvion'])){
		$ErrorTglAvion ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$jamAvion1 =$_POST['jamAvion'];$jamAvion= date('H:i:s', strtotime($jamAvion1));
	}
	if(empty($_POST['no_PolisiAvion'])){
		$ErrorPolisiAvion ="*No Polisi harus diisi..!";
	} else{$PolisiAvion_test =test_input($_POST['nama_PolisiAvion']);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$PolisiAvion_test)) {
		$ErrorPolisiAvion ="*Hanya karakter 'a-zA-Z0-9 ' yang diijinkan..!";
		} else{$no_PolisiAvion =$_POST['no_PolisiAvion'];}
	}
	if(empty($_POST['nama_SopirAvion'])){
		$ErrorSopirAvion ="*Nama Sopir harus diisi..!";
	} else{$SopirAvion_test =test_input($_POST['nama_SopirAvion']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirAvion_test)) {
		$ErrorSopirAvion = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_SopirAvion =$_POST['nama_SopirAvion'];
		} 
	}
	if(empty($_POST['nama_HelperAvion'])){
		$ErrorHelperAvion ="*Nama Helper harus diisi..!";
	} else{$HelperAvion_test =test_input($_POST['nama_HelperAvion']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirAvion_test)) {
		$ErrorHelperAvion = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_HelperAvion =$_POST['nama_HelperAvion'];
		} 
	}
	$Avion1500_test =test_input($_POST['Avion1500']);
	if (!preg_match("/^[0-9]*$/",$Avion1500_test)) {
	$Error1500Avion = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Avion1500']) > (($r_pickAvion['jml_order_1500']) - ($r_cekAvion['prod1500']))){
			$Error1500Avion = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Avion1500 =$_POST['Avion1500'];}
	} 					
	$Avion600_test =test_input($_POST['Avion600']);
	if (!preg_match("/^[0-9]*$/",$Avion600_test)) {
	$Error600Avion = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Avion600']) > (($r_pickAvion['jml_order_600']) - ($r_cekAvion['prod600']))){
			$Error600Avion = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Avion600 =$_POST['Avion600'];}
	} 					
	$Avion330_test =test_input($_POST['Avion330']);
	if (!preg_match("/^[0-9]*$/",$Avion330_test)) {
	$Error330Avion = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Avion330']) > (($r_pickAvion['jml_order_330']) - ($r_cekAvion['prod330']))){
			$Error330Avion = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Avion330 =$_POST['Avion330'];}
	} 
	$Avion240_test =test_input($_POST['Avion240']);
	if (!preg_match("/^[0-9]*$/",$Avion240_test)) {
	$Error240Avion = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{
		if(($_POST['Avion240']) > (($r_pickAvion['jml_order_240']) - ($r_cekAvion['prod240']))){
			$Error240Avion = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Avion240 =$_POST['Avion240'];}
	} 					
	if(empty($_POST['Avion240']) && empty($_POST['Avion330']) && empty($_POST['Avion600']) && empty($_POST['Avion1500'])){
	$ErrorProdAvion ="*Produk kirim kosong, pastikan DO sesuai referensi SO..!";
	}
	if(empty($_POST['KodeRitAvion'])){
		$ErrorRitAvion ="*Urutan Pengiriman harus diisi..!";
	} else{
		if(($_POST['KodeRitAvion']) != ($r_cekAvion['last_rit'] + 1)){
			$ErrorRitAvion ="*Urutan Pengiriman harus benar..!";
		} else{
		$KodeRitAvion =$_POST['KodeRitAvion'];}
	}
	if(empty($ErrorDoAvion) and empty($ErrorTglAvion) and empty($ErrorPolisiAvion) and empty($ErrorSopirAvion) and empty($ErrorHelperAvion) and empty($Error240Avion) and empty($Error330Avion) and empty($Error600Avion) and empty($Error1500Avion) and empty($ErrorProdAvion) and empty($ErrorRitAvion) and $KodeRitAvion == 1){
		$tambahDo_Avion =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do,jam_kirim, no_kendaraan, sopir, helper, 	jml_kirim_240, jml_kirim_330, jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager,status_do) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion','$tgl_DoAvion','$jamAvion','$no_PolisiAvion','$nama_SopirAvion','$nama_HelperAvion','$Avion240','$Avion330','$Avion600','$Avion1500','$KodeRitAvion','$user_nama','$user_rm','Progres')");
		
		if($tambahDo_Avion){
$transAvion =mysql_query("UPDATE transaksi SET no_do ='DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion' WHERE no_so ='$no_SoAvion' AND kode_kantor ='$userKode_kantor'");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion')</script>";
		} else{ 
		$badAvion ='Koneksi Gagal, Hubungi administrator..!';}
	} 
	if(empty($ErrorDoAvion) and empty($ErrorTglAvion) and empty($ErrorPolisiAvion) and empty($ErrorSopirAvion) and empty($ErrorHelperAvion) and empty($Error240Avion) and empty($Error330Avion) and empty($Error600Avion) and empty($Error1500Avion) and empty($ErrorProdAvion) and empty($ErrorRitAvion) and $KodeRitAvion > 1){
		$tambahDo_Avion =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do,jam_kirim, no_kendaraan, sopir, helper, 	jml_kirim_240, jml_kirim_330, jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager,status_do) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion','$tgl_DoAvion','$jamAvion','$no_PolisiAvion','$nama_SopirAvion','$nama_HelperAvion','$Avion240','$Avion330','$Avion600','$Avion1500','$KodeRitAvion','$user_nama','$user_rm','Progres')");
		
		if($tambahDo_Avion){
$transAvion =mysql_query("INSERT INTO transaksi(no_do, no_so, kode_kantor) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion','$no_SoAvion','$userKode_kantor')");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoAvion')</script>";
		} else{ 
		$badAvion ='Koneksi Gagal, Hubungi administrator..!';}
	} 
}
/*----SUBMIT-VIDES----*/
$tambah_Vides =$_POST['tambah_Vides'];
if (isset($tambah_Vides)) {
		$statusC="active"; $statusB=$statusA='';
	$no_SoVides =$r_pickVides['no_so'];
	if(empty($_POST['no_DoVides'])){
		$ErrorDoVides ="*NO. DO harus diisi..!";
	} else{$DoVides_test =test_input($_POST['no_DoVides']);
		if (!preg_match("/^[0-9]*$/",$DoVides_test)) {
		$ErrorDoVides = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
		}
		else{ 
		$no_DoVides =$_POST['no_DoVides'];
		$nowyear = date("Y"); $nowmonth = date("m");
		} 
	}
	if(empty($_POST['tgl_DoVides'])){
		$ErrorTglVides ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$tgl_DoVides1 =$_POST['tgl_DoVides'];;$tgl_DoVides= date('Y-m-d', strtotime($tgl_DoVides1));
	}
	if(empty($_POST['jamVides'])){
		$ErrorTglVides ="*Tanggal dan jam kirim harus diisi..!";
	} else{
		$jamVides1 =$_POST['jamVides'];$jamVides= date('H:i:s', strtotime($jamVides1));
	}
	if(empty($_POST['no_PolisiVides'])){
		$ErrorPolisiVides ="*No Polisi harus diisi..!";
	} else{$PolisiVides_test =test_input($_POST['nama_PolisiVides']);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$PolisiVides_test)) {
		$ErrorPolisiVides ="*Hanya karakter 'a-zA-Z0-9 ' yang diijinkan..!";
		} else{$no_PolisiVides =$_POST['no_PolisiVides'];}
	}
	if(empty($_POST['nama_SopirVides'])){
		$ErrorSopirVides ="*Nama Sopir harus diisi..!";
	} else{$SopirVides_test =test_input($_POST['nama_SopirVides']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirVides_test)) {
		$ErrorSopirVides = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_SopirVides =$_POST['nama_SopirVides'];
		} 
	}
	if(empty($_POST['nama_HelperVides'])){
		$ErrorHelperVides ="*Nama Helper harus diisi..!";
	} else{$HelperVides_test =test_input($_POST['nama_HelperVides']);
		if (!preg_match("/^[a-zA-Z ]*$/",$SopirVides_test)) {
		$ErrorHelperVides = "*Hanya karakter 'a-zA-Z' yang diijinkan"; 
		}
		else{ 
		$nama_HelperVides =$_POST['nama_HelperVides'];
		} 
	}
	$Vides1500_test =test_input($_POST['Vides1500']);
	if (!preg_match("/^[0-9]*$/",$Vides1500_test)) {
	$Error1500Vides = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Vides1500']) > (($r_pickVides['jml_order_1500']) - ($r_cekVides['prod1500']))){
			$Error1500Vides = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Vides1500 =$_POST['Vides1500'];}
	} 					
	$Vides600_test =test_input($_POST['Vides600']);
	if (!preg_match("/^[0-9]*$/",$Vides600_test)) {
	$Error600Vides = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Vides600']) > (($r_pickVides['jml_order_600']) - ($r_cekVides['prod600']))){
			$Error600Vides = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Vides600 =$_POST['Vides600'];}
	} 					
	$Vides330_test =test_input($_POST['Vides330']);
	if (!preg_match("/^[0-9]*$/",$Vides330_test)) {
	$Error330Vides = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{ 
		if(($_POST['Vides330']) > (($r_pickVides['jml_order_330']) - ($r_cekVides['prod330']))){
			$Error330Vides = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Vides330 =$_POST['Vides330'];}
	} 
	$Vides240_test =test_input($_POST['Vides240']);
	if (!preg_match("/^[0-9]*$/",$Vides240_test)) {
	$Error240Vides = "*Hanya bilangan numberik '0-9' yang diijinkan"; 
	}
	else{
		if(($_POST['Vides240']) > (($r_pickVides['jml_order_240']) - ($r_cekVides['prod240']))){
			$Error240Vides = "*Jumlah kirim melebihi jumlah Order..!"; 
		} else{
		$Vides240 =$_POST['Vides240'];}
	} 					
	if(empty($_POST['Vides240']) && empty($_POST['Vides330']) && empty($_POST['Vides600']) && empty($_POST['Vides1500'])){
	$ErrorProdVides ="*Produk kirim kosong, pastikan DO sesuai referensi SO..!";
	}
	if(empty($_POST['KodeRitVides'])){
		$ErrorRitVides ="*Urutan Pengiriman harus diisi..!";
	} else{
		if(($_POST['KodeRitVides']) != ($r_cekVides['last_rit'] + 1)){
			$ErrorRitVides ="*Urutan Pengiriman harus benar..!";
		} else{
		$KodeRitVides =$_POST['KodeRitVides'];}
	}
	if(empty($ErrorDoVides) and empty($ErrorTglVides) and empty($ErrorPolisiVides) and empty($ErrorSopirVides) and empty($ErrorHelperVides) and empty($Error240Vides) and empty($Error330Vides) and empty($Error600Vides) and empty($Error1500Vides) and empty($ErrorProdVides) and empty($ErrorRitVides) and $KodeRitVides == 1){
		$tambahDo_Vides =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do,jam_kirim, no_kendaraan, sopir, helper,jml_kirim_240,jml_kirim_330,jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager,status_do) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides','$tgl_DoVides','$jamVides','$no_PolisiVides','$nama_SopirVides','$nama_HelperVides','$Vides240','$Vides330','$Vides600','$Vides1500','$KodeRitVides','$user_nama','$user_rm','Progres')");
		if($tambahDo_Vides){
$transVides =mysql_query("UPDATE transaksi SET no_do ='DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides' WHERE no_so ='$no_SoVides' AND kode_kantor ='$userKode_kantor'");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides')</script>";
		} else{ 
		$badVides ='Koneksi Gagal, Hubungi administrator..!';}
	} 
	if(empty($ErrorDoVides) and empty($ErrorTglVides) and empty($ErrorPolisiVides) and empty($ErrorSopirVides) and empty($ErrorHelperVides) and empty($Error240Vides) and empty($Error330Vides) and empty($Error600Vides) and empty($Error1500Vides) and empty($ErrorProdVides) and empty($ErrorRitVides) and $KodeRitVides > 1){
		$tambahDo_Vides =mysql_query("INSERT INTO do_smallpack(no_do, tanggal_do,jam_kirim, no_kendaraan, sopir, helper, 	jml_kirim_240, jml_kirim_330, jml_kirim_600, jml_kirim_1500,rit_ke,admin,rm_manager) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides','$tgl_DoVides','$jamVides','$no_PolisiVides','$nama_SopirVides','$nama_HelperVides','$Vides240','$Vides330','$Vides600','$Vides1500','$KodeRitVides','$user_nama','$user_rm')");
		if($tambahDo_Vides){
$transVides =mysql_query("INSERT INTO transaksi(no_do, no_so, kode_kantor) VALUES ('DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides','$no_SoVides','$userKode_kantor')");
			echo "<script>alert('Data Berhasil di Update...'); window.location=('print_do.php?id=DO/$userKode_kantor-$nowyear/$nowmonth/$no_DoVides')</script>";
		} else{ 
		$badVides ='Koneksi Gagal, Hubungi administrator..!';}
	} 
	
}	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$tampil =mysql_query("show table status like 'do_smallpack'");
$row =mysql_fetch_assoc($tampil);
$areaOasis =mysql_query("select * from area where kode_kantor='$userKode_kantor'");
$areaAvion =mysql_query("select * from area where kode_kantor='$userKode_kantor'");
$areaVides =mysql_query("select * from area where kode_kantor='$userKode_kantor'");
		?>
	 <div class="row">
	 <div class="col-md-12">
	   <div class="nav-tabs-custom" style="background-color:#eaeaea">
		<ul class="nav nav-tabs">
		  <li class="<?php echo $statusA;?>"><a href="#oasis" data-toggle="tab"><b>Oasis</b></a></li>
		  <li class="<?php echo $statusB;?>"><a href="#avion" data-toggle="tab"><b>Avion</b></a></li>
		  <li class="<?php echo $statusC;?>"><a href="#vides" data-toggle="tab"><b>Vides</b></a></li>
		</ul>
		<div class="tab-content" style="background-color:#eaeaea">
		<div class="<?php echo $statusA;?> tab-pane" id="oasis">
		 <ul class="nav nav-tabs" style="background-color:#87CEFA">
		  <li class="active"><a href="#formDoOasis" data-toggle="tab"><b>Delivery Order Oasis</b></a></li>
		  <li><a href="#dataSoOasis" data-toggle="tab"><b>Data Sales Order</b></a></li>
		</ul>
		<div class="tab-content">
		<div class="active tab-pane" id="formDoOasis">
      <div class="box box-default">
        <div class="box-header with-border">
		<h3 class="box-title">Form DO Oasis<h4 style="color:red;text-align:center"><?php echo $badOasis;?></h4></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
		  </div>
        <!-- /.box-header -->
		<form name="Oasis" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>NO. DO <b style="color:red"> <?php echo $ErrorDoOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
				  <div class="row col-md-5">
				  <input type="text" class="form-control" id="format_DoOasis" name="format_DoOasis" value="<?php echo 'DO/'; echo $userKode_kantor; echo '-';echo date("Y"); echo '/';echo date("m"); echo '/';?>" disabled="disabled">
				  </div>
				   <div class="row col-md-5">
                  <input type="text" class="form-control" id="no_DoOasis" name="no_DoOasis" placeholder="NO. DO" value="<?php echo $row['Auto_increment'];?>">
                </div></div></div>
				<div class="bootstrap-timepicker">
				<div class="form-group">
                  <label>Tanggal & Jam Kirim<b style="color:red"> <?php echo $ErrorTglOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div><div class="row col-md-6">
                  <input type="text" class="form-control" name="tgl_DoOasis" id="datepicker"></div>
				  <div class="row col-md-4"><input type="text" name="jamOasis" class="form-control timepicker"></div>
				  </div>
                </div>
				</div>
				<div class="form-group">
                  <label>NO. Polisi <b style="color:red"> <?php echo $ErrorPolisiOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" name="no_PolisiOasis" placeholder="No. Polisi Kendaraan">
                </div></div>
				 <div class="form-group">
                  <label>Nama Sopir <b style="color:red"> <?php echo $ErrorSopirOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_SopirOasis" name="nama_SopirOasis" placeholder="Nama Sopir">
                </div></div>
				<div class="form-group">
                  <label>Nama Helper <b style="color:red"> <?php echo $ErrorHelperOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_HelperOasis" name="nama_HelperOasis" placeholder="Nama Helper">
                </div></div>
				 <div  class="small-box" style="background-color:#eaeaea;color:#000">
				 <div class="inner">
			  <label>PRODUK KIRIM <b style="color:red"><?php echo $ErrorProdOasis;?></b></label>
				 <div class="form-group" <?php if($r_pickOasis['jml_order_240'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>OASIS 240 ml <b style="color:red"><?php echo $Error240Oasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Oasis240' placeholder='Jumlah Kirim 240 ml' value="<?php echo $r_pickOasis['jml_order_240'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickOasis['jml_order_330'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>OASIS 330 ml <b style="color:red"><?php echo $Error330Oasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Oasis330' placeholder='Jumlah Kirim 330 ml' value="<?php echo $r_pickOasis['jml_order_330'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickOasis['jml_order_600'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>OASIS 600 ml <b style="color:red"><?php echo $Error600Oasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Oasis600' placeholder='Jumlah Kirim 600 ml' value="<?php echo $r_pickOasis['jml_order_600'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickOasis['jml_order_1500'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>OASIS 1500 ml <b style="color:red"><?php echo $Error1500Oasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Oasis1500' placeholder='Jumlah Kirim 1500 ml' value="<?php echo $r_pickOasis['jml_order_1500'];?>" >
                </div></div></div>
				</div>
				<div class="form-group">
                <label>Pengiriman KE <b style="color:red"><?php echo $ErrorRitOasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                <select name="KodeRitOasis" class="form-control">
				<option value="">--- Pilih Urutan Pengiriman  ---</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			 </select>
              </div></div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                  <label>NO. SO <b style="color:red"> <?php echo $ErrorSoOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <input type="text" class="form-control" id="no_SoOasis" name="no_SoOasis" placeholder="NO. SO" value="<?php echo $r_pickOasis['no_so'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>NO. Pelanggan <b style="color:red"> <?php echo $ErrorNoOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="kode_PelOasis" id="kode_PelOasis" placeholder="NO. Pelanggan" value="<?php echo $r_pickOasis['no_customer'];?>" disabled="disabled"></div>
                </div>
				<div class="form-group">
                  <label>Nama Pelanggan <b style="color:red"> <?php echo $ErrorNamaOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="nama_pelOasis" id="nama_pelOasis" placeholder="Nama Pelanggan" value="<?php echo $r_pickOasis['nama_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>Alamat Pelanggan <b style="color:red"> <?php echo $ErrorAlamatOasis;?></b></label>
				  <textarea class="form-control" rows="3" name="alamatOasis" placeholder="Alamat Pelanggan" disabled="disabled"><?php echo $r_pickOasis['alamat_customer'];?></textarea>
                </div>
				<div class="form-group">
                  <label>NO. Telephone <b style="color:red"> <?php echo $ErrorTlpOasis;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="no_tlpOasis" id="no_tlpOasis" placeholder="NO Telephone" value="<?php echo $r_pickOasis['tlp_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                <label>Kode Area <b style="color:red"><?php echo $ErrorAreaOasis;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
                <select name="KodeAreaOasis" class="form-control" disabled="disabled">
				<option value="">--- Pilih Kode Area ---</option>
			<?php
			  while($Oasis_area=mysql_fetch_array($areaOasis)){ ?>
			  <option <?php if($r_pickOasis['area_customer']==$Oasis_area['kode_area']){ ?> selected='selected' <?php } ?> value="<?php echo $Oasis_area['kode_area'];?>"><?php echo $Oasis_area['kode_area'];echo" --- ";echo $Oasis_area['nama_area'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
			  	<div class="form-group">
                <label>Jenis Pengiriman</label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
				  <select name="jenisOasis" class="form-control" disabled="disabled">
                <option value="">--- Pilih Jenis Pengiriman ---</option>
			<?php
			$jenis=mysql_query("select * from kategori_pengiriman");
			  while($r_jenisOasis=mysql_fetch_array($jenis)){ ?>
			  <option <?php if($r_pickOasis['jenis_pengiriman']==$r_jenisOasis['kode_pengiriman']){ ?> selected='selected' <?php } ?> value="<?php echo $r_jenisOasis['kode_pengiriman'];?>"><?php echo $r_jenisOasis['nama_kategori'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="../../index.php"<button type="submit" name="cancel" class="btn btn-default">Cancel</button></a>
          <button type="submit" name="tambah_Oasis" class="btn btn-info pull-right">Submit & Print</button>
        </div></form>
      </div>
	  <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data DO SmallPack Oasis [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
				  <th>Tanggal Kirim</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </thead>
                <tbody> <?php
				$dataDoOasis =mysql_query("select DISTINCT a.*,b.*,DATE_FORMAT(a.tanggal_do,'%d-%m-%Y') as tanggal_kirim from do_smallpack a,so_smallpack b,transaksi c where c.kode_kantor='$userKode_kantor' and b.nama_brand='OASIS' and a.no_do=c.no_do and b.no_so=c.no_so");
				while($r_dataDoOasis=mysql_fetch_array($dataDoOasis)){
					?>
                <tr <?php if($r_dataDoOasis['status_do']=='Finish'){?> style="background-color:#008B8B;color:#fff" <?php }?> >
                  <td><?php echo $r_dataDoOasis['no_do'];?></td>
                  <td><?php echo $r_dataDoOasis['no_customer'];?></td>
				  <td><?php echo $r_dataDoOasis['nama_customer'];?></td>
                  <td><?php echo $r_dataDoOasis['tanggal_kirim']; echo ':'; echo $r_dataDoOasis['jam_kirim']; ?></td>
				   <td><?php echo $r_dataDoOasis['no_so'];?></td>
				  <td><?php echo $r_dataDoOasis['jml_kirim_240'];?></td>
				  <td><?php echo $r_dataDoOasis['jml_kirim_330'];?></td>
				  <td><?php echo $r_dataDoOasis['jml_kirim_600'];?></td>
				  <td><?php echo $r_dataDoOasis['jml_kirim_1500'];?></td>
				  <td><a href="detail_do.php?detail=<?php echo $r_dataDoOasis['no_do'];?>" class="label label-warning" style="font-size:9pt"><i class="fa fa-pencil"></i><span>Detail</span></a></td>
				   <td><a href="do_retur.php?detail=<?php echo $r_dataDoOasis['no_do'];?>" class="label label-danger" style="font-size:9pt"><i class="fa fa-pencil"></i><span>DO Retur</span></a></td>
				  <td><a href="finish_do.php?detail=<?php echo $r_dataDoOasis['no_do'];?>" class="label label-success" style="font-size:9pt"><i class="fa fa-hand-pointer-o"></i><span>Finish</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
				  <th>Tanggal Order</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	  </div></div>
	  <div class="tab-pane" id="dataSoOasis">
          <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data SO SmallPack Oasis [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody> <?php
				$dataSoOasis =mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='OASIS' and a.no_so=b.no_so and a.status_so !='Finish'");
				while($r_dataSoOasis=mysql_fetch_array($dataSoOasis)){
					?>
                <tr>
                  <td><?php echo $r_dataSoOasis['no_so'];?></td>
                  <td><?php echo $r_dataSoOasis['no_customer'];?></td>
				  <td><?php echo $r_dataSoOasis['nama_customer'];?></td>
                  <td><?php echo $r_dataSoOasis['alamat_customer'];?></td>
                  <td><?php echo $r_dataSoOasis['tlp_customer'];?></td>
				  <td><?php echo $r_dataSoOasis['jml_order_240'];?></td>
				  <td><?php echo $r_dataSoOasis['jml_order_330'];?></td>
				  <td><?php echo $r_dataSoOasis['jml_order_600'];?></td>
				  <td><?php echo $r_dataSoOasis['jml_order_1500'];?></td>
				  <td><a href="delivery.php?id=<?php echo $r_dataSoOasis['no_so'];?>"><i class="fa fa-file"></i> <span>Pick</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div></div></div>
		  <!-- /.tab-pane-Avion -->
		  <div class="<?php echo $statusB;?> tab-pane" id="avion">
		 <ul class="nav nav-tabs" style="background-color:#87CEFA">
		  <li class="active"><a href="#formDoAvion" data-toggle="tab"><b>Delivery Order Avion</b></a></li>
		  <li><a href="#dataSoAvion" data-toggle="tab"><b>Data Sales Order</b></a></li>
		</ul>
		<div class="tab-content">
		<div class="active tab-pane" id="formDoAvion">
      <div class="box box-default">
        <div class="box-header with-border">
		<h3 class="box-title">Form DO Avion<h4 style="color:red;text-align:center"><?php echo $badAvion;?></h4></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
		  </div>
        <!-- /.box-header -->
		<form name="Avion" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>NO. DO <b style="color:red"> <?php echo $ErrorDoAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
				  <div class="row col-md-5">
				  <input type="text" class="form-control" id="format_DoAvion" name="format_DoAvion" value="<?php echo 'DO/'; echo $userKode_kantor; echo '-';echo date("Y"); echo '/';echo date("m"); echo '/';?>" disabled="disabled">
				  </div>
				   <div class="row col-md-5">
                  <input type="text" class="form-control" id="no_DoAvion" name="no_DoAvion" placeholder="NO. DO" value="<?php echo $row['Auto_increment'];?>">
                </div></div></div>
				<div class="bootstrap-timepicker">
				<div class="form-group">
                  <label>Tanggal & Jam Kirim<b style="color:red"> <?php echo $ErrorTglAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div><div class="row col-md-6">
                  <input type="text" class="form-control" name="tgl_DoAvion" id="datepicker2"></div>
				  <div class="row col-md-4"><input type="text" name="jamAvion" class="form-control timepicker"></div>
				  </div>
                </div>
				</div>
				<div class="form-group">
                  <label>NO. Polisi <b style="color:red"> <?php echo $ErrorPolisiAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="no_PolisiAvion" name="no_PolisiAvion" placeholder="No. Polisi Kendaraan">
                </div></div>
				 <div class="form-group">
                  <label>Nama Sopir <b style="color:red"> <?php echo $ErrorSopirAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_SopirAvion" name="nama_SopirAvion" placeholder="Nama Sopir">
                </div></div>
				<div class="form-group">
                  <label>Nama Helper <b style="color:red"> <?php echo $ErrorHelperAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_HelperAvion" name="nama_HelperAvion" placeholder="Nama Helper">
                </div></div>
				 <div  class="small-box" style="background-color:#eaeaea;color:#000">
				 <div class="inner">
			  <label>PRODUK KIRIM <b style="color:red"><?php echo $ErrorProdAvion;?></b></label>
				 <div class="form-group" <?php if($r_pickAvion['jml_order_240'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>AVION 240 ml <b style="color:red"><?php echo $Error240Avion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Avion240' placeholder='Jumlah Kirim 240 ml' value="<?php echo $r_pickAvion['jml_order_240'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickAvion['jml_order_330'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>AVION 330 ml <b style="color:red"><?php echo $Error330Avion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Avion330' placeholder='Jumlah Kirim 330 ml' value="<?php echo $r_pickAvion['jml_order_330'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickAvion['jml_order_600'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>AVION 600 ml <b style="color:red"><?php echo $Error600Avion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Avion600' placeholder='Jumlah Kirim 600 ml' value="<?php echo $r_pickAvion['jml_order_600'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickAvion['jml_order_1500'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>AVION 1500 ml <b style="color:red"><?php echo $Error1500Avion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Avion1500' placeholder='Jumlah Kirim 1500 ml' value="<?php echo $r_pickAvion['jml_order_1500'];?>" >
                </div></div></div>
				</div>
				<div class="form-group">
                <label>Pengiriman KE <b style="color:red"><?php echo $ErrorRitAvion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                <select name="KodeRitAvion" class="form-control">
				<option value="">--- Pilih Urutan Pengiriman  ---</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			 </select>
              </div></div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                  <label>NO. SO <b style="color:red"> <?php echo $ErrorSoAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <input type="text" class="form-control" id="no_SoAvion" name="no_SoAvion" placeholder="NO. SO" value="<?php echo $r_pickAvion['no_so'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>NO. Pelanggan <b style="color:red"> <?php echo $ErrorNoAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="kode_PelAvion" id="kode_PelAvion" placeholder="NO. Pelanggan" value="<?php echo $r_pickAvion['no_customer'];?>" disabled="disabled"></div>
                </div>
				<div class="form-group">
                  <label>Nama Pelanggan <b style="color:red"> <?php echo $ErrorNamaAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="nama_pelAvion" id="nama_pelAvion" placeholder="Nama Pelanggan" value="<?php echo $r_pickAvion['nama_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>Alamat Pelanggan <b style="color:red"> <?php echo $ErrorAlamatAvion;?></b></label>
				  <textarea class="form-control" rows="3" name="alamatAvion" placeholder="Alamat Pelanggan" disabled="disabled"><?php echo $r_pickAvion['alamat_customer'];?></textarea>
                </div>
				<div class="form-group">
                  <label>NO. Telephone <b style="color:red"> <?php echo $ErrorTlpAvion;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="no_tlpAvion" id="no_tlpAvion" placeholder="NO Telephone" value="<?php echo $r_pickAvion['tlp_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                <label>Kode Area <b style="color:red"><?php echo $ErrorAreaAvion;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
                <select name="KodeAreaAvion" class="form-control" disabled="disabled">
				<option value="">--- Pilih Kode Area ---</option>
			<?php
			  while($Avion_area=mysql_fetch_array($areaAvion)){ ?>
			  <option <?php if($r_pickAvion['area_customer']==$Avion_area['kode_area']){ ?> selected='selected' <?php } ?> value="<?php echo $Avion_area['kode_area'];?>"><?php echo $Avion_area['kode_area'];echo" --- ";echo $Avion_area['nama_area'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
			  	<div class="form-group">
                <label>Jenis Pengiriman</label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
				  <select name="jenisAvion" class="form-control" disabled="disabled">
                <option value="">--- Pilih Jenis Pengiriman ---</option>
			<?php
			$jenis=mysql_query("select * from kategori_pengiriman");
			  while($r_jenisAvion=mysql_fetch_array($jenis)){ ?>
			  <option <?php if($r_pickAvion['jenis_pengiriman']==$r_jenisAvion['kode_pengiriman']){ ?> selected='selected' <?php } ?> value="<?php echo $r_jenisAvion['kode_pengiriman'];?>"><?php echo $r_jenisAvion['nama_kategori'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="../../index.php"<button type="submit" name="cancel" class="btn btn-default">Cancel</button></a>
          <button type="submit" name="tambah_Avion" class="btn btn-info pull-right">Submit & Print</button>
        </div></form>
      </div>
	  <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data DO SmallPack Avion [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
				  <th>Tanggal Order</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </thead>
                <tbody> <?php
				$dataDoAvion =mysql_query("select DISTINCT a.*,b.*,DATE_FORMAT(a.tanggal_do,'%d-%m-%Y') as tanggal_kirim from do_smallpack a,so_smallpack b,transaksi c where c.kode_kantor='$userKode_kantor' and b.nama_brand='AVION' and a.no_do=c.no_do and b.no_so=c.no_so");
				while($r_dataDoAvion=mysql_fetch_array($dataDoAvion)){?>
                <tr <?php if($r_dataDoAvion['status_do']=='Finish'){?> style="background-color:#008B8B;color:#fff" <?php }?> >
                  <td><?php echo $r_dataDoAvion['no_do'];?></td>
                  <td><?php echo $r_dataDoAvion['no_customer'];?></td>
				  <td><?php echo $r_dataDoAvion['nama_customer'];?></td>
                  <td><?php echo $r_dataDoAvion['tanggal_kirim']; echo ':'; echo $r_dataDoAvion['jam_kirim'];?></td>
				   <td><?php echo $r_dataDoAvion['no_so'];?></td>
				  <td><?php echo $r_dataDoAvion['jml_kirim_240'];?></td>
				  <td><?php echo $r_dataDoAvion['jml_kirim_330'];?></td>
				  <td><?php echo $r_dataDoAvion['jml_kirim_600'];?></td>
				  <td><?php echo $r_dataDoAvion['jml_kirim_1500'];?></td>
				  <td><a href="detail_do.php?detail=<?php echo $r_dataDoAvion['no_do'];?>" class="label label-warning" style="font-size:9pt"><i class="fa fa-pencil"></i><span>Detail</span></a></td>
				   <td><a href="do_retur.php?detail=<?php echo $r_dataDoAvion['no_do'];?>" class="label label-danger" style="font-size:9pt"><i class="fa fa-pencil"></i><span>DO Retur</span></a></td>
				  <td><a href="finish_do.php?detail=<?php echo $r_dataDoAvion['no_do'];?>" class="label label-success" style="font-size:9pt"><i class="fa fa-hand-pointer-o"></i><span>Finish</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
				  <th>Tanggal Order</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	  </div></div>
	  <div class="tab-pane" id="dataSoAvion">
          <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data SO SmallPack Avion [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody> <?php
				$dataSoAvion =mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='AVION' and a.no_so=b.no_so and a.status_so !='Finish'");
				while($r_dataSoAvion=mysql_fetch_array($dataSoAvion)){
					?>
                <tr>
                  <td><?php echo $r_dataSoAvion['no_so'];?></td>
                  <td><?php echo $r_dataSoAvion['no_customer'];?></td>
				  <td><?php echo $r_dataSoAvion['nama_customer'];?></td>
                  <td><?php echo $r_dataSoAvion['alamat_customer'];?></td>
                  <td><?php echo $r_dataSoAvion['tlp_customer'];?></td>
				  <td><?php echo $r_dataSoAvion['jml_order_240'];?></td>
				  <td><?php echo $r_dataSoAvion['jml_order_330'];?></td>
				  <td><?php echo $r_dataSoAvion['jml_order_600'];?></td>
				  <td><?php echo $r_dataSoAvion['jml_order_1500'];?></td>		  
				  <td><a href="delivery.php?id=<?php echo $r_dataSoAvion['no_so'];?>"><i class="fa fa-file"></i> <span>Pick</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div></div></div>
		   <!-- /.tab-pane-avion -->
		   <div class="<?php echo $statusC;?> tab-pane" id="vides">
		 <ul class="nav nav-tabs" style="background-color:#87CEFA">
		  <li class="active"><a href="#formDoVides" data-toggle="tab"><b>Delivery Order Vides</b></a></li>
		  <li><a href="#dataSoVides" data-toggle="tab"><b>Data Sales Order</b></a></li>
		</ul>
		<div class="tab-content">
		<div class="active tab-pane" id="formDoVides">
      <div class="box box-default">
        <div class="box-header with-border">
		<h3 class="box-title">Form DO Vides<h4 style="color:red;text-align:center"><?php echo $badVides;?></h4></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
		  </div>
        <!-- /.box-header -->
		<form name="Vides" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>NO. DO <b style="color:red"> <?php echo $ErrorDoVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
				  <div class="row col-md-5">
				  <input type="text" class="form-control" id="format_DoVides" name="format_DoVides" value="<?php echo 'DO/'; echo $userKode_kantor; echo '-';echo date("Y"); echo '/';echo date("m"); echo '/';?>" disabled="disabled">
				  </div>
				   <div class="row col-md-5">
                  <input type="text" class="form-control" id="no_DoVides" name="no_DoVides" placeholder="NO. DO" value="<?php echo $row['Auto_increment'];?>">
                </div></div></div>
				<div class="bootstrap-timepicker">
				<div class="form-group">
                  <label>Tanggal & Jam Kirim<b style="color:red"> <?php echo $ErrorTglVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div><div class="row col-md-6">
                  <input type="text" class="form-control" name="tgl_DoVides" id="datepicker3"></div>
				  <div class="row col-md-4"><input type="text" name="jamVides" class="form-control timepicker"></div>
				  </div>
                </div>
				</div>
				<div class="form-group">
                  <label>NO. Polisi <b style="color:red"> <?php echo $ErrorPolisiVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="no_PolisiVides" name="no_PolisiVides" placeholder="No. Polisi Kendaraan">
                </div></div>
				 <div class="form-group">
                  <label>Nama Sopir <b style="color:red"> <?php echo $ErrorSopirVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_SopirVides" name="nama_SopirVides" placeholder="Nama Sopir">
                </div></div>
				<div class="form-group">
                  <label>Nama Helper <b style="color:red"> <?php echo $ErrorHelperVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" id="nama_HelperVides" name="nama_HelperVides" placeholder="Nama Helper">
                </div></div>
				 <div  class="small-box" style="background-color:#eaeaea;color:#000">
				 <div class="inner">
			  <label>PRODUK KIRIM <b style="color:red"><?php echo $ErrorProdVides;?></b></label>
				 <div class="form-group" <?php if($r_pickVides['jml_order_240'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>VIDES 240 ml <b style="color:red"><?php echo $Error240Vides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Vides240' placeholder='Jumlah Kirim 240 ml' value="<?php echo $r_pickVides['jml_order_240'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickVides['jml_order_330'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>VIDES 330 ml <b style="color:red"><?php echo $Error330Vides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Vides330' placeholder='Jumlah Kirim 330 ml' value="<?php echo $r_pickVides['jml_order_330'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickVides['jml_order_600'] <=0){?> hidden="hidden" <?php } ?> >
				 <label>VIDES 600 ml <b style="color:red"><?php echo $Error600Vides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Vides600' placeholder='Jumlah Kirim 600 ml' value="<?php echo $r_pickVides['jml_order_600'];?>">
                </div></div>
				 <div class="form-group" <?php if($r_pickVides['jml_order_1500'] <=0){?> hidden="hidden" <?php } ?>>
				 <label>VIDES 1500 ml <b style="color:red"><?php echo $Error1500Vides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <input type='text' class='form-control' name='Vides1500' placeholder='Jumlah Kirim 1500 ml' value="<?php echo $r_pickVides['jml_order_1500'];?>" >
                </div></div></div>
				</div>
				<div class="form-group">
                <label>Pengiriman KE <b style="color:red"><?php echo $ErrorRitVides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                <select name="KodeRitVides" class="form-control">
				<option value="">--- Pilih Urutan Pengiriman  ---</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			 </select>
              </div></div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                  <label>NO. SO <b style="color:red"> <?php echo $ErrorSoVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <input type="text" class="form-control" id="no_SoVides" name="no_SoVides" placeholder="NO. SO" value="<?php echo $r_pickVides['no_so'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>NO. Pelanggan <b style="color:red"> <?php echo $ErrorNoVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="kode_PelVides" id="kode_PelVides" placeholder="NO. Pelanggan" value="<?php echo $r_pickVides['no_customer'];?>" disabled="disabled"></div>
                </div>
				<div class="form-group">
                  <label>Nama Pelanggan <b style="color:red"> <?php echo $ErrorNamaVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="nama_pelVides" id="nama_pelVides" placeholder="Nama Pelanggan" value="<?php echo $r_pickVides['nama_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                  <label>Alamat Pelanggan <b style="color:red"> <?php echo $ErrorAlamatVides;?></b></label>
				  <textarea class="form-control" rows="3" name="alamatVides" placeholder="Alamat Pelanggan" disabled="disabled"><?php echo $r_pickVides['alamat_customer'];?></textarea>
                </div>
				<div class="form-group">
                  <label>NO. Telephone <b style="color:red"> <?php echo $ErrorTlpVides;?></b></label>
				   <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="no_tlpVides" id="no_tlpVides" placeholder="NO Telephone" value="<?php echo $r_pickVides['tlp_customer'];?>" disabled="disabled">
                </div></div>
				<div class="form-group">
                <label>Kode Area <b style="color:red"><?php echo $ErrorAreaVides;?></b></label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>
                <select name="KodeAreaVides" class="form-control" disabled="disabled">
				<option value="">--- Pilih Kode Area ---</option>
			<?php
			  while($Vides_area=mysql_fetch_array($areaVides)){ ?>
			  <option <?php if($r_pickVides['area_customer']==$Vides_area['kode_area']){ ?> selected='selected' <?php } ?> value="<?php echo $Vides_area['kode_area'];?>"><?php echo $Vides_area['kode_area'];echo" --- ";echo $Vides_area['nama_area'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
			  	<div class="form-group">
                <label>Jenis Pengiriman</label>
				 <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
				  <select name="jenisVides" class="form-control" disabled="disabled">
                <option value="">--- Pilih Jenis Pengiriman ---</option>
			<?php
			$jenis=mysql_query("select * from kategori_pengiriman");
			  while($r_jenisVides=mysql_fetch_array($jenis)){ ?>
			  <option <?php if($r_pickVides['jenis_pengiriman']==$r_jenisVides['kode_pengiriman']){ ?> selected='selected' <?php } ?> value="<?php echo $r_jenisVides['kode_pengiriman'];?>"><?php echo $r_jenisVides['nama_kategori'];?></option>
			 <?php } ?>
			 </select>
              </div></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="../../index.php"<button type="submit" name="cancel" class="btn btn-default">Cancel</button></a>
          <button type="submit" name="tambah_Vides" class="btn btn-info pull-right">Submit & Print</button>
        </div></form>
      </div>
	  <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data DO SmallPack Vides [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
				  <th>Tanggal Kirim</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </thead>
                <tbody> <?php
				$dataDoVides =mysql_query("select DISTINCT a.*,b.*,DATE_FORMAT(a.tanggal_do,'%d-%m-%Y') as tanggal_kirim from do_smallpack a,so_smallpack b,transaksi c where c.kode_kantor='$userKode_kantor' and b.nama_brand='VIDES' and a.no_do=c.no_do and b.no_so=c.no_so");
				while($r_dataDoVides=mysql_fetch_array($dataDoVides)){
					?>
                <tr <?php if($r_dataDoVides['status_do']=='Finish'){?> style="background-color:#008B8B;color:#fff" <?php }?> >
                  <td><?php echo $r_dataDoVides['no_do'];?></td>
                  <td><?php echo $r_dataDoVides['no_customer'];?></td>
				  <td><?php echo $r_dataDoVides['nama_customer'];?></td>
                  <td><?php echo $r_dataDoVides['tanggal_kirim']; echo ':'; echo $r_dataDoVides['jam_kirim']; ?></td>
				   <td><?php echo $r_dataDoVides['no_so'];?></td>
				  <td><?php echo $r_dataDoVides['jml_order_240'];?></td>
				  <td><?php echo $r_dataDoVides['jml_order_330'];?></td>
				  <td><?php echo $r_dataDoVides['jml_order_600'];?></td>
				  <td><?php echo $r_dataDoVides['jml_order_1500'];?></td>
				  <td><a href="detail_do.php?detail=<?php echo $r_dataDoVides['no_do'];?>" class="label label-warning" style="font-size:9pt"><i class="fa fa-pencil"></i><span>Detail</span></a></td>
				  <td><a href="do_retur.php?detail=<?php echo $r_dataDoVides['no_do'];?>" class="label label-danger" style="font-size:9pt"><i class="fa fa-pencil"></i><span>DO Retur</span></a></td>
				  <td><a href="finish_do.php?detail=<?php echo $r_dataDoVides['no_do'];?>" class="label label-success" style="font-size:9pt"><i class="fa fa-hand-pointer-o"></i><span>Finish</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.DO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>                  
				  <th>Tanggal Order</th>
				  <th>NO SO</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>
				  <th>Aksi</th>
				  <th></th> <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	  </div></div>
	  <div class="tab-pane" id="dataSoVides">
          <div class="box">
		     <div class="box-header">
              <h3 class="box-title">Data SO SmallPack Vides [<?php echo $user_kantor;?>]</h3>
			   <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="font-size:8pt">
              <table id="data6" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody> <?php
				$dataSoVides =mysql_query("select DISTINCT a.* from so_smallpack a,transaksi b where b.kode_kantor='$userKode_kantor' and a.nama_brand='VIDES' and a.no_so=b.no_so and a.status_so !='Finish'");
				while($r_dataSoVides=mysql_fetch_array($dataSoVides)){
					?>
                <tr>
                   <td><?php echo $r_dataSoVides['no_so'];?></td>
                  <td><?php echo $r_dataSoVides['no_customer'];?></td>
				  <td><?php echo $r_dataSoVides['nama_customer'];?></td>
                  <td><?php echo $r_dataSoVides['alamat_customer'];?></td>
                  <td><?php echo $r_dataSoVides['tlp_customer'];?></td>
				  <td><?php echo $r_dataSoVides['jml_order_240'];?></td>
				  <td><?php echo $r_dataSoVides['jml_order_330'];?></td>
				  <td><?php echo $r_dataSoVides['jml_order_600'];?></td>
				  <td><?php echo $r_dataSoVides['jml_order_1500'];?></td>		  
				  <td><a href="delivery.php?id=<?php echo $r_dataSoVides['no_so'];?>"><i class="fa fa-file"></i> <span>Pick</span></a></td>
                </tr><?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NO.SO</th>
                  <th>NO Pelanggan</th>
                  <th>Nama pelanggan</th>
                  <th>Alamat</th>
                  <th>No. Tlp</th>
				  <th>240</th>
				  <th>330</th>
				  <th>600</th>
				  <th>1500</th>			  
				  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div></div></div>
		   <!-- /.tab-pane-vides -->
		  </div>
	<!-- /.tab-content -->
		    </div>
			  <!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		 </div>
		 
		<!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include'../../control-slidebar.php';?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
 <!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
 $(function () {
    $("#data1").DataTable();
    $('#data2').DataTable();
	$('#data3').DataTable();
	$("#data4").DataTable();
	$("#data5").DataTable();
	$("#data6").DataTable();
	$("#data7").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
			//Date picker
	$('#datepicker').datepicker(),
	$('#datepicker2').datepicker(),
    $('#datepicker3').datepicker({
      autoclose: true
    });
	//Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>