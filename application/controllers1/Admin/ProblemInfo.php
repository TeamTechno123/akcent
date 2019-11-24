<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProblemInfo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Problem Info');

		$data['setting'] = $this->Admin_model->Getproblem_info($id = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($id = null);

		$this->form_validation->set_rules('equipment_type', 'Equipment Type','trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Problem Info','trim|required|xss_clean');

		if ($this->form_validation->run() != FALSE)
        {
        	$equipment_type = $this->input->post("equipment_type");
        	$name = $this->input->post("name");

			$datas = array (
        		'equipment_type_id' => $equipment_type,
        		'problem_info' => $name,
        	);

        	$setting = $this->Admin_model->Addproblem_info($datas);
        	redirect('Admin/ProblemInfo');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ProblemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditProblemInfo($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Problem Info');
		
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['setting'] = $this->Admin_model->Getproblem_info($ids = null);
		
		$coupon = $this->Admin_model->Getproblem_info($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['Item_id'] = $coupon['equipment_type_id'];
			$data['name'] = $coupon['problem_info'];
		}

		$this->form_validation->set_rules('equipment_type', 'Equipment Type','trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'AMC Type Name', 'trim|required|xss_clean');       

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$equipment_type = $this->input->post("equipment_type");

			$datas = array (
				'id' => $id,
				'equipment_type_id' => $equipment_type,
        		'problem_info' => $name,
        	);

        	$coupon = $this->Admin_model->Upproblem_info($datas);
        	redirect('Admin/ProblemInfo');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ProblemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleProblemInfo($id){
		$DeteleSetting = $this->Admin_model->Delproblem_info($id);
		redirect('Admin/ProblemInfo');
	}	
}