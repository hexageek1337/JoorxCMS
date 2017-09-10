<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

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

	public function logout() {
		if($this->session->userdata('status') === "login"){
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
	}

	public function index() {
		$data['titles'] = 'CRUD CodeIgniter Studi Kasus Barang'; //judul title
		$data['qbarang'] = $this->admincrud->get_allbarang(); //model semua barang
		$data['session'] = $this->session->userdata('nama');

		$this->load->view('admin/header',$data); //load views header
		$this->load->view('admin/index',$data); //load views vbarang
		$this->load->view('admin/footer'); //load views footer
	}

	public function berita()
    {
        $data['titles'] = 'CRUD CodeIgniter Studi Kasus Barang'; //judul title
        $data['qbarang'] = $this->admincrud->get_allbarang(); //model semua barang
				$data['session'] = $this->session->userdata('nama');

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('admin/vbarang',$data); //load views vbarang
				$this->load->view('admin/footer'); //load views footer

    }

    public function form(){
        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        //ambil variabel dari form
        $id = intval($this->input->post('id'));
        $title = addslashes($this->input->post('title'));
        $photo = $_FILES['photo']['name'];
        $slug = $this->slug->create_uri($title);
        $text = $this->input->post('text');
				$createdby = $this->session->userdata('nama');
        $publish = $this->input->post('publish');

				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);

//mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {//jika uri segmentnya add
            $data['titles'] = 'Tambah Berita';
            $data['aksi'] = 'aksi_add';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('admin/header',$data); //load views header
            $this->load->view('admin/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
            $data['qdata']  = $this->admincrud->get_barang_byid($idu);
            $data['titles'] = 'Edit Berita';
            $data['aksi'] = 'aksi_edit';
						$data['session'] = $this->session->userdata('nama');

						$this->load->view('admin/header',$data); //load views header
            $this->load->view('admin/vformbarang',$data,$csrf);
						$this->load->view('admin/footer'); //load views footer
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert
            $data = array(
                'title'   => $title,
                'photo'  => $photo,
                'slug' => $slug,
                'text'=> $text,
								'created' => $createdby,
                'publish'  => $publish
            );
            $this->admincrud->get_insert($data); //model insert data barang
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>"); //pesan yang tampil setalah berhasil di insert
            redirect('admin');
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
          	$data = array(
							'title'   => $title,
							'photo'  => $photo,
							'slug' => $slug,
							'text'=> $text,
							'created' => $createdby,
							'publish'  => $publish
            );
            $this->admincrud->get_update($id,$data); //modal update data barang
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>"); //pesan yang tampil setelah berhasil di update
            redirect('admin');
        }

    }

    public function detail($id){ //fungsi detail barang
        $data['titles'] = 'Detail Berita'; //judul title
        $data['qbarang'] = $this->admincrud->get_barang_byid($id); //query model barang sesuai id
				$data['session'] = $this->session->userdata('nama');

				$this->load->view('admin/header',$data); //load views header
        $this->load->view('admin/vdetbarang',$data); //meload views detail barang
				$this->load->view('admin/footer'); //load views footer
    }

    public function hapus($gid){ //fungsi hapus barang sesuai dengan id

        $this->admincrud->del_barang($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Barang berhasil dihapus</div>");
        redirect('admin');
    }
}
