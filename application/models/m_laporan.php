<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function filter($tgl_mulai, $tgl_ahir)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
		$this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
		$this->db->where('transaksi.tgl_masuk >=', $tgl_mulai);
		$this->db->where('transaksi.tgl_masuk <=', $tgl_ahir);
		return $this->db->get()->result();
	}

}