<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TechnicalUser extends CI_Controller {

	public function index(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | List Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Technical User');

		$data['datas'] = $this->Admin_model->GetTechnicalUser($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TechnicalUserList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function TechnicalUserAdd(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Technical User');

		$data['partyGroup'] = $this->Admin_model->GetParty($id = null);

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'party_id' => $this->input->post("party_group"),
	        	'party_info_id' => $this->input->post("party_name"),
	        	'name' => $this->input->post("name"),
	        	'mobile_no' => $this->input->post("mobile_no"),
	        	'address' => $this->input->post("address"),
	        	'password' => md5($this->input->post("password")),
	        	'status' => $this->input->post("status"),
	        );

       		$user = $this->Admin_model->AddTechnicalUser($datas_post);
        	redirect('Admin/TechnicalUser');
        }
	    
	    $this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TechnicalUserAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CheckApproveCoupon(){
		$id = $this->input->post("id");
		$check = $this->input->post("check");

		$data = array( 'id' => $id, 'status' => $check);
		$UpApprove = $this->Admin_model->UpdateApprove($data);
	}

	public function TechnicalUserEdit($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Edit Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Technical User');

		$data['partyGroup'] = $this->Admin_model->GetParty($ids = null);
		$party_info = $this->Admin_model->GetTechnicalUser($id);

		if(!empty($party_info)){
			foreach ($party_info as $k) {
				$data['id'] = $k['id'];
				$data['party_id'] = $k['party_id'];

				$data['PartyInfo'] = $this->Admin_model->CheckParty($data['party_id']);
				
				$data['party_info_id'] = $k['party_info_id'];
				$data['name'] = $k['name'];
				$data['mobile_no'] = $k['mobile_no'];
				$data['address'] = $k['address'];
				$data['status'] = $k['status'];
			}			
		}

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		if($this->input->post("password") !== null){
       			$datas_post = array(
       				'id' => $id,
		        	'party_id' => $this->input->post("party_group"),
		        	'party_info_id' => $this->input->post("party_name"),
		        	'name' => $this->input->post("name"),
		        	'mobile_no' => $this->input->post("mobile_no"),
		        	'address' => $this->input->post("address"),
		        	'status' => $this->input->post("status"),
		        );
       		} else {
       			$datas_post = array(
       				'id' => $id,
		        	'party_id' => $this->input->post("party_group"),
		        	'party_info_id' => $this->input->post("party_name"),
		        	'name' => $this->input->post("name"),
		        	'mobile_no' => $this->input->post("mobile_no"),
		        	'address' => $this->input->post("address"),
		        	'password' => md5($this->input->post("new_password")),
		        	'status' => $this->input->post("status"),
		        );
       		}	

       		$user = $this->Admin_model->UpTechnicalUser($datas_post);
        	redirect('Admin/TechnicalUser');
       	}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TechnicalUserAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function TechnicalUserDelete($id){
		$DeleteUser = $this->Admin_model->DelTechnicalUser($id);
		redirect('Admin/TechnicalUser');
	}

}