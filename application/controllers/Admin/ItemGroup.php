<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemGroup extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Item-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Group');

		$data['setting'] = $this->Admin_model->GetItemGroup($id = null);

		$this->form_validation->set_rules('name', 'Item Company','trim|required|xss_clean|is_unique[item_group.group_name]');

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");

			$datas = array (
        		'group_name' => $name,
        	);

        	$setting = $this->Admin_model->AddItemGroup($datas);
        	redirect('Admin/ItemGroup');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ItemGroup', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditItem($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Item-Master";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Group');
		
		$data['setting'] = $this->Admin_model->GetItemGroup($ids = null);
		
		$coupon = $this->Admin_model->GetItemGroup($id);
		foreach ($coupon as $coupon) {
			$data['id'] = $coupon['id'];
			$data['name'] = $coupon['group_name'];
		}

		$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean');
        if($data['name'] !== $this->input->post("name")){
			$this->form_validation->set_rules('name', 'Item Company', 'trim|required|xss_clean|is_unique[item_group.group_name]');
		}

		if ($this->form_validation->run() != FALSE)
        {
        	$name = $this->input->post("name");
			$datas = array (
				'id' => $id,
        		'group_name' => $name,
        	);

        	$coupon = $this->Admin_model->UpItemGroup($datas);
        	redirect('Admin/ItemGroup');
        }
		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ItemGroup', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeteleItem($id){
		$data = $this->Admin_model->DeleteCheckIntemGroup($id);
		if(empty($data)){
			$DeleteUser = $this->Admin_model->DelItemGroup($id);
			redirect('Admin/ItemGroup');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/ItemGroup');
		}
	}
	
}