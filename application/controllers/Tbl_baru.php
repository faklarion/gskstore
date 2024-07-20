<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Tbl_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_baru_model');
        $this->load->library('form_validation');
        $this->load->library('GoogleSheets');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_baru/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_baru/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_baru/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_baru_model->total_rows($q);
        $tbl_baru = $this->Tbl_baru_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_baru_data' => $tbl_baru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_baru/tbl_baru_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_baru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_baru' => $row->id_baru,
		'nama_baru' => $row->nama_baru,
		'harga_baru' => $row->harga_baru,
		'gambar_baru' => $row->gambar_baru,
	    );
            $this->template->load('template','tbl_baru/tbl_baru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_baru'));
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
        $this->template->load('template','tbl_baru/tbl_baru_read_sheets', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_baru/create_action'),
            'id_baru' => set_value('id_baru'),
            'nama_baru' => set_value('nama_baru'),
            'harga_baru' => set_value('harga_baru'),
            'gambar_baru' => set_value('gambar_baru'),
	);
        $this->template->load('template','tbl_baru/tbl_baru_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nama_baru' => $this->input->post('nama_baru',TRUE),
            'harga_baru' => $this->input->post('harga_baru',TRUE),
            'gambar_baru' => $foto['file_name'],
	    );

            $this->Tbl_baru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbl_baru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_baru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_baru/update_action'),
                'id_baru' => set_value('id_baru', $row->id_baru),
                'nama_baru' => set_value('nama_baru', $row->nama_baru),
                'harga_baru' => set_value('harga_baru', $row->harga_baru),
                'gambar_baru' => set_value('gambar_baru', $row->gambar_baru),
	    );
            $this->template->load('template','tbl_baru/tbl_baru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_baru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_baru', TRUE));
        } else {
            if ($foto['file_name'] == '') {
                $data = array(
                    'nama_baru' => $this->input->post('nama_baru',TRUE),
                    'harga_baru' => $this->input->post('harga_baru',TRUE),
            );
            } else {
                $data = array(
                    'nama_baru' => $this->input->post('nama_baru',TRUE),
                    'harga_baru' => $this->input->post('harga_baru',TRUE),
                    'gambar_baru' => $foto['file_name'],
            );
            }
            $this->Tbl_baru_model->update($this->input->post('id_baru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_baru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_baru_model->get_by_id($id);

        if ($row) {
            $this->Tbl_baru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_baru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_baru'));
        }
    }

    function upload_foto()
    {
        $config['upload_path'] = './assets/hpbaru';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_baru');
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
                    'id_baru'      => $sheet_data[$i]['1'],
                    'nama_baru'        => $sheet_data[$i]['2'],
                    'harga_baru'        => $sheet_data[$i]['3'],
                );
            }
            
            if($array_data != '') {
                $this->db->update_batch('tbl_baru', $data, 'id_baru');
            }
            $this->session->set_flashdata('message', 'Input Data Success !');
            redirect(site_url('tbl_baru'));
        } else {
            $this->session->set_flashdata('message', 'Input Data Gagal !');
            redirect(site_url('tbl_baru'));
        }
        redirect(site_url('tbl_baru'));
    }


    public function export_excel()
    {
        /* Data */
        $data = $this->Tbl_baru_model->get_all_baru();

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
            $sheet->setCellValue('B'.$row_number, $row->id_baru);
            $sheet->setCellValue('C'.$row_number, $row->nama_baru);
            $sheet->setCellValue('D'.$row_number, $row->harga_baru);
        
            $row_number++;
        }

        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'excel-report-harga-hpbaru';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_baru', 'nama baru', 'trim|required');
	$this->form_validation->set_rules('harga_baru', 'harga baru', 'trim|required');
	//$this->form_validation->set_rules('gambar_baru', 'gambar baru', 'trim|required');

	$this->form_validation->set_rules('id_baru', 'id_baru', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_baru.php */
/* Location: ./application/controllers/Tbl_baru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-24 06:58:41 */
/* http://harviacode.com */