<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$logged_in=$this->session->userdata('logged_in');
		if(empty($logged_in)){
			redirect('login');
		}
	}
	
	public function index()
	{
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('beranda.php',$data);
	}

	function datapasien()
	{
		$data['next_inc'] = $this->Model_rekammedis->inc_table('pasien');
		$data['next_riwayat'] = $this->Model_rekammedis->inc_table('riwayat_berobat');
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama',true);
			$id_pasien = $this->input->post('id_pasien',true);
			$ktp = $this->input->post('ktp',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$status_nikah = $this->input->post('status_nikah',true);
			$gol_darah = $this->input->post('gol_darah',true);
			$tempat_lahir = $this->input->post('tempat_lahir',true);
			$tgl_lahir = $this->input->post('tgl_lahir',true);
			$agama = $this->input->post('agama',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$nama_ortu = $this->input->post('nama_ortu',true);
			$ktp_ortu = $this->input->post('ktp_ortu',true);
			$alamat_ortu = $this->input->post('alamat_ortu',true);
			$pekerjaan = $this->input->post('pekerjaan',true);
			//riwayat_berobat
			$id_berobat = $this->input->post('id_berobat',true);
			$status_rujukan = $this->input->post('status_rujukan',true);
			$asuransi = $this->input->post('asuransi',true);
			$no_asuransi = $this->input->post('no_asuransi',true);
			$rs = $this->input->post('rs_asal',true);
			if($rs==""){ $rs_asal="-"; }else{ $rs_asal=$rs;}
			$poli = $this->input->post('poli',true);
			$dokter = $this->input->post('kode_dokter',true);
			if($nama==""||$ktp==""||$jk==""||$tempat_lahir==""||$tgl_lahir==""||$tlp==""||$alamat==""||$poli==""||$dokter==""||$status_rujukan==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Registrasi";
			}else{
				$data = array(
					'id_pasien'=>$id_pasien,
					'nama_pasien'=>$nama,
					'ktp_pasien'=>$ktp,
					'jk_pasien'=>$jk,
					'status_nikah'=>$status_nikah,
					'gol_darah'=>$gol_darah,
					'tempat_lahir_pasien'=>$tempat_lahir,
					'tgl_lahir_pasien'=>$tgl_lahir,
					'agama_pasien'=>$agama,
					'tlp_pasien'=>$tlp,
					'alamat_pasien'=>$alamat,
					'nama_ortu'=>$nama_ortu,
					'ktp_ortu'=>$ktp_ortu,
					'alamat_ortu'=>$alamat_ortu,
					'pekerjaan_pasien'=>$pekerjaan
					);
				$data2 = array(
					'kode_dokter'=>$dokter,
					'id_poli'=>$poli,
					'id_berobat'=>$id_berobat,
					'status_rujukan'=>$status_rujukan,
					'rs_asal'=>$rs_asal,
					'id_pasien'=>$id_pasien,
					'asuransi'=>$asuransi,
					'no_asuransi'=>$no_asuransi,
					'tgl_berobat'=>Date('Y-m-d H:i:s')
					);
				$this->Model_rekammedis->insert_data('riwayat_berobat',$data2);
				$this->Model_rekammedis->insert_data('pasien',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Registrasi";
				redirect('welcome/kartupasien/'.$id_pasien);
			}
		}else{ $data['message'] = ""; $data['title'] = "Registrasi"; }
		$now = date('Y-m-d');
		$data['action'] = site_url('welcome/datapasien');
		$data['pasien'] = $this->Model_rekammedis->get_data('pasien');
		$data['jadwal'] = $this->Model_rekammedis->jadwal_now($now);
		$data['dokter'] = $this->Model_rekammedis->get_data('dokter');	
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('datapasien.php',$data);
	}

	function kartupasien($id)
	{
		$cek_id = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datapasien');
		}
		$data['pasien'] = $cek_id;
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('kartupasien.php',$data);
	}
	function printkartupasien($id)
	{
		$cek_id = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datapasien');
		}
		$data['pasien'] = $cek_id;
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('print_kartupasien.php',$data);
	}

	function editpasien($id)
	{
		$cek_id = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datapasien');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama',true);
			$id_pasien = $this->input->post('id_pasien',true);
			$ktp = $this->input->post('ktp',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$status_nikah = $this->input->post('status_nikah',true);
			$gol_darah = $this->input->post('gol_darah',true);
			$tempat_lahir = $this->input->post('tempat_lahir',true);
			$tgl_lahir = $this->input->post('tgl_lahir',true);
			$agama = $this->input->post('agama',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$nama_ortu = $this->input->post('nama_ortu',true);
			$ktp_ortu = $this->input->post('ktp_ortu',true);
			$alamat_ortu = $this->input->post('alamat_ortu',true);
			$pekerjaan = $this->input->post('pekerjaan',true);
			//riwayat_berobat
			$status_rujukan = $this->input->post('status_rujukan',true);
			$rs = $this->input->post('rs_asal',true);
			$nama_ansuransi = $this->input->post('asuransi',true);
			if($nama_asuransi==""){ $asuransi ="-";}else{ $asuransi = $nama_asuransi;}
			$id_asuransi = $this->input->post('no_asuransi',true);
			if($id_asuransi==""){ $no_asuransi ="-";}else{ $no_asuransi = $id_asuransi;}
			if($rs==""){ $rs_asal="-"; }else{ $rs_asal=$rs;}
			$poli = $this->input->post('poli',true);
			$dokter = $this->input->post('kode_dokter',true);
			if($nama==""||$ktp==""||$jk==""||$tempat_lahir==""||$tgl_lahir==""||$tlp==""||$alamat==""||$poli==""||$dokter==""||$status_rujukan==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'id_pasien'=>$id_pasien,
					'nama_pasien'=>$nama,
					'ktp_pasien'=>$ktp,
					'jk_pasien'=>$jk,
					'status_nikah'=>$status_nikah,
					'gol_darah'=>$gol_darah,
					'tempat_lahir_pasien'=>$tempat_lahir,
					'tgl_lahir_pasien'=>$tgl_lahir,
					'agama_pasien'=>$agama,
					'tlp_pasien'=>$tlp,
					'alamat_pasien'=>$alamat,
					'nama_ortu'=>$nama_ortu,
					'ktp_ortu'=>$ktp_ortu,
					'alamat_ortu'=>$alamat_ortu,
					'pekerjaan_pasien'=>$pekerjaan
					);
				$data2 = array(
					'kode_dokter'=>$dokter,
					'id_pasien'=>$id_pasien,
					'id_poli'=>$poli,
					'id_berobat'=>$id_berobat,
					'status_rujukan'=>$status_rujukan,
					'rs_asal'=>$rs_asal,
					'asuransi'=>$asuransi,
					'no_asuransi'=>$no_asuransi,
					'tgl_berobat'=>Date('Y-m-d H:i:s')
					);
				$this->Model_rekammedis->insert_data('riwayat_berobat',$data2);
				$this->Model_rekammedis->update_data_data('pasien','id_pasien',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$now = date('Y-m-d');
		$data['action'] = site_url('welcome/editpasien/'.$id);
		$data['jadwal'] = $this->Model_rekammedis->jadwal_now($now);
		$data['dokter'] = $this->Model_rekammedis->get_data('dokter');
		$data['editpasien'] = $cek_id;
		$data['pasien'] = $this->Model_rekammedis->get_data('pasien');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('datapasien.php',$data);
	}

	function datadokter()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama_dokter',true);
			$kode = $this->input->post('kd_dokter',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$keahlian = $this->input->post('keahlian',true);
			$pass = $this->input->post('password',true);
			$password = MD5($pass);
			$cek_id = $this->Model_rekammedis->cek('dokter','kode_dokter',$kode);
			$count_id = count($cek_id);
			if($nama==""||$jk==""||$kode==""||$tlp==""||$alamat==""||$pass==""||$keahlian==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Registrasi";
			}else if($count_id!=0){
				$data['message'] = "*Kode Dokter sudah ada, pastikan kode benar";
				$data['title'] = "Registrasi";
			}else{
				$data = array(
					'nama_dokter'=>$nama,
					'kode_dokter'=>$kode,
					'jk_dokter'=>$jk,
					'tlp_dokter'=>$tlp,
					'keahlian'=>$keahlian,
					'alamat_dokter'=>$alamat,
					'password'=>$password,
					'statas_kerja'=>'1'
					);
				$this->Model_rekammedis->insert_data('dokter',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Registrasi";
			}
		}else{ $data['message'] = ""; $data['title'] = "Registrasi"; }
		$data['action'] = site_url('welcome/datadokter');
		$data['dokter'] = $this->Model_rekammedis->data_where('dokter','status_kerja','1');	
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('datadokter.php',$data);
	}

	function editdokter($id)
	{
		$cek_id = $this->Model_rekammedis->cek('dokter','kode_dokter',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datadokter');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama_dokter',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$keahlian = $this->input->post('keahlian',true);
			if($nama==""||$jk==""||$tlp==""||$alamat==""||$keahlian==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'nama_dokter'=>$nama,
					'jk_dokter'=>$jk,
					'tlp_dokter'=>$tlp,
					'keahlian'=>$keahlian,
					'alamat_dokter'=>$alamat,
					);
				$this->Model_rekammedis->update_data_data('dokter','kode_dokter',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editdokter/'.$id);
		$data['editdokter'] = $cek_id;
		$data['dokter'] = $this->Model_rekammedis->data_where('dokter','status_kerja','1');	
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('datadokter.php',$data);
	}

	function deldokter($id)
	{
		$cek_id = $this->Model_rekammedis->cek('dokter','kode_dokter',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datadokter');
		}else{
			$data = array('status_kerja'=>'0');
			$this->Model_rekammedis->update_data_data('dokter','kode_dokter',$id,$data);
			redirect('welcome/datadokter');
		}
	}

	function petugasmedis()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama_kry',true);
			$nik = $this->input->post('nik',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$jabatan = $this->input->post('jabatan',true);
			$status_admin = $this->input->post('status_admin',true);
			$pass = $this->input->post('password',true);
			$password = MD5($pass);
			$cek_id = $this->Model_rekammedis->cek('karyawan','nik',$nik);
			$count_id = count($cek_id);
			if($nama==""||$jk==""||$nik==""||$tlp==""||$alamat==""||$pass==""||$status_admin==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Registrasi";
			}else if($count_id!=0){
				$data['message'] = "*NIK karyawan sudah ada, pastikan NIK benar";
				$data['title'] = "Registrasi";
			}else{
				$data = array(
					'nama_kry'=>$nama,
					'nik'=>$nik,
					'jk_kry'=>$jk,
					'tlp_kry'=>$tlp,
					'jabatan'=>$jabatan,
					'alamat_kry'=>$alamat,
					'password'=>$password,
					'status_admin'=>$status_admin,
					'status_kerja'=>'1'
					);
				$this->Model_rekammedis->insert_data('karyawan',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Registrasi";
			}
		}else{ $data['message'] = ""; $data['title'] = "Registrasi"; }
		$data['action'] = site_url('welcome/petugasmedis');
		$data['karyawan'] = $this->Model_rekammedis->data_where('karyawan','status_kerja','1');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('petugasmedis.php',$data);
	}

	function editpetugasmedis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('karyawan','nik',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/petugasmedis');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama = $this->input->post('nama_kry',true);
			$jk = $this->input->post('jenis_kelamin',true);
			$tlp = $this->input->post('tlp',true);
			$alamat = $this->input->post('alamat',true);
			$jabatan = $this->input->post('jabatan',true);
			$status_admin = $this->input->post('status_admin',true);
			if($nama==""||$jk==""||$tlp==""||$alamat==""||$status_admin==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Registrasi";
			}else{
				$data = array(
					'nama_kry'=>$nama,
					'jk_kry'=>$jk,
					'tlp_kry'=>$tlp,
					'jabatan'=>$jabatan,
					'alamat_kry'=>$alamat,
					'status_admin'=>$status_admin,
					);
				$this->Model_rekammedis->update_data_data('karyawan','nik',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editpetugasmedis/'.$id);
		$data['editkaryawan'] = $cek_id;
		$data['karyawan'] = $this->Model_rekammedis->data_where('karyawan','status_kerja','1');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('petugasmedis.php',$data);
	}

	function delpetugasmedis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('karyawan','nik',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/petugasmedis');
		}else{
			$data = array('status_kerja'=>'0');
			$this->Model_rekammedis->update_data_data('karyawan','nik',$id,$data);
			redirect('welcome/petugasmedis');
		}
	}

	function jadwalpraktek()
	{
		$n6= mktime(0, 0, 0, date("m"), date("d")+6, date("Y")); $now = date('Y-m-d');
		$week = date('Y-m-d',$n6);
		$data['jadwal'] = $this->Model_rekammedis->jadwal_praktek($now,$week);
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('jadwal_praktek.php',$data);
	}

	function masterjadwal()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$poli = $this->input->post('poli',true);
			$datepick = $this->input->post('tgl',true);
			$tgl= date('Y-m-d', strtotime($datepick));
			$timepick1 = $this->input->post('jam_awal',true);
			$jam_awal= date('H:i:s', strtotime($timepick1));
			$timepick2 = $this->input->post('jam_akhir',true);
			$jam_akhir= date('H:i:s', strtotime($timepick2));
			$dokter_utama = $this->input->post('dokter_utama',true);
			$petugas_medis = $this->input->post('petugas_medis',true);
			if($tgl==""||$jam_akhir==""||$jam_awal==""||$dokter_utama==""||$petugas_medis==""||$poli==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Tambah";
			}else{
				$data = array(
					'tgl_jadwal'=>$tgl,
					'id_poli'=>$poli,
					'nik'=>$petugas_medis,
					'dokter_utama'=>$dokter_utama,
					'jam_awal'=>$jam_awal,
					'jam_akhir'=>$jam_akhir,
					);
				$this->Model_rekammedis->insert_data('jadwal_praktek',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Tambah";
			}
		}else{ $data['message'] = ""; $data['title'] = "Tambah"; }
		$data['action'] = site_url('welcome/masterjadwal');
		$data['karyawan'] = $this->Model_rekammedis->data_where('karyawan','status_kerja','1');
		$data['dokter'] = $this->Model_rekammedis->data_where('dokter','status_kerja','1');
		$data['datadokter'] = $this->Model_rekammedis->get_data('dokter');
		$data['poli'] = $this->Model_rekammedis->data_where('daftar_poli','status_poli','ON');
		$data['jadwal'] = $this->Model_rekammedis->master_jadwal();
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('master_jadwal.php',$data);
	}

	function editjadwal($id)
	{
		$cek_id = $this->Model_rekammedis->cek('jadwal_praktek','id_jadwal',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/masterjadwal');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$datepick = $this->input->post('tgl',true);
			$tgl= date('Y-m-d', strtotime($datepick));
			$timepick1 = $this->input->post('jam_awal',true);
			$jam_awal= date('H:i:s', strtotime($timepick1));
			$timepick2 = $this->input->post('jam_akhir',true);
			$jam_akhir= date('H:i:s', strtotime($timepick2));
			$poli = $this->input->post('poli',true);
			$dokter_utama = $this->input->post('dokter_utama',true);
			$petugas_medis = $this->input->post('petugas_medis',true);
			if($tgl==""||$jam_akhir==""||$jam_awal==""||$dokter_utama==""||$petugas_medis==""||$poli==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'tgl_jadwal'=>$tgl,
					'id_poli'=>$poli,
					'nik'=>$petugas_medis,
					'dokter_utama'=>$dokter_utama,
					'jam_awal'=>$jam_awal,
					'jam_akhir'=>$jam_akhir,
					);
				$this->Model_rekammedis->update_data_data('jadwal_praktek','id_jadwal',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editjadwal/'.$id);
		$data['editjadwal'] = $cek_id;
		$data['karyawan'] = $this->Model_rekammedis->data_where('karyawan','status_kerja','1');
		$data['dokter'] = $this->Model_rekammedis->data_where('dokter','status_kerja','1');
		$data['datadokter'] = $this->Model_rekammedis->get_data('dokter');
		$data['poli'] = $this->Model_rekammedis->data_where('daftar_poli','status_poli','ON');
		$data['jadwal'] = $this->Model_rekammedis->master_jadwal();
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('master_jadwal.php',$data);
	}

	function masterobat()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$kode_obat = $this->input->post('kode_obat',true);
			$nama_obat = $this->input->post('nama_obat',true);
			$jenis_obat = $this->input->post('jeis_obat',true);
			$harga = $this->input->post('harga',true);
			$cek_id = $this->Model_rekammedis->cek('daftar_obat','kode_obat',$kode_obat);
			$count_id = count($cek_id);
			if($kode_obat==""||$nama_obat==""||$harga==""||$jenis_obat==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Tambah";
			}else if($count_id!=0){
				$data['message'] = "*Kode obat sudah ada, pastikan kode benar";
				$data['title'] = "Tambah";
			}else{
				$data = array(
					'kode_obat'=>$kode_obat,
					'nama_obat'=>$nama_obat,
					'jenis_obat'=>$nama_obat,
					'harga_obat'=>$harga,
					);
				$this->Model_rekammedis->insert_data('daftar_obat',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Tambah";
			}
		}else{ $data['message'] = ""; $data['title'] = "Tambah"; }
		$data['action'] = site_url('welcome/masterobat');
		$data['obat'] = $this->Model_rekammedis->get_data('daftar_obat');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterobat.php',$data);
	}

	function editobat($id)
	{
		$cek_id = $this->Model_rekammedis->cek('daftar_obat','kode_obat',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/masterobat');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama_obat = $this->input->post('nama_obat',true);
			$jenis_obat = $this->input->post('jenis_obat',true);
			$harga = $this->input->post('harga',true);
			if($nama_obat==""||$harga==""||$jenis_obat==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'nama_obat'=>$nama_obat,
					'jenis_obat'=>$jenis_obat,
					'harga_obat'=>$harga,
					);
				$this->Model_rekammedis->update_data_data('daftar_obat','kode_obat',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editobat/'.$id);
		$data['editobat'] = $cek_id;
		$data['obat'] = $this->Model_rekammedis->get_data('daftar_obat');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterobat.php',$data);
	}

	function delobat($id)
	{
		$cek_id = $this->Model_rekammedis->cek('daftar_obat','kode_obat',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/masterobat');
		}else{
			$this->Model_rekammedis->delete_data('daftar_obat','kode_obat',$id);
			redirect('welcome/masterobat');
		}
	}

	function mastericd()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$kode_icd = $this->input->post('kode_icd',true);
			$nama_icd = $this->input->post('nama_icd',true);
			$ket_icd= $this->input->post('ket_icd',true);
			$cek_id = $this->Model_rekammedis->cek('daftar_icd','kode_icd',$kode_icd);
			$count_id = count($cek_id);
			if($kode_icd==""||$nama_icd==""||$ket_icd==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Tambah";
			}else if($count_id!=0){
				$data['message'] = "*Kode icd sudah ada, pastikan kode benar";
				$data['title'] = "Tambah";
			}else{
				$data = array(
					'kode_icd'=>$kode_icd,
					'nama_icd'=>$nama_icd,
					'keterangan_icd'=>$ket_icd,
					);
				$this->Model_rekammedis->insert_data('daftar_icd',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Tambah";
			}
		}else{ $data['message'] = ""; $data['title'] = "Tambah"; }
		$data['action'] = site_url('welcome/mastericd');
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('mastericd.php',$data);
	}

	function editicd($id)
	{
		$cek_id = $this->Model_rekammedis->cek('daftar_icd','kode_icd',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/mastericd');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama_icd = $this->input->post('nama_icd',true);
			$ket_icd = $this->input->post('ket_icd',true);
			if($nama_icd==""||$ket_icd==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'nama_icd'=>$nama_icd,
					'keterangan_icd'=>$ket_icd,
					);
				$this->Model_rekammedis->update_data_data('daftar_icd','kode_icd',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editicd/'.$id);
		$data['editicd'] = $cek_id;
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('mastericd.php',$data);
	}

	function masterbiaya()
	{
		$data['message'] = ""; $data['title'] = ""; 
		$data['action'] = site_url('welcome/masterbiaya');
		$data['biaya'] = $this->Model_rekammedis->get_data('master_biaya');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterbiaya.php',$data);
	}

	function editbiaya($id)
	{
		$cek_id = $this->Model_rekammedis->cek('master_biaya','id_biaya',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/masterbiaya');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$biaya_adm = $this->input->post('biaya_adm',true);
			$biaya_jasa = $this->input->post('biaya_jasa',true);
			$biaya_lab = $this->input->post('biaya_lab',true);
			$biaya_radiologi = $this->input->post('biaya_radiologi',true);
			if($biaya_adm==""||$biaya_jasa==""||$biaya_lab==""||$biaya_radiologi==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array(
					'biaya_adm'=>$biaya_adm,
					'biaya_jasa'=>$biaya_jasa,
					'biaya_lab'=>$biaya_lab,
					'biaya_radiologi'=>$biaya_radiologi,
					);
				$this->Model_rekammedis->update_data_data('master_biaya','id_biaya',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editbiaya/'.$id);
		$data['editbiaya'] = $cek_id;
		$data['biaya'] = $this->Model_rekammedis->get_data('master_biaya');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterbiaya.php',$data);
	}

	function masterpoli()
	{
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama_poli = $this->input->post('nama_poli',true);
			$status = $this->input->post('status',true);
			if($nama_poli==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Tambah";
			}else{
				$data = array(
					'nama_poli'=>$nama_poli,
					'status_poli'=>$status
					);
				$this->Model_rekammedis->insert_data('daftar_poli',$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Tambah";
			}
		}else{ $data['message'] = ""; $data['title'] = "Tambah"; }
		$data['action'] = site_url('welcome/masterpoli');
		$data['poli'] = $this->Model_rekammedis->get_data('daftar_poli');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterpoli.php',$data);
	}

	function editpoli($id)
	{
		$cek_id = $this->Model_rekammedis->cek('daftar_poli','id_poli',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/masterpoli');
		}
		$save = $this->input->post('save',true);
		if(isset($save)){
			$nama_poli = $this->input->post('nama_poli',true);
			$status = $this->input->post('status',true);
			if($nama_poli==""){
				$data['message'] = "*Data harus di isi dengan benar!";
				$data['title'] = "Edit";
			}else{
				$data = array('nama_poli'=>$nama_poli,
					'status_poli'=>$status);
				$this->Model_rekammedis->update_data_data('daftar_poli','id_poli',$id,$data);
				$data['message'] = "*Data berhasil di simpan";
				$data['title'] = "Edit";	
			}
		}else{ $data['message'] = ""; $data['title'] = "Edit"; }
		$data['action'] = site_url('welcome/editpoli/'.$id);
		$data['editpoli'] = $cek_id;
		$data['poli'] = $this->Model_rekammedis->get_data('daftar_poli');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('masterpoli.php',$data);
	}

	function ubahprofil()
	{
		$nama = $this->input->post('nama',true);
		$ktp = $this->input->post('ktp',true);
		$ttl = $this->input->post('ttl',true);
		$jenis_kelamin = $this->input->post('jenis_kelamin',true);
		$agama = $this->input->post('agama',true);
		$tlp = $this->input->post('tlp',true);
		$email = $this->input->post('email',true);
		$prodi = $this->input->post('prodi',true);
		$semester = $this->input->post('semester',true);
		$alamat = $this->input->post('alamat',true);
		$ayah = $this->input->post('ayah',true);
		$ttl_ayah = $this->input->post('ttl_ayah',true);
		$ibu = $this->input->post('ibu',true);
		$ttl_ibu = $this->input->post('ttl_ibu',true);
		$npm = $this->input->post('changeprofil',true);
		$nmfile = "user_".$npm;
		$config['upload_path'] = './assets/users/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')||$nama==""||$prodi==""||$ktp==""||$jenis_kelamin==""||$tlp==""||$email==""){
			$data['ubahpassword'] = 'welcome/ubahpassword';
			$data['ubahprofil'] = 'welcome/ubahprofile';
			$data['message_b'] = "";$data['message_c'] = "*Pastikan data diinput dengan benar";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['prodi'] = $this->Model_rekammedis->get_data('daftar_prodi');
			$data['user']= $this->Model_rekammedis->data_user();
			$this->load->view('akunsaya.php',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'nama_mhs'=>$nama,
				'ktp_mhs'=>$ktp,
				'ttl_mhs'=>$ttl,
				'jk_mhs'=>$jenis_kelamin,
				'agama_mhs'=>$agama,
				'tlp_mhs'=>$tlp,
				'email_mhs'=>$email,
				'kode_prodi'=>$prodi,
				'semester'=>$semester,
				'alamat_mhs'=>$alamat,
				'nama_ayah'=>$ayah,
				'ttl_ayah'=>$ttl_ayah,
				'nama_ibu'=>$ibu,
				'ttl_ibu'=>$ttl_ibu,
				'photo_mhs'=>$gbr['file_name'],
			);
			$this->Model_rekammedis->update_data('mahasiswa','npm',$npm,$data);
			$data['ubahpassword'] = 'welcome/ubahpassword';
			$data['ubahprofil'] = 'welcome/ubahprofile';
			$data['message_b'] = "";$data['message_c'] = "*Data berhasil diubah.";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['prodi'] = $this->Model_rekammedis->get_data('daftar_prodi');
			$data['user']= $this->Model_rekammedis->data_user();
			$this->load->view('akunsaya.php',$data);	
		}
	}

	function datamedis()
	{
		$data['topmenu'] = "top_menu";
		$data['sidebar'] = "sidebar";
		$data['action_to'] = "welcome/detail_rekam_medis";
		$data['pasien'] = $this->Model_rekammedis->get_data('pasien');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('dokter/rekammedis.php',$data);	
	}

	function detail_rekam_medis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datamedis');
		}
		$data['topmenu'] = "top_menu";
		$data['sidebar'] = "sidebar";
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['pasien'] = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$data['riwayat'] = $this->Model_rekammedis->rekam_medis($id);
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('dokter/detailmedis.php',$data);
	}

	function printrekammedis($id)
	{
		$cek_id = $this->Model_rekammedis->cek('riwayat_berobat','id_pasien',$id);
		$count_id = count($cek_id);
		if($count_id=0){
			redirect('welcome/datamedis');
		}
		$data['icd'] = $this->Model_rekammedis->get_data('daftar_icd');
		$data['pasien'] = $this->Model_rekammedis->cek('pasien','id_pasien',$id);
		$data['riwayat'] = $this->Model_rekammedis->rekam_medis($id);
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('dokter/printdetailmedis.php',$data);
	}

	function antrian()
	{
		$data['poli'] = $this->Model_rekammedis->get_data('daftar_poli');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('antrian.php',$data);
	}

	function tagihan()
	{
		$data['tagihan'] = $this->Model_rekammedis->tagihan();
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('tagihan.php',$data);
	}

	function detailtagihan($id)
	{
		$data['tagihan'] = $this->Model_rekammedis->detail_tagihan($id);
		$data['resep'] = $this->Model_rekammedis->resep($id);
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('detail_tagihan.php',$data);
	}

	function printtagihan($id)
	{
		$data['tagihan'] = $this->Model_rekammedis->detail_tagihan($id);
		$data['resep'] = $this->Model_rekammedis->resep($id);
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('print_tagihan.php',$data);
	}

	function profile()
	{
		$data['ubahpassword'] = site_url('welcome/ubahpassword');
		$data['ubahprofil'] = site_url('welcome/ubahprofile');
		$data['message_b'] = $data['message_c'] = "";
		$data['a'] = "active";$data['b'] = $data['c'] = "";
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('profil.php',$data);
	}

	function ubahpassword()
	{
		$kry= $this->Model_rekammedis->data_kry();
		$oldpass = $this->input->post('passlama',true);
		$newpass = $this->input->post('passbaru',true);
		$repass = $this->input->post('pass_konfirm',true);
		$nik = $this->input->post('ubahpass',true);
		$hast = MD5($repass);
		$hast2 = MD5($oldpass);
		if($hast2!=$kry->password){
			$data['ubahpassword'] = site_url('welcome/ubahpassword');
			$data['ubahprofil'] = site_url('welcome/ubahprofile');
			$data['message_b'] = "*Password lama salah"; $data['message_c'] = "";
			$data['b'] = "active";$data['a'] = $data['c'] = "";
			$data['kry']= $this->Model_rekammedis->data_kry();
			$this->load->view('profil.php',$data);
		}else{
			if($newpass!=$repass){
				$data['ubahpassword'] = site_url('welcome/ubahpassword');
				$data['ubahprofil'] = site_url('welcome/ubahprofile');
				$data['message_b'] = "*Konfirm password salah"; $data['message_c'] = "";
				$data['b'] = "active";$data['a'] = $data['c'] = "";
				$data['kry']= $this->Model_rekammedis->data_kry();
				$this->load->view('profil.php',$data);	
			}else{
				$data = array('password'=>$hast);
				$this->Model_rekammedis->update_data('karyawan','nik',$nik,$data);
				$data['ubahpassword'] = site_url('welcome/ubahpassword');
				$data['ubahprofil'] = site_url('welcome/ubahprofile');
				$data['message_b'] = "*Data berhasil disimpan"; $data['message_c'] = "";
				$data['b'] = "active";$data['a'] = $data['c'] = "";
				$data['kry']= $this->Model_rekammedis->data_kry();
				$this->load->view('profil.php',$data);
			}		
		}
	}

	function ubahprofile()
	{
		$nama = $this->input->post('nama',true);
		$jabatan = $this->input->post('jabatan',true);
		$jenis_kelamin = $this->input->post('jenis_kelamin',true);
		$tlp = $this->input->post('tlp',true);
		$alamat = $this->input->post('alamat',true);
		$nik = $this->input->post('ubahprofil',true);
		$nmfile = "kry_".$nik;
		$config['upload_path'] = './assets/users/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$config['max_height'] = 4000;
		$config['max_width'] = 4000;
		$config['file_name'] = $nmfile;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userfile')||$nama==""||$jabatan==""||$alamat==""||$jenis_kelamin==""||$tlp==""){
			$data['ubahpassword'] = site_url('welcome/ubahpassword');
			$data['ubahprofil'] = site_url('welcome/ubahprofile');
			$data['message_b'] = ""; $data['message_c'] = "*Pastikan data diisi dengan benar";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['kry']= $this->Model_rekammedis->data_kry();
			$this->load->view('profil.php',$data);	
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'nama_kry'=>$nama,
				'jabatan'=>$jabatan,
				'jk_kry'=>$jenis_kelamin,
				'tlp_kry'=>$tlp,
				'alamat_kry'=>$alamat,
				'foto_kry'=>$gbr['file_name'],
			);
			$this->Model_rekammedis->update_data('karyawan','nik',$nik,$data);
			$data['ubahpassword'] = site_url('welcome/ubahpassword');
			$data['ubahprofil'] = site_url('welcome/ubahprofile');
			$data['message_b'] = ""; $data['message_c'] = "*Data berhasil disimpan";
			$data['c'] = "active";$data['a'] = $data['b'] = "";
			$data['kry']= $this->Model_rekammedis->data_kry();
			$this->load->view('profil.php',$data);	
		}
	}

	function laporan()
	{
		$tampil = $this->input->post('tampil',true);
		if(isset($tampil)){
			$tglawal = $this->input->post('tglawal',true);
			$tglakhir = $this->input->post('tglakhir',true);
			$tgl1 = date('Y-m-d', strtotime($tglawal));
			$tgl2 = date('Y-m-d', strtotime($tglakhir));
			if($tglawal==""||$tglakhir==""){
				$data['message'] = "*Tanggal tidak boleh kosong";
				$data['tglakhir'] = $data['tglawal'] ="";
			}else{
				$data['tglawal'] = $tgl1; $data['message'] = "";
				$data['tglakhir'] = $tgl2;
			}
		}else{
			$data['message'] = $data['tglawal'] = $data['tglakhir'] = $tgl1 = $tgl2 = "";
		}
		$data['laporan'] = $this->Model_rekammedis->laporan($tgl1,$tgl2);
		$data['action'] = site_url('welcome/laporan');
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('laporan.php',$data);	
	}

	function download($tgl1,$tgl2)
	{
		if(empty($tgl1)||empty($tgl2)){
			redirect('welcome/laporan');
		}
		$laporan = $this->Model_rekammedis->laporan($tgl1,$tgl2);
		$tot_kunjungan = count($laporan);
		$data['tglawal'] = $tgl1; $data['tglakhir'] = $tgl2;
		$data['laporan'] = $laporan;
		$data['tot_kunjungan'] = $tot_kunjungan;
		$data['kry']= $this->Model_rekammedis->data_kry();
		$this->load->view('download.php',$data);	
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
