<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends CI_Controller {

	public function AddGroup()	{
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Party Group";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Party Group');

		$data['datas'] = $this->Admin_model->GetParty($id = null);
		$this->form_validation->set_rules('party_name', 'Party Name', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() != FALSE)
        {
            $party_name = $this->input->post("party_name");

            $data = array( 'party_name' => $party_name);

            $user = $this->Admin_model->AddParty($data);
            redirect('Admin/Party/AddGroup');
        }   		

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/Party', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditGroup($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Edit Party Group";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Party Group');

		$category = $this->Admin_model->GetParty($ids = null);
		if($category !== null){
			$data['datas'] = $category;
		}

		$selectData = $this->Admin_model->GetParty($id);
		foreach ($selectData as $selectData) {
			$data['id'] = $selectData['id'];
			$data['name'] = $selectData['party_name'];
		}

		if($data['name'] !== $this->input->post("party_name")){
			$this->form_validation->set_rules('party_name', 'Party Group Name', 'trim|required|xss_clean|is_unique[party.party_name]');
		}

		if($this->form_validation->run() != FALSE){
			$name = array (
				'id' => $data['id'],
				'party_name' => $this->input->post("party_name")
			);

        	$user = $this->Admin_model->UpdatePartyGroup($name);
        	redirect('Admin/Party/AddGroup');
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/Party', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeleteGroup($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data = $this->Admin_model->DeleteCheckParty($id);
		if(empty($data)){
			$DeleteUser = $this->Admin_model->DeleteGroup($id);
			redirect('Admin/Party/AddGroup');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/Party/AddGroup');
		}
	}

	public function PartyInfo(){		
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Party Information";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Party Information');

		$data['party_info'] = $this->Admin_model->GetPartyInfo($id = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/PartyInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AddPartyInfo(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Party Information";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Party Information');

		$data['datas'] = $this->Admin_model->GetParty($id = null);

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_1', 'Mobile No. 1', 'trim|required|xss_clean|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'party_group_id' => $this->input->post("party_group"),
	        	'name' => $this->input->post("name"),
	        	'mobile_1' => $this->input->post("mobile_1"),
	        	'mobile_2' => $this->input->post("mobile_2"),
	        	'address' => $this->input->post("address"),
	        	'email' => $this->input->post("email"),
	        	'website' => $this->input->post("website"),
	        	'pan_no' => $this->input->post("pan_no"),
	        	'gst_no' => $this->input->post("gst_no"),
	        	'password' => md5($this->input->post("password")),
	        	'party_contact_person_name' => $this->input->post("content_person"),
	        	'party_contact_no' => $this->input->post("content_no"),
	        );

       		$user = $this->Admin_model->AddPartyInfo($datas_post);
        	redirect('Admin/Party/PartyInfo');
        }
	    
	    $this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AddPartyInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditPartyInfo($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Party Information";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Party Information');

		$data['datas'] = $this->Admin_model->GetParty($ids = null);
		$party_info = $this->Admin_model->GetPartyInfo($id);

		if(!empty($party_info)){
			foreach ($party_info as $k) {
				$data['id'] = $k['id'];
				$data['party_group_id'] = $k['party_group_id'];
				$data['name'] = $k['name'];
				$data['mobile_1'] = $k['mobile_1'];
				$data['mobile_2'] = $k['mobile_2'];
				$data['address'] = $k['address'];
				$data['old_password'] = $k['password'];
				$data['email'] = $k['email'];
				$data['website'] = $k['website'];
				$data['pan_no'] = $k['pan_no'];
				$data['gst_no'] = $k['gst_no'];
				$data['party_contact_person_name'] = $k['party_contact_person_name'];
				$data['party_contact_no'] = $k['party_contact_no'];
			}			
		}

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_1', 'Mobile No. 1', 'trim|required|xss_clean|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		if(!empty($this->input->post("password"))){
			if(md5($this->input->post("password")) !== $data['old_password']){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
			}
		}

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'id' => $id,
	        	'party_group_id' => $this->input->post("party_group"),
	        	'name' => $this->input->post("name"),
	        	'mobile_1' => $this->input->post("mobile_1"),
	        	'mobile_2' => $this->input->post("mobile_2"),
	        	'address' => $this->input->post("address"),
	        	'email' => $this->input->post("email"),
	        	'website' => $this->input->post("website"),
	        	'pan_no' => $this->input->post("pan_no"),
	        	'gst_no' => $this->input->post("gst_no"),
	        	'password' => md5($this->input->post("password")),
	        	'party_contact_person_name' => $this->input->post("content_person"),
	        	'party_contact_no' => $this->input->post("content_no"),
	        );

       		$user = $this->Admin_model->UpPartyInfo($datas_post);
        	redirect('Admin/Party/PartyInfo');
       	}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AddPartyInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeletePartyInfo($id){
		$data = $this->Admin_model->DeleteCheckPartyInfo($id);
		if(empty($data)){
			$DeleteUser = $this->Admin_model->DeletePartyInfo($id);
			redirect('Admin/Party/PartyInfo');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/Party/PartyInfo');
		}
	}

}