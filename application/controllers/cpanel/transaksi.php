<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->library('pdf_report');
		$this->load->helper('tgl_indo_helper');
	}

	public function index()
	{
		$isi['content']			= 'backend/transaksi/v_transaksi';
		$isi['judul']			= 'Data Transaksi';
		$isi['data']			= $this->m_transaksi->getData();
		$this->load->view('backend/dashboard', $isi);
	}

	public function tambah_transaksi()
	{
		$isi['content']			= 'backend/transaksi/t_transaksi';
		$isi['judul']			= 'Form Tambah Transaksi';
		$isi['kode_transaksi']	= $this->m_transaksi->generate_kode();
		$isi['konsumen']		= $this->db->get('konsumen')->result();
		$isi['paket']		= $this->db->get('paket')->result();
		$this->load->view('backend/dashboard', $isi);
	}

	public function simpan()
	{
		$data = array(
			'kode_transaksi'	=> $this->input->post('kode_transaksi'), 
			'kode_konsumen'  	=> $this->input->post('kode_konsumen'), 
			'kode_paket' 		=> $this->input->post('kode_paket'), 
			'tgl_masuk' 		=> $this->input->post('tgl_masuk'), 
			'tgl_ambil' 		=> '', 
			'berat' 			=> $this->input->post('berat'), 
			'grand_total' 		=> $this->input->post('grand_total'), 
			'status' 			=> $this->input->post('status'), 
		);
		$this->session->set_userdata($data);
		$query = $this->db->insert('transaksi', $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Transaksi Berhasil di Simpan');
			// redirect('cpanel/transaksi');
			redirect('cpanel/transaksi/cetak_nota');
		}
	}

	public function edit($kode_transaksi)
	{
		$isi['content']			= 'backend/transaksi/e_transaksi';
		$isi['judul']			= 'Form Edit Transaksi';
		$isi['data']			= $this->m_transaksi->edit($kode_transaksi);
		$isi['konsumen']		= $this->db->get('konsumen')->result();
		$isi['paket']		= $this->db->get('paket')->result();
		$this->load->view('backend/dashboard', $isi);
	}

	public function update()
	{
		$kode_transaksi = $this->input->post('kode_transaksi');
		$data = array(
			'kode_transaksi'	=> $this->input->post('kode_transaksi'), 
			'kode_konsumen'  	=> $this->input->post('kode_konsumen'), 
			'kode_paket' 		=> $this->input->post('kode_paket'), 
			'tgl_masuk' 		=> $this->input->post('tgl_masuk'), 
			'tgl_ambil' 		=> '', 
			'berat' 			=> $this->input->post('berat'), 
			'grand_total' 		=> $this->input->post('grand_total'), 
			'status' 			=> $this->input->post('status'), 
		);
		$this->session->set_userdata($data);
		$query = $this->m_transaksi->update($kode_transaksi, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Transaksi Berhasil di Update');
			redirect('cpanel/transaksi');
			// redirect('cpanel/transaksi/cetak_nota');
		}
	}

	public function get_hargaPaket()
	{
		$kode_paket = $this->input->post('kode_paket');
		$data = $this->m_transaksi->get_hargaPaket($kode_paket);
		echo json_encode($data);
	}

	public function update_status()
	{
		$kode_transaksi = $this->input->post('kt');
		$tgl_ambil = date('Y-m-d');
		$status = $this->input->post('status');
		if ($status == 'Open' OR $status == 'On Proses') {
			$this->m_transaksi->update_status($kode_transaksi, $status);			
		}else{
			$this->m_transaksi->update_status1($kode_transaksi, $status, $tgl_ambil);			
		}
		
	}

	public function cetak_nota()
	{
		$isi['data']	= $this->m_transaksi->getDataBykt($this->session->userdata('kode_transaksi'));
		$this->load->view('backend/transaksi/cetak_nota',$isi);
	}

	public function detail($kode_transaksi)
	{
		$isi['data']	= $this->m_transaksi->getDataBykt($kode_transaksi);
		$this->load->view('backend/transaksi/cetak_nota',$isi);
	}

}