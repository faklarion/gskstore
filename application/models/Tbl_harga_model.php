<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_harga_model extends CI_Model
{

    public $table = 'tbl_harga';
    public $id = 'id_harga';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_detail_harga()
    {
        
        $id              = $this->input->get('id_tipe');
        $idMemori        = $this->input->get('memori');
        $idKondisi       = $this->input->get('kondisi');
        //$idKualifikasi   = $this->input->get('kualifikasi');

        $_SESSION['kondisi']        = $idKondisi;
        $_SESSION['memori']         = $idMemori;
        //$_SESSION['kualifikasi']    = $idKualifikasi;

        $this->db->where('id_memori', $idMemori);
        $this->db->where('id_kondisi', $idKondisi);
        //$this->db->where('id_kualifikasi', $idKualifikasi);
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->where('id_tipe', $id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
    }

    function get_all_memori()
    {
        $this->db->order_by('id_memori', 'ASC');
        return $this->db->get('tbl_memori')->result();
    }

    function get_all_kualifikasi()
    {
        $this->db->order_by('id_kualifikasi', 'ASC');
        return $this->db->get('tbl_kualifikasi')->result();
    }
    
    function get_all_kondisi()
    {
        $this->db->order_by('id_kondisi', 'ASC');
        return $this->db->get('tbl_kondisi')->result();
    }

    function get_all_merk()
    {
        $this->db->order_by('id_merk', 'ASC');
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_merk_tt_semua()
    {
        $this->db->order_by('id_merk', 'ASC');
        $this->db->limit(7);
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_merk_tt()
    {
        $this->db->order_by('id_merk', 'ASC');
        $this->db->limit(4);
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_merk_tt_2()
    {
        $this->db->where('id_merk >= 5');
        $this->db->limit(3);
        $this->db->order_by('id_merk', 'ASC');
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_merk_1()
    {
        $this->db->limit(4);
        $this->db->order_by('id_merk', 'ASC');
        return $this->db->get('tbl_merk')->result();
    }

    
    function get_all_merk_2()
    {
        $this->db->where('id_merk >= 5');
        $this->db->limit(4);
        $this->db->order_by('id_merk', 'ASC');
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_merk_by_id($id)
    {
        $this->db->where('tbl_merk.id_merk', $id);
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_tipe_by_merk($id) 
    {
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by('id_tipe', 'ASC');
        $this->db->where('tbl_tipe.id_merk', $id);
        return $this->db->get('tbl_tipe')->result();
    }

    function get_all_tipe_by_id($id) 
    {
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by('id_tipe', 'DESC');
        $this->db->where('tbl_tipe.id_tipe', $id);
        return $this->db->get('tbl_tipe')->result();
    }

    public function update_import($data,$where)
    {
        $this->db->update_batch('tbl_harga',$data, $where);
    }

    function get_all_tipe_by_id_row($id) 
    {
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by('id_tipe', 'DESC');
        $this->db->where('tbl_tipe.id_tipe', $id);
        return $this->db->get('tbl_tipe')->row();
    }
    
    function get_all_tipe()
    {
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by('id_tipe', 'DESC');
        return $this->db->get('tbl_tipe')->result();
    }


    function get_all_harga()
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->order_by('id_harga', 'DESC');
        return $this->db->get('tbl_harga')->result();
    }

    function get_all_harga_by_nama($nama)
    {

        $encodedNama = urldecode($nama);

        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->like('tbl_tipe.nama_tipe', $encodedNama);
        $this->db->order_by('id_harga', 'DESC');
        return $this->db->get('tbl_harga')->result();
    }

    function get_all_harga_by_id($id)
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->where('tbl_harga.id_tipe', $id);
        $this->db->order_by('tbl_harga.id_memori', 'ASC');
        $this->db->order_by('tbl_harga.id_kondisi', 'ASC');
        return $this->db->get('tbl_harga')->result();
    }

    function get_all_memori_ada($id)
    {
        $this->db->select('tbl_memori.id_memori, tbl_memori.nama_memori');
        $this->db->join('tbl_harga', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->where('tbl_harga.id_tipe', $id);
        $this->db->group_by('tbl_memori.id_memori');
        $this->db->order_by('id_harga', 'DESC');
        return $this->db->get('tbl_memori')->result();
    }

    function get_all_tt()
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->where('tbl_harga.id_tipe in (23,24,40,41,42) AND tbl_harga.id_kondisi = 2');
        $this->db->order_by('tbl_harga.id_tipe', 'DESC');
        return $this->db->get('tbl_harga')->result();
    }

    function get_all_tt_android($id_merk)
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->where("tbl_merk.id_merk = $id_merk AND tbl_harga.id_kondisi = 2");
        $this->db->order_by('tbl_harga.id_tipe', 'ASC');
        return $this->db->get('tbl_harga')->result();
    }

    function get_all_tt_by_id($id)
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->where('tbl_harga.id_tipe in (23,24,40,41,42) AND tbl_harga.id_kondisi = 2');
        $this->db->order_by('tbl_harga.id_tipe', 'DESC');
        $this->db->where('tbl_harga.id_harga', $id);
        return $this->db->get('tbl_harga')->row();
    }

    function get_all_tt_by_id_android($id, $id_merk)
    {
        $this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        $this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        $this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_merk', 'tbl_merk.id_merk = tbl_tipe.id_merk');
        $this->db->where("tbl_merk.id_merk = $id_merk AND tbl_harga.id_kondisi = 2");
        $this->db->where('tbl_harga.id_harga', $id);
        $this->db->order_by('tbl_harga.id_tipe', 'ASC');
        return $this->db->get('tbl_harga')->row();
    }

    function get_all_baru()
    {
        $this->db->select('*');
        $this->db->like('nama_baru', 'iPhone', 'after'); 
        $this->db->order_by('id_baru', 'DESC');
        return $this->db->get('tbl_baru')->result();
    }

    function get_all_baru_android($merk)
    {
        $this->db->select('*');
        $this->db->like('nama_baru', $merk, 'after'); 
        $this->db->order_by('id_baru', 'DESC');
        return $this->db->get('tbl_baru')->result();
    }

    function get_all_baru_by_id($id)
    {
        $this->db->select('*');
        $this->db->order_by('id_baru', 'DESC');
        $this->db->where('id_baru', $id);
        return $this->db->get('tbl_baru')->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
      
        //$this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        //$this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        //$this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        //$this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_merk = tbl_merk.id_merk');
        //$this->db->order_by($this->id, $this->order);
        $this->db->like('tbl_merk.id_merk', $q);
        $this->db->or_like('nama_tipe', $q);
        $this->db->or_like('nama_merk', $q);
        
	    $this->db->from('tbl_merk');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        
        //$this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        //$this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        //$this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        //$this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_merk = tbl_merk.id_merk');
        $this->db->order_by('tbl_merk.id_merk', $this->order);
        $this->db->like('tbl_merk.id_merk', $q);
        $this->db->or_like('nama_tipe', $q);
        $this->db->or_like('nama_merk', $q);
	    $this->db->limit($limit, $start);
        return $this->db->get('tbl_merk')->result();
    }

    function get_all_data() {
        
        //$this->db->join('tbl_memori', 'tbl_memori.id_memori = tbl_harga.id_memori');
        //$this->db->join('tbl_kualifikasi', 'tbl_kualifikasi.id_kualifikasi = tbl_harga.id_kualifikasi');
        //$this->db->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_harga.id_kondisi');
        //$this->db->join('tbl_tipe', 'tbl_tipe.id_tipe = tbl_harga.id_tipe');
        $this->db->join('tbl_tipe', 'tbl_tipe.id_merk = tbl_merk.id_merk');
        $this->db->order_by('tbl_tipe.id_tipe', $this->order);
        return $this->db->get('tbl_merk')->result();
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

/* End of file Tbl_harga_model.php */
/* Location: ./application/models/Tbl_harga_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */