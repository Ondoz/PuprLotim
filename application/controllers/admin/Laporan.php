<?php

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/laporan/index');
		$this->load->view('layouts/footer');
	}
}
