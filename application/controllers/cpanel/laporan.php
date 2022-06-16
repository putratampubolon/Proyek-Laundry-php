<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->load->library('pdf_report');
		$this->load->helper('tgl_indo_helper');
	}

	public function index()
	{
		$isi['content']		= 'backend/laporan/filter';
		$isi['judul']		= 'Filter Laporan';
		$this->load->view('backend/dashboard', $isi);
	}

	public function filter()
	{
		$tgl_mulai 		= $this->input->post('tanggal_mulai');
		$tgl_ahir 		= $this->input->post('tanggal_ahir');
		$isi['data']	= $this->m_laporan->filter($tgl_mulai, $tgl_ahir);
		$this->session->set_userdata('tanggal_mulai', $tgl_mulai);
		$this->session->set_userdata('tanggal_ahir', $tgl_ahir);
		$this->load->view('backend/laporan/cetak_laporan', $isi);
	}

}