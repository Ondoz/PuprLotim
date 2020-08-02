<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// menambahkan komi setalah model_user maka akan menjadi alias 
		$this->load->model("model_user");
		$this->load->model("model_role");
		$this->load->library('form_validation');
		is_logged_in();
	}

	function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('user_email', 'User_Email', 'required');
		$this->form_validation->set_rules('user_password', 'User_Password', 'required');
		$this->form_validation->set_rules('role_id', 'Role_Id', 'required');
		$this->form_validation->set_rules('is_active', 'Is_Active', 'required');

		if ($this->form_validation->run() == false) {
			// $data['kode'] = $this->model_user->kode();
			$data['user'] = $this->model_user->getAll();
			$data['role'] = $this->model_role->getAll();
			$this->load->view('layouts/header');
			$this->load->view('_partalis/navigation');
			$this->load->view('admin/user/index', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_user->tambahUser();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/user');
		}
	}

	public function delete($id)
	{
		$this->model_user->getHapus($id);
		$this->session->set_flashdata('flash', 'DiHapus');
		redirect('admin/user');
	}

	public function edit()
	{
		$id = $this->input->post('id',TRUE);
		$data = $this->model_user->getUserByid($id);
		echo json_encode($data);
	}
	public function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('user_email', 'User_Email', 'required');
		$this->form_validation->set_rules('user_password', 'User_Password', 'required');
		$this->form_validation->set_rules('role_id', 'Role_Id', 'required');
		$this->form_validation->set_rules('is_active', 'Is_Active', 'required');
		if ($this->form_validation->run() ==  FALSE) {
			redirect('admin/user');
		}else{
			$this->model_user->updateUser();
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/user');
		}
	}
}
