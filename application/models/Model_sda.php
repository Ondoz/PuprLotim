<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_sda extends CI_Model
{
	private $_table = "tb_sda";

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function tambahData()
	{
		$post = $this->input->post();

		$data = array(
			'kode_sungai' => $post['kode_sungai'],
			'nama_sungai' => $post['nama_sungai'],
			'wilayah' => $post['wilayah'],
			'lebar_max' => $post['lebar_max'],
			'max_m3' => $post['max_m3'],
			'panjang' => $post['panjang'],
			'ket' => $post['ket'],
		);

		$this->db->insert('tb_sda', $data);
	}

	public function getwilayah()
	{
		return $this->db->get('tb_wilayah')->result_array();
	}

	public function getHapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tb_sda");
	}

	public function getSdaByid($id)
	{
		return $this->db->get_where('tb_Sda', ['id' => $id])->row_array();
	}

	public function updateSda()
	{
		$post = $this->input->post();
		$data = array(
			'kode_sungai' => $post['kode_sungai'],
			'nama_sungai' => $post['nama_sungai'],
			'wilayah' => $post['wilayah'],
			'lebar_max' => $post['lebar_max'],
			'max_m3' => $post['max_m3'],
			'panjang' => $post['panjang'],
			'ket' => $post['ket'],
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_sda', $data);
	}
	public function kode()
	{
		$no_spk = $this->db->get($this->_table)->num_rows();
		$numb = $no_spk + 1;

		return "Ks-" . sprintf("%04s", $numb);
	}
}
