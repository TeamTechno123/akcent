<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemCom extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Item-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Company');

		$data['setting'] = $this->Admin_model->GetItemCompany($id = null);

		$this->form_validation->set_rules('name', 'Item Company','trim|required|xss_clean|is_unique[item_company_info.item_company_info_name]');

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");

			$datas = array (
        		'item_company_info_name' => $name,
        	);

        	$setting = $this->Admin_model->AddItemCompany($datas);
        	redirect('Admin/ItemCom');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ItemCom', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditItem($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Item-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Company');
		
		$data['setting'] = $this->Admin_model->GetItemCompany($ids = null);
		
		$coupon = $this->Admin_model->GetItemCompany($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['name'] = $coupon['item_company_info_name'];
		}

		$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean');
        if($data['name'] !== $this->input->post("name")){
			$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean|is_unique[item_company_info.item_company_info_name]');
		}

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$datas = array (
				'id' => $id,
        		'item_company_info_name' => $name,
        	);

        	$coupon = $this->Admin_model->UpItemCompany($datas);
        	redirect('Admin/ItemCom');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ItemCom', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleItem($id){
		$DeteleSetting = $this->Admin_model->DelItemCompany($id);
		redirect('Admin/ItemCom');
	}
	
}