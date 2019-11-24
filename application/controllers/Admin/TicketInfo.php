<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketInfo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');

		$data['datas'] = $this->Admin_model->GetTicketInfo($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TicketInfoList', $data);
		$this->load->view('layout/Admin/footer', $data);
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
		$partyName =  $this->input->post('partyName');

		$data = $this->Admin_model->CheckMachineSerial($partyGroupId, $partyName);
		echo "<option value='' selected> Select </option>";
		foreach ($data as $data) {
			if(isset($machine_serial_no))
			{
				if($machine_serial_no == $data['amc_machine_id']){
					echo "<option value='".$data['amc_machine_id']."'> ".$data['serial_no']."<span style='color: red;'> (".$data['item_company_info_name']." -".$data['model_no'].") </span> </option>";
				}
			} else {
				echo "<option value='".$data['amc_machine_id']."'> ".$data['serial_no']."<span style='color: red;'> (".$data['item_company_info_name']." -".$data['model_no'].") </span> </option>";
			}
		}
		//print_r($data);
	}

	public function CheckMachineSerial1()
	{
		$partyGroupId =  $this->input->post('partyGroupId');
		$partyName =  $this->input->post('partyName');

		$data = $this->Admin_model->CheckMachineSerial($partyGroupId, $partyName);
		foreach ($data as $data) {
			if(isset($machine_serial_no))
			{
				if($machine_serial_no == $data['amc_machine_id']){
					echo "<option value='".$data['amc_machine_id']."'> ".$data['serial_no']." </option>";
				}
			} else {
				echo "<option value='".$data['amc_machine_id']."'> ".$data['serial_no']." </option>";
			}
		}
	}

	public function CheckMachineDetails(){
		$id =  $this->input->post('id');
		$datas = $this->Admin_model->CheckMachineDetails($id);
		
		$ItemGroup = $this->Admin_model->GetItemGroup($ids = null);

		if(!empty($datas)){
			foreach ($datas as $k) {
				$data['item_name'] = " ".$k['item_company_info_name']." -- ".$k['model_no']." ";
				$data['input_data'] = $k['id'];
				
				if($k['in_warrenty'] == 1)
				{
					$data['in_warrenty'] = "In Warrenty";
				} else {
					$data['in_warrenty'] = '';
				}
			}

			$select[] = "<option value=''> Select </option>";
			foreach ($ItemGroup as $v) {
				if($v['id'] == $data['input_data']){
					
					$select[] = "<option value='".$v['id']."' selected> ".$v['group_name']." </option>";
				} else {
					$select[] = "<option value='".$v['id']."'> ".$v['group_name']." </option>";
				}	
			}

			$data['select'] = $select;

			echo json_encode($data);
		}
	}

	public function TicketInfoAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Ticket Info');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('party_name', 'Party Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('problem_information', 'Problem Information', 'trim|required|xss_clean');
		$this->form_validation->set_rules('create_date', 'Create Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('create_time', 'Create Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_name', 'Contact Person Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content_no', 'Contact Number', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$amc_machine = array(
	            'party_id' => $this->input->post("party_group"), 
	            'party_info_id' => $this->input->post("party_name"),
	            'amc_machine_id' => $this->input->post("machine_serial_no"),
	            'item_info_id' => $this->input->post("item_groups"),
	            'problem_info' => $this->input->post("problem_information"),
	            'create_date' => $this->input->post("create_date"),
	            'create_time' => $this->input->post("create_time"),
	            'content_name' => $this->input->post("content_name"),
	            'content_no' => $this->input->post("content_no"),
	            'additional_note' => $this->input->post("additional_note"),     
	        );
	       
	       	$amc_machine_details = $this->Admin_model->TicketInfoAdd($amc_machine);


	        $ticket_no = urlencode($amc_machine_details);
			$ticket_date = urlencode($this->input->post("create_date"));
			$machine_serial_no = $this->input->post("MachineSerialNo");
			$content_no = urlencode($this->input->post("content_no"));
			$admin_content_no= urlencode($this->session->userdata('cmp_mobile'));
			
			$party_info = $this->Admin_model->GetPartyInfo($this->input->post("party_name"));
			$party_name = urlencode($party_info[0]['name']);
			
			
			$smscontent = 'Your Ticke no '.$ticket_no.' has been created Successfully on '.$ticket_date.' for Machine Serial number:'.$machine_serial_no.'.';
			$smscontent1 = 'New Ticke no '.$ticket_no.' is created by '.$party_name.' on '.$ticket_date.' for Machine Serial number:'.$machine_serial_no.'.';


			$API1 = $this->Admin_model->SMSAPI($content_no, $smscontent);
			$API2 = $this->Admin_model->SMSAPI($admin_content_no, $smscontent1);

        	redirect('Admin/TicketInfo');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/TicketInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
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
			$data['MachineSerial'] = $this->Admin_model->CheckMachineSerial($data['party_id'],$data['party_info_id']);
			$data['amc_machine_id'] = $k['amc_machine_id'];
			$data['item_info_id'] = $k['item_info_id'];
			$data['problem_information'] = $k['problem_info'];
			$data['create_date'] = $k['create_date'];
			$data['create_time'] = $k['create_time'];
			$data['content_name'] = $k['content_name'];
			$data['content_no'] = $k['content_no'];
			$data['additional_note'] = $k['additional_note'];
			$data['in_warrenty'] = $k['in_warrenty'];
			$data['model_no'] = $k['model_no'];
			$data['group_name'] = $k['group_name'];
		}

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('party_name', 'Party Name', 'trim|required|xss_clean');
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
	            'item_info_id' => $this->input->post("item_groups"),
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
		
		$data = $this->Admin_model->DeleteCheckTicketInfo($id);
		if(empty($data)){
			//$DeteleSetting = $this->Admin_model->DelTicketInfo($id);
			redirect('Admin/TicketInfo');
		} else {
			$this->session->set_userdata('delete_msg', "delete");
			redirect('Admin/TicketInfo');
		}
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

		$TicketInfo = $this->Admin_model->GetTicketInfo($ServiceId);
		$Engineer = $this->Admin_model->GetEngineer($EngineerId);

		$ticket_no = urlencode($TicketInfo[0]['id']);
		$engineer_name = urlencode($Engineer[0]['name']);
		$engineer_no = urlencode($Engineer[0]['mobile_no']);

		$party_name = urlencode($TicketInfo[0]['party_name']);
		$machine_serial_no = urlencode($TicketInfo[0]['serial_no']);
		$content_name = urlencode($TicketInfo[0]['content_name']);
		$content_no = urlencode($TicketInfo[0]['content_no']);

		$EngineerData = $this->Admin_model->GetEngineer($EngineerId);
		$engineer_content_no = $EngineerData[0]['mobile_no'];

		$smscontent = 'Your Ticke no '.$ticket_no.' has been Engineer Allocate Name '.$engineer_name.' And Mobile No.'.$engineer_no.'.';	
		$smscontent1 = 'Ticke no '.$ticket_no.' is created by '.$party_name.' for Machine Serial number:'.$machine_serial_no.' Contact person
name '.$content_name.' And Mobile No.' .$content_no.'.';

		$API1 = $this->Admin_model->SMSAPI($content_no, $smscontent);
		$API2 = $this->Admin_model->SMSAPI($engineer_content_no, $smscontent1);
	}
}