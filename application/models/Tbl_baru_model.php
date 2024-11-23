<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_baru_model extends CI_Model
{

    public $table = 'tbl_baru';
    public $id = 'id_baru';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_baru()
    {
        $this->db->order_by('nama_baru', 'ASC');
        return $this->db->get($this->table)->result();
    }

    function get_all_second()
    {
        $this->db->order_by('nama_second', 'ASC');
        return $this->db->get('tbl_second')->result();
    }

    public function get_image_url($image_id) {
        $this->db->where($this->id, $image_id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_image_url_second($image_id) {
        $this->db->where('id_second', $image_id);
        $query = $this->db->get('tbl_second');
        return $query->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_second_by_id($id)
    {
        $this->db->where('id_second', $id);
        return $this->db->get('tbl_second')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_baru', $q);
	$this->db->or_like('nama_baru', $q);
	$this->db->or_like('harga_baru', $q);
	$this->db->or_like('gambar_baru', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_baru', $q);
        $this->db->or_like('nama_baru', $q);
        $this->db->or_like('harga_baru', $q);
        $this->db->or_like('gambar_baru', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_baru_model.php */
/* Location: ./application/models/Tbl_baru_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-24 06:58:41 */
/* http://harviacode.com */