<?php
defined('BASEPATH') OR EXIT('No direct access allowed');

class Model_rekammedis extends CI_Model
{
	public	function __construct()
	{
		parent::__construct();
	}
	
	public function get_data($tabel)
	{
		return $this->db->get($tabel)->result();
	}

	function data_dokter()
	{
		$username = $this->session->userdata('dokter');
		$this->db->where('kode_dokter',$username);
		return $this->db->get('dokter')->row();	
	}

	function data_kry()
	{
		$username = $this->session->userdata('kry');
		$this->db->where('nik',$username);
		return $this->db->get('karyawan')->row();
	}

	function cek_user($username,$hast,$tabel,$field)
	{
		$this->db->where($field,$username);
		$this->db->where('password',$hast);
		$this->db->where('status_kerja','1');
		return $this->db->get($tabel)->row();
	}

	function insert_data($tabel,$data)
	{
		return $this->db->insert($tabel,$data);
	}

	function cek($tabel,$f,$v)
	{
		return $this->db->where($f,$v)->get($tabel)->row();
	}

	function update_data($table,$field,$con,$data)
	{
		$this->db->where($field,$con);
		$this->db->update($table,$data);
	}

	function data_where($tabel,$f,$v)
	{
		$this->db->where($f,$v);
		return $this->db->get($tabel)->result();	
	}

	function jadwal_praktek($con1,$con2)
	{
		$this->db->select("jadwal_praktek.*,karyawan.nama_kry,daftar_poli.nama_poli,DATE_FORMAT(jadwal_praktek.tgl_jadwal,('%W,%d/%m/%Y')) as tgl, DATE_FORMAT(jadwal_praktek.jam_awal,('%H:%i')) as h1, DATE_FORMAT(jadwal_praktek.jam_akhir,('%H:%i')) as h2,dokter.nama_dokter");
		$this->db->from('jadwal_praktek');
		$this->db->join('daftar_poli', 'jadwal_praktek.id_poli = daftar_poli.id_poli');
		$this->db->join('karyawan', 'jadwal_praktek.nik = karyawan.nik');
		$this->db->join('dokter', 'jadwal_praktek.dokter_utama = dokter.kode_dokter');
		$this->db->where("jadwal_praktek.tgl_jadwal between '$con1' and '$con2'");
		$this->db->order_by('jadwal_praktek.tgl_jadwal','asc');
		return $this->db->get()->result();	
	}

	function master_jadwal()
	{
		$this->db->select("jadwal_praktek.*,karyawan.nama_kry,daftar_poli.nama_poli,DATE_FORMAT(jadwal_praktek.tgl_jadwal,('%W,%d/%m/%Y')) as tgl, DATE_FORMAT(jadwal_praktek.jam_awal,('%H:%i')) as h1, DATE_FORMAT(jadwal_praktek.jam_akhir,('%H:%i')) as h2");
		$this->db->from('jadwal_praktek');
		$this->db->join('daftar_poli', 'jadwal_praktek.id_poli = daftar_poli.id_poli');
		$this->db->join('karyawan', 'jadwal_praktek.nik = karyawan.nik');
		$this->db->order_by('jadwal_praktek.tgl_jadwal','desc');
		return $this->db->get()->result();	
	}

	function jadwal_now($now)
	{
		$this->db->select("jadwal_praktek.id_poli,daftar_poli.nama_poli,jadwal_praktek.dokter_utama,jadwal_praktek.status_kehadiran");
		$this->db->from('jadwal_praktek');
		$this->db->join('daftar_poli', 'jadwal_praktek.id_poli = daftar_poli.id_poli');
		$this->db->where('jadwal_praktek.tgl_jadwal',$now);
		return $this->db->get()->result();	
	}

	function delete_data($tabel,$f,$v)
	{
		$this->db->where($f,$v);
		$this->db->delete($table);
	}

