<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Module extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model("model_module");
		$this->load->helper('text');
		$this->load->library('form_validation');
		is_logged_in();
	}

	function index()
	{
		$data['module'] = $this->model_module->getAll();
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('admin/module/index', $data);
		$this->load->view('_partalis/script');
		$this->load->view('layouts/footer');
	}

	function tambah()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('is_active', 'Is_Active', 'required');
		if ($this->form_validation->run() == FALSE) {

			redirect("admin/module");
		} else {
			$this->model_module->addmodule();
			$this->session->set_flashdata('flash', 'Berhasil di tambahkan');
			redirect('admin/module');
		}
	}

	public function delete($id)
	{
		$this->model_module->deletemodule($id);
		$this->session->set_flashdata('flash', 'DiHapus');
		redirect('admin/module');
	}
	function questions($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('id_sub_module', 'Id_Sub_Module', 'required');
		// echo 'ini qustions';
		$data['module'] = $this->model_module->get_module('id', $id);
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header');
			$this->load->view('_partalis/navigation');
			$this->load->view('admin/module/_form_question', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_module->addquestion();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/module/get/' . $data['module']['id'] . '/' . $data['module']['slug']);
		}
	}

	//get id in module plus add questions
	function get($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('id_sub_module', 'Id_Sub_Module', 'required');

		if ($this->form_validation->run() == false) {
			$data['module'] = $this->model_module->get_module('id', $id);
			$data['data_questions'] = $this->model_module->question_query($id);

			$this->load->view('layouts/header');
			$this->load->view('_partalis/navigation');
			$this->load->view('modules/index', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_module->addquestion();
			// $this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/module/get/' . $id);
		}
	}
	//get id in questions
	function show_question($id, $slug)
	{
		$this->form_validation->set_rules('id_questions', 'Id_Questions', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->model_module->_set_viewers($id);
		if ($this->form_validation->run() == false) {

			$data['question'] = $this->model_module->questions_id('uuid_question', $id);
			$questions_id = $data['question']['id'];
			$data['module'] = $this->model_module->get_module($questions_id, $id);
			$queryGetquestion = "SELECT `tb_questions` .*, `tbl_users`.`name`,`tbl_users`.`user_email`
					FROM `tb_questions` JOIN `tbl_users` 
					ON `tb_questions`.`id_user` = `tbl_users`. `user_id`
					lEFT JOIN `tb_sub_module` 
					ON `tb_questions`.`id_sub_module` = `tb_sub_module`.`id`
					WHERE `tb_questions`.`id` = $questions_id
			";
			$query = $this->db->query($queryGetquestion)->row_array();
			$data['get_question'] = $query;
			$answerQuery = "SELECT `tb_answers` .*, `tbl_users`.`name`,`tbl_users`.`user_email`
				FROM `tb_answers`
				JOIN `tb_questions` 
				ON `tb_answers`.`id_questions` = `tb_questions`.`id`
				JOIN `tbl_users`
				ON `tb_answers`.`id_user` = `tbl_users`.`user_id`
				WHERE `tb_answers`.`id_questions` =  $questions_id
				ORDER BY `tb_answers`.`created_at` DESC";
			$answer = $this->db->query($answerQuery)->result_array();
			$data['get_answer'] = $answer;

			// response_json($data);
			$this->load->view('layouts/header');
			$this->load->view('_partalis/navigation');
			$this->load->view('modules/show_questions', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_module->addAnswers();
			redirect('admin/module/show_question/' . $id . '/' . $slug);
		}
	}
}
