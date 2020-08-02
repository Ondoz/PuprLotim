<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	function index()
	{
		$data['user'] = $this->db->get('tbl_users')->num_rows();
		$data['project'] = $this->db->get('tb_project')->num_rows();
		$data['sungai'] = $this->db->get('tb_sda')->num_rows();
		$data['wilayah'] = $this->db->get('tb_wilayah')->num_rows();
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/index', $data);
		$this->load->view('layouts/footer');
	}
}
