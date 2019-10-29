<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');		
		$this->load->model('Utama_model');
	}
	
	public function index()
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			$this->load->view('home/v_home');
      		} 
      		elseif ($jenis == 'admin') {
        		redirect(base_url('home/admin'));
      		}
		}
		
	}

	function admin (){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$username = $this->session->userdata('username');
				$data['hitung'] = $this->Admin_model->hitung_post($username);
				$this->load->view('admin/v_dashboard', $data);
      		}
		}
		
	}

	function mypost($username){

		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$data['tbl_berita']= $this->Admin_model->tbl_berita($username);
				$this->load->view('admin/v_mypost', $data);	
      		}
		}

		
	}

	function newpost(){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$this->load->view('admin/v_newpost');
      		}
		}

		
	}

	function editpost($id){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$data['tbl_berita']=$this->Admin_model->detail_berita($id);
				$this->load->view('admin/v_editpost', $data);
      		}
		}

		
	}

	function add_post(){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kategori', "kategori", 'required');
		$this->form_validation->set_rules('judul', "judul", 'required');
		$this->form_validation->set_rules('id_penulis', "id_penulis", 'required');
		$this->form_validation->set_rules('penulis', "penulis", 'required');
		$this->form_validation->set_rules('tanggal_posting', "tanggal_posting", 'required');
		$this->form_validation->set_rules('image', "Post's Image");
    	$this->form_validation->set_rules('isi', "isi", 'required');

		$id = uniqid('item', TRUE);

		$isi_komentar = '';
		$penulis_komentar = '';
		$nilai = array(
			'id' => $id,
			'isi_komentar' => $isi_komentar,
			'penulis_komentar' => $penulis_komentar);
		$this->Utama_model->tambah_pesan($nilai);
			
		$config['upload_path'] = './upload/post/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '100000';
		$config['file_ext_tolower'] = TRUE;
		$config['file_name'] = str_replace('.', '_', $id);
			
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$this->load->view('admin/v_newpost');
		} else {
			$filename = $this->upload->data('file_name');
			$this->Admin_model->create($id, $filename);
			$data['tbl_berita']=$this->Admin_model->detail_berita($id);
			$this->session->set_flashdata('errror', "Berhasil Membuat Berita");
			$this->load->view('admin/v_detail', $data);
		}
      		}
		}

		

		/*$this->upload->do_upload('image');
		$kategori = $this->input->post('kategori');
		$judul = $this->input->post('judul');
		$id_penulis = $this->input->post('id_penulis');
		$penulis = $this->input->post('penulis');
		$tanggal_posting = $this->input->post('tanggal_posting');
		$gambar = $this->upload->data('file_name');
		$isi = $this->input->post('isi');
		$data = array(
			'kategori' => $kategori,
			'judul' => $judul,
			'id_penulis' => $id_penulis,
			'penulis' => $penulis,
			'tanggal_posting' => $tanggal_posting,
			'gambar' => $gambar,
			'isi' => $isi);
		$this->Admin_model->tambah_data($data);

		$hasil = $this->Utama_model->last();
		$row1 = $hasil->row_array();

		$user = array(
			'id' => $row1['id']);
		$this->session->set_userdata($user);
		$coba = (string)$this->session->userdata('id');
	
		$id = $coba;
		$isi_komentar = '';
		$penulis_komentar = '';
		$nilai = array(
			'id' => $id,
			'isi_komentar' => $isi_komentar,
			'penulis_komentar' => $penulis_komentar);
		$this->Utama_model->tambah_pesan($nilai);
		redirect(base_url('home/admin'));*/
	}

	function detail($id){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$data['tbl_berita']=$this->Admin_model->detail_berita($id);
		$this->load->view('admin/v_detail', $data);
      		}
		}

		
	}

	function update($id){
		if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {
      			$this->load->helper('form');
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('judul', "judul", 'required');
    	$this->form_validation->set_rules('isi', "isi", 'required');
    	$this->form_validation->set_rules('image', "Post's Image");

    	if ($this->form_validation->run() === FALSE) {
    		$data['tbl_berita']=$this->Admin_model->detail_berita($id);
			$this->load->view('admin/v_detail', $data);    		
    	} else {
    		/*$data = $this->Admin_model->readforupdate($id);
    		echo $data->gambar;*/
    		if (!$this->input->post('file')) {
    			$data = $this->Admin_model->readforupdate($id);

	    		$config['upload_path']      = './upload/post/';
			    $config['allowed_types']    = 'jpg|jpeg|png';
			    $config['max_size']         = '100000';
			    $config['file_ext_tolower'] = true;
			    $config['overwrite']        = true;
			    $config['file_name']        = $data->gambar;

			    $this->load->library('upload', $config);

			    if (!$this->upload->do_upload('image')) {
			    	redirect('home/detail/'.$id);
			    } else {
			    	$this->Admin_model->update($id);
			    	redirect('home/detail/'.$id);
			    }
    		} else {
    			$this->Admin_model->update($id);
    			redirect('home/detail/'.$id);
    		}
    	}
      		}
		}

		
    }

    function delete($id){
    	if ($this->session->userdata('status') != "login"){
			redirect(base_url());
		} else {
			$jenis = $this->session->userdata('jenis_akun');
      		if ($jenis == 'biasa') {
      			redirect(base_url('home'));
      		} 
      		elseif ($jenis == 'admin') {

    	$this->Admin_model->delete($id);
    	redirect('home/admin');
      		}
		}


    }

}