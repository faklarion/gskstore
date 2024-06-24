<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_baru_model');
        $this->load->library('form_validation');
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
		'memori_baru' => $row->memori_baru,
		'harga_baru' => $row->harga_baru,
		'gambar_baru' => $row->gambar_baru,
	    );
            $this->template->load('template','tbl_baru/tbl_baru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_baru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_baru/create_action'),
            'id_baru' => set_value('id_baru'),
            'nama_baru' => set_value('nama_baru'),
            'memori_baru' => set_value('memori_baru'),
            'harga_baru' => set_value('harga_baru'),
            'gambar_baru' => set_value('gambar_baru'),
	);
        $this->template->load('template','tbl_baru/tbl_baru_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nama_baru' => $this->input->post('nama_baru',TRUE),
            'memori_baru' => $this->input->post('memori_baru',TRUE),
            'harga_baru' => $this->input->post('harga_baru',TRUE),
            'gambar_baru' => $this->input->post('gambar_baru',TRUE),
	    );

            $this->Tbl_baru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
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
                'memori_baru' => set_value('memori_baru', $row->memori_baru),
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

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_baru', TRUE));
        } else {
            $data = array(
                'nama_baru' => $this->input->post('nama_baru',TRUE),
                'memori_baru' => $this->input->post('memori_baru',TRUE),
                'harga_baru' => $this->input->post('harga_baru',TRUE),
                'gambar_baru' => $this->input->post('gambar_baru',TRUE),
	    );

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

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_baru', 'nama baru', 'trim|required');
	$this->form_validation->set_rules('memori_baru', 'memori baru', 'trim|required');
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