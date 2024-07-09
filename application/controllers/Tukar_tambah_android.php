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

    public $samsung = 'Samsung';
    public $vivo = 'Vivo';
    public $oppo = 'Oppo';
    public $infinix = 'Infinix';
    public $realme = 'Realme';
    public $xiaomi = 'Xiaomi';
    public $apple = 'Apple';

    public function index()
    {

        $data = array(
            'merk_tt' => $this->Tbl_harga_model->get_all_merk_tt(),
            'merk_tt_2' => $this->Tbl_harga_model->get_all_merk_tt_2(),
            'merk' => $this->Tbl_harga_model->get_all_merk_tt_semua(),
        );
        $this->load->view('cek_harga/index_tt.php', $data);
    }

    public function samsung()
    {

        $merk = 'Samsung';
        $idMerk = 4;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function oppo()
    {

        $merk = 'Oppo';
        $idMerk = 2;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }


    public function vivo()
    {

        $merk = 'Vivo';
        $idMerk = 3;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function realme()
    {

        $merk = 'Realme';
        $idMerk = 7;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function xiaomi()
    {

        $merk = 'Xiaomi';
        $idMerk = 6;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }

    public function infinix()
    {

        $merk = 'Infinix';
        $idMerk = 5;

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'merk' => $merk,
            'idMerk' => $idMerk,
        );
        $this->load->view('cek_harga/tukar_tambah_android.php', $data);
    }


    public function tt_action()
    {

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

        $merk = $this->input->get('nama_merk');
        $idMerk = $this->input->get('id_merk');

        $data = array(
            'tipe' => $this->Tbl_harga_model->get_all_tt_android($idMerk),
            'samsung' => $this->Tbl_harga_model->get_all_baru_android($this->samsung),
            'vivo' => $this->Tbl_harga_model->get_all_baru_android($this->vivo),
            'oppo' => $this->Tbl_harga_model->get_all_baru_android($this->oppo),
            'infinix' => $this->Tbl_harga_model->get_all_baru_android($this->infinix),
            'realme' => $this->Tbl_harga_model->get_all_baru_android($this->realme),
            'xiaomi' => $this->Tbl_harga_model->get_all_baru_android($this->xiaomi),
            'apple' => $this->Tbl_harga_model->get_all_baru_android($this->apple),
            'id_tipe' => $this->input->get('id_tipe'),
            'id_baru' => $this->input->get('id_baru'),
            'merk' => $merk,
            'idMerk' => $idMerk,
            'gambar' => $gambar,
            'gambarBekas' => $gambarBekas,
        );
        $this->load->view('cek_harga/hasil_tukar_tambah_android.php', $data);
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

}

/* End of file Tukar_tambah_android.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */