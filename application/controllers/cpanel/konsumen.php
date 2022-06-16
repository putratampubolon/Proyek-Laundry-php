<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_konsumen');
	}

	public function index()
	{
		$isi['content'] 	= 'backend/konsumen/v_konsumen';
		$isi['judul']		= 'Data Konsumen';
		$isi['data']		= $this->db->get('konsumen')->result();
		$this->load->view('backend/dashboard', $isi);
	}

	public function tambah_konsumen()
	{
		$isi['content'] 		= 'backend/konsumen/t_konsumen';
		$isi['judul']			= 'Tambah Konsumen';
		$isi['kode_konsumen']	= $this->m_konsumen->generate_kode();
		$this->load->view('backend/dashboard', $isi);
	}

	public function simpan()
	{
		$data = array(
			'kode_konsumen' 	=> $this->input->post('kode_konsumen'), 
			'nama_konsumen' 	=> $this->input->post('nama_konsumen'), 
			'alamat_konsumen' 	=> $this->input->post('alamat_konsumen'), 
			'no_hp' 			=> $this->input->post('no_hp') 
		);
		$query = $this->db->insert('konsumen', $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Konsumen Berhasil di Simpan');
			redirect('cpanel/konsumen');
		}
	}

	public function edit_konsumen($kode_konsumen)
	{
		$isi['content'] 		= 'backend/konsumen/e_konsumen';
		$isi['judul']			= 'Edit Konsumen';
		$isi['data']			= $this->m_konsumen->edit_konsumen($kode_konsumen);
		$this->load->view('backend/dashboard', $isi);
	}

	public function update()
	{
		$kode_konsumen = $this->input->post('kode_konsumen');
		$data = array(
			'kode_konsumen' 	=> $this->input->post('kode_konsumen'), 
			'nama_konsumen' 	=> $this->input->post('nama_konsumen'), 
			'alamat_konsumen' 	=> $this->input->post('alamat_konsumen'), 
			'no_hp' 			=> $this->input->post('no_hp') 
		);
		$query = $this->m_konsumen->update($kode_konsumen, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Konsumen Berhasil di Update');
			redirect('cpanel/konsumen');
		}
	}

	public function delete_konsumen($kode_konsumen)
	{
		$query = $this->m_konsumen->delete_konsumen($kode_konsumen);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Konsumen Berhasil di Hapus');
			redirect('cpanel/konsumen');
		}
	}

}