<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ceklondri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ceklondri');
		$this->load->helper('tgl_indo_helper');
	}

	public function index()
	{

		$kode_transaksi = $this->input->post('kode_transaksi');
		$isi['data'] = $this->m_ceklondri->cek_status($kode_transaksi);
		$this->load->view('frontend/header');
		$this->load->view('frontend/cek_londri',$isi);
		$this->load->view('frontend/footer');
	}

}