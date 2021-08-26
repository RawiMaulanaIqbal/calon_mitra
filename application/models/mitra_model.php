<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mitra_model extends CI_Model
{

    public $table = 'calon_mitra';
    public $id = 'id_calon';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_calon', $q);
	$this->db->or_like('kode_calon_mitra', $q);
	$this->db->or_like('desa', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('no_hp', $q);
    $this->db->or_like('pic', $q);
	// $this->db->or_like('gambar', $q);
	$this->db->or_like('status', $q);
    $this->db->or_like('status2', $q);
    $this->db->or_like('status3', $q);
	$this->db->or_like('tindak_lanjut', $q);
	$this->db->or_like('janji', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_calon', $q);
	$this->db->or_like('kode_calon_mitra', $q);
	$this->db->or_like('desa', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('no_hp', $q);
    $this->db->or_like('pic', $q);
	// $this->db->or_like('gambar', $q);
	$this->db->or_like('status', $q);
    $this->db->or_like('status2', $q);
    $this->db->or_like('status3', $q);
	$this->db->or_like('tindak_lanjut', $q);
	$this->db->or_like('janji', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
