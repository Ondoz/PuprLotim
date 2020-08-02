<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_User_Log extends CI_Model
{


	public function getAll()
	{
		$query = "SELECT `tblog` .*, `tbl_users`.`name` as name 
				FROM `tblog` JOIN `tbl_users` 
				ON `tblog`.`usercode` = `tbl_users`. `user_id`
				ORDER BY `tblog`.`logindatetime` DESC
				";
		return $this->db->query($query)->result_array();
	}
}
