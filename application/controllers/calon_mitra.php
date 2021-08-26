<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calon_mitra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mitra_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'calon_mitra/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'calon_mitra/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'calon_mitra/index.html';
            $config['first_url'] = base_url() . 'calon_mitra/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->mitra_model->total_rows($q);
        $calon_mitra = $this->mitra_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'calon_mitra_data' => $calon_mitra,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'calon_mitra/data_list',
            'judul' => 'Data Calon Mitra',
        );
        $this->load->view('v_index', $data);
    }


    public function read($id) 
    {
        $row = $this->mitra_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_calon' => $row->id_calon,
		'kode_calon_mitra' => $row->kode_calon_mitra,
        'tanggal' => $row->tanggal,
		'desa' => $row->desa,
		'kecamatan' => $row->kecamatan,
		'kabupaten' => $row->kabupaten,
		'provinsi' => $row->provinsi,
		'user' => $row->user,
		'no_hp' => $row->no_hp,
        'pic' => $row->pic,
        'status' => $row->status,
        'status2' => $row->status2,
        'status3' => $row->status3,
		'tindak_lanjut' => $row->tindak_lanjut,
		'janji' => $row->janji,
		'konten' => 'calon_mitra/mitra_model',
            'judul' => 'Calon Data Mitra',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon_mitra'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('calon_mitra/create_action'),
	    'id_calon' => set_value('id_calon'),
	    'kode_calon_mitra' => set_value('kode_calon_mitra'),
        'tanggal' => set_value('tanggal'),
	    'desa' => set_value('desa'),
	    'kecamtan' => set_value('kecamatan'),
	    'kabupaten' => set_value('kabupaten'),
	    'provinsi' => set_value('provinsi'),
	    'user' => set_value('user'),
	    'no_hp' => set_value('no_hp'),
        'pic' => set_value('pic'),
        'status' => set_value('status'),
        'status2' => set_value('status2'),
        'status3' => set_value('status3'),
	    'tindak_lanjut' => set_value('tindak_lanjut'),
	    'janji' => set_value('janji'),
	    'konten' => 'calon_mitra/data_form',
            'judul' => 'Data Calon Mitra',
	);
        // var_dump($data);
        // die();
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        	// setting konfigurasi upload
            // $nmfile = "lokasi_".time();
            // $config['upload_path'] = './gambar/';
            // $config['allowed_types'] = 'gif|jpg|jpeg|png';
            // $config['file_name'] = $nmfile;
            // // load library upload
            // $this->load->library('upload', $config);
            // // upload gambar 1
            // $this->upload->do_upload('gambar');
            // $result1 = $this->upload->data();
            // $result = array('gambar'=>$result1);

            $data = array(
		'kode_calon_mitra' => $this->input->post('kode_calon_mitra',TRUE),
        'tanggal' => $this->input->post('tanggal',TRUE),
		'desa' => $this->input->post('desa',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'user' => $this->input->post('user',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
        'pic' => $this->input->post('pic',TRUE),
        'status' => $this->input->post('status',TRUE),
        'status2' => $this->input->post('status2',TRUE),
        'status3' => $this->input->post('status3',TRUE),
		'tindak_lanjut' => $this->input->post('tindak_lanjut',TRUE),
		'janji' => $this->input->post('janji',TRUE),
	    );

            $this->mitra_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('calon_mitra'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->mitra_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('calon_mitra/update_action'),
		'id_calon' => set_value('id_calon', $row->id_calon),
		'kode_calon_mitra' => set_value('kode_calon_mitra', $row->kode_calon_mitra),
        'tanggal' => set_value('tanggal', $row->tanggal),
		'desa' => set_value('desa', $row->desa),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'user' => set_value('user', $row->user),
		'no_hp' => set_value('no_hp', $row->no_hp),
        'pic' => set_value('pic', $row->pic),
        'status' => set_value('status', $row->status),
        'status2' => set_value('status2', $row->status2),
        'status3' => set_value('status3', $row->status3),
		'tindak_lanjut' => set_value('tindak_lanjut', $row->tindak_lanjut),
		'janji' => set_value('janji', $row->janji),
		'konten' => 'calon_mitra/data_form',
            'judul' => 'Data Calon Mitra',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon_mitra'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_calon', TRUE));
        } else {
            $data = array(
				'kode_calon_mitra' => $this->input->post('kode_calon_mitra',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
				'desa' => $this->input->post('desa',TRUE),
				'kecamatan' => $this->input->post('kecamatan',TRUE),
				'kabupaten' => $this->input->post('kabupaten',TRUE),
				'provinsi' => $this->input->post('provinsi',TRUE),
				'user' => $this->input->post('user',TRUE),
				'no_hp' => $this->input->post('no_hp',TRUE),
                'pic' => $this->input->post('pic',TRUE),
                'status' => $this->input->post('status',TRUE),
                'status2' => $this->input->post('status2',TRUE),
                'status3' => $this->input->post('status3',TRUE),
				'tindak_lanjut' => $this->input->post('tindak_lanjut',TRUE),
				'janji' => $this->input->post('janji',TRUE),
	
	
	    );

            $this->Rumah_dinas_model->update($this->input->post('id_calon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('calon_mitra'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->mitra_model->get_by_id($id);

        if ($row) {
            $this->mitra_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('calon_mitra'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('calon_mitra'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_calon_mitra', 'kode calon mitra', 'trim|required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('desa', 'desa', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
    $this->form_validation->set_rules('pic', 'pic', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
    $this->form_validation->set_rules('status2', 'status2', 'trim|required');
    $this->form_validation->set_rules('status3', 'status3', 'trim|required');
	$this->form_validation->set_rules('tindak_lanjut', 'tindak lanjut', 'trim|required');
	$this->form_validation->set_rules('janji', 'janji', 'trim|required');
	$this->form_validation->set_rules('id_calon', 'id_calon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
