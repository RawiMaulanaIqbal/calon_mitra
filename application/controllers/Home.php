<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == "") {
            redirect('app/login');
        } 
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Home/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Home/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Home/index.html';
            $config['first_url'] = base_url() . 'Home/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'Home/index',
            'judul' => 'Dashboard',
        );
        $this->load->view('v_index', $data);
    }
    // public function count_tertarik(){
    //      $this->cm->load->model('tertarik');
    //      return $this->cm->mitra_model->get()->num_rows();
    // }
    //     public function count_tidaktertarik(){
    //      $this->cm->load->model('tidaktertarik');
    //      return $this->cm->mitra_model->get()->num_rows();

    // }
    //     public function count_total(){
    //      $this->cm->load->model('total');
    //      return $this->cm->mitra_model->get()->num_rows();

    // }
    //     public function count_deal(){
    //      $this->cm->load->model('deal');
    //      return $this->cm->mitra_model->get()->num_rows();
    // }
    //     public function count_hdeal(){
    //      $this->cm->load->model('hdeal');
    //      return $this->cm->mitra_model->get()->num_rows();
    // }
    //     public function count_tdeal(){
    //      $this->cm->load->model('tdeal');
    //      return $this->cm->mitra_model->get()->num_rows();
    // }
} 