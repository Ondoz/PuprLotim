<?php
class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('user_email', 'User_Email', 'required');
		$this->form_validation->set_rules('user_password', 'User_Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header');
			$this->load->view('register');
			$this->load->view('layouts/footer');
		} else {
			$this->login_model->register();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('auth');
		}
	}
}
