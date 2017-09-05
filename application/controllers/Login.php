<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') === "login"){
			redirect(base_url("admin"));
		}
	}

	public function index(){
		// CSRF Protection
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
			);
		// Load view
		$this->load->view('templates/header');
		$this->load->view('login/v_login', $csrf);
		$this->load->view('templates/footer');
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
			$this->load->view('templates/header');
			$this->load->view('login/v_login', $csrf);
			$this->load->view('templates/footer');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url('admin'));

		} else {
			redirect(base_url('login'));
		}
	}
}