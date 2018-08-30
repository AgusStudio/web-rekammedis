<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Dokter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$logdokter = $this->session->userdata('logdokter');
		if(empty($logdokter)){
			redirect('login/dokter');
		}
	}
	
	function index()
	{
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/beranda.php',$data);
	}

	function antrian()
	{
		$user = $this->Model_rekammedis->data_dokter();
		$kode_user = $user->kode_dokter; $now = date('Y-m-d');
		$f = 'riwayat_berobat.kode_dokter';
		$data['antrian'] = $this->Model_rekammedis->antrian($f,$kode_user,$now);
		$data['dok']= $user;
		$this->load->view('dokter/antrian.php',$data);
	}

	function nextantrian($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_berobat',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/antrian');
		}else{
			$data = array('status_berobat'=>'1');
			$this->Model_rekammedis->update_data_data('riwayat_berobat','id_berobat',$id,$data);
			redirect('dokter/antrian');
		}
	}

	function datamedis()
	{
		$data['topmenu'] = "dokter/top_menu";
		$data['sidebar'] = "dokter/sidebar";
		$data['action_to'] = "dokter/detail_rekam_medis";
		$data['pasien'] = $this->Model_rekammedis->get_data('pasien');
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/rekammedis.php',$data);	
	}

	function detail_rekam_medis1($id)
	{
		$data['topmenu'] = "dokter/top_menu";
		$data['sidebar'] = "dokter/sidebar";
		$cek_id = $this->Model_rekammedis->cek('riwayat_medis','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/datamedis');
		}else{
			$data['pasien'] = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
			$data['riwayat'] = $this->Model_rekammedis->rekam_medis($id);
			$data['dok']= $this->Model_rekammedis->data_dokter();
			$this->load->view('dokter/detailmedis1.php',$data);
		}
	}

	function detail_rekam_medis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/datamedis');
		}
		$data['topmenu'] = "dokter/top_menu";
		$data['sidebar'] = "dokter/sidebar";
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['pasien'] = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$data['riwayat'] = $this->Model_rekammedis->rekam_medis($id);
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/detailmedis.php',$data);
	}

	function printrekammedis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/datamedis');
		}
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['pasien'] = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$data['riwayat'] = $this->Model_rekammedis->rekam_medis($id);
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/printdetailmedis.php',$data);
	}

	function diagnosa($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_berobat',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/antrian');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$kd_icd = $this->input->post('kd_icd',true);
			$ket_medis = $this->input->post('ket_medis',true);
			$lab = $this->input->post('lab',true);
			$radiologi = $this->input->post('radiologi',true);
			$kd_obat = $this->input->post('kd_obat',true);
			$dosis = $this->input->post('dosis',true);
			$qty = $this->input->post('qty',true);
			if($kd_icd==""){
				$data['action']= site_url("dokter/detail_rekam_medis/".$id);
				$data['message'] = "*Diagnosa ICD tidak boleh kosong"; $data['id'] = $id;
			}else{
				$data['action']= site_url("dokter/diagnosa/".$id);
				$data['message']=""; $data['id'] = $id;
			}
			if($kd_obat==""){
				$data['action']= site_url("dokter/detail_rekam_medis/".$id);
				$data['message2'] = "*Resep & Dosis Obat tidak boleh kosong"; $data['id'] = $id;
			}else{
				$data['action']= site_url("dokter/diagnosa/".$id);
				$data['message2']=""; $data['id'] = $id;
			}
			if($kd_icd!="" && $kd_obat!=""){
				$data = array(
					'ket_medis'=>$ket_medis,
					'penggunaan_lab'=>$lab,
					'penggunaan_radiologi'=>$radiologi
					);
				foreach ($kd_icd as $icd) 
				{
				  $selected_icd = $icd;
				  $data2 = array(
					'id_berobat'=>$save,
					'kode_icd'=>$selected_icd
					);
					$this->Model_rekammedis->insert_data('riwayat_medis',$data2);
				}
				foreach ($dosis as $dosis_obat)
				{ $selected_dosis = $dosis_obat; }
				foreach ($qty as $qty_obat)
				{ $selected_qty = $qty_obat; }
				foreach ($kd_obat as $obat)
				{
				  $selected_obat = $obat;
				  	$data3 = array(
					'id_berobat'=>$save,
					'kode_obat'=>$selected_obat,
					'qty'=>$selected_qty,
					'dosis'=>$selected_dosis
					);
					$this->Model_rekammedis->insert_data('resep_obat',$data3);  
				}
				$biaya = $this->Model_rekammedis->cek('master_biaya','id_biaya','1');
				$biaya_adm = $biaya->biaya_adm; $biaya_jasa = $biaya->biaya_jasa;
				if($lab==0){ $biaya_lab=0;}else{ $biaya_lab = $biaya->biaya_lab;}
				if($radiologi==0){ $biaya_radiologi=0;}else{ $biaya_radiologi = $biaya->biaya_radiologi;}
				$biaya_obat = $this->Model_rekammedis->cek_biaya_obat($save);
				$tot_biaya_obat = $biaya_obat->tot_biaya_obat;
				$data4 = array(
					'id_berobat'=>$save,
					'tot_biaya_adm'=>$biaya_adm,
					'tot_biaya_jasa'=>$biaya_jasa,
					'tot_biaya_obat'=>$tot_biaya_obat,
					'tot_biaya_lab'=>$biaya_lab,
					'tot_biaya_radiologi'=>$biaya_radiologi,
					);
				$this->Model_rekammedis->insert_data('faktur',$data4);  
				$this->Model_rekammedis->update_data_data('riwayat_berobat','id_berobat',$id,$data);
				$data['action']= site_url("dokter/diagnosa/".$id);
				$data['message'] = $data['message2']= "*Data berhasil disimpan"; $data['id'] = $id;
			}
		}else{
			$data['action']= site_url("dokter/diagnosa/".$id);
			$data['message']=""; $data['message2']="";
			$data['id'] = $id;
		}
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['obat'] = $this->Model_rekammedis->get_data('daftar_obat');
		$pasien = $this->Model_rekammedis->diagnosa($id);
		$kd_pasien = $pasien->id_pasien;
		$data['pasien'] = $pasien;
		$data['riwayat'] = $this->Model_rekammedis->rekam_medis1($kd_pasien);
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/diagnosa.php',$data);
	}


	function jadwalpraktek()
	{
		$n6= mktime(0, 0, 0, date("m"), date("d")+6, date("Y")); $now = date('Y-m-d');
		$week = date('Y-m-d',$n6);
		$data['jadwal'] = $this->Model_rekammedis->jadwal_praktek($now,$week);
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/jadwal_praktek.php',$data);
	}

	function kehadiran($id)
	{
		$cek_id = $this->Model_rekammedis->cek('jadwal_praktek','id_jadwal',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('dokter/jadwalpraktek');
		}
		$hadir = $this->input->post('hadir',true);
		$absen = $this->input->post('absen',true);
		if(isset($hadir)){
			$data = array('status_kehadiran'=>$hadir);
			$this->Model_rekammedis->update_data_data('jadwal_praktek','id_jadwal',$id,$data);
			redirect('dokter/jadwalpraktek');
		}
		if(isset($absen)){
			$data = array('status_kehadiran'=>$absen);
			$this->Model_rekammedis->update_data_data('jadwal_praktek','id_jadwal',$id,$data);
			redirect('dokter/jadwalpraktek');
		}
	}

	function profile()
	{
		$data['ubahpassword'] = site_url('dokter/ubahpassword');
		$data['ubahprofil'] = site_url('dokter/ubahprofile');
		$data['message_b'] = $data['message_c'] = "";
		$data['a'] = "active";$data['b'] = $data['c'] = "";
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/profil.php',$data);
	}

	function dataicd()
	{
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['dok']= $this->Model_rekammedis->data_dokter();
		$this->load->view('dokter/dataicd.php',$data);
	}

	function ubahpassword()
	{
		$dok= $this->Model_rekammedis->data_dokter();
		$oldpass = $this->input->post('passlama',true);
		$newpass = $this->input->post('passbaru',true);
		$repass = $this->input->post('pass_konfirm',true);
		$kode_dokter = $this->input->post('ubahpass',true);
		$hast = MD5($repass);
		$hast2 = MD5($oldpass);
		if($hast2!=$dok->password){
			$data['ubahpassword'] = site_url('dokter/ubahpassword');
			$data['ubahprofil'] = site_url('dokter/ubahprofile');
			$data['message_b'] = "*Password lama salah"; $data['message_c'] = "";
			$data['b'] = "active";$data['a'] = $data['c'] = "";
			$data['dok']= $this->Model_rekammedis->data_dokter();
			$this->load->view('dokter/profil.php',$data);
		}else{
			if($newpass!=$repass){
				$data['ubahpassword'] = site_url('dokter/ubahpassword');
				$data['ubahprofil'] = site_url('dokter/ubahprofile');
				$data['message_b'] = "*Konfirm password salah"; $data['message_c'] = "";
				$data['b'] = "active";$data['a'] = $data['c'] = "";
				$data['dok']= $this->Model_rekammedis->data_dokter();
				$this->load->view('dokter/profil.php',$data);	
			}else{
				$data = array('password'=>$hast);
				$this->Model_rekammedis->update_data('dokter','kode_dokter',$kode_dokter,$data);
				$data['ubahpassword'] = site_url('dokter/ubahpassword');
				$data['ubahprofil'] = site_url('dokter/ubahprofile');
				$data['message_b'] = "*Data berhasil disimpan"; $data['message_c'] = "";
				$data['b'] = "active";$data['a'] = $data['c'] = "";
				$data['dok']= $this->Model_rekammedis->data_dokter();
				$this->load->view('dokter/profil.php',$data);
			}		
		}
	}

	function ubahprofile()
	{
		$nama = $this->input->post('nama',true);
		$keahlian = $this->input->post('keahlian',true);
		$jenis_kelamin = $this->input->post('jenis_kelamin',true);
		$tlp = $this->input->post('tlp',true);
		$alamat = $this->input->post('alamat',true);
		$kode_dokter = $this->input->post('ubahprofil',true);
		$nmfile = "dok_".$kode_dokter;
		$config['upload_path'] = './assets/users/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')||$nama==""||$keahlian==""||$alamat==""||$jenis_kelamin==""||$tlp==""){
			$data['ubahpassword'] = site_url('dokter/ubahpassword');
			$data['ubahprofil'] = site_url('dokter/ubahprofile');
			$data['message_b'] = ""; $data['message_c'] = "*Pastikan data diisi dengan benar";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['dok']= $this->Model_rekammedis->data_dokter();
			$this->load->view('dokter/profil.php',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'nama_dokter'=>$nama,
				'keahlian'=>$keahlian,
				'jk_dokter'=>$jenis_kelamin,
				'tlp_dokter'=>$tlp,
				'alamat_dokter'=>$alamat,
				'foto_dokter'=>$gbr['file_name'],
			);
			$this->Model_rekammedis->update_data('dokter','kode_dokter',$kode_dokter,$data);
			$data['ubahpassword'] = site_url('dokter/ubahpassword');
			$data['ubahprofil'] = site_url('dokter/ubahprofile');
			$data['message_b'] = ""; $data['message_c'] = "*Data berhasil disimpan";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['dok']= $this->Model_rekammedis->data_dokter();
			$this->load->view('dokter/profil.php',$data);	
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('dokter'));
	}
}