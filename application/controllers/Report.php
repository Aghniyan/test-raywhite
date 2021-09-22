<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function index()
	{
		$filter = array_merge($this->input->post(), $this->input->get());
		$data = [
			"title"			=> "Page Report",
			"categories"	=> $this->CategoryModel->getData(),
			"reports" 		=> $this->ReportModel->getData($filter)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('reports/index');
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data = [
			"title"			=> "Page Report Add",
			"categories" 	=> $this->CategoryModel->getData(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('reports/add');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = $this->input->post();
		if (isset($data['submit'])) {
			$this->ReportModel->storeData($data);
		}
		redirect("report/index");
	}

	public function edit($id)
	{
		$data = [
			"title"			=> "Page Report Edit",
			"categories" 	=> $this->CategoryModel->getData(),
			"report" 		=> $this->ReportModel->showData($id)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('reports/edit');
		$this->load->view('templates/footer');
	}


	public function update()
	{
		$data = $this->input->post();
		if (isset($data['submit'])) {
			$this->ReportModel->updateData($data, ['id' => $data['id']]);
		}
		redirect("report/index");
	}

	public function delete($id)
	{
		$this->ReportModel->deleteData(['id' => $id]);
		redirect('report/index');
	}
}
