<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Hp extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Tbl_harga_model');
    }

    public function index_get($nama = NULL)
    {

        $check_data = $this->Tbl_harga_model->get_all_harga_by_nama($nama);
        // Users from a data store e.g. database
        if ($nama) {
            if ($check_data) {
                $data = $this->Tbl_harga_model->get_all_harga_by_nama($nama);
                $this->response($data, RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Data Tidak Ada'
                ], 404);
            }
        }
        $data = $this->Tbl_harga_model->get_all_harga();
        $this->response($data, RestController::HTTP_OK);
    }
}