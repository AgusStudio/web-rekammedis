<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['message'] = '';
		$data['action'] = site_url('login/login_admin');
		$this->load->view('login',$data);
	}
	
	function dokter()
	{
		$data['message'] = '';
		$data['action'] = site_url('login/login_dokter');
		$this->load->view('login',$data);
	}

	function login_admin()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$hast = MD5($password);
		$akun = $this->Model_rekammedis->cek_user($username,$hast,'karyawan','nik');
		$temp_akun = count($akun);	
		if ($temp_akun > 0)
		{
			$data = array(
				'kry'=>$username,
				'logged_in'=>true
			);	
			$this->session->set_userdata($data);
			redirect('welcome');
		}
		else
		{
			$data['message'] = '*Login gagal, pastikan username & Password benar!';
			$data['action'] = site_url('login/login_admin');
			$this->load->view('login',$data);
		}
	}

	function login_dokter()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$hast = MD5($password);
		$akun = $this->Model_rekammedis->cek_user($username,$hast,'dokter','kode_dokter');
		$temp_akun = count($akun);
		if ($temp_akun > 0)
		{
			$data = array(
				'dokter'=>$username,
				'logdokter'=>true
			);	
			$this->session->set_userdata($data);
			redirect('dokter');
		}
		else
		{
			$data['message'] = '*Login gagal, pastikan username & Password benar!';
			$data['action'] = site_url('login/login_dokter');
			$this->load->view('login',$data);
		}
	}
}