<?php
class Module extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model("model_module");
		$this->load->library('upload');
		$this->load->helper('text');
		$this->load->library('form_validation');
		is_logged_in();
	}

	function index()
	{
		$data['module'] = $this->model_module->getAll();
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('user/module', $data);
		$this->load->view('layouts/footer');
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
			$this->load->view('modules/_form_question', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->model_module->addquestion();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('user/module/get/' . $data['module']['id'] . '/' . $data['module']['slug']);
		}
	}
	//get id in module plus add questions
	function get($id)
	{
		$data['module'] = $this->model_module->get_module('id', $id);
		$data['data_questions'] = $this->model_module->question_query($id);
		// response_json($data);
		$this->load->view('layouts/header');
		$this->load->view('_partalis/navigation');
		$this->load->view('modules/index', $data);
		$this->load->view('layouts/footer');
	}
	//get id in questions and add answers
	function show_question($id, $slug)
	{
		$this->form_validation->set_rules('id_questions', 'Id_Questions', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == false) {

			$this->model_module->_set_viewers($id);
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
			redirect('user/module/show_question/' . $id . '/' . $slug);
		}
	}
	public function delete($id)
	{
		$this->model_module->deletequestion($id);
		$this->session->set_flashdata('flash', 'DiHapus');
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Upload image summernote
	function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = 'assets/images/img/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'assets/images/img/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '100%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = 'assets/images/img/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/images/img/' . $data['file_name'];
			}
		}
	}

	// // Delete image Summernote
	// function delete_image()
	// {
	// 	$src = $this->input->post('src');
	// 	$file_name = str_replace(base_url(), '', $src);
	// 	if (unlink($file_name)) {
	// 		echo 'File Delete Successfully';
	// 	}
	// }
}
