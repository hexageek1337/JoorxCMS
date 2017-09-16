<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$check_role = $this->m_login->get_user($this->session->userdata('userole_id'));
		if($this->session->userdata('logged_in') === true && $check_role->role === "admin"){
			redirect(base_url("admin"), 'refresh');
		} elseif ($this->session->userdata('logged_in') === true && $check_role->role === "member") {
			redirect(base_url("member"), 'refresh');
		}
	}

	public function index(){
		// CSRF Protection
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
			);
		// Load view
		$this->load->view('login/header');
		$this->load->view('login/v_login', $csrf);
		$this->load->view('login/footer');
	}

	public function aksi_login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			// CSRF Protection
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			// Load view
			$this->load->view('login/header');
			$this->load->view('login/v_login', $csrf);
			$this->load->view('login/footer');
		}

			$username = addslashes($this->input->post('username'));
			$password = addslashes($this->input->post('password'));
			$where = array(
				'username' => $username,
				'password' => $this->m_login->resolve_user_login($username, $password)
				);
			$cek = $this->m_login->cek_login("admin",$where)->num_rows();
			$user_id = $this->m_login->get_user_id_from_username($username);
			if($cek > 0){

				$data_session = array(
					'userole_id' => $user_id,
					'nama' => $username,
					'logged_in' => true
					);

				$this->session->set_userdata($data_session);
				$user_role = $this->m_login->get_user($this->session->userdata('userole_id'));
				if ($user_role->role === 'admin') {
					redirect(base_url('admin'));
				} else {
					redirect(base_url('member'));
				}
			} else {
				redirect(base_url('login'));
			}
	}
}
