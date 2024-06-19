<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukar_tambah_android extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Tbl_harga_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $merk = 'Samsung';
        $idMerk = 4;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function tt_action() {
    
        $merk = $this->input->get('nama_merk');
        $idMerk = $this->input->get('id_merk');;
        
        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'id_tipe'   => $this->input->get('id_tipe'),
            'id_baru'   => $this->input->get('id_baru'),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/hasil_tukar_tambah_android.php', $data);
    }

}

/* End of file Tukar_tambah_android.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */