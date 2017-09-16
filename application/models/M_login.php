<?php

class M_login extends CI_Model {
	public function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	public function GetWhere($tables, $data){
		$res=$this->db->get_where($tables, $data);
		return $res->result_array();
	}

	public function resolve_user_login($username, $password) {

		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return password_verify($password, $hash);

	}

	public function get_user_id_from_username($username) {

		$this->db->select('id');
		$this->db->from('admin');
		$this->db->where('username', $username);
		return $this->db->get()->row('id');

	}

	public function get_user($user_id) {

		$this->db->from('admin');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();

	}

}
