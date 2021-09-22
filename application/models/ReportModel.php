<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{
	public $table = "reports";
	public $table_categories = "categories";
	public $reports;

	public function filter($data)
	{
		if(isset($data['search']) && $data['search']){
			$this->db->like("$this->table.name","$data[search]");
		}
		if(isset($data['category']) && $data['category']){
			$this->db->where("$this->table.category_id = (select id from $this->table_categories where slug='$data[category]' or id='$data[category]')");
		}
	}

	public function getData($where = null)
	{
		$this->db->select("*")->from($this->table);
		if ($where) {
			$this->filter($where);
		}
		$reports = $this->db->get()->result();
		foreach ($reports as $key => $report) {
			 $reports[$key]->category = $this->CategoryModel->find($report->category_id);
		}
		return $reports;
	}

	public function showData($id)
	{
		$this->db->select("*")->from($this->table)->where(['id' => $id]);
		$reports = $this->db->get()->row();
		$reports->category = $this->CategoryModel->find($reports->category_id);
		return $reports;
	}

	public function storeData($data)
	{
		$storeData = [
			"name" 			=> $data["name"],
			"category_id" 	=> $data["category_id"]
		];

		$this->db->insert($this->table, $storeData);
	}

	public function updateData($data, $where)
	{
		$updateData = [
			"name" 			=> $data["name"],
			"category_id" 	=> $data["category_id"]
		];
		$this->db->where($where)->update($this->table, $updateData);
	}

	public function deleteData($where)
	{
		$this->db->where($where)->delete($this->table);
	}
}

/* End of file ReportModel.php */
