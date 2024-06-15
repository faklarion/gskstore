<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukar_tambah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Tbl_harga_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru(),
        );
        $this->load->view('cek_harga/tukar_tambah.php', $data);
    }

    public function tt_action() {
    
        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru(),
            'id_tipe'   => $this->input->get('id_tipe'),
            'id_baru'   => $this->input->get('id_baru'),
            
        );
        $this->load->view('cek_harga/hasil_tukar_tambah.php', $data);
    }


}

/* End of file Cek_harga.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */