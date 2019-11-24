<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaxSlab extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Tax Slab Info');

		$data['setting'] = $this->Admin_model->GetTaxSlab($id = null);

		$this->form_validation->set_rules('name', 'Tax Slab','trim|required|xss_clean|is_unique[taxslab.taxslab_name]');

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");

			$datas = array (
        		'taxslab_name' => $name,
        	);

        	$setting = $this->Admin_model->AddTaxSlab($datas);
        	redirect('Admin/TaxSlab');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TaxSlab', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditTaxSlab($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Unit-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Tax Slab Info');
		
		$data['setting'] = $this->Admin_model->GetTaxSlab($ids = null);
		
		$coupon = $this->Admin_model->GetTaxSlab($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['name'] = $coupon['taxslab_name'];
		}

		$this->form_validation->set_rules('name', 'Tax Slab', 'trim|required|xss_clean');
        if($data['name'] !== $this->input->post("name")){
			$this->form_validation->set_rules('name', 'Tax Slab', 'trim|required|xss_clean|is_unique[taxslab.taxslab_name]');
		}

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$datas = array (
				'id' => $id,
        		'taxslab_name' => $name,
        	);

        	$coupon = $this->Admin_model->UpTaxSlab($datas);
        	redirect('Admin/TaxSlab');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TaxSlab', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleTaxSlab($id){
		
		$data = $this->Admin_model->DeleteCheckTaxSlab($id);
		if(empty($data)){
			$DeteleSetting = $this->Admin_model->DelTaxSlab($id);
			redirect('Admin/TaxSlab');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/TaxSlab');
		}
	}
	
}