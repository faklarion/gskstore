<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Tbl_second extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_second_model');
        $this->load->library('form_validation');
        $this->load->library('GoogleSheets');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/Tbl_second/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/Tbl_second/index/';
            $config['first_url'] = base_url() . 'index.php/Tbl_second/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_second_model->total_rows($q);
        $Tbl_second = $this->Tbl_second_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'Tbl_second_data' => $Tbl_second,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','Tbl_second/Tbl_second_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_second_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_second' => $row->id_second,
		'nama_second' => $row->nama_second,
		'harga_second' => $row->harga_second,
		'gambar_second' => $row->gambar_second,
	    );
            $this->template->load('template','Tbl_second/Tbl_second_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tbl_second'));
        }
    }

    public function index_sheet() {
        $spreadsheetId = '1I-6o-vBmF3Fbkmm1k6kxjsYGV8OqckskrGpgwyGd748'; // Ganti dengan Spreadsheet ID Anda
        $range = 'Sheet1!A1:C1000'; // Ganti dengan range yang ingin Anda baca
        $values = $this->googlesheets->readSheet($spreadsheetId, $range);
    
        // Kirim data ke view
        $data = array(
            'sheet_data' => $values,
        );
        $this->template->load('template','Tbl_second/Tbl_second_read_sheets', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Tbl_second/create_action'),
            'id_second' => set_value('id_second'),
            'nama_second' => set_value('nama_second'),
            'harga_second' => set_value('harga_second'),
            'gambar_second' => set_value('gambar_second'),
	);
        $this->template->load('template','Tbl_second/Tbl_second_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nama_second' => $this->input->post('nama_second',TRUE),
            'harga_second' => $this->input->post('harga_second',TRUE),
            'gambar_second' => $foto['file_name'],
	    );

            $this->Tbl_second_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Tbl_second'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_second_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Tbl_second/update_action'),
                'id_second' => set_value('id_second', $row->id_second),
                'nama_second' => set_value('nama_second', $row->nama_second),
                'harga_second' => set_value('harga_second', $row->harga_second),
                'gambar_second' => set_value('gambar_second', $row->gambar_second),
	    );
            $this->template->load('template','Tbl_second/Tbl_second_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tbl_second'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_second', TRUE));
        } else {
            if ($foto['file_name'] == '') {
                $data = array(
                    'nama_second' => $this->input->post('nama_second',TRUE),
                    'harga_second' => $this->input->post('harga_second',TRUE),
            );
            } else {
                $data = array(
                    'nama_second' => $this->input->post('nama_second',TRUE),
                    'harga_second' => $this->input->post('harga_second',TRUE),
                    'gambar_second' => $foto['file_name'],
            );
            }
            $this->Tbl_second_model->update($this->input->post('id_second', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Tbl_second'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_second_model->get_by_id($id);

        if ($row) {
            $this->Tbl_second_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Tbl_second'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tbl_second'));
        }
    }

    function upload_foto()
    {
        $config['upload_path'] = './assets/hpsecond';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_second');
        return $this->upload->data();
    }

    public function upload_excel() {
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream', 
            'application/vnd.ms-excel', 
            'application/x-csv', 
            'text/x-csv', 
            'text/csv', 
            'application/csv', 
            'application/excel', 
            'application/vnd.msexcel', 
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['file']['name']);
            $extension  = end($array_file);

            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for($i = 0; $i < count($sheet_data); $i++) {
                $data[]= array(
                    'id_second'      => $sheet_data[$i]['1'],
                    'nama_second'        => $sheet_data[$i]['2'],
                    'harga_second'        => $sheet_data[$i]['3'],
                );
            }
            
            if($array_data != '') {
                $this->db->update_batch('Tbl_second', $data, 'id_second');
            }
            $this->session->set_flashdata('message', 'Input Data Success !');
            redirect(site_url('Tbl_second'));
        } else {
            $this->session->set_flashdata('message', 'Input Data Gagal !');
            redirect(site_url('Tbl_second'));
        }
        redirect(site_url('Tbl_second'));
    }


    public function export_excel()
    {
        /* Data */
        $data = $this->Tbl_second_model->get_all_baru();

        /* Spreadsheet Init */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        /* Excel Header */
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'ID Baru');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Harga');
        
        /* Excel Data */
        $row_number = 2;
        foreach($data as $key => $row)
        {
            $sheet->setCellValue('A'.$row_number, $key+1);
            $sheet->setCellValue('B'.$row_number, $row->id_second);
            $sheet->setCellValue('C'.$row_number, $row->nama_second);
            $sheet->setCellValue('D'.$row_number, $row->harga_second);
        
            $row_number++;
        }

        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'excel-report-harga-hpsecond';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_second', 'nama baru', 'trim|required');
	$this->form_validation->set_rules('harga_second', 'harga baru', 'trim|required');
	//$this->form_validation->set_rules('gambar_second', 'gambar baru', 'trim|required');

	$this->form_validation->set_rules('id_second', 'id_second', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_second.php */
/* Location: ./application/controllers/Tbl_second.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-24 06:58:41 */
/* http://harviacode.com */