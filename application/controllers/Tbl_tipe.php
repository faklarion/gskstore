<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_tipe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tipe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_tipe/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_tipe/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_tipe/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_tipe_model->total_rows($q);
        $tbl_tipe = $this->Tbl_tipe_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_tipe_data' => $tbl_tipe,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_tipe/tbl_tipe_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_tipe_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tipe' => $row->id_tipe,
		'id_merk' => $row->id_merk,
		'nama_tipe' => $row->nama_tipe,
	    );
            $this->template->load('template','tbl_tipe/tbl_tipe_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tipe'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_tipe/create_action'),
            'data_merk' => $this->Tbl_tipe_model->get_all_merk(),
            'id_tipe' => set_value('id_tipe'),
            'id_merk' => set_value('id_merk'),
            'nama_tipe' => set_value('nama_tipe'),
	);
        $this->template->load('template','tbl_tipe/tbl_tipe_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_merk' => $this->input->post('id_merk',TRUE),
		'nama_tipe' => $this->input->post('nama_tipe',TRUE),
	    );

            $this->Tbl_tipe_model->insert($data);
            $this->session->set_flashdata('message', 'Input Tipe Success !');
            redirect(site_url('tbl_tipe'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tipe_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_tipe/update_action'),
                'data_merk' => $this->Tbl_tipe_model->get_all_merk(),
		'id_tipe' => set_value('id_tipe', $row->id_tipe),
		'id_merk' => set_value('id_merk', $row->id_merk),
		'nama_tipe' => set_value('nama_tipe', $row->nama_tipe),
	    );
            $this->template->load('template','tbl_tipe/tbl_tipe_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tipe'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tipe', TRUE));
        } else {
            $data = array(
		'id_merk' => $this->input->post('id_merk',TRUE),
		'nama_tipe' => $this->input->post('nama_tipe',TRUE),
	    );

            $this->Tbl_tipe_model->update($this->input->post('id_tipe', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Tipe Success !');
            redirect(site_url('tbl_tipe'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tipe_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tipe_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_tipe'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tipe'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_merk', 'id merk', 'trim|required');
	$this->form_validation->set_rules('nama_tipe', 'nama tipe', 'trim|required');

	$this->form_validation->set_rules('id_tipe', 'id_tipe', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_tipe.php */
/* Location: ./application/controllers/Tbl_tipe.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-24 07:23:33 */
/* http://harviacode.com */