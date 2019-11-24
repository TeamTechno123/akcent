<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartyWiseInfo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Party Wise Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Party Wise Info');

		$PartyWiseInfoData = $this->Admin_model->GetPartyWiseInfo($id = null);
		if(!empty($PartyWiseInfoData)){
			$data['data'] = $PartyWiseInfoData;
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/PartyWiseInfoList', $data);
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

	public function CheckPartyWiseInfo(){
		$party_group =  $this->input->post('party_group');
		$AMC_Ref_No =  $this->input->post('AMC_Ref_No');

		$data = $this->Admin_model->CheckPartyWiseInfo($party_group, $AMC_Ref_No);
		return $data;
	}

	public function PartyWiseInfoData(){
		$datas =  $this->input->post('datas');
		
		$party_id = $datas[0]['party_id'];
		$amc_id = $datas[0]['amc_contract_info_id'];

		$checkData = $this->Admin_model->CheckPartyWiseInfo($party_id, $amc_id);

		if($checkData == null){
			foreach ($datas as $k) {
				$data = array(
					'party_id' => $k['party_id'],
					'party_info_id' => $k['party_info_id'],
					'amc_contract_info_id' => $k['amc_contract_info_id'],
					'amc_machine_id' => $k['amc_machine_id'],
					'rate' => $k['rate'],
					'required' => $k['required'],
				);

				$this->Admin_model->PartyWiseInfo($data);
			}
		} else {
			echo "Record already exists";
		}
	}

/*	public function PartyWiseInfoDataDelete(){
		$party_id = $this->input->post('party_id_h');
		$party_info_id = $this->input->post('party_info_id_h');
		print_r($party_info_id);
		$checkData = $this->Admin_model->DeleteWiseInfo($party_id, $party_info_id);
	}*/

	public function PartyWiseInfoDataUP(){
		$party_group =  $this->input->post('party_group');
		$AMC_Ref_No =  $this->input->post('AMC_Ref_No');
		$Ids =  $this->input->post('Ids');
		
		$GetData= $this->Admin_model->CheckPartyWiseInfo($party_group, $AMC_Ref_No);
		foreach ($GetData as $v) {
			$old_ids[] = $v['id']; 
		}

		$datele_rc =  array_diff($old_ids, $Ids);
		foreach ($datele_rc as $del) {
			$this->Admin_model->DelPartyWise($del);
		}

		$datas =  $this->input->post('datas');
			foreach ($datas as $k) 
			{
				if($k['id'] == 0){
					$insert = array(
						'party_id' => $k['party_id'],
						'party_info_id' => $k['party_info_id'],
						'amc_contract_info_id' => $k['amc_contract_info_id'],
						'amc_machine_id' => $k['amc_machine_id'],
						'rate' => $k['rate'],
						'required' => $k['required'],
					);
					$this->Admin_model->PartyWiseInfo($insert);

				} else {
					$update = array(
						'id' => $k['id'],
						'party_id' => $k['party_id'],
						'party_info_id' => $k['party_info_id'],
						'amc_contract_info_id' => $k['amc_contract_info_id'],
						'amc_machine_id' => $k['amc_machine_id'],
						'rate' => $k['rate'],
						'required' => $k['required'],
					);
					$this->Admin_model->UpPartyWiseInfo($update);
				}
			}
		
	}

	public function PartyWiseInfoAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Party Wise Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Party Wise Info');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroups();

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/PartyWiseInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function PartyWiseInfoEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Party Wise Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Party Wise Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroups($ids = null);

		$data['GetData'] = $this->Admin_model->GetPartyWiseInfoData($id);
		$data['count'] = count($data['GetData']);
		$data['id'] = $id;

		$data['CheckParty'] = $this->Admin_model->CheckParty($data['GetData'][0]['party_id']);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['GetData'][0]['party_id']);


		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/PartyWiseInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function PartyWiseInfoDelete($id){
		$DeteleSetting = $this->Admin_model->DelPartyWiseInfo($id);
		redirect('Admin/PartyWiseInfo');
	}
	
}