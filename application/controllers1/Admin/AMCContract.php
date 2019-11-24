<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AMCContract extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | AMC Contract";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'AMC Contract Info');

		$data['datas'] = $this->Admin_model->GetAMCContract($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AMCContractList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AMCContractAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add AMC Contract";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'AMC Contract Info');

		$data['GetNo'] = $this->Admin_model->GetNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['AMCType'] = $this->Admin_model->GetAMCType($ids = null);

		$this->form_validation->set_rules('Party_Group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'AMC Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$start_date = date_format(date_create($this->input->post("start_date")),"Y-m-d");
			$end_date = date_format(date_create($this->input->post("end_date")),"Y-m-d");

       		$datas_post = array(
	        	'AMC_contract_ref_no' => $this->input->post("AMC_Ref_No"),
	        	'contract_date' => $this->input->post("contaract_date"),
	        	'party_id' => $this->input->post("Party_Group"),
	        	'type' => $this->input->post("type"),
	        	'contract_start_date' => $start_date,
	        	'contract_end_date' => $end_date,
	        	'contract_ref_no' => $this->input->post("Ref_No"),
	        );

       		$user = $this->Admin_model->AMCContractAdd($datas_post);
        	redirect('Admin/AMCContract');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AMCContractAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function AMCContractEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit AMC Contract";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'AMC Contract Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['AMCType'] = $this->Admin_model->GetAMCType($ids = null);

		$party_info = $this->Admin_model->GetAMCContract($id);

		if(!empty($party_info)){
			foreach ($party_info as $k) {
				$start_date = date_format(date_create($k['contract_start_date']),"d-m-Y");
				$end_date = date_format(date_create($k['contract_end_date']),"d-m-Y");

				$data['id'] = $k['contract_id'];
				$data['AMC_contract_ref_no'] = $k['AMC_contract_ref_no'];
				$data['contract_date'] = $k['contract_date'];
				$data['party_id'] = $k['party_id'];
				$data['type'] = $k['type'];
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
				$data['contract_ref_no'] = $k['contract_ref_no'];
			}			
		}

		$this->form_validation->set_rules('Party_Group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'AMC Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$start_date = date_format(date_create($this->input->post("start_date")),"Y-m-d");
			$end_date = date_format(date_create($this->input->post("end_date")),"Y-m-d");

       		$datas_post = array(
	        	'contract_id' => $id,
	        	'AMC_contract_ref_no' => $this->input->post("AMC_Ref_No"),
	        	'contract_date' => $this->input->post("contaract_date"),
	        	'party_id' => $this->input->post("Party_Group"),
	        	'type' => $this->input->post("type"),
	        	'contract_start_date' => $start_date,
	        	'contract_end_date' => $end_date,
	        	'contract_ref_no' => $this->input->post("Ref_No"),
	        );

       		$user = $this->Admin_model->UpAMCContract($datas_post);
        	redirect('Admin/AMCContract');
       	}		

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AMCContractAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AMCContractDelete($id){
		$DeteleSetting = $this->Admin_model->DeleteAMCContract($id);
		redirect('Admin/AMCContract');
	}
	
}