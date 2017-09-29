<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Config Slug Library
		$configslug = array(
			'field' => 'slug',
			'title' => 'title',
			'table' => 'news',
			'id' => 'id');
		// Load Model , Helper and Library
		$this->load->library('slug', $configslug);
		// Redirect session not available
		$check_role = $this->m_login->get_user($this->session->userdata('userole_id'));
		if($this->session->userdata('logged_in') != true){
			redirect(base_url("login"), 'refresh');
		} elseif ($check_role->role != "member") {
			redirect(base_url("admin"), 'refresh');
		}
	}

	public function index() {
		$data['titles'] = 'Announcement'; //judul title
		$data['session'] = $this->session->userdata('nama');

		$this->load->view('member/header',$data); //load views header
		$this->load->view('member/index',$data); //load views vbarang
		$this->load->view('member/footer'); //load views footer
	}

	public function berita()
    {
        $data['titles'] = 'Daftar Berita'; //judul title
				$data['session'] = $this->session->userdata('nama');
				// Pagination
				$config['base_url'] = base_url('member/berita');
				$config['total_rows'] = $this->admincrud->num_rows('news');
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

				$data['qbarang'] = $this->admincrud->get_newspagination('news', $config['per_page'], $this->uri->segment(3));
				$data['links'] = $this->pagination->create_links();

				$this->load->view('member/header',$data); //load views header
        $this->load->view('member/vbarang',$data); //load views vbarang
				$this->load->view('member/footer'); //load views footer

    }

		public function category()
	    {
	        $data['titles'] = 'Daftar Category'; //judul title
					$data['session'] = $this->session->userdata('nama');
					// Pagination
					$config['base_url'] = base_url('member/category');
					$config['total_rows'] = $this->admincrud->num_rows('category');
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

					$data['qbarang'] = $this->admincrud->get_newspagination('category', $config['per_page'], $this->uri->segment(3));
					$data['links'] = $this->pagination->create_links();

					$this->load->view('member/header',$data); //load views header
	        $this->load->view('member/category/vbarang',$data); //load views vbarang
					$this->load->view('member/footer'); //load views footer

	    }

    public function formcat(){
        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

				// Config Date
				date_default_timezone_set("Asia/Jakarta");
				$datess = date("Y-m-d");
				// Config Session
				$session = addslashes($this->session->userdata('nama'));
        // ambil variabel dari form
        $id = intval($this->input->post('id'));
        $name = addslashes($this->input->post('category'));
				$tgl = addslashes($this->input->post('createdtgl'));
        $by = addslashes($this->input->post('createdby'));
				$lengthname = strlen($name);

				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);

//mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {//jika uri segmentnya add
						// Add method
            $data['titles'] = 'Tambah Category';
            $data['aksi'] = 'aksi_add';
						$data['session'] = $session;

						$this->load->view('member/header',$data); //load views header
            $this->load->view('member/category/vformbarang',$data,$csrf);
						$this->load->view('member/footer'); //load views footer
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
						// Edit method
            $data['qdata']  = $this->admincrud->get_barang_bycatid('category', $idu);
            $data['titles'] = 'Edit Category';
            $data['aksi'] = 'aksi_edit';
						$data['session'] = $session;

						$this->load->view('member/header',$data); //load views header
            $this->load->view('member/category/vformbarang',$data,$csrf);
						$this->load->view('member/footer'); //load views footer
				} elseif ($mau_ke == "delete") {
						$this->admincrud->delcat_barang('category', $idu);
						$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
						redirect('member/category', 'refresh');
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert
						if ($name === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Name!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/category', 'refresh');
						} elseif($lengthname > 55) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Max 55 Character for Category Name!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/category', 'refresh');
						} else {
							$data = array(
	                'category_name'   => $name,
	                'created_tgl'  => $datess,
	                'created_by' => $session
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_insert('category', $data); //model insert data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di simpan</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/category', 'refresh');
						}
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
						if ($name === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Name!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/category', 'refresh');
						} elseif($lengthname > 55) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Max 55 Character for Category Name!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/category', 'refresh');
						} else {
	          	$data = array(
								'category_name'   => $name,
								'created_tgl'  => $datess,
								'created_by' => $session
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->getcat_update('category', $id,$data); //modal update data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di update</div>"); //pesan yang tampil setelah berhasil di update
	            redirect('member/category', 'refresh');
						}
        }

    }

    public function form(){
        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

				// Config Upload Library
				date_default_timezone_set("Asia/Jakarta");
				$dates = time();
				$random = rand(0, 9);
				$path = $_FILES['photo']['name'];
				$imagename = $dates.$random.'_joorxcms'.'.'.pathinfo($path, PATHINFO_EXTENSION);
				$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/images/';
				$config['upload_url'] = base_url().'assets/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = $imagename;
				// initialize setup config upload
				$this->upload->initialize($config);
        // ambil variabel dari form
        $id = intval($this->input->post('id'));
        $title = addslashes($this->input->post('title'));
        $photo = $imagename;
        $slug = addslashes($this->slug->create_uri($title));
        $text = $this->input->post('text');
				$createdby = addslashes($this->session->userdata('nama'));
				$tags = addslashes($this->input->post('tags'));
				$category = addslashes($this->input->post('category'));
        $publish = addslashes($this->input->post('publish'));
				$lengthtitle = strlen($title);

				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);

//mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {//jika uri segmentnya add
					// Config CKeditor
					$data['ckeditor'] = array(
						//ID of the textarea that will be replaced
						'id' => 'content',
						'path' => 'assets/media/vendor/ckeditor',

						//Optionnal values
						'config' => array(
							'toolbar' => "Full",     //Using the Full toolbar
							'width' => "880px",    //Setting a custom width
							'height' => '500px',    //Setting a custom height
							),

						//Replacing styles from the "Styles tool"
						'styles' => array(

							//Creating a new style named "style 1"
							'style 1' => array (
								'name' => 'Blue Title',
								'element' => 'h2',
								'styles' => array(
									'color' => 'Blue',
									'font-weight' => 'bold'
									)
								),

							//Creating a new style named "style 2"
							'style 2' => array (
								'name' => 'Red Title',
								'element' => 'h2',
								'styles' => array(
									'color' => 'Red',
									'font-weight' => 'bold',
									'text-decoration' => 'underline'
									)
								)
							)
					);
					// Add method
						$data['cdata']  = $this->news_model->getall_category();
            $data['titles'] = 'Tambah Berita';
            $data['aksi'] = 'aksi_add';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('member/header',$data); //load views header
            $this->load->view('member/vformbarang',$data,$csrf);
						$this->load->view('member/footer'); //load views footer
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
					// Config CKeditor
					$data['ckeditor'] = array(
						//ID of the textarea that will be replaced
						'id' => 'content',
						'path' => 'assets/media/vendor/ckeditor',

						//Optionnal values
						'config' => array(
							'toolbar' => "Full",     //Using the Full toolbar
							'width' => "880px",    //Setting a custom width
							'height' => '500px',    //Setting a custom height
							),

						//Replacing styles from the "Styles tool"
						'styles' => array(

							//Creating a new style named "style 1"
							'style 1' => array (
								'name' => 'Blue Title',
								'element' => 'h2',
								'styles' => array(
									'color' => 'Blue',
									'font-weight' => 'bold'
									)
								),

							//Creating a new style named "style 2"
							'style 2' => array (
								'name' => 'Red Title',
								'element' => 'h2',
								'styles' => array(
									'color' => 'Red',
									'font-weight' => 'bold',
									'text-decoration' => 'underline'
									)
								)
							)
					);
					// Edit method
						$data['cdata']  = $this->news_model->getall_category();
            $data['qdata']  = $this->admincrud->get_barang_byid('news', $idu);
            $data['titles'] = 'Edit Berita';
            $data['aksi'] = 'aksi_edit';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('member/header',$data); //load views header
            $this->load->view('member/vformbarang',$data,$csrf);
						$this->load->view('member/footer'); //load views footer
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert
						if ($title === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Title!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif($lengthtitle > 55) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Max 55 Character for Title</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($text === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Text!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($tags === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Tags!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($category === NULL) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Category!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/berita', 'refresh');
						} elseif (! $this->upload->do_upload('photo')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/berita', 'refresh');
						} else {
							$uploads = $this->upload->data();
							$data = array(
	                'title'   => $title,
	                'photo'  => $photo,
	                'slug' => $slug,
	                'text'=> $text,
									'created' => $createdby,
									'tags' => $tags,
									'categoryID' => $category,
	                'publish'  => $publish
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_insert('news', $data); //model insert data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di simpan</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/berita', 'refresh');
						}
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
						if ($title === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Title!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif($lengthtitle > 55) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Max 55 Character for Title</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($text === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Text!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($tags === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Tags!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('member/berita', 'refresh');
						} elseif ($category === NULL) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Category!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/berita', 'refresh');
						} elseif (! $this->upload->do_upload('photo')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('member/berita', 'refresh');
						} else {
							$photo_old = $this->admincrud->GetWhere('news', array('id' => $id));
							unlink("assets/images/".$photo_old[0]['photo']);
							$uploads = $this->upload->data();
	          	$data = array(
								'title'   => $title,
								'photo'  => $photo,
								'slug' => $slug,
								'text'=> $text,
								'created' => $createdby,
								'tags' => $tags,
								'categoryID' => $category,
								'publish'  => $publish
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_update('news', $id,$data); //modal update data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di update</div>"); //pesan yang tampil setelah berhasil di update
	            redirect('member/berita', 'refresh');
						}
        }

    }

    public function detail($id){ //fungsi detail barang
        $data['titles'] = 'Detail Berita'; //judul title
        $data['qbarang'] = $this->admincrud->get_barang_byid('news', $id); //query model barang sesuai id
				$data['session'] = $this->session->userdata('nama');

				$this->load->view('member/header',$data); //load views header
        $this->load->view('member/vdetbarang',$data); //meload views detail barang
				$this->load->view('member/footer'); //load views footer
    }

    public function hapus($gid){ //fungsi hapus barang sesuai dengan id
				$photo_old = $this->admincrud->GetWhere('news', array('id' => $gid));
				unlink("assets/images/".$photo_old[0]['photo']);
        $this->admincrud->del_barang('news', $gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect('member/berita', 'refresh');
    }
}
