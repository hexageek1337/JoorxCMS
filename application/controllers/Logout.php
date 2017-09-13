<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Redirect session not available
	}

	public function index() {
		$check_role = $this->m_login->get_user($this->session->userdata('userole_id'));
		if($this->session->userdata('logged_in') === true && $check_role->role === "admin" OR $check_role->role === "member"){
			$this->session->sess_destroy();
			redirect(base_url('login'), 'refresh');
		}
	}
}
