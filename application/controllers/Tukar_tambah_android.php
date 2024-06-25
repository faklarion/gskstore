<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukar_tambah_android extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_baru_model');
        $this->load->model('Tbl_harga_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $data = array(
            'merk_tt'           => $this->Tbl_harga_model->get_all_merk_tt(),
            'merk_tt_2'         => $this->Tbl_harga_model->get_all_merk_tt_2(),
            'merk'              => $this->Tbl_harga_model->get_all_merk_tt_semua(),
        );
        $this->load->view('cek_harga/index_tt.php', $data);
    }

    public function samsung() {

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

    public function oppo() {

        $merk = 'Oppo';
        $idMerk = 2;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }


    public function vivo() {

        $merk = 'Vivo';
        $idMerk = 3;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function realme() {

        $merk = 'Realme';
        $idMerk = 7;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function xiaomi() {

        $merk = 'Xiaomi';
        $idMerk = 6;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function infinix() {

        $merk = 'Infinix';
        $idMerk = 5;

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }


    public function tt_action() {

        $result = $this->Tbl_baru_model->get_image_url($this->input->get('id_baru'));

        if ($result) {
            $gambar = $result->gambar_baru; // Adjust according to your database field
        } else {
            $gambar = 'ilustrasihp.jpg';
        }
    
        $merk = $this->input->get('nama_merk');
        $idMerk = $this->input->get('id_merk');
        
        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru_android($merk),
            'id_tipe'   => $this->input->get('id_tipe'),
            'id_baru'   => $this->input->get('id_baru'),
            'merk'      => $merk,
            'idMerk'    => $idMerk,
            'gambar'    => $gambar,
        );
        $this->load->view('cek_harga/hasil_tukar_tambah_android.php', $data);
    }

}

/* End of file Tukar_tambah_android.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */