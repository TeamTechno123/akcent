<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Unit Info');

		$data['setting'] = $this->Admin_model->GetUnit($id = null);

		$this->form_validation->set_rules('name', 'Unit','trim|required|xss_clean|is_unique[unit.unit_name]');

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");

			$datas = array (
        		'unit_name' => $name,
        	);

        	$setting = $this->Admin_model->AddUnit($datas);
        	redirect('Admin/Unit');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/Unit', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditUnit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Unit Info');
		
		$data['setting'] = $this->Admin_model->GetUnit($ids = null);
		
		$coupon = $this->Admin_model->GetUnit($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['name'] = $coupon['unit_name'];
		}

		$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean');
        if($data['name'] !== $this->input->post("name")){
			$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean|is_unique[unit.unit_name]');
		}

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$datas = array (
				'id' => $id,
        		'unit_name' => $name,
        	);

        	$coupon = $this->Admin_model->UpUnit($datas);
        	redirect('Admin/Unit');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/Unit', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleUnit($id){
		$DeteleSetting = $this->Admin_model->DelUnit($id);
		redirect('Admin/Unit');
	}
	
}