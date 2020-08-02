<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_role extends CI_Model
{
	public $_table = "tb_role";

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}
}
