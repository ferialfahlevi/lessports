<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utama_model');
		$this->load->model('Login_model');
	}
	
	public function index()
	{
		// $jsonobj = '{"Peter":"35","Ben":"37","Joe":"43"}';
		// var_dump(json_decode($jsonobj, true));
		$this->load->view('v_tampilan_awal');
	}

	function action_logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function action_register(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jenis_akun = 'biasa';
		$tanggal_daftar = $this->input->post('tanggal_daftar');
		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'jenis_akun' => $jenis_akun,
			'tanggal_daftar' => $tanggal_daftar);
		$this->Utama_model->tambah_data($data);
		redirect(base_url());
	}

	function timeline($jenis){
		if ($jenis == 'atletik') {
			$data ['tbl_berita'] = $this->Utama_model->tampil_data($jenis);
			$this->session->set_flashdata('error', "Atletik");
			$this->load->view('home/v_timeline', $data);	
		} 
		elseif ($jenis == 'bola') {
			$data ['tbl_berita'] = $this->Utama_model->tampil_data($jenis);
			$this->session->set_flashdata('error', "Bola");
			$this->load->view('home/v_timeline', $data);	
		}
		elseif ($jenis == 'air') {
			$data ['tbl_berita'] = $this->Utama_model->tampil_data($jenis);
			$this->session->set_flashdata('error', "Air");
			$this->load->view('home/v_timeline', $data);	
		}
		elseif ($jenis == 'udara') {
			$data ['tbl_berita'] = $this->Utama_model->tampil_data($jenis);
			$this->session->set_flashdata('error', "Udara");
			$this->load->view('home/v_timeline', $data);	
		}
		elseif ($jenis == 'beladiri') {
			$data ['tbl_berita'] = $this->Utama_model->tampil_data($jenis);
			$this->session->set_flashdata('error', "Bela Diri");
			$this->load->view('home/v_timeline', $data);	
		}
	}

	function action_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$pengguna = $this->Login_model->coba_login($username);
		$row1 = $pengguna->row_array();

		$user = array(
			'username' => $username,
			'password' => ($password));
		$cek = $this->Login_model->cek_login("tbl_pengguna", $user)->num_rows();

		if ($cek > 0) {
			$online = 'online';
			$data = array(
				'online' => $online);
			$this->Utama_model->update_data($data, $username);

			$data_session = array(
				'nama' => $row1['nama'],
				'username' => $row1['username'],
				'kategori' => $row1['kategori'],
				'jenis_akun' => $row1['jenis_akun'],
				'status' => "login");
			$this->session->set_userdata($data_session);

      		$jenis = $this->session->userdata('jenis_akun');
      			if ($jenis == 'biasa') {
      				redirect(base_url('home'));
      			} 
      			elseif ($jenis == 'admin') {
        			redirect(base_url('home/admin'));
      			}
		} else {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissable centered'>
        	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          	Wrong username or password.</div>");
          	redirect(base_url());
		}
	}

	function detail($id){
		$this->Utama_model->reader($id);
		$data['tbl_berita']=$this->Utama_model->detail_berita($id);
		$data['tbl_komentar']=$this->Utama_model->detail_komentar($id);
		$this->load->view('home/v_berita', $data);
	}

	function mypost($username){
		$data['tbl_berita']= $this->Admin_model->tbl_berita($username);
		$this->load->view('admin/v_mypost', $data);	
	}

	function tambah_komentar(){
		$id = $this->input->post('id');
		$isi_komentar = $this->input->post('isi_komentar');
		$penulis_komentar = $this->input->post('penulis_komentar');
		$data = array(
			'id' => $id,
			'isi_komentar' => $isi_komentar,
			'penulis_komentar' => $penulis_komentar);
		$this->Utama_model->tambah_pesan($data);
		$url = base_url('utama/detail/');
		$hasil = $url.$id;
		redirect($hasil);
	}
}