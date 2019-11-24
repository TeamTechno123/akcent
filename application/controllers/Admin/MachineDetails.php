<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MachineDetails extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Machine Details');

		$data['datas'] = $this->Admin_model->GetMachine($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/MachineDetailsList', $data);
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

	public function CheckAmcContract()
	{
		$partyGroupId =  $this->input->post('partyGroupId');
		$data = $this->Admin_model->CheckAmcContract($partyGroupId);
		echo "<option value=''> Select </option>";
		foreach ($data as $data) {
			if(isset($party_info_id))
			{
				if($party_info_id == $data['contract_id']){
					echo "<option value='".$data['contract_id']."' selected> ".$data['contract_ref_no']." </option>";
				}
			} else {
				echo "<option value='".$data['contract_id']."'> ".$data['contract_ref_no']." </option>";
			}
		}
	}

	public function MachineDetailsAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Machine Details');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/MachineDetailsAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AddMachine(){
		$party_group = $this->input->post("party_group");
		$party_names = $this->input->post("party_names");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");
		$machine_data = $this->input->post("machine_data");

		$amc_machine_details = array(
			"party_id" => $party_group,
			"party_info_id" => $party_names,
			"amc_contract_information_id" => $AMC_Ref_No,
		);
		$Machine_Id = $this->Admin_model->AddMachine($amc_machine_details);

		foreach ($machine_data as $k) {
			$amc_machine = array(
				'amc_machine_details_id' => $Machine_Id,
				'item_group_id' => $k['equipment_type'],
				'item_company_id' => $k['company_name'],
				'model_no' => $k['model_no'],
				'serial_no' => $k['serial_no'],
				'in_warrenty' => $k['in_warranty'],
			);

			$add= $this->Admin_model->AddMachineDetail($amc_machine); 
		}
	}

	public function UpMachine(){
		$id = $this->input->post("id");
		$party_group = $this->input->post("party_group");
		$party_names = $this->input->post("party_names");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");
		$machine_data = $this->input->post("machine_data");
		$Ids = $this->input->post("Ids");
		
		foreach ($Ids as $k) {
       		if($k !== "0"){
       		 	$update_data[] = $k;
       		}
       	}
       	
       	$data['GetMachines'] = $this->Admin_model->GetMachines($id);
       	foreach ($data['GetMachines'] as $k) {
       		$old_ids[] = $k['amc_machine_id'];
       	}

       	print_r($old_ids);
       	print_r($update_data);

		$datele_rc =  array_diff($old_ids, $update_data);

		foreach ($datele_rc as $k) {
	        $del = $this->Admin_model->DeleteMachineDetail($k);
	    }

		$amc_machine_details = array(
			"id" => $id,
			"party_id" => $party_group,
			"party_info_id" => $party_names,
			"amc_contract_information_id" => $AMC_Ref_No,
		);
		$Machine_Id = $this->Admin_model->UpdateMachineDetails($amc_machine_details);

		foreach ($machine_data as $k) {
			if(isset($k['amc_machine_id'])){
				
				if($k['amc_machine_id'] == 0){
					$insert = array(
						'amc_machine_details_id' => $k['id'],
						'item_group_id' => $k['equipment_type'],
						'item_company_id' => $k['company_name'],
						'model_no' => $k['model_no'],
						'serial_no' => $k['serial_no'],
						'in_warrenty' => $k['in_warranty'],
					);
					$add= $this->Admin_model->AddMachineDetail($insert); 

				} else {
					$update = array(
						'amc_machine_id' => $k['amc_machine_id'],
						'amc_machine_details_id' => $k['id'],
						'item_group_id' => $k['equipment_type'],
						'item_company_id' => $k['company_name'],
						'model_no' => $k['model_no'],
						'serial_no' => $k['serial_no'],
						'in_warrenty' => $k['in_warranty'],
					);
					$up = $this->Admin_model->UpMachineDetail($update);
				}
			}
		}
	}
	
	public function MachineDetailsEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Machine Details');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$GetMachine = $this->Admin_model->GetMachine($id);
		foreach ($GetMachine as $k) {
			$data['party_id'] = $k['party_id'];
			$data['party_info_id'] = $k['party_info_id'];
			$data['amc_contract_information_id'] = $k['amc_contract_information_id'];
			
			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);

		}

		$data['GetMachines'] = $this->Admin_model->GetMachines($id);

		foreach ($data['GetMachines'] as $k) {
       		$old_ids[] = $k['amc_machine_id'];
       	}

       	$data['old_ids'] = implode(" , ", $old_ids);
		$data['id'] = $id;
		$data['count'] = count($data['GetMachines']);

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('party_names', 'Party Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('AMC_Ref_No', 'AMC Ref No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Equipment_type[]', 'Equipment type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('company_name[]', 'Company Name', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$count = count($this->input->post("Equipment_type[]"));
       		$update_id = $this->input->post("ID[]");

       		foreach ($data['GetMachines'] as $k) {
       			$old_ids[] = $k['amc_machine_id'];
       		}

       		//print_r($update_id);
       		foreach ($update_id as $k) {
       			if($k !== "0"){
       			 	$update_data[] = $k;
       			}
       		}
       		//print_r($update_data);
       		//print_r($old_ids);
       	
       		$delete_data = array_diff($old_ids, $update_data);
       		//print_r($delete_data);

       		if($count > 0)  
	        { 
	            $amc_machine = array(
	            	'id' => $id, 
	            	'party_id' => $this->input->post("party_group"), 
	            	'party_info_id' => $this->input->post("party_names"),
	            	'amc_contract_information_id' => $this->input->post("AMC_Ref_No"),
	            );
	            
	            $amc_machine_details = $this->Admin_model->UpdateMachineDetails($amc_machine);

	            for($i=0; $i<$count; $i++)  
	            {

	            	if(!empty($_POST["in_warranty"][$i])){
		            	$in_warranty = 1; 	
	            	} else {
	            		$in_warranty = 0;
	            	}	            	

	            	if($_POST["ID"][$i] == 0){
	            		
	            		$insert_recode = array(
	            			'amc_machine_details_id' => $id,
		            		'item_group_id' => $_POST["Equipment_type"][$i],
		            		'item_company_id' => $_POST["company_name"][$i],
		            		'model_no' => $_POST["model_no"][$i],
		            		'serial_no' => $_POST["serial_no"][$i],
		            		'in_warrenty' => $in_warranty,
	            		);  
	            		$add= $this->Admin_model->AddMachineDetail($insert_recode); 

	            	} else {

	            		$update_recode = array(
		            		'amc_machine_id' => $_POST["ID"][$i],
		            		'amc_machine_details_id' => $id,
		            		'item_group_id' => $_POST["Equipment_type"][$i],
		            		'item_company_id' => $_POST["company_name"][$i],
		            		'model_no' => $_POST["model_no"][$i],
		            		'serial_no' => $_POST["serial_no"][$i],
		            		'in_warrenty' => $in_warranty,
		            	);
		            	$up = $this->Admin_model->UpMachineDetail($update_recode);
	            	}
	            }

	            foreach ($delete_data as $k) {
	            	$del = $this->Admin_model->DeleteMachineDetail($k);
	            }
	        } 
	        //redirect('Admin/MachineDetails');   
       	}		

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/MachineDetailsAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function MachineDetailsDelete($id){
		$DeteleSetting = $this->Admin_model->DeleteMachineDetails($id);
		$Detele = $this->Admin_model->DeleteMachine($id);	
		redirect('Admin/MachineDetails');
	}
	
}