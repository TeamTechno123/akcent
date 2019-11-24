<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AMCType extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'AMC Type Info');

		$data['setting'] = $this->Admin_model->GetAMCType($id = null);

		$this->form_validation->set_rules('name', 'AMC Type Name','trim|required|xss_clean|is_unique[amc_type.amc_type]');

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");

			$datas = array (
        		'amc_type' => $name,
        	);

        	$setting = $this->Admin_model->AddAMCType($datas);
        	redirect('Admin/AMCType');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AMCType', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditAMCType($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'AMC Type Info');
		
		$data['setting'] = $this->Admin_model->GetAMCType($ids = null);
		
		$coupon = $this->Admin_model->GetAMCType($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['name'] = $coupon['amc_type'];
		}

		$this->form_validation->set_rules('name', 'AMC Type Name', 'trim|required|xss_clean');
        if($data['name'] !== $this->input->post("name")){
			$this->form_validation->set_rules('name', 'AMC Type Name', 'trim|required|xss_clean|is_unique[amc_type.amc_type]');
		}

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$datas = array (
				'id' => $id,
        		'amc_type' => $name,
        	);

        	$coupon = $this->Admin_model->UpAMCType($datas);
        	redirect('Admin/AMCType');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AMCType', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleAMCType($id){

		$data = $this->Admin_model->DeleteCheckAMCType($id);
		if(empty($data)){
			$DeteleSetting = $this->Admin_model->DelAMCType($id);
			redirect('Admin/AMCType');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/AMCType');
		}
	}
	
}