<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_categori extends CI_Model
{
	public $_table = "tb_categori";

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}
}
