<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("model_role");
		is_logged_in();
	}

	function index()
	{
		$data['role'] = $this->model_role->getAll();
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/role/index', $data);
		$this->load->view('layouts/footer');
	}

	// function delete($id)
	// {
	// 	$this->model_menu->getHapus($id);
	// 	$this->session->set_flashdata('flash', 'DiHapus');
	// 	redirect('admin/menu');
	// }
}