	function antrian($f,$v,$now)
	{
		$this->db->select("riwayat_berobat.*,daftar_poli.nama_poli,dokter.nama_dokter,pasien.nama_pasien");
		$this->db->from('riwayat_berobat');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->join('pasien','riwayat_berobat.id_pasien = pasien.id_pasien');
		$this->db->join('dokter','riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->where($f,$v);
		$this->db->where("DATE_FORMAT(tgl_berobat,('%Y-%m-%d'))",$now);
		$this->db->where('riwayat_berobat.status_berobat','0');
		$this->db->order_by('riwayat_berobat.id_berobat','asc');
		return $this->db->get()->result();	
	}

	function diagnosa($id)
	{
		$this->db->join('pasien', 'riwayat_berobat.id_pasien = pasien.id_pasien');
		$this->db->where('riwayat_berobat.id_berobat',$id);
		return $this->db->get('riwayat_berobat')->row();	
	}

	function rekam_medis1($id)
	{
		$this->db->join('dokter', 'riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->where('riwayat_berobat.id_pasien',$id);
		return $this->db->get('riwayat_berobat')->result();	
	}

	function rekam_medis($id)
	{
		$this->db->join('dokter', 'riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->where('riwayat_berobat.id_pasien',$id);
		$this->db->where('riwayat_berobat.status_berobat','1');
		return $this->db->get('riwayat_berobat')->result();	
	}

	function tagihan()
	{
		$this->db->join('pasien', 'riwayat_berobat.id_pasien = pasien.id_pasien');
		$this->db->join('dokter', 'riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->join('faktur', 'faktur.id_berobat= riwayat_berobat.id_berobat');
		$this->db->where('riwayat_berobat.status_berobat','1');
		return $this->db->get('riwayat_berobat')->result();	
	}

	function detail_tagihan($id)
	{
		$this->db->join('pasien', 'riwayat_berobat.id_pasien = pasien.id_pasien');
		$this->db->join('dokter', 'riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->join('faktur', 'faktur.id_berobat= riwayat_berobat.id_berobat');
		$this->db->where('riwayat_berobat.id_berobat',$id);
		$this->db->where('riwayat_berobat.status_berobat','1');
		return $this->db->get('riwayat_berobat')->row();	
	}

	function resep($id)
	{
		$this->db->select("*");
		$this->db->from("resep_obat,daftar_obat");
		$this->db->where("resep_obat.kode_obat=daftar_obat.kode_obat");
		$this->db->where('resep_obat.id_berobat',$id);
		return $this->db->get()->result();	
	}

	function cek_biaya_obat($id)
	{
		$this->db->select("sum(resep_obat.qty*daftar_obat.harga_obat) as tot_biaya_obat");
		$this->db->from("resep_obat,daftar_obat");
		$this->db->where("resep_obat.kode_obat=daftar_obat.kode_obat");
		$this->db->where('resep_obat.id_berobat',$id);
		return $this->db->get()->row();	
	}

	function rekam_diagnosa($id)
	{
		$this->db->join('daftar_icd', 'riwayat_medis.kode_icd = daftar_icd.kode_icd');
		$this->db->where('riwayat_medis.id_berobat',$id);
		return $this->db->get('riwayat_medis')->result();	
	}

	function laporan($tgl1,$tgl2)
	{
		$this->db->select("riwayat_berobat.*,dokter.nama_dokter,daftar_poli.nama_poli,pasien.*");
		$this->db->from("riwayat_berobat");
		$this->db->join('pasien', 'riwayat_berobat.id_pasien = pasien.id_pasien');
		$this->db->join('dokter', 'riwayat_berobat.kode_dokter = dokter.kode_dokter');
		$this->db->join('daftar_poli', 'riwayat_berobat.id_poli = daftar_poli.id_poli');
		$this->db->where('riwayat_berobat.status_berobat','1');
		$this->db->where("(riwayat_berobat.tgl_berobat between '$tgl1' and '$tgl2')");
		$this->db->order_by('riwayat_berobat.tgl_berobat','asc');
		return $this->db->get()->result();	
	}

	function inc_table($table){
		$query = $this->db->query("show table status like '$table'");
		return $query->row();
	}

}