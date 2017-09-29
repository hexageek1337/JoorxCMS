<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Joorx extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function sitemap() {
		$data['data'] = $this->news_model->getall_news();
		header("Content-Type: text/xml;charset=iso-8859-1");

		// Load view
		$this->load->view('pages/sitemap', $data);
	}

	public function view($templates = 'index')
	{
		// Check file exists
		if (!file_exists(APPPATH."views/pages/".$templates.'.php')) {
			show_404();
		} elseif ($templates == 'kontak') {
			$data['class'] = 'kontak';

			// Load view
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$templates);
			$this->load->view('templates/footer');
		} elseif ($templates == 'tentang') {
			$data['class'] = 'tentang';

			// Load view
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$templates);
			$this->load->view('templates/footer');
		} else {
			$data['class'] = 'index';

			// Load view
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$templates);
			$this->load->view('templates/footer');
		}
	}
}
