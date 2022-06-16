<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function generate_kode()
	{
		$this->db->select('RIGHT(transaksi.kode_transaksi,3) as kode', false);
		$this->db->order_by('kode_transaksi', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;            
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,3,"0", STR_PAD_LEFT);
        $kodejadi = "T".$kodemax;
        return $kodejadi;
	}

	public function getData()
	{
		$this->db->select('*');

		$this->db->from('transaksi');
		$this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
		$this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
		$this->db->order_by('transaksi.kode_transaksi', 'asc');
		return $this->db->get()->result();
	}

	public function get_hargaPaket($kode_paket)
	{
		$this->db->select('harga_paket');
		$this->db->from('paket');
		$this->db->where('kode_paket', $kode_paket);
		return $this->db->get()->row_array();
	}

	public function update_status($kode_transaksi, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('transaksi');
	}

	public function update_status1($kode_transaksi, $status, $tgl_ambil)
	{
		$this->db->set('status', $status);
		$this->db->set('tgl_ambil', $tgl_ambil);
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('transaksi');
	}

	public function getDataBykt($kt)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
		$this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
		$this->db->where('transaksi.kode_transaksi', $kt);
		return $this->db->get()->row_array();
	}

	public function edit($kode_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
		$this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		return $this->db->get()->row_array();
	}

	public function update($kode_transaksi, $data)
	{
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('transaksi', $data);
	}

}