<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	public $table = 'categories';
	public $name, $slug, $logo;

	public function getData($where=null)
	{
		$categories = $this->db->select("*")->from($this->table);
		if ($where) {
			$this->db->where($where);
		}
		return $categories->get()->result();
	}

	public function find($id, $where=null)
	{
		return $this->db->select('*')->from($this->table)->where(['id'=>$id])->get()->row();
	}

}

/* End of file ModelName.php */
