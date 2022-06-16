<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function getAllKonsumen()
	{
		return $this->db->get('konsumen')->num_rows();
	}

	public function getAllNewTransaksi()
	{		
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status', 'Open');
		return $this->db->get()->num_rows();
	}

	public function getAllTotalTransaksi()
	{
		return $this->db->get('transaksi')->num_rows();
	}

}