<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincrud extends CI_Model{
    var $tabel = 'news'; // set your name table

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // get all data in table
    function get_allbarang() {
        $this->db->from($this->tabel);
        $query = $this->db->get();

        //cek apakah ada ba
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    // get data by id in table
    function get_barang_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    // insert data in table
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    // update data in table
    function get_update($id,$data) {

        $this->db->where('id', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }

    // delete data in table
    function del_barang($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
