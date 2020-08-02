<?php defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{
	function validate($email, $password)
	{
		$this->db->where('user_email', $email);
		$this->db->where('user_password', $password);
		$result = $this->db->get('tbl_users');
		return $result;
	}



	function register()
	{
		$post = $this->input->post();

		$data = array(
			"name" 	      => $post['name'],
			'user_email' 	 => $post["user_email"],
			'user_password' => md5($post["user_password"]),
			'role_id'	      => 2,
			'is_active'     => 1,
		);
		// $this->db->set('user_uuid', 'UUID()', FALSE);
		$this->db->insert('tbl_users', $data);
	}
}
