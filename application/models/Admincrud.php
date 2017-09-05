<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admincrud extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function GetNews(){
        $res = $this->db->get('news'); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function GetWhere($table, $datas){
        $res=$this->db->get_where($table, $datas);
        return $res->result_array();
    }
 
    public function Insert($table,$datas){
        $res = $this->db->insert($table, $datas); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function editData($table_name,$data,$id) {
        $this->db->where('id',$id);
        $edit = $this->db->update($table_name,$data);
        return $edit;
    }

    public function dataEdit($table_name,$id) {
        $this->db->where('id',$id);
        $get_user = $this->db->get($table_name);
        return $get_user->row();
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
}