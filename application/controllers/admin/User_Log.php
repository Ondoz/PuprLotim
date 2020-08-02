<?php
defined('BASEPATH') or exit('No direct script access allowed');
class user_log extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("model_user_log");
		is_logged_in();
	}

	function index()
	{
		$data['user_log'] = $this->model_user_log->getAll();
		// response_json($data);
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/user_log/index', $data);
		$this->load->view('layouts/footer');
	}

	// function delete($id)
	// {
	// 	$this->model_menu->getHapus($id);
	// 	$this->session->set_flashdata('flash', 'DiHapus');
	// 	redirect('admin/menu');
	// }
}
