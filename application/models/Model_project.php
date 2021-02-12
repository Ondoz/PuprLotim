<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_project extends CI_Model
{
	public $_table = "tb_project";

	public function getAll()
	{
		$this->db->select('*', 'tb_categori.id as categori_id');
		$this->db->join('tb_categori', 'tb_project.categori_id = tb_categori.categori_id', 'left');
		return $this->db->get($this->_table)->result_array();
	}

	public function data_project($id)
	{
		$this->db->select('tb_data_project.*');
		$this->db->where('tb_project.id', $id);
		$this->db->from('tb_project');
		$this->db->join('tb_data_project', 'tb_project.id = tb_data_project.project_id');
		$query = $this->db->get();
		return $query->result();
	}
	//get Project  
	public function show($id)
	{
		return $this->db->where('id', $id)->get($this->_table)->row();
	}

	// get data Project
	public function getDtProjectByid($id)
	{
		return $this->db->get_where('tb_data_project', ['id' => $id])->row_array();
	}

	public function insert($table, $params)
	{
		return $this->db->insert($table, $params);
	}

	public function addProject()
	{
		$post = $this->input->post();
		$data = array(
			"satuan_kerja"			=> $post['satuan_kerja'],
			"no_spk"				=> $post['no_spk'],
			'tgl_spk' 				=> $post['tgl_spk'],
			'paket_pekerjaan' 		=> $post['paket_pekerjaan'],
			'no_supl'				=> $post['no_supl'],
			'tgl_supl' 				=> $post['tgl_supl'],
			'no_bahpl'				=> $post['no_bahpl'],
			'tgl_bahpl' 			=> $post['tgl_bahpl'],
			'sumber_dana' 			=> $post['sumber_dana'],
			'jumlah_hk' 			=> $post['jumlah_hk'],
			'tgl_mulai' 			=> $post['tgl_mulai'],
			'tgl_selesai' 			=> $post['tgl_selesai'],
			'categori_id'			=> $post['categori_id']
		);
		$this->db->insert('tb_project', $data);
	}

	public function no_spk()
	{
		$no_spk = $this->db->get($this->_table)->num_rows();
		$numb = $no_spk + 1;

		return $numb . '/PKK/PLP3/PU-CK/' . date('dmY');
	}

	public function no_supl()
	{
		$no_spk = $this->db->get($this->_table)->num_rows();
		$numb = $no_spk + 3;
		return $numb . '/PKK/PLP3/PU-CK/' . date('Y');
	}

	public function no_bahpl()
	{
		$no_spk = $this->db->get($this->_table)->num_rows();
		$numb = $no_spk + 5;
		return $numb . '/PKK/PLP3/PU-CK/' . date('Y');
	}

	public function hpsProject($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tb_project");
	}

	public function hpsDtProject($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tb_data_project");
	}

	public function update($table, $params, $where)
	{
		$this->db->set($params);
		$this->db->where($where);
		return $this->db->update($table);
	}
}
