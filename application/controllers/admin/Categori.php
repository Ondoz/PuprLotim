<?php

class Categori extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("model_categori");
		is_logged_in();
	}

	public function index()
	{
		$data['categori'] = $this->model_categori->getAll();
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/categori/index', $data);
		$this->load->view('layouts/footer');
	}
}
