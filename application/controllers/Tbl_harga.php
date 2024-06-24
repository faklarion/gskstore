<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Tbl_harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_harga_model');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/tbl_harga/index/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_harga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_harga/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_harga/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_harga_model->total_rows($q);
        $tbl_harga = $this->Tbl_harga_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_harga_data' => $this->Tbl_harga_model->get_all_data(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_harga/tbl_harga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_harga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_harga' => $row->id_harga,
		'id_tipe' => $row->id_tipe,
		'id_memori' => $row->id_memori,
		'id_kondisi' => $row->id_kondisi,
		'id_kualifikasi' => $row->id_kualifikasi,
		'harga' => $row->harga,
	    );
            $this->template->load('template','tbl_harga/tbl_harga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_harga'));
        }
    }

    public function import_excel() {
        $data = array(
            'action' => site_url('tbl_harga/import_excel_action'),      
	    );
        $this->template->load('template' , 'tbl_harga/tbl_harga_upload_excel', $data);
    }

    public function import_excel_action() {
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
                    'id_harga'      => $sheet_data[$i]['1'],
                    'harga'        => $sheet_data[$i]['7'],
                );
            }
            
            if($array_data != '') {
                $this->db->update_batch('tbl_harga', $data, 'id_harga');
            }
            $this->session->set_flashdata('message', 'Input Harga Success !');
            redirect(site_url('tbl_harga'));
        } else {
            $this->session->set_flashdata('message', 'Input Harga Gagal !');
            redirect(site_url('tbl_harga'));
        }
        redirect(site_url('tbl_harga'));
    }
    

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_harga/create_action'),
            'data_merk' => $this->Tbl_harga_model->get_all_merk(),
            'data_tipe' => $this->Tbl_harga_model->get_all_tipe(),
            'data_kualifikasi' => $this->Tbl_harga_model->get_all_kualifikasi(),
            'data_kondisi' => $this->Tbl_harga_model->get_all_kondisi(),
            'data_memori' => $this->Tbl_harga_model->get_all_memori(),
            'id_harga' => set_value('id_harga'),
            'id_tipe' => set_value('id_tipe'),
            'id_memori' => set_value('id_memori'),
            'id_kondisi' => set_value('id_kondisi'),
            'id_kualifikasi' => set_value('id_kualifikasi'),
            'harga' => set_value('harga'),
	);
        $this->template->load('template','tbl_harga/tbl_harga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        
        $idMemori = $this->input->post('id_memori');
        $idKondisi = $this->input->post('id_kondisi');
        $idTipe = $this->input->post('id_tipe');
        $idKualifikasi = $this->input->post('id_kualifikasi');

        $sql = "SELECT * FROM tbl_harga WHERE id_memori = $idMemori AND id_tipe = $idTipe AND id_kondisi = $idKondisi AND id_kualifikasi = $idKualifikasi";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tipe' => $this->input->post('id_tipe',TRUE),
		'id_memori' => $this->input->post('id_memori',TRUE),
		'id_kondisi' => $this->input->post('id_kondisi',TRUE),
		'id_kualifikasi' => $this->input->post('id_kualifikasi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tbl_harga_model->insert($data);
            $this->session->set_flashdata('message', 'Input Harga Success !');
            redirect(site_url('tbl_harga'));
        }
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Data Sudah Ada ! Cek Kembali');
        window.location.href='".site_url('tbl_harga/tambah_harga/'.$idTipe.'')."';
        </script>");
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_harga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_harga/update_action'),
                'data_merk' => $this->Tbl_harga_model->get_all_merk(),
                'data_tipe' => $this->Tbl_harga_model->get_all_tipe(),
                'data_kualifikasi' => $this->Tbl_harga_model->get_all_kualifikasi(),
                'data_kondisi' => $this->Tbl_harga_model->get_all_kondisi(),
                'data_memori' => $this->Tbl_harga_model->get_all_memori(),
                'id_harga' => set_value('id_harga', $row->id_harga),
                'id_tipe' => set_value('id_tipe', $row->id_tipe),
                'id_memori' => set_value('id_memori', $row->id_memori),
                'id_kondisi' => set_value('id_kondisi', $row->id_kondisi),
                'id_kualifikasi' => set_value('id_kualifikasi', $row->id_kualifikasi),
                'harga' => set_value('harga', $row->harga),
	    );
            $this->template->load('template','tbl_harga/tbl_harga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_harga'));
        }
    }

    public function tambah_harga($id) 
    {
        $row = $this->Tbl_harga_model->get_all_tipe_by_id_row($id);

        if ($row) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('tbl_harga/create_action'),
                'data_merk' => $this->Tbl_harga_model->get_all_merk(),
                'data_tipe' => $this->Tbl_harga_model->get_all_tipe(),
                'data_kualifikasi' => $this->Tbl_harga_model->get_all_kualifikasi(),
                'data_kondisi' => $this->Tbl_harga_model->get_all_kondisi(),
                'data_memori' => $this->Tbl_harga_model->get_all_memori(),
                'id_tipe' => set_value('id_tipe', $row->id_tipe),
                'id_harga' => set_value('id_harga'),
                'id_memori' => set_value('id_memori'),
                'id_kondisi' => set_value('id_kondisi'),
                'id_kualifikasi' => set_value('id_kualifikasi'),
                'harga' => 0,
	    );
            $this->template->load('template','tbl_harga/tbl_harga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_harga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        $idMemori = $this->input->post('id_memori');
        $idKondisi = $this->input->post('id_kondisi');
        $idTipe = $this->input->post('id_tipe');
        $idKualifikasi = $this->input->post('id_kualifikasi');
        $harga = $this->input->post('harga');
        $idHarga = $this->input->post('id_harga', TRUE);

        $sql = "SELECT * FROM tbl_harga WHERE id_memori = $idMemori AND id_tipe = $idTipe AND id_kondisi = $idKondisi AND id_kualifikasi = $idKualifikasi AND harga = $harga";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_harga', TRUE));
        } else {
            $data = array(
		'id_tipe' => $this->input->post('id_tipe',TRUE),
		'id_memori' => $this->input->post('id_memori',TRUE),
		'id_kondisi' => $this->input->post('id_kondisi',TRUE),
		'id_kualifikasi' => $this->input->post('id_kualifikasi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tbl_harga_model->update($this->input->post('id_harga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Harga Success !');
            redirect(site_url('tbl_harga'));
        } 
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Data Tidak ada perubahan atau sudah ada ! Cek Kembali');
        window.location.href='".site_url('tbl_harga/tambah_harga/'.$idTipe.'')."';
        </script>");
    }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_harga_model->get_by_id($id);

        if ($row) {
            $this->Tbl_harga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_harga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_harga'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_tipe', 'id tipe', 'trim|required');
        $this->form_validation->set_rules('id_memori', 'id memori', 'trim|required');
        $this->form_validation->set_rules('id_kondisi', 'id kondisi', 'trim|required');
        $this->form_validation->set_rules('id_kualifikasi', 'id kualifikasi', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('id_harga', 'id_harga', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        /* Data */
        $data = $this->Tbl_harga_model->get_all_harga();

        /* Spreadsheet Init */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        /* Excel Header */
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'ID Harga');
        $sheet->setCellValue('C1', 'ID Merk');
        $sheet->setCellValue('D1', 'ID Tipe');
        $sheet->setCellValue('E1', 'ID Memori');
        $sheet->setCellValue('F1', 'ID Kondisi');
        $sheet->setCellValue('G1', 'ID Kualifikasi');
        $sheet->setCellValue('H1', 'Harga');
        $sheet->setCellValue('I1', 'Merk');
        $sheet->setCellValue('J1', 'Tipe');
        $sheet->setCellValue('K1', 'Memori');
        $sheet->setCellValue('L1', 'Kondisi');
        $sheet->setCellValue('M1', 'Kualifikasi');
        
        /* Excel Data */
        $row_number = 2;
        foreach($data as $key => $row)
        {
            $sheet->setCellValue('A'.$row_number, $key+1);
            $sheet->setCellValue('B'.$row_number, $row->id_harga);
            $sheet->setCellValue('C'.$row_number, $row->id_merk);
            $sheet->setCellValue('D'.$row_number, $row->id_tipe);
            $sheet->setCellValue('E'.$row_number, $row->id_memori);
            $sheet->setCellValue('F'.$row_number, $row->id_kondisi);
            $sheet->setCellValue('G'.$row_number, $row->id_kualifikasi);
            $sheet->setCellValue('H'.$row_number, $row->harga);
            $sheet->setCellValue('I'.$row_number, $row->nama_merk);
            $sheet->setCellValue('J'.$row_number, $row->nama_tipe);
            $sheet->setCellValue('K'.$row_number, $row->nama_memori);
            $sheet->setCellValue('L'.$row_number, $row->nama_kondisi);
            $sheet->setCellValue('M'.$row_number, $row->nama_kualifikasi);
        
            $row_number++;
        }

        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'excel-report-harga';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

}

/* End of file Tbl_harga.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */