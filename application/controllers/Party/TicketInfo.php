<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketInfo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('party_id') == null){ redirect('Party/login'); }
		$data['title'] = "Party | Ticket Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');

		$data['datas'] = $this->Party_model->GetTicketInfos($this->session->userdata('party_id'));

		$this->load->view('layout/Party/header', $data);
		$this->load->view('Party/TicketInfoList', $data);
		$this->load->view('layout/Party/footer', $data);
	}

	public function TicketInfoView($id){
		if($this->session->userdata('party_id') == null){ redirect('Party/login'); }
		$data['title'] = "Party | Ticket Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');

		$datas = $this->Party_model->GetTicketInfo($id);
		$data['datas'] = $datas[0];

		$this->load->view('layout/Party/header', $data);
		$this->load->view('Party/TicketInfoView', $data);
		$this->load->view('layout/Party/footer', $data);
	}

	public function CheckParty()
	{
		$partyGroupId =  $this->input->post('partyGroupId');
		$data = $this->Admin_model->CheckParty($partyGroupId);
		echo "<option value=''> Select </option>";
		foreach ($data as $data) {
			echo "<option value=".$data['id']."> ".$data['name']." </option>";
		}
	}

	public function CheckMachineSerial()
	{
		$partyGroupId =  $this->input->post('partyGroupId');
		$data = $this->Admin_model->CheckMachineSerial($partyGroupId);
		echo "<option value=''> Select </option>";
		foreach ($data as $data) {
			if(isset($machine_serial_no))
			{
				if($machine_serial_no == $data['amc_machine_id']){
					echo "<option value='".$data['amc_machine_id']."' selected> ".$data['serial_no']." </option>";
				}
			} else {
				echo "<option value='".$data['amc_machine_id']."'> ".$data['serial_no']." </option>";
			}
		}
	}

	public function CheckMachineDetails(){
		$id =  $this->input->post('id');
		$data = $this->Admin_model->CheckMachineDetails($id);
		if(!empty($data)){
			foreach ($data as $k) {
				echo " ".$k['item_company_info_name']." -- ".$k['model_no']." ";

				echo "<input type='hidden' id='group_ids' name='group_ids' value='".$k['id']."'>";
			}
		}
	}

	public function TicketInfoAdd(){
		if($this->session->userdata('party_id') == null){ redirect('Party/login'); }
		$data['title'] = "Party | Add Ticket Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');

		$party_id = $this->session->userdata('party_group_id');
		$party_info_id = $this->session->userdata('party_id');

		$data['party_id'] = $this->session->userdata('party_group_id');
		$data['PartyName'] = $this->Admin_model->CheckParty($data['party_id']);

		$data['MachineSerial'] = $this->Party_model->CheckMachineSerial1($party_id, $party_info_id);
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);


		$this->form_validation->set_rules('problem_information', 'Problem Information', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_name', 'Contact Person Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_no', 'Contact Number', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$amc_machine = array(
	            'party_id' => $data['party_id'], 
	            'party_info_id' => $this->session->userdata('party_id'),
	            'amc_machine_id' => $this->input->post("machine_serial_no"),
	            'item_info_id' => $this->input->post("item_groups"),
	            'problem_info' => $this->input->post("problem_information"),
	            'create_date' => date("d/m/Y"),
	            'create_time' => date("h:i"),
	            'content_name' => $this->input->post("content_name"),
	            'content_no' => $this->input->post("content_no"),
	            'additional_note' => $this->input->post("additional_note"),     
	        );
	        $amc_machine_details = $this->Admin_model->TicketInfoAdd($amc_machine);    
        	redirect('Party/TicketInfo');
        }

		$this->load->view('layout/Party/header', $data);
		$this->load->view('Party/TicketInfoAdd', $data);
		$this->load->view('layout/Party/footer', $data);
	}
	
	public function TicketInfoEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$GetMachine = $this->Admin_model->GetTicketInfo($id);
		foreach ($GetMachine as $k) {
			$data['party_id'] = $k['party_id'];
			$data['PartyName'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['party_info_id'] = $k['party_info_id'];
			$data['MachineSerial'] = $this->Admin_model->CheckMachineSerial($data['party_info_id']);
			$data['amc_machine_id'] = $k['amc_machine_id'];

			$data['in_warrenty'] = $k['in_warrenty'];

			$data['item_info_id'] = $k['item_info_id'];
			$data['problem_information'] = $k['problem_info'];
			$data['create_date'] = $k['create_date'];
			$data['create_time'] = $k['create_time'];
			$data['content_name'] = $k['content_name'];
			$data['content_no'] = $k['content_no'];
			$data['additional_note'] = $k['additional_note'];;

		}

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('problem_information', 'Problem Information', 'trim|required|xss_clean');
		$this->form_validation->set_rules('create_date', 'Create Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('create_time', 'Create Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_name', 'Contact Person Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_no', 'Contact Number', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$amc_machine = array(
	            'id' => $id,
	            'party_id' => $this->input->post("party_group"), 
	            'party_info_id' => $this->input->post("party_name"),
	            'amc_machine_id' => $this->input->post("machine_serial_no"),
	            'item_info_id' => $this->input->post("item_group"),
	            'problem_info' => $this->input->post("problem_information"),
	            'create_date' => $this->input->post("create_date"),
	            'create_time' => $this->input->post("create_time"),
	            'content_name' => $this->input->post("content_name"),
	            'content_no' => $this->input->post("content_no"),
	            'additional_note' => $this->input->post("additional_note"),     
	        );
	       
	        $amc_machine_details = $this->Admin_model->UpTicketInfo($amc_machine);    
        	redirect('Admin/TicketInfo');
       	}		

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TicketInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function TicketInfoDelete($id){
		$DeteleSetting = $this->Party_model->DelTicketInfo($id);
		redirect('Party/TicketInfo');
	}

	public function Check_engineer(){
		$engineer_id = $this->input->post("service_id");
		$engineerList = $this->Admin_model->GetEngineer($ids = null);
		$check = $this->Admin_model->GetTicketInfo($engineer_id);


		if($check != null){
			foreach ($check as $check){
				$id = $check['engineer_id'];
				$name = $check['engineer_name'];
			}
			if($id){
				echo "<select class='form-control' id='engineer' name='engineer'>";
						foreach ($engineerList as $List) {
							if($List['id'] == $id){
								echo "<option value='".$List['id']."' selected> ".$List['name']." </option>";
							} else {
								echo "<option value='".$List['id']."'> ".$List['name']." </option>";
							}
						} 
				echo "</select>";
			}  else {
				echo "<select class='form-control' id='engineer' name='engineer'>";
				echo "<option value=''>Select</option>";
						foreach ($engineerList as $List) {
							echo "<option value='".$List['id']."'> ".$List['name']." </option>";
						} 
				echo "</select>";
			}
		}
	}

	public function Update_engineer(){
		$ServiceId = $this->input->post("ServiceId");
		if($this->input->post("EngineerId")){
			$EngineerId = $this->input->post("EngineerId");
			$datas = array('id' => $ServiceId, 'engineer_id' => $EngineerId);
		}
		$result = $this->Admin_model->UpTicketInfo($datas);
	}
}