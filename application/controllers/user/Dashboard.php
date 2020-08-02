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
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('user/index');
		$this->load->view('layouts/footer');
	}
}
