<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukar_tambah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_baru_model');
        $this->load->model('Tbl_harga_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $samsung    = 'Samsung';
        $vivo       = 'Vivo';
        $oppo       = 'Oppo';
        $infinix    = 'Infinix';
        $realme     = 'Realme';
        $xiaomi     = 'Xiaomi';

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru(),
            'samsung'  => $this->Tbl_harga_model->get_all_baru_android($samsung),
            'all_brand' => $this->Tbl_baru_model->get_all_baru(),
            'all_second' => $this->Tbl_baru_model->get_all_second(),
            'nama_brand' => $this->Tbl_harga_model->get_all_nama_baru(),
            'vivo'  => $this->Tbl_harga_model->get_all_baru_android($vivo),
            'oppo'  => $this->Tbl_harga_model->get_all_baru_android($oppo),
            'infinix'  => $this->Tbl_harga_model->get_all_baru_android($infinix),
            'realme'  => $this->Tbl_harga_model->get_all_baru_android($realme),
            'xiaomi'  => $this->Tbl_harga_model->get_all_baru_android($xiaomi),
        );
        $this->load->view('cek_harga/tukar_tambah.php', $data);
    }

    public function get_image_url() {
        $id_baru = $this->input->post('id_baru');
        // Fetch the image URL from the database based on the id_baru
        $result = $this->Tbl_baru_model->get_image_url($id_baru); // Replace with your method to fetch image URL

        if ($result) {
            echo json_encode(['gambar_baru' => $result->gambar_baru]); // Adjust according to your database field
        } else {
            echo json_encode(['gambar_baru' => null]);
        }
    }

    public function get_image_url_second() {
        $id_second = $this->input->post('id_second');
        // Fetch the image URL from the database based on the id_baru
        $result = $this->Tbl_baru_model->get_image_url_second($id_second); // Replace with your method to fetch image URL

        if ($result) {
            echo json_encode(['gambar_second' => $result->gambar_second]); // Adjust according to your database field
        } else {
            echo json_encode(['gambar_second' => null]);
        }
    }

    public function get_image_url_bekas()
    {
        $id_harga = $this->input->post('id_tipe');
        log_message('debug', 'Received id_harga: ' . $id_harga);
        // Fetch the data based on id_harga from the database
        $data = $this->Tbl_harga_model->get_image_url_bekas($id_harga);
        log_message('debug', 'Fetched data: ' . print_r($data, true));
        
        if ($data) {
            echo json_encode(array('gambar_tipe' => $data->gambar_tipe));
        } else {
            echo json_encode(array('gambar_tipe' => null));
        }
    }

    public function tt_action() {

        $result = $this->Tbl_baru_model->get_image_url($this->input->get('id_baru'));
        $hasil = $this->Tbl_harga_model->get_image_url_bekas($this->input->get('id_tipe'));
        $namaBrand = $this->input->get('nama_baru');

        if ($result) {
            $gambar = $result->gambar_baru; // Adjust according to your database field
        } else {
            $gambar = 'ilustrasihp.jpg';
        }

        if ($hasil) {
            $gambarBekas = $hasil->gambar_tipe; // Adjust according to your database field
        } else {
            $gambarBekas = 'ilustrasihp.jpg';
        }

        $samsung    = 'Samsung';
        $vivo       = 'Vivo';
        $oppo       = 'Oppo';
        $infinix    = 'Infinix';
        $realme     = 'Realme';
        $xiaomi     = 'Xiaomi';
    
        $data = array(
            'tipe'              => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru'         => $this->Tbl_harga_model->get_all_baru(),
            'id_tipe'           => $this->input->get('id_tipe'),
            'id_baru'           => $this->input->get('id_baru'),
            'gambar'            => $gambar,
            'gambarBekas'       => $gambarBekas,
            'namaBrand'         => $namaBrand,
            'nama_brand'        => $this->Tbl_harga_model->get_all_nama_baru(),
            'all_brand'         => $this->Tbl_baru_model->get_all_baru(),
            'all_second'        => $this->Tbl_baru_model->get_all_second(),
            'samsung'           => $this->Tbl_harga_model->get_all_baru_android($samsung),
            'vivo'              => $this->Tbl_harga_model->get_all_baru_android($vivo),
            'oppo'              => $this->Tbl_harga_model->get_all_baru_android($oppo),
            'infinix'           => $this->Tbl_harga_model->get_all_baru_android($infinix),
            'realme'            => $this->Tbl_harga_model->get_all_baru_android($realme),
            'xiaomi'            => $this->Tbl_harga_model->get_all_baru_android($xiaomi),
        );
        $this->load->view('cek_harga/hasil_tukar_tambah.php', $data);
    }

    public function tt_action_second() {

        $result = $this->Tbl_baru_model->get_image_url_second($this->input->get('id_second'));
        $hasil = $this->Tbl_harga_model->get_image_url_bekas($this->input->get('id_tipe_second'));
        $namaBrand = $this->input->get('nama_second');

        if ($result) {
            $gambar = $result->gambar_second; // Adjust according to your database field
        } else {
            $gambar = 'ilustrasihp.jpg';
        }

        if ($hasil) {
            $gambarBekas = $hasil->gambar_tipe; // Adjust according to your database field
        } else {
            $gambarBekas = 'ilustrasihp.jpg';
        }

        $samsung    = 'Samsung';
        $vivo       = 'Vivo';
        $oppo       = 'Oppo';
        $infinix    = 'Infinix';
        $realme     = 'Realme';
        $xiaomi     = 'Xiaomi';
    
        $data = array(
            'tipe'              => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru'         => $this->Tbl_harga_model->get_all_baru(),
            'id_tipe_second'    => $this->input->get('id_tipe_second'),
            'id_second'         => $this->input->get('id_second'),
            'gambar'            => $gambar,
            'gambarBekas'       => $gambarBekas,
            'namaBrand'         => $namaBrand,
            'nama_brand'        => $this->Tbl_harga_model->get_all_nama_baru(),
            'all_brand'         => $this->Tbl_baru_model->get_all_baru(),
            'all_second'        => $this->Tbl_baru_model->get_all_second(),
            'samsung'           => $this->Tbl_harga_model->get_all_baru_android($samsung),
            'vivo'              => $this->Tbl_harga_model->get_all_baru_android($vivo),
            'oppo'              => $this->Tbl_harga_model->get_all_baru_android($oppo),
            'infinix'           => $this->Tbl_harga_model->get_all_baru_android($infinix),
            'realme'            => $this->Tbl_harga_model->get_all_baru_android($realme),
            'xiaomi'            => $this->Tbl_harga_model->get_all_baru_android($xiaomi),
        );
        $this->load->view('cek_harga/hasil_tukar_tambah_second.php', $data);
    }

    public function instagram() {
        $this->load->view('cek_harga/instagram.php');
    }

}

/* End of file Cek_harga.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */