<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Redirect session not available
		if($this->session->userdata('logged_in') != true){
			redirect(base_url("login"), 'refresh');
		} elseif ($this->session->userdata('is_confirmed') === 1 AND $this->session->userdata('status') === 0 AND $this->session->userdata('role') != 1) {
			redirect(base_url("member"), 'refresh');
		}
	}

	public function index()
    {
        $data['titles'] = 'Daftar User'; //judul title
        //$data['qbarang'] = $this->admincrud->get_allbarang(); //model semua barang
				$data['session'] = $this->session->userdata('nama');
				// Pagination
				$config['base_url'] = base_url('settings/index');
				$config['total_rows'] = $this->admincrud->num_rows('users');
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

				$data['qbarang'] = $this->admincrud->get_newspagination('users', $config['per_page'], $this->uri->segment(3));
				$data['links'] = $this->pagination->create_links();

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('settings/vbarang',$data); //load views vbarang
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
				$path = $_FILES['avatar']['name'];
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
				$email = addslashes($this->input->post('email'));
        $username = addslashes($this->input->post('username'));
        $avatar = $imagename;
        $password = addslashes($this->input->post('password'));
        $role = intval($this->input->post('role'));
				$banned = intval($this->input->post('status'));
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
            $this->load->view('settings/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
            $data['qdata']  = $this->admincrud->get_barang_byid('users', $idu);
            $data['titles'] = 'Edit User';
            $data['aksi'] = 'aksi_edit';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('admin/header',$data); //load views header
            $this->load->view('settings/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert
						if ($email === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Email!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($username === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Username!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif($password === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Password!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($lengthpassword < 16) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Min 16 Character for Password</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($role === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Role!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($banned === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Status!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif (! $this->upload->do_upload('avatar')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('settings', 'refresh');
						} else {
							$uploads = $this->upload->data();
							$data = array(
	                'username' => $username,
									'email' => $email,
	                'password' => password_hash($password, PASSWORD_BCRYPT),
	                'avatar' => $avatar,
									'created_at' => date('Y-m-j H:i:s'),
									'is_confirmed' => 1,
	                'is_admin'=> $role,
									'is_deleted' => $banned
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_insert('users', $data); //model insert data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di simpan</div>"); //pesan yang tampil setalah berhasil di insert
	            redirect('settings', 'refresh');
						}
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
						if ($email === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Email!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($username === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Username!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif($password === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Password!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($lengthpassword < 16) {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Min 16 Character for Password</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($role === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Role!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif ($banned === '') {
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Fill Form Status!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} elseif (! $this->upload->do_upload('avatar')){
							$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> File not uploaded!</div>"); //pesan yang tampil setalah berhasil di insert
							redirect('settings', 'refresh');
						} else {
							$photo_old = $this->admincrud->GetWhere('users', array('id' => $id));
							if ($photo_old[0]['avatar'] != "default.jpg") {
								unlink("assets/images/user/".$photo_old[0]['avatar']);
							}
							$uploads = $this->upload->data();
	          	$data = array(
								'username'   => $username,
								'email' => $email,
								'password'  => password_hash($password, PASSWORD_BCRYPT),
								'avatar' => $avatar,
								'updated_at' => date('Y-m-j H:i:s'),
								'is_admin'=> $role,
								'is_deleted' => $banned
	            );
							$data = $this->security->xss_clean($data);
	            $this->admincrud->get_update('users', $id,$data); //modal update data barang
	            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di update</div>"); //pesan yang tampil setelah berhasil di update
	            redirect('settings', 'refresh');
						}
        }

    }

    public function detail($id){ //fungsi detail barang
        $data['titles'] = 'Detail User'; //judul title
        $data['qbarang'] = $this->admincrud->get_barang_byid('users', $id); //query model barang sesuai id
				$data['session'] = $this->session->userdata('nama');

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('settings/vdetbarang',$data); //meload views detail barang
				$this->load->view('admin/footer'); //load views footer
    }

    public function hapus($gid){ //fungsi hapus barang sesuai dengan id
				$photo_old = $this->admincrud->GetWhere('users', array('id' => $gid));
				if ($photo_old[0]['avatar'] != "default.jpg") {
					unlink("assets/images/user/".$photo_old[0]['avatar']);
				}
        $this->admincrud->del_barang('users', $gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect('settings', 'refresh');
    }
}
