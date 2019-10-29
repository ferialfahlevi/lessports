<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function tambah_data($data){
		$this->db->insert('tbl_berita', $data);
	}

	function tbl_berita($username){
		$this->db->where('id_penulis', $username);
		return $this->db->get('tbl_berita');
	}

	function detail_berita($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_berita');
	}

	function hitung_post($username){
		$this->db->select('COUNT(id_penulis) as count');
		$this->db->from('tbl_berita');
		$this->db->where('id_penulis', $username);
		$query = $this->db->get();
		if ($query->num_rows() > 0 ){
			$row = $query->row();
			return $row->count;
		}
		return 0;
	}

	function update($id){
	    $data = array(
			'judul' 	=> $this->input->post('judul'),
			'isi' 		=> $this->input->post('isi'));
	    $this->db->where('id', $id);
	    $this->db->update('tbl_berita', $data);
	}

	function read($id = FALSE){
		if ($id === FALSE) {
			$query = $this->db->get('tbl_berita');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('tbl_berita', array('id' => $id));
			return $query->row();
		}
	}

	function create($id, $filename){
		$data = array(
			'id'		=> $id,
			'kategori' 	=> $this->input->post('kategori', TRUE),
			'judul' 	=> $this->input->post('judul', TRUE),
			'id_penulis'=> $this->input->post('id_penulis', TRUE),
			'penulis' 	=> $this->input->post('penulis', TRUE),
			'tanggal_posting' => $this->input->post('tanggal_posting', TRUE),
			'gambar' 	=> $filename,
			'isi' 		=> $this->input->post('isi', TRUE));
		$this->db->insert('tbl_berita', $data);
	}

	function readforupdate($id){
		$query = $this->db->get_where('tbl_berita', array('id' => $id));
		return $query->row();
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('tbl_berita');
	}
}