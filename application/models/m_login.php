<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function proses_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$sess = array(
					'id' 			=> $row->id, 
					'nama_user' 	=> $row->nama_user, 
					'username' 		=> $row->username, 
					'password' 		=> $row->password, 
					'level' 		=> $row->level
				);				
				$this->session->set_userdata($sess);
			}
			redirect('cpanel/dashboard');
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert"> Login Gagal, Silahkan Periksa Username dan Password Anda!</div>');
			redirect('panel');
		}
	}

}