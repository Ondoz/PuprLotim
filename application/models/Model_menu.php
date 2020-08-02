<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_Menu extends CI_Model
{
	// private $_table = "tbl_users";

	public function getAll()
	{
		// return $this->db->get($this->_table)->result_array();
		// join table tb_user dan tb_role

		$query = "SELECT `tb_sub_menu` .*, `tb_role`.`name_role`
				FROM `tb_sub_menu` JOIN `tb_role` 
				ON `tb_sub_menu`.`menu_id` = `tb_role`. `id`";
		return $this->db->query($query)->result_array();
	}

	public function tambahMenu()
	{
		$post = $this->input->post();

		$data = array(
			'menu_id' => $post['menu_id'],
			'title'	=> $post['title'],
			'url'	=> $post['url'],
			'icon'	=> $post['icon'],
			'is_active'	=> $post['is_active'],
		);

		$this->db->insert('tb_sub_menu', $data);
	}

	public function getHapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tb_sub_menu");
	}

	public function getMenuByid($id)
	{
		return $this->db->get_where('tb_sub_menu', ['id' => $id])->row_array();
		// return $this->db->get_where('tb_role', ['role_id' => $id])->row_array();
	}

	public function updateMenu()
	{
		$post = $this->input->post();
		$data = array(
			'menu_id' => $post['menu_id'],
			'title'	=> $post['title'],
			'url'	=> $post['url'],
			'icon'	=> $post['icon'],
			'is_active'	=> $post['is_active'],
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_sub_menu', $data);
	}
}
