<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("model_menu");
		$this->load->library('form_validation');
		is_logged_in();
	}

	function index()
	{
		$this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
		// $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		// $this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('is_active', 'Is_Active', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = $this->model_menu->getAll();
			$this->load->view('layouts/header');
			$this->load->view('_partalis/navigation');
			$this->load->view('admin/menu/index', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_menu->tambahMenu();
			$this->session->set_flashdata('flash', 'Berhasil di tambahkan');
			redirect('admin/menu');
		}
	}

	function delete($id)
	{
		$this->model_menu->getHapus($id);
		$this->session->set_flashdata('flash', 'DiHapus');
		redirect('admin/menu');
	}
	public function Edit()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_menu->getMenuByid($id);
		echo json_encode($data);
	}
	public function update()
	{
		// $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
		// $this->form_validation->set_rules('title', 'Title', 'required');
		// $this->form_validation->set_rules('url', 'URL', 'required');
		// $this->form_validation->set_rules('icon', 'Icon', 'required');
		// $this->form_validation->set_rules('is_active', 'Is_Active', 'required');
		// if ($this->form_validation->run() ==  FALSE) {
		// 	redirect('admin/menu');
		// }else{
		$this->model_menu->updateMenu();
		$this->session->set_flashdata('flash', 'Update');
		redirect('admin/menu');
		// }
	}
}
