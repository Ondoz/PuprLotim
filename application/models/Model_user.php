<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_User extends CI_Model
{
	// private $_table = "tbl_users";

	public function getAll()
	{
		// return $this->db->get($this->_table)->result_array();
		// join table tb_user dan tb_role

		$query = "SELECT `tbl_users` .*, `tb_role`.`name_role`
				FROM `tbl_users` JOIN `tb_role` 
				ON `tbl_users`.`role_id` = `tb_role`. `id`";
		return $this->db->query($query)->result_array();
	}


	public function tambahUser()
	{
		$post = $this->input->post();

		$data = array(
			"name" 	      => $post['name'],
			'user_email' 	 => $post["user_email"],
			'user_password' => md5($post["user_password"]),
			'role_id'	      => $post["role_id"],
			'is_active'     => $post["is_active"],
			'created_by'	 => $this->session->userdata('name'),
		);
		// $this->db->set('user_uuid', 'UUID()', FALSE);
		$this->db->insert('tbl_users', $data);
	}

	public function getHapus($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete("tbl_users");
	}

	public function getUserByid($id)
	{
		return $this->db->get_where('tbl_users', ['user_id' => $id])->row_array();
		// return $this->db->get_where('tb_role', ['role_id' => $id])->row_array();
	}

	public function updateUser()
	{
		$post = $this->input->post();
		$data = array(
			"name" 	      => $post['name'],
			'user_email' 	 => $post["user_email"],
			'user_password' => md5($post["user_password"]),
			'role_id'	      => $post["role_id"],
			'is_active'     => $post["is_active"],
		);
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->update('tbl_users', $data);
	}
}
