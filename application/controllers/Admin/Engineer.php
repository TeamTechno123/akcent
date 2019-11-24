<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineer extends CI_Controller {

	public function index(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | List Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Engineer');

		$data['datas'] = $this->Admin_model->GetEngineer($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/EngineerList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function EngineerAdd(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Engineer');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('salary_type', 'Salary Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('salary', 'Salary', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'name' => $this->input->post("name"),
	        	'mobile_no' => $this->input->post("mobile_no"),
	        	'address' => $this->input->post("address"),
	        	'password' => md5($this->input->post("password")),
	        	'salary_type' => $this->input->post("salary_type"),
	        	'salary' => $this->input->post("salary"),
	        	'status' => $this->input->post("status"),
	        );

       		$user = $this->Admin_model->AddEngineer($datas_post);
        	redirect('Admin/Engineer');
        }
	    
	    $this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/EngineerAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CheckApproveCoupon(){
		$id = $this->input->post("id");
		$check = $this->input->post("check");

		$data = array( 'id' => $id, 'status' => $check);
		$UpApprove = $this->Admin_model->UpdateApproveCoupon($data);
	}

	public function EngineerEdit($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Edit Engineer Info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Engineer');

		$party_info = $this->Admin_model->GetEngineer($id);

		if(!empty($party_info)){
			foreach ($party_info as $k) {
				$data['id'] = $k['id'];
				$data['name'] = $k['name'];
				$data['mobile_no'] = $k['mobile_no'];
				$data['address'] = $k['address'];
				$data['salary_type'] = $k['salary_type'];
				$data['salary'] = $k['salary'];
				$data['status'] = $k['status'];
			}			
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('salary_type', 'Salary Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('salary', 'Salary', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		if($this->input->post("new_password") !== null){
       			$datas_post = array(
		        	'id' => $id,
		        	'name' => $this->input->post("name"),
		        	'mobile_no' => $this->input->post("mobile_no"),
		        	'address' => $this->input->post("address"),
		        	'salary_type' => $this->input->post("salary_type"),
		        	'salary' => $this->input->post("salary"),
		        	'status' => $this->input->post("status"),
		        );
       		} else {
       			$datas_post = array(
		        	'id' => $id,
		        	'name' => $this->input->post("name"),
		        	'mobile_no' => $this->input->post("mobile_no"),
		        	'address' => $this->input->post("address"),
		        	'password' => md5($this->input->post("new_password")),
		        	'salary_type' => $this->input->post("salary_type"),
		        	'salary' => $this->input->post("salary"),
		        	'status' => $this->input->post("status"),
		        );
       		}

       		$user = $this->Admin_model->UpEngineer($datas_post);
        	redirect('Admin/Engineer');
       	}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/EngineerAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EngineerDelete($id){
		$DeleteUser = $this->Admin_model->DelEngineer($id);
		redirect('Admin/Engineer');
	}

}