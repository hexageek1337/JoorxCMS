<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
	public function __construct() {
		parent::__construct();
		$this->load->helper('url_helper');
	}

	public function index() {
		// Pagination
		$config['base_url'] = base_url('blog/index');
		$config['total_rows'] = $this->news_model->num_rows();
		$config['per_page'] = 6;
		$config['num_links'] = $config['total_rows'] / $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a onclick='scrolltotop()'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";

		$config['first_link'] = 'First';
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		$this->pagination->initialize($config);

		$offset = intval($this->uri->segment(3));
		$data['seeker'] = $this->news_model->seekerlist($config['per_page'], $offset);
		$data['links'] = $this->pagination->create_links();
		// Load views
		$this->load->view('blog/header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('blog/footer');
	}

	public function tag() {
		// Pagination
		$nametags = addslashes($this->uri->segment(3));
		$offset = intval($this->uri->segment(4));
		$config['base_url'] = base_url('blog/tag/'.$nametags);
		$config['total_rows'] = $this->news_model->num_rows_by_tags($nametags);
		$config['per_page'] = 6;
		$config['num_links'] = $config['total_rows'] / $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a onclick='scrolltotop()'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";

		$config['first_link'] = 'First';
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		$this->pagination->initialize($config);

		$data['seeker'] = $this->news_model->seekerlist_by_tags($nametags, $config['per_page'], $offset);
		$data['links'] = $this->pagination->create_links();
		// Load views
		$this->load->view('blog/tag/header', $data);
		$this->load->view('blog/tags', $data);
		$this->load->view('blog/footer');
	}

	public function view($slug = NULL) {
		$data['news_slug'] = $this->news_model->get_news($slug);
		// Load views
		$this->load->view('blog/view/header', $data);
		$this->load->view('blog/view', $data);
		$this->load->view('blog/footer');
	}
}
