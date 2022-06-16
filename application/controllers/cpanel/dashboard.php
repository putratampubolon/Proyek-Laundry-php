<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	public function index()
	{
		$isi['content']			= 'backend/home';
		$isi['konsumen']		= $this->m_dashboard->getAllKonsumen();
		$isi['new_transaksi']	= $this->m_dashboard->getAllNewTransaksi();
		$isi['total_transaksi']	= $this->m_dashboard->getAllTotalTransaksi();
		$this->load->view('backend/dashboard',$isi);
	}

}