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

        $data = array(
            'tipe'      => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru' => $this->Tbl_harga_model->get_all_baru(),
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
    
        $data = array(
            'tipe'              => $this->Tbl_harga_model->get_all_tt(),
            'tipe_baru'         => $this->Tbl_harga_model->get_all_baru(),
            'id_tipe'           => $this->input->get('id_tipe'),
            'id_baru'           => $this->input->get('id_baru'),
            'gambar'            => $gambar,
            'gambarBekas'       => $gambarBekas,
        );
        $this->load->view('cek_harga/hasil_tukar_tambah.php', $data);
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