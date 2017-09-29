<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincrud extends CI_Model{
    var $tabel = 'news'; // set your name table

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function num_rows($tables){
        $query = $this->db->select('*')
                ->from($tables)
                ->get();

        return $query->num_rows();
    }

    public function GetWhere($tables, $data){
      $res=$this->db->get_where($tables, $data);
      return $res->result_array();
    }

    // get data with pagination in table
    public function get_newspagination($tables, $limit,$offset) {
      $query = $this->db->select('*')
                        ->from($tables)
                        ->limit($limit,$offset)
                        ->get();

        return $query->result_array();
    }

    // get all data in table
    function get_allbarang($tables) {
        $this->db->from($tables);
        $query = $this->db->get();

        //cek apakah ada ba
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    // get data by id in table
    function get_barang_byid($tables, $id) {
        $this->db->from($tables);
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    // get data by category_id in table category
    function get_barang_bycatid($tables, $id) {
        $this->db->from($tables);
        $this->db->where('category_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    // insert data in table
    function get_insert($tables, $data){
       $this->db->insert($tables, $data);
       return TRUE;
    }

    // update data in table
    function get_update($tables, $id,$data) {

        $this->db->where('id', $id);
        $this->db->update($tables, $data);

        return TRUE;
    }

    // update data in table category
    function getcat_update($tables, $id,$data) {

        $this->db->where('category_id', $id);
        $this->db->update($tables, $data);

        return TRUE;
    }

    // delete data in table
    function del_barang($tables, $id) {
        $this->db->where('id', $id);
        $this->db->delete($tables);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    // delete data in table category
    function delcat_barang($tables, $idu) {
        $this->db->where('category_id', $idu);
        $this->db->delete($tables);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
