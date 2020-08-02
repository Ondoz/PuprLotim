<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_Module extends CI_Model
{
	// private $_table = "tbl_users";

	public function getAll()
	{
		// return $this->db->get($this->_table)->result_array();
		// join table tb_user dan tb_role

		$query = "SELECT `tb_sub_module` .*, `tbl_users`.`name`
				FROM `tb_sub_module` JOIN `tbl_users` 
				ON `tb_sub_module`.`createby` = `tbl_users`. `user_id`";
		return $this->db->query($query)->result_array();
	}

	public function addmodule()
	{
		$post = $this->input->post();
		$data = array(
			"title"			=> $post['title'],
			'slug'			=> slug($post['title']),
			'is_active'		=> $post["is_active"],
			'createby'		=> $this->session->userdata('user_id'),
			'createdatetime'	=> date("Y-m-d H:i:s"),
			'updatedatetime'	=> date("Y-m-d H:i:s"),
		);

		$this->db->insert('tb_sub_module', $data);
	}
	public function deletemodule($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tb_sub_module");
	}

	//select id module
	function get_module($id, $slug)
	{
		return $this->db->get_where('tb_sub_module', [$id => $slug])->row_array();
	}
	//get select module 
	function question_query($id)
	{
		$questions = "SELECT `tb_questions`.*, `tbl_users`.`name`, `tbl_users`.`user_email`, count(`tb_answers`.`id_questions`) as `total_answers`
		FROM `tb_questions`
		JOIN `tb_sub_module` ON `tb_questions`.`id_sub_module` = `tb_sub_module`.`id`
		JOIN `tbl_users` ON `tb_questions`.`id_user` = `tbl_users`. `user_id`
		LEFT JOIN tb_answers ON tb_questions.`id` = `tb_answers`.`id_questions`
		WHERE `tb_questions`.`id_sub_module` = $id
		GROUP BY `tb_questions`.`id`,`tb_answers`.`id_questions`
		ORDER BY `tb_questions`.`created_at` DESC
		";
		return $this->db->query($questions)->result_array();
	}
	//select data table question 
	function questions_id($id, $slug)
	{
		return $this->db->get_where('tb_questions', [$id => $slug])->row_array();
	}

	//update viewers
	public function _set_viewers($id)
	{
		$this->db->set('views', 'views+1', FALSE);
		$this->db->where('uuid_question', $id);
		$this->db->update('tb_questions');
	}

	//add data tb_questions 
	public function addquestion()
	{
		$post = $this->input->post();
		$data = array(
			'id_user'			=> $this->session->userdata('user_id'),
			'id_sub_module'	=> $post['id_sub_module'],
			'title'			=> $post['title'],
			'slug'			=> slug($post['title']),
			'body'			=> $post["body"],
			'views'			=> 0,
			'created_at'		=> date("Y-m-d H:i:s"),
			'updated_at'		=> date("Y-m-d H:i:s"),
		);
		$this->db->set('uuid_question', 'UUID()', FALSE);
		$this->db->insert('tb_questions', $data);
	}
	public function deletequestion($id)
	{
		$this->db->where('uuid_question', $id);
		$this->db->delete("tb_questions");
	}
	///answers for questions 
	// public function getAnswers($id)
	// {
	// 	$query = "SELECT `tb_answers` .*
	// 			FROM `tb_answers` JOIN `tb_questions` 
	// 			ON `tb_answers`.`id_questions` = `tb_questions`.`id`
	// 			WHERE `tb_answers`.`id_questions` = $id
	// 		";

	// 	return $this->db->query($query)->result_array();
	// }

	//add answers for questions
	public function addAnswers()
	{
		$post = $this->input->post();
		$data = array(
			'id_questions'		=> $post['id_questions'],
			'id_user'			=> $this->session->userdata('user_id'),
			'body'			=> $post["body"],
			'created_at'		=> date("Y-m-d H:i:s"),
			'updated_at'		=> date("Y-m-d H:i:s"),
		);

		$this->db->insert('tb_answers', $data);
	}
}
