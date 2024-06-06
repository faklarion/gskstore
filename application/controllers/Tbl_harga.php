<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
                'harga' => set_value('harga'),
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
        $this->load->helper('exportexcel');
        $namaFile = "data_harga.xls";
        $judul = "tbl_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
            //penulisan header
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=" . $namaFile . "");
            header("Content-Transfer-Encoding: binary ");

            xlsBOF();

        $kolomhead = 0;
            xlsWriteLabel($tablehead, $kolomhead++, "No");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Harga");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Merk");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Tipe");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Memori");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Kondisi");
            xlsWriteLabel($tablehead, $kolomhead++, "ID Kualifikasi");
            xlsWriteLabel($tablehead, $kolomhead++, "Harga");
            xlsWriteLabel($tablehead, $kolomhead++, "Merk");
            xlsWriteLabel($tablehead, $kolomhead++, "Nama Tipe");
            xlsWriteLabel($tablehead, $kolomhead++, "Memori");
            xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
            xlsWriteLabel($tablehead, $kolomhead++, "Kualifikasi");

        foreach ($this->Tbl_harga_model->get_all_harga() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_merk);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_tipe);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_memori);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_kondisi);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_kualifikasi);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_merk);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_tipe);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_memori);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kondisi);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kualifikasi);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Tbl_harga.php */
/* Location: ./application/controllers/Tbl_harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:51:32 */
/* http://harviacode.com */