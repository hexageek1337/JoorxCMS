<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class User extends CI_Controller {

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
		} elseif ($check_role->role != "admin") {
			redirect(base_url("member"), 'refresh');
		}
	}

	public function index()
    {
        $data['titles'] = 'Daftar User'; //judul title
        //$data['qbarang'] = $this->admincrud->get_allbarang(); //model semua barang
				$data['session'] = $this->session->userdata('nama');
				// Pagination
				$config['base_url'] = base_url('user/index');
				$config['total_rows'] = $this->admincrud->num_rows('admin');
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

				$data['qbarang'] = $this->admincrud->get_newspagination('admin', $config['per_page'], $this->uri->segment(3));
				$data['links'] = $this->pagination->create_links();

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('user/vbarang',$data); //load views vbarang
				$this->load->view('admin/footer'); //load views footer

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
				$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/images/user/';
				$config['upload_url'] = base_url().'assets/images/user/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = $imagename;
				// initialize setup config upload
				$this->upload->initialize($config);
        // ambil variabel dari form
        $id = intval($this->input->post('id'));
        $username = addslashes($this->input->post('username'));
        $photo = $imagename;
        $password = addslashes($this->input->post('password'));
        $role = addslashes($this->input->post('role'));
				$lengthpassword = strlen($password);

				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);

//mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {//jika uri segmentnya add
            $data['titles'] = 'Tambah User';
            $data['aksi'] = 'aksi_add';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('admin/header',$data); //load views header
            $this->load->view('user/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
            $data['qdata']  = $this->admincrud->get_barang_byid('admin', $idu);
            $data['titles'] = 'Edit User';
            $data['aksi'] = 'aksi_edit';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('admin/header',$data); //load views header
            $this->load->view('user/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert
						if ($username === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Username!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif($password === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Password!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif ($lengthpassword < 16) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Min 16 Character for Password</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif ($role === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Role!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif (! $this->upload->do_upload('photo')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('user', 'refresh');
						} else {
							$uploads = $this->upload->data();
							$data = array(
	                'username'   => $username,
	                'password'  => password_hash($password, PASSWORD_BCRYPT),
	                'photo' => $photo,
	                'role'=> $role
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_insert('admin', $data); //model insert data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di simpan</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('user', 'refresh');
						}
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
						if ($username === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Username!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif($password === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Password!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif ($lengthpassword < 16) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Min 16 Character for Password</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif ($role === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Role!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} elseif (! $this->upload->do_upload('photo')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('user', 'refresh');
						} else {
							$photo_old = $this->admincrud->GetWhere('admin', array('id' => $id));
							unlink("assets/images/user/".$photo_old[0]['photo']);
							$uploads = $this->upload->data();
	          	$data = array(
								'username'   => $username,
								'password'  => password_hash($password, PASSWORD_BCRYPT),
								'photo' => $photo,
								'role'=> $role
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_update('admin', $id,$data); //modal update data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di update</div>"); //pesan yang tampil setelah berhasil di update
	            redirect('user', 'refresh');
						}
        }

    }

    public function detail($id){ //fungsi detail barang
        $data['titles'] = 'Detail User'; //judul title
        $data['qbarang'] = $this->admincrud->get_barang_byid('admin', $id); //query model barang sesuai id
				$data['session'] = $this->session->userdata('nama');

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('user/vdetbarang',$data); //meload views detail barang
				$this->load->view('admin/footer'); //load views footer
    }

    public function hapus($gid){ //fungsi hapus barang sesuai dengan id
				$photo_old = $this->admincrud->GetWhere('admin', array('id' => $gid));
				unlink("assets/images/user/".$photo_old[0]['photo']);
        $this->admincrud->del_barang('admin', $gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect('user', 'refresh');
    }
}
