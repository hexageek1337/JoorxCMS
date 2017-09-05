<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Config Upload Library
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/images/';
		$config['upload_url'] = base_url().'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		// Config Slug Library
		$configslug = array(
			'field' => 'slug',
			'title' => 'title',
			'table' => 'news',
			'id' => 'id');
		// Load Model , Helper and Library
		$this->load->library('slug', $configslug);
		$this->load->library('upload', $config);
		// Redirect session not available
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function json(){
		$this->datatables->select('id,title');
        $this->datatables->add_column('images', '<img src="assets/images/$1" width=200 height=100>', 'images');
        $this->datatables->add_column('action', anchor('admin/edit_data/$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'id');
        $this->datatables->from('news');
        return print_r($this->datatables->generate());
    }

	public function insert(){
		$this->form_validation->set_rules('title', 'Judul', 'required|max_length[45]', array('max_length[45]' => 'Maximal 45 Characters'));
		$this->form_validation->set_rules('text', 'Konten', 'required');
		$this->form_validation->set_rules('images', 'Gambar', 'required');

		if ($this->form_validation->run() == FALSE) {
			// CSRF Protection
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			// Session Checking
			$data['session'] = $this->session->userdata("nama");
			// Settings SEO
			$data['joorxcms_title'] = 'Joorx CMS';
			$data['joorxcms_description'] = 'Berbagai Informasi Teknologi Teraktual dan Terbaru';
			$data['joorxcms_keywords'] = 'teknologi,teraktual,terbaru,berita,informasi,tech,blog,seo,marketing';
			$data['joorxcms_copyright'] = 'JoorxCMS';
			$data['joorxcms_author'] = 'Denny Septian';
			$data['joorxcms_language'] = 'Indonesia';
			$data['joorxcms_url'] = 'http://localhost/';
			// Load view
			$this->load->view('admin/header', $data);
			$this->load->view('admin/form_add', $csrf);
			$this->load->view('admin/footer');
		}

		if (! $this->upload->do_upload('images')) {
			// CSRF Protection
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			// Session Checking
			$data['session'] = $this->session->userdata("nama");
			// Settings SEO
			$data['joorxcms_title'] = 'Joorx CMS';
			$data['joorxcms_description'] = 'Berbagai Informasi Teknologi Teraktual dan Terbaru';
			$data['joorxcms_keywords'] = 'teknologi,teraktual,terbaru,berita,informasi,tech,blog,seo,marketing';
			$data['joorxcms_copyright'] = 'JoorxCMS';
			$data['joorxcms_author'] = 'Denny Septian';
			$data['joorxcms_language'] = 'Indonesia';
			$data['joorxcms_url'] = 'http://localhost/';
			// Load view
			$this->load->view('admin/header', $data);
			$this->load->view('admin/form_add', $csrf);
			$this->load->view('admin/footer');
		} else {
			$images = $_FILES['images']['name'];
			$datas = array(
				'title' => $this->input->post('title'),
				'text' => $this->input->post('text'),
				'images' => $images);
			$datas['slug'] = $this->slug->create_uri($datas);
			$datas = $this->admincrud->Insert('news', $datas);

			redirect(base_url('admin'),'refresh');
		}
	}

	public function add_data(){
		// CSRF Protection
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			// Session Checking
			$data['session'] = $this->session->userdata("nama");
			// Settings SEO
			$data['joorxcms_title'] = 'Joorx CMS';
			$data['joorxcms_description'] = 'Berbagai Informasi Teknologi Teraktual dan Terbaru';
			$data['joorxcms_keywords'] = 'teknologi,teraktual,terbaru,berita,informasi,tech,blog,seo,marketing';
			$data['joorxcms_copyright'] = 'JoorxCMS';
			$data['joorxcms_author'] = 'Denny Septian';
			$data['joorxcms_language'] = 'Indonesia';
			$data['joorxcms_url'] = 'http://localhost/';
		// Load view
		$this->load->view('admin/header', $data);
		$this->load->view('admin/form_add', $csrf);
		$this->load->view('admin/footer');
	}

	public function edit_data($id) {
		if ($id == NULL) {
			echo 'ID tidak valid';
		} else {
			$siswa = $this->admincrud->GetWhere('news', array('id' => $id));
			$data = array(
				'id' => $siswa[0]['id'],
				'title' => $siswa[0]['title'],
				'text' => $siswa[0]['text'],
				'images' => $siswa[0]['images']);
			// CSRF Protection
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			// Session Checking
			$data['session'] = $this->session->userdata("nama");
			// Settings SEO
			$data['joorxcms_title'] = 'Joorx CMS';
			$data['joorxcms_description'] = 'Berbagai Informasi Teknologi Teraktual dan Terbaru';
			$data['joorxcms_keywords'] = 'teknologi,teraktual,terbaru,berita,informasi,tech,blog,seo,marketing';
			$data['joorxcms_copyright'] = 'JoorxCMS';
			$data['joorxcms_author'] = 'Denny Septian';
			$data['joorxcms_language'] = 'Indonesia';
			$data['joorxcms_url'] = 'http://localhost/';
			// Load view
			$this->load->view('admin/header', $data);
			$this->load->view('admin/form_edit', $data, $csrf);
			$this->load->view('admin/footer');

			if ($this->input->post('submit')) {
				if (! $this->upload->do_upload('images')) {
					echo $this->upload->display_errors();
				}

				//$this->form_validation->set_rules('id', 'ID', 'required');
				$this->form_validation->set_rules('title', 'Judul', 'required|max_length[45]', array('max_length[45]' => 'Maximal 45 Characters'));
				$this->form_validation->set_rules('text', 'Konten', 'required');
				//$this->form_validation->set_rules('images', 'Gambar', 'required');

				if ($this->form_validation->run() == TRUE) {
					$id = $this->input->post('id');
					$title = $this->input->post('title');
					$text = $this->input->post('text');
					$images = $_FILES['images']['name'];
					$data = array(
						'title' => $title,
						'images' => $images,
						'text' => $text);
					$data['slug'] = $this->slug->create_uri($data);
					$this->db->where('id', $id);
           			$update = $this->db->update('news', $data, array('id' => $id));

					if($update > 0){
						//redirect('admin','refresh');
						echo 'Berhasil Disimpan';
					} else {
						echo 'Gagal Disimpan';
					}
				} else {
					echo validation_errors();
				}
			}
		}
	}

	public function delete_data($id){
		if ($id === NULL) {
			redirect(base_url('admin'));
		} else {
			$id = array('id' => $id);
			$siswa = $this->admincrud->GetWhere('news', $id);
			$this->admincrud->Delete('news', $id);
			unlink(FCPATH.'images/gallery/'.$siswa[0]['images']);
			// Refresh
			redirect(base_url('admin'),'refresh');
		}
	}

	public function logout() {
		if($this->session->userdata('status') === "login"){
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
	}

	public function index(){
		// Load model crud
        $data = $this->admincrud->GetNews();
        $data = array('data' => $data);
        // CSRF Protection
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash());
		// Session Checking
		$data['session'] = $this->session->userdata("nama");
		// Settings SEO
		$data['joorxcms_title'] = 'Joorx CMS';
		$data['joorxcms_description'] = 'Berbagai Informasi Teknologi Teraktual dan Terbaru';
		$data['joorxcms_keywords'] = 'teknologi,teraktual,terbaru,berita,informasi,tech,blog,seo,marketing';
		$data['joorxcms_copyright'] = 'JoorxCMS';
		$data['joorxcms_author'] = 'Denny Septian';
		$data['joorxcms_language'] = 'Indonesia';
		$data['joorxcms_url'] = 'http://localhost/';
		// Load view
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}
}