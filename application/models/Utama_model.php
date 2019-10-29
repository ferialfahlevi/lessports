<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama_model extends CI_Model {
	
	function tambah_data($data){
		$this->db->insert('tbl_pengguna', $data);
	}

	function update_data($data, $username){
		$this->db->where('username', $username);
		$this->db->set($data);
		$this->db->update('tbl_pengguna');
	}

	function tampil_data($jenis)
	{
		$this->db->where('kategori', $jenis);
		$this->db->order_by('id', 'desc');
		return $this->db->get('tbl_berita');
	}

	function last(){
		$this->db->order_by('id', 'desc');
		$this->db->limit('1');
		return $this->db->get('tbl_berita');
	}

	function detail_berita($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_berita');
	}

	function tambah_pesan($data){
		$this->db->insert('tbl_komentar', $data);
	}

	function detail_komentar($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_komentar');
	}

	function reader($id){
		$this->db->where('id', $id);
		$this->db->set('reader', 'reader + 1', FALSE);
		$this->db->update('tbl_berita');
	}

}