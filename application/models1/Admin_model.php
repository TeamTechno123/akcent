<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	/*<--------------------------------------         Start SMS      ------------------------------------------>*/

	public function SMSAPI($mobile_no, $SMS){
		$smsGatewayUrl = 'http://msgblast.in/index.php/smsapi/httpapi/';
		$SMS = urlencode($SMS);
		$api_params='?uname=wbcare&password=123123&sender=AKCENT&route=TA&msgtype=1&receiver='.$mobile_no.'&sms='.$SMS;

		$smsgatewaydata = $smsGatewayUrl.$api_params;

	/*	$ch = curl_init($smsgatewaydata);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
		$output;*/
	}

	/*<--------------------------------------         End SMS      ------------------------------------------>*/
	

	/*<--------------------------------------         Start Admin      ------------------------------------------>*/

	public function login($mobile, $password)
	{
		$this->db->select()->from('login');
		$this->db->where('mobile_no', $mobile);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function GetAdminInfo($id)
	{
		$this->db->where('admin_id', $id);

		$query = $this->db->get('login');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}
	
	public function UpAdminInfo($data){
		$this->db->where('admin_id', $data['admin_id']);
		$this->db->update('login', $data);
	}

	/*<--------------------------------------         End Admin      ------------------------------------------>*/

	/*<--------------------------------------         Start Dashboard     ------------------------------------------>*/

	public function DEngineer(){

        $query = $this->db->get('engineer');
        $num = $query->num_rows();
        return $num;
	}

	public function DParty(){

        $query = $this->db->get('party');
        $num = $query->num_rows();
        return $num;
	}

	public function DPartys(){

        $query = $this->db->get('party_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DTechnicalUser(){

        $query = $this->db->get('technical_user');
        $num = $query->num_rows();
        return $num;
	}

	public function DProduct(){

        $query = $this->db->get('item_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DContract(){

        $query = $this->db->get('amc_contract_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DTickets(){
		$this->db->where('engineer_id IS NULL', null);
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DprogressTickets(){
		$this->db->select("ticket_info.*, call_visit.call_status");

		$this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');
		$this->db->where('call_visit.call_status', 'on_process');
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DCompletTicket(){
		$this->db->select("ticket_info.*, call_visit.call_status");

		$this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');
		$this->db->where('call_visit.call_status', 'complete');
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}
	
	public function DvisitReport(){
        
        $query = $this->db->get('call_visit');
        $num = $query->num_rows();
        return $num;
	}
	
	public function DSaleInvoice(){
        
        $query = $this->db->get('sale_invoice');
        $num = $query->num_rows();
        return $num;
	}

	public function DGetTicketInfo($id){
		$this->db->select('ticket_info.*, engineer.name as engineer_name, party_info.name');
		if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }
		$this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetCmpInfo(){
		$query = $this->db->get('company_information');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}


	/*<--------------------------------------         End Dashboard     ------------------------------------------>*/


	/*<--------------------------------------         Start Party      ------------------------------------------>*/

	public function AddParty($data){
		$this->db->insert('party', $data);
	}

	public function GetParty($id){
        if($id !== null){
        	$this->db->where('id', $id);
        }
        $query = $this->db->get('party');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpdatePartyGroup($data){
		$this->db->where('id', $data['id']);
		$this->db->update('party', $data);
	}

	public function DeleteGroup($id){
		$this->db->where('id', $id);
		$this->db->delete('party');
	}

	/*<--------------------------------------         End Party      ------------------------------------------>*/

	/*<--------------------------------------         Start Party Info     ------------------------------------------>*/

	public function AddPartyInfo($data){
		$this->db->insert('party_info', $data);
	}

	public function GetPartyInfo($id){
		
		$this->db->select('party_info.*, party.party_name');
		$this->db->join('party', 'party.id = party_info.party_group_id');
		
		if($id !== null){
        	$this->db->where('party_info.id', $id);
        }
        $query = $this->db->get('party_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpPartyInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('party_info', $data);
	}

	public function DeletePartyInfo($id){
		$this->db->where('id', $id);
		$this->db->delete('party_info');
	}

	/*<--------------------------------------         End Party Info     ------------------------------------------>*/


	/*<--------------------------------------          Company Information      ------------------------------------------>*/

	public function AddCompanyInformation($data){
		$this->db->insert('company_information', $data);
	}

	public function UpCompanyInformation($data){
		$this->db->where('id', $data['id']);
		$this->db->update('company_information', $data);
	}

	public function GetCompanyInformation($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('company_information');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------        End Company Information      ------------------------------------------>*/


	/*<--------------------------------------          Item Ccompany      ------------------------------------------>*/

	public function AddItemCompany($data){
		$this->db->insert('item_company_info', $data);
	}

	public function UpItemCompany($data){
		$this->db->where('id', $data['id']);
		$this->db->update('item_company_info', $data);
	}
	
	public function DelItemCompany($id){
		$this->db->where('id', $id);
		$this->db->delete('item_company_info');
	}	
	
	public function GetItemCompany($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('item_company_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End Item Ccompany      ------------------------------------------>*/

	/*<--------------------------------------          Item Group Ccompany      ------------------------------------------>*/

	public function AddItemGroup($data){
		$this->db->insert('item_group', $data);
	}

	public function UpItemGroup($data){
		$this->db->where('id', $data['id']);
		$this->db->update('item_group', $data);
	}
	
	public function DelItemGroup($id){
		$this->db->where('id', $id);
		$this->db->delete('item_group');
	}	
	
	public function GetItemGroup($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('item_group');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End Item Group Ccompany      ------------------------------------------>*/

	/*<--------------------------------------          Unit       ------------------------------------------>*/

	public function AddUnit($data){
		$this->db->insert('unit', $data);
	}

	public function UpUnit($data){
		$this->db->where('id', $data['id']);
		$this->db->update('unit', $data);
	}
	
	public function DelUnit($id){
		$this->db->where('id', $id);
		$this->db->delete('unit');
	}	
	
	public function GetUnit($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('unit');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End Unit       ------------------------------------------>*/


	/*<--------------------------------------          TaxSlab Info       ------------------------------------------>*/

	public function AddTaxSlab($data){
		$this->db->insert('taxslab', $data);
	}

	public function UpTaxSlab($data){
		$this->db->where('id', $data['id']);
		$this->db->update('taxslab', $data);
	}
	
	public function DelTaxSlab($id){
		$this->db->where('id', $id);
		$this->db->delete('taxslab');
	}	
	
	public function GetTaxSlab($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('taxslab');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End TaxSlab Info       ------------------------------------------>*/

	/*<--------------------------------------          AMC Type Info       ------------------------------------------>*/

	public function AddAMCType($data){
		$this->db->insert('amc_type', $data);
	}

	public function UpAMCType($data){
		$this->db->where('id', $data['id']);
		$this->db->update('amc_type', $data);
	}
	
	public function DelAMCType($id){
		$this->db->where('id', $id);
		$this->db->delete('amc_type');
	}	
	
	public function GetAMCType($id){
		if($id !== null){
        	$this->db->where('id', $id);
        }
		$query = $this->db->get('amc_type');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End AMC Type Info       ------------------------------------------>*/

	/*<--------------------------------------          Problem Info       ------------------------------------------>*/

	public function Addproblem_info($data){
		$this->db->insert('problem_info', $data);
	}

	public function Upproblem_info($data){
		$this->db->where('id', $data['id']);
		$this->db->update('problem_info', $data);
	}
	
	public function Delproblem_info($id){
		$this->db->where('id', $id);
		$this->db->delete('problem_info');
	}	
	
	public function Getproblem_info($id){
		$this->db->select('problem_info.*, item_group.group_name');
		if($id !== null){
        	$this->db->where('problem_info.id', $id);
        }

		$this->db->join('item_group', 'item_group.id = problem_info.equipment_type_id');

		$query = $this->db->get('problem_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End Problem Info       ------------------------------------------>*/

	/*<--------------------------------------          ProblemRectificationInfo       ------------------------------------------>*/

	public function AddProblemRectificationInfo($data){
		$this->db->insert('problem_rectification_info', $data);
	}

	public function UpProblemRectificationInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('problem_rectification_info', $data);
	}
	
	public function DelProblemRectificationInfo($id){
		$this->db->where('id', $id);
		$this->db->delete('problem_rectification_info');
	}	
	
	public function GetProblemRectificationInfo($id){
		$this->db->select('problem_rectification_info.*, item_group.group_name');
		if($id !== null){
        	$this->db->where('problem_rectification_info.id', $id);
        }

		$this->db->join('item_group', 'item_group.id = problem_rectification_info.equipment_type_id');

		$query = $this->db->get('problem_rectification_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End ProblemRectificationInfo     ------------------------------------------>*/

	/*<--------------------------------------         Start Item Info       ------------------------------------------>*/

	public function AddItemInfo($data){
		$this->db->insert('item_info', $data);
	}

	public function UpItemInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('item_info', $data);
	}
	
	public function DelItemInfo($id){
		$this->db->where('id', $id);
		$this->db->delete('item_info');
	}	
	
	public function GetItemInfo($id){
		$this->db->select('item_info.*, item_company_info.id as company_info_id, item_company_info.item_company_info_name, item_group.id as item_group_id, item_group.group_name, taxslab.id as taxslab_id, taxslab.taxslab_name, unit.id as unit_id, unit.unit_name');
		if($id !== null){
        	$this->db->where('item_info.id', $id);
        }

		$this->db->join('item_company_info', 'item_company_info.id = item_info.item_company_id');
		$this->db->join('item_group', 'item_group.id = item_info.item_group_id','left');
		$this->db->join('taxslab', 'taxslab.id = item_info.taxslab_id');
		$this->db->join('unit', 'unit.id = item_info.unit_id');

		$query = $this->db->get('item_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*<--------------------------------------          End Item Info     ------------------------------------------>*/

	/*<--------------------------------------         Add AMC Contract     ------------------------------------------>*/


	public function GetNo(){
		$sql = "SELECT * FROM amc_contract_info";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
	}

	public function AMCContractAdd($data){
		$this->db->insert('amc_contract_info', $data);
	}

	public function GetAMCContract($id){
		$this->db->select('amc_contract_info.*, party.id as party_id, party.party_name, amc_type.id as amc_type_id, amc_type.amc_type');
		
		$this->db->join('party', 'party.id = amc_contract_info.party_id');
		$this->db->join('amc_type', 'amc_type.id = amc_contract_info.type');

		if($id !== null){
        	$this->db->where('amc_contract_info.contract_id', $id);
        }

		$query = $this->db->get('amc_contract_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpAMCContract($data){
		$this->db->where('contract_id', $data['contract_id']);
		$this->db->update('amc_contract_info', $data);
	}

	public function DeleteAMCContract($id){
		$this->db->where('contract_id', $id);
		$this->db->delete('amc_contract_info');
	}

	/*<--------------------------------------          End AMC Contract     ------------------------------------------>*/


	/*<--------------------------------------         Add Machine     ------------------------------------------>*/

	
	public function CheckParty($id){
		$this->db->where('party_group_id', $id);
		$query = $this->db->get('party_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function CheckAmcContract($id){
		$this->db->where('party_id', $id);
		$query = $this->db->get('amc_contract_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function AddMachine($data){
		$this->db->insert('amc_machine_details', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function AddMachineDetail($data){
		$this->db->insert('amc_machine', $data);
	}

	public function UpMachineDetail($data){
		$this->db->where('amc_machine_id', $data['amc_machine_id']);
		$this->db->update('amc_machine', $data);
	}

	public function DeleteMachineDetail($id){
		$this->db->where('amc_machine_id', $id);
		$this->db->delete('amc_machine');
	}

	public function GetMachines($id){
		$this->db->select('amc_machine.*, item_group.group_name, item_company_info.item_company_info_name');

		$this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
		$this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');


		if($id !== null){
        	$this->db->where('amc_machine.amc_machine_details_id', $id);
        }

        $this->db->order_by('amc_machine.amc_machine_id', 'ASC');

		$query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetMachiness($id){
		$this->db->select('amc_machine.*, item_group.group_name, item_company_info.item_company_info_name');

		$this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
		$this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');


		if($id !== null){
        	$this->db->where('amc_machine.amc_machine_id', $id);
        }

		$query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetMachine($id){
		$this->db->select('amc_machine_details.*, party.party_name, party_info.name, amc_contract_info.AMC_contract_ref_no, amc_contract_info.contract_ref_no');
		
		$this->db->join('party', 'party.id = amc_machine_details.party_id');
		$this->db->join('party_info', 'party_info.id = amc_machine_details.party_info_id');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = amc_machine_details.amc_contract_information_id');
		
		if($id !== null){
        	$this->db->where('amc_machine_details.id', $id);
        }

		$query = $this->db->get('amc_machine_details');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpdateMachineDetails($data){
		$this->db->where('id', $data['id']);
		$this->db->update('amc_machine_details', $data);
	}

	public function DeleteMachine($id){
		$this->db->where('amc_machine_details_id', $id);
		$this->db->delete('amc_machine');
	}

	public function DeleteMachineDetails($id){
		$this->db->where('id', $id);
		$this->db->delete('amc_machine_details');
	}

	/*<--------------------------------------          End Machine     ------------------------------------------>*/

	/*<--------------------------------------         Add Engineer Info     ------------------------------------------>*/


	public function AddEngineer($data){
		$this->db->insert('engineer', $data);
	}

	public function UpEngineer($data){
		$this->db->where('id', $data['id']);
		$this->db->update('engineer', $data);
	}
	
	public function DelEngineer($id){
		$this->db->where('id', $id);
		$this->db->delete('engineer');
	}	
	
	public function GetEngineer($id){
		if($id !== null){
        	$this->db->where('engineer.id', $id);
        }

		$query = $this->db->get('engineer');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpdateApproveCoupon($data){
		$this->db->where('id', $data['id']);
		$this->db->update('engineer', $data);
	}

	/*<--------------------------------------         End Engineer Info     ------------------------------------------>*/


	/*<--------------------------------------         Add Technical User Info     ------------------------------------------>*/


	public function AddTechnicalUser($data){
		$this->db->insert('technical_user', $data);
	}

	public function UpTechnicalUser($data){
		$this->db->where('id', $data['id']);
		$this->db->update('technical_user', $data);
	}
	
	public function DelTechnicalUser($id){
		$this->db->where('id', $id);
		$this->db->delete('technical_user');
	}	

	public function GetTechnicalUser($id){
		$this->db->select('technical_user.*, party.party_name, party_info.name as party_info_name');
		
		$this->db->join('party', 'party.id = technical_user.party_id');
		$this->db->join('party_info', 'party_info.id = technical_user.party_info_id');

		if($id !== null){
        	$this->db->where('technical_user.id', $id);
        }

		$query = $this->db->get('technical_user');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpdateApprove($data){
		$this->db->where('id', $data['id']);
		$this->db->update('technical_user', $data);
	}

	/*<--------------------------------------         End Technical User Info     ------------------------------------------>*/

	/*<--------------------------------------         Add Ticket Info     ------------------------------------------>*/

	public function CheckMachineSerial($id, $partyName){
		$this->db->select('amc_machine.serial_no, amc_machine.amc_machine_id, item_company_info.item_company_info_name, amc_machine.model_no, amc_machine.item_group_id');

		$this->db->join('amc_machine', 'amc_machine.amc_machine_details_id = amc_machine_details.id');
		 $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');

		$this->db->where('amc_machine_details.party_id', $id);
		$this->db->where('amc_machine_details.party_info_id', $partyName);

		$this->db->order_by('amc_machine.amc_machine_id', 'asc');

		$query = $this->db->get('amc_machine_details');
		if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

    public function CheckMachineDetails($id){
        $this->db->select('amc_machine.model_no, amc_machine.in_warrenty,item_company_info.item_company_info_name, item_group.id,item_group.group_name');

        $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');

        $this->db->where('amc_machine.amc_machine_id', $id);
        
        $query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

	public function TicketInfoAdd($data){
		$this->db->insert('ticket_info', $data);
		$insertId = $this->db->insert_id();
        return  $insertId;
	}

	public function UpTicketInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('ticket_info', $data);
	}

	public function DelTicketInfo($id){
		$this->db->where('id', $id);
		$this->db->delete('ticket_info');
	}	

	public function GetTicketInfo($id){
		$this->db->select('ticket_info.*, party_info.name as party_name, engineer.name as engineer_name, engineer.mobile_no as e_mobile_no, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty,item_group.group_name');
		if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }

        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}



	/*<--------------------------------------         End Ticket Info     ------------------------------------------>*/


	/*<--------------------------------------         Start Party Wise Info     ------------------------------------------>*/

	public function GetItemGroups(){
		$query = $this->db->get('item_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function PartyWiseInfo($data){
		$this->db->insert('party_wise_info', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function UpPartyWiseInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('party_wise_info', $data);
	}


	public function CheckPartyWiseInfo($party_id, $amc_contract_info_id){
		$this->db->where('party_id', $party_id);
		$this->db->where('amc_contract_info_id', $amc_contract_info_id);

		$query = $this->db->get('party_wise_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}
	
	/*public function GetPartyWiseInfo($id){
		$this->db->select('party_wise_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no, item_group.group_name')->from('party_wise_info');

		$this->db->join('party', 'party.id = party_wise_info.party_id');
		$this->db->join('party_info', 'party_info.id = party_wise_info.party_info_id', 'left');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = party_wise_info.amc_contract_info_id');
		$this->db->join('item_group', 'item_group.id = party_wise_info.amc_machine_id');
		
		if($id !== null){
			$this->db->where('party_wise_info.id', $id);
		}


		$this->db->group_by("party_wise_info.party_id");
 		$this->db->order_by('party_wise_info.party_id', 'asc');

 		$query = $this->db->get();
        return $query->result_array();
	}*/

	public function GetPartyWiseInfo($id){
		$this->db->select('party_wise_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no, item_group.group_name')->from('party_wise_info');

		$this->db->join('party', 'party.id = party_wise_info.party_id');
		$this->db->join('party_info', 'party_info.id = party_wise_info.party_info_id', 'left');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = party_wise_info.amc_contract_info_id');
		$this->db->join('item_group', 'item_group.id = party_wise_info.amc_machine_id');

		if($id !== null){
			$this->db->where('party_wise_info.id', $id);
		}
		
		$this->db->group_by("party_wise_info.party_id");
 		$this->db->order_by('party_wise_info.party_id', 'asc');
		
		$query = $this->db->get();
        $vehicle_routes = $query->result_array();
       	$arrays = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
            	$vec_route = new stdClass(); 
            	$vec_route->id = $vehicle_value['id'];
            	$vec_route->party_id = $vehicle_value['party_id'];
                $vec_route->party_name = $vehicle_value['party_name'];
            	$vec_route->SubjectBy = $this->GetPartyWiseInfo1($vehicle_value['party_id']);
         		$arrays[] = $vec_route;
            }
        }
        return $arrays;
    }

	public function GetPartyWiseInfo1($party_id){
		$this->db->select('party_wise_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no, item_group.group_name')->from('party_wise_info');

		$this->db->where('party_wise_info.party_id', $party_id);

		$this->db->join('party', 'party.id = party_wise_info.party_id');
		$this->db->join('party_info', 'party_info.id = party_wise_info.party_info_id', 'left');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = party_wise_info.amc_contract_info_id');
		$this->db->join('item_group', 'item_group.id = party_wise_info.amc_machine_id');

		$this->db->group_by("party_wise_info.amc_contract_info_id");
 		$this->db->order_by('party_wise_info.amc_contract_info_id', 'asc');

		$query = $this->db->get();
        $vehicle_routes = $query->result_array();
       	$arrays = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
            	$vec_route = new stdClass(); 
            	$vec_route->amc_contract_info_id = $vehicle_value['amc_contract_info_id'];
            	$vec_route->contract_ref_no = $vehicle_value['contract_ref_no'];
            	$vec_route->ref_no = $this->GetPartyWiseInfo2($vehicle_value['party_id'], $vehicle_value['amc_contract_info_id']);
         		$arrays[] = $vec_route;
            }
        }
        return $arrays;
	}
	
	public function GetPartyWiseInfo2($party_id, $amc_contract_info_id){
		$this->db->select('party_wise_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no, item_group.group_name')->from('party_wise_info');

		$this->db->where('party_wise_info.party_id', $party_id);
		$this->db->where('party_wise_info.amc_contract_info_id', $amc_contract_info_id);

		$this->db->join('party', 'party.id = party_wise_info.party_id');
		$this->db->join('party_info', 'party_info.id = party_wise_info.party_info_id', 'left');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = party_wise_info.amc_contract_info_id');
		$this->db->join('item_group', 'item_group.id = party_wise_info.amc_machine_id');

		$query = $this->db->get();
        return $query->result();		
	}


	public function GetPartyWiseInfoData($id){
		$this->db->where('amc_contract_info_id', $id);
		$this->db->order_by("id", "asc");
		$query = $this->db->get('party_wise_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function DeleteWiseInfo($party_id, $party_info_id){
		$this->db->where('party_id', $party_id);
		$this->db->where('amc_contract_info_id', $party_info_id);
		$this->db->delete('party_wise_info');
	}

	public function DelPartyWise($id){
		$this->db->where('id', $id);
		$this->db->delete('party_wise_info');
	}

	public function DelPartyWiseInfo($party_id){
		$this->db->where('amc_contract_info_id', $party_id);
		$this->db->delete('party_wise_info');
	}

	/*<--------------------------------------         End Party Wise Info     ------------------------------------------>*/


	/*<--------------------------------------         Start Sale Invocice Info     ------------------------------------------>*/

	public function BillNo(){
		$sql = "SELECT * FROM sale_invoice";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
	}

	public function CheckItemGroup($ItemGroup, $AMC_Ref_No){
		$this->db->select('item_info.id, item_info.item_name');

		$this->db->where('party_wise_info.party_id', $ItemGroup);
		$this->db->where('party_wise_info.amc_contract_info_id', $AMC_Ref_No);

		$this->db->join('item_info', 'item_info.id = party_wise_info.amc_machine_id');
		
		$this->db->group_by("party_wise_info.amc_machine_id");

		$query = $this->db->get('party_wise_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetRateParty($ItemGroup, $AMC_Ref_No, $amc_machine_id){
		$this->db->select('item_info.*, taxslab.taxslab_name, party_wise_info.rate as party_rate, party_wise_info.required');
		$this->db->where('party_wise_info.party_id', $ItemGroup);
		$this->db->where('party_wise_info.amc_contract_info_id', $AMC_Ref_No);
		$this->db->where('party_wise_info.amc_machine_id', $amc_machine_id);

		$this->db->join('item_info', 'item_info.id = party_wise_info.amc_machine_id');
		$this->db->join('taxslab', 'taxslab.id = item_info.taxslab_id');

		$this->db->group_by("party_wise_info.amc_machine_id");

		$query = $this->db->get('party_wise_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function Add_sale_invoice($data){
        $this->db->insert('sale_invoice', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function Add_sale_item($data){
        $this->db->insert('sale_item', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function SaleInvoiceList($id){
        $this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');

        if($id !== null){
            $this->db->where('sale_invoice.id', $id);
        }

        $this->db->join('party', 'party.id = sale_invoice.party_id');
        $this->db->join('party_info', 'party_info.id = sale_invoice.party_info_id', 'left');
        $this->db->join('amc_contract_info', 'amc_contract_info.contract_id = sale_invoice.amc_contract_info');
        $this->db->join('sale_item', 'sale_item.sale_invoice_id = sale_invoice.id');

        $this->db->group_by("sale_invoice.id");

        $query = $this->db->get('sale_invoice');
        $vehicle_routes = $query->result_array();
        $arrays = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                $vec_route = new stdClass(); 
                $vec_route->id = $vehicle_value['id'];
                $vec_route->bill_no = $vehicle_value['bill_no'];
                $vec_route->date = $vehicle_value['date'];
                $vec_route->party_id = $vehicle_value['party_id'];
                $vec_route->party_name = $vehicle_value['party_name'];
                $vec_route->party_info_id = $vehicle_value['party_info_id'];
                $vec_route->machine_serial_no = $vehicle_value['machine_serial_no'];
                $vec_route->name = $vehicle_value['name'];
                $vec_route->amc_contract_info = $vehicle_value['amc_contract_info'];
                $vec_route->contract_ref_no = $vehicle_value['contract_ref_no'];
                $vec_route->total_basic_amt = $vehicle_value['total_basic_amt'];
                $vec_route->total_gst_amt = $vehicle_value['total_gst_amt'];
                $vec_route->total_net_amt = $vehicle_value['total_net_amt'];
                $vec_route->sale_item = $this->SaleInvoiceList2($vehicle_value['id']);
                $arrays[] = $vec_route;
            }
        }
        return $arrays;
    }

    public function SaleInvoiceList2($sale_invoice_id){
        $this->db->select('sale_item.*');

        $this->db->where('sale_item.sale_invoice_id', $sale_invoice_id);

        $this->db->join('party', 'party.id = sale_invoice.party_id');
        $this->db->join('party_info', 'party_info.id = sale_invoice.party_info_id', 'left');
        $this->db->join('amc_contract_info', 'amc_contract_info.contract_id = sale_invoice.amc_contract_info');
        $this->db->join('sale_item', 'sale_item.sale_invoice_id = sale_invoice.id');

        $query = $this->db->get('sale_invoice');
        return $query->result();        
    }

    public function GetSaleItem($id){
        $this->db->select('sale_item.*, item_info.item_name, item_group.group_name, item_company_info.item_company_info_name, unit.unit_name');
    	
    	$this->db->join('item_info', 'item_info.id = sale_item.item_id');
    	$this->db->join('unit', 'unit.id = item_info.unit_id');
    	$this->db->join('item_group', 'item_group.id = item_info.item_group_id', 'left');
    	$this->db->join('item_company_info', 'item_company_info.id = item_info.item_company_id');

        $this->db->where('sale_invoice_id', $id);

        $this->db->order_by('sale_item.id', 'asc');

        $query = $this->db->get('sale_item');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function up_sale_invoice($data){
        $this->db->where('id', $data['id']);
        $this->db->update('sale_invoice', $data);
    }

    public function UpSaleItem($data){
        $this->db->where('id', $data['id']);
        $this->db->update('sale_item', $data);
    }

    public function DeleteSaleInvoice($id){
        $this->db->where('sale_invoice_id', $id);
        $this->db->delete('sale_item');
    }

    public function DelSaleInvoices($id){
    	$this->db->where('id', $id);
        $this->db->delete('sale_item');
    }

    public function SaleInvoiceDelete($id){
        $this->db->where('id', $id);
        $this->db->delete('sale_invoice');
    }

	/*<--------------------------------------         End Sale Invocice Info     ------------------------------------------>*/


	/*<--------------------------------------         Start Call Visit     ------------------------------------------>*/

	public function CallNo(){
		$sql = "SELECT * FROM call_visit";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
	}

	public function CheckPro($id){
		$this->db->where('equipment_type_id', $id);
		
		$query = $this->db->get('problem_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function CheckProRec($id){
		$this->db->where('equipment_type_id', $id);
		
		$query = $this->db->get('problem_rectification_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function AddCallVisit($data){
		$this->db->insert('call_visit', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function GetSaleInvoice($id){
		$this->db->where('ticket_info_id', $id);

        $query = $this->db->get('call_visit');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetCallVisit($id){
		$this->db->select('ticket_info.*, engineer.name as engineer_name, engineer.mobile_no as e_mobile_no, amc_machine.model_no, amc_machine.in_warrenty,item_group.group_name');
		if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }

        $this->db->where('ticket_info.engineer_id is NOT NULL', NULL, FALSE);

        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function ViewCallVisit($id){
		$this->db->select('ticket_info.*, engineer.name as engineer_name, engineer.mobile_no as e_mobile_no, amc_machine.model_no, amc_machine.in_warrenty, item_group.group_name, call_visit.call_visit_no, party_info.mobile_1');
		if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }

		$this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');
		$this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');  
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');

        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	

	public function UpSaleInvoice($data){
		$this->db->where('id', $data['id']);
		$this->db->update('call_visit', $data);
	}

    public function UpTicketInfo1($id, $data){
        $this->db->where('call_visit_id', $id);
        $this->db->update('ticket_info', $data);
    }

    public function UpTicket($data){
    	$this->db->where('id', $data['id']);
        $this->db->update('ticket_info', $data);
    }

	public function DelSaleInvoice($id){
        $this->db->where('id', $id);
        $this->db->delete('call_visit');
    }

	
    /*<--------------------------------------         End Call Visit     ------------------------------------------>*/
    

    /*<--------------------------------------         Start Receipt Info     ------------------------------------------>*/
    
    public function ReceiptNo(){
		$sql = "SELECT * FROM receipt_info";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
	}

    public function CheckBill($partyGroup, $AMC_Ref_No){
       
        $this->db->where('party_id', $partyGroup);
        $this->db->where('amc_contract_info', $AMC_Ref_No);
        
        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

      public function CheckBills($id){
       	$this->db->select('bill_no, total_net_amt');

        $this->db->where('id', $id);
        $this->db->order_by('bill_no', 'asc');

        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function CheckTotalBill($partyGroup, $AMC_Ref_No){
        $this->db->select_sum('total_net_amt');
        $this->db->where('party_id', $partyGroup);
        $this->db->where('amc_contract_info', $AMC_Ref_No);
        
        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function CheckSelectBill($data){
       	
		$query = $this->db->query(" SELECT sum(`total_net_amt`) as `sum_total` FROM `sale_invoice` WHERE `id` IN(".$data.") ");

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }


	public function AddReceiptInfo($data){
		$this->db->insert('receipt_info', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function GetReceiptInfo($id){
		$this->db->select('receipt_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');
		
		if($id !== null){
        	$this->db->where('receipt_info.id', $id);
        }		

		$this->db->join('party', 'party.id = receipt_info.party_id');
		$this->db->join('party_info', 'party_info.id = receipt_info.party_info_id');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = receipt_info.amc_contract_info');

		$query = $this->db->get('receipt_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetSaleInvoices($party_id, $party_info_id, $amc_contract_info){
		$this->db->where('party_id', $party_id);
		$this->db->where('party_info_id', $party_info_id);
		$this->db->where('amc_contract_info', $amc_contract_info);

        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function UpReceiptInfo($data){
		$this->db->where('id', $data['id']);
		$this->db->update('receipt_info', $data);
	}

	public function ReceiptInfoDelete($id){
        $this->db->where('id', $id);
        $this->db->delete('receipt_info');
    }

    /*<--------------------------------------         End Receipt Info     ------------------------------------------>*/


    /*<--------------------------------------         Start Report     ------------------------------------------>*/

    public function SerialNo($id){
    	$this->db->select('serial_no');
    	$this->db->where('amc_machine_id', $id);
    
        $query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function GetTicketInfo1($id){
		$this->db->select('ticket_info.*, party_info.name as party_name, engineer.name as engineer_name, engineer.mobile_no as e_mobile_no, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty,item_group.group_name');
		if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }
        
        $this->db->where('ticket_info.call_visit_id is NOT NULL', NULL, FALSE);

        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

    /*<--------------------------------------         End Report     ------------------------------------------>*/

    /*<--------------------------------------        Start Export      ------------------------------------------>*/

    public function EGetPartyInfo($data){

        $this->db->select('party_info.*, party.party_name');
		$this->db->join('party', 'party.id = party_info.party_group_id');
		
		if(!empty($data['party_id'])){
			$this->db->where('party_info.party_group_id', $data['party_id']);
		}
		if(!empty($data['party_info_id'])){
			 $this->db->where('party_info.id', $data['party_info_id']);
		}       

        $query = $this->db->get('party_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function EGetItemInfo($data){
		$this->db->select('item_info.*, item_company_info.id as company_info_id, item_company_info.item_company_info_name, item_group.id as item_group_id, item_group.group_name, taxslab.id as taxslab_id, taxslab.taxslab_name, unit.id as unit_id, unit.unit_name');
		
		if(!empty($data['item_company'])){
        	$this->db->where('item_info.item_company_id', $data['item_company']);
        }
        if(!empty($data['equipment_type'])){
        	$this->db->where('item_info.item_group_id', $data['equipment_type']);
        }

		$this->db->join('item_company_info', 'item_company_info.id = item_info.item_company_id');
		$this->db->join('item_group', 'item_group.id = item_info.item_group_id','left');
		$this->db->join('taxslab', 'taxslab.id = item_info.taxslab_id');
		$this->db->join('unit', 'unit.id = item_info.unit_id');

		$query = $this->db->get('item_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function EGetproblemInfo($data){
		$this->db->select('problem_info.*, item_group.group_name');
        
        if(!empty($data['equipment_type'])){
        	$this->db->where('problem_info.equipment_type_id', $data['equipment_type']);
        }

		$this->db->join('item_group', 'item_group.id = problem_info.equipment_type_id');

		$query = $this->db->get('problem_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function EGetProblemRectificationInfo($data){
		$this->db->select('problem_rectification_info.*, item_group.group_name');
		
		if(!empty($data['equipment_type'])){
        	$this->db->where('problem_rectification_info.equipment_type_id', $data['equipment_type']);
        }

		$this->db->join('item_group', 'item_group.id = problem_rectification_info.equipment_type_id');

		$query = $this->db->get('problem_rectification_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function EGetAMCContract($data){
		$this->db->select('amc_contract_info.*, party.id as party_id, party.party_name, amc_type.id as amc_type_id, amc_type.amc_type');
		
		$this->db->join('party', 'party.id = amc_contract_info.party_id');
		$this->db->join('amc_type', 'amc_type.id = amc_contract_info.type');

		if(!empty($data['contract_date'])){
        	$this->db->where('amc_contract_info.contract_date', $data['contract_date']);
        }
        if(!empty($data['party_id'])){
        	$this->db->where('amc_contract_info.party_id', $data['party_id']);
        }
        if(!empty($data['contract_start_date'])){
        	$this->db->where('amc_contract_info.contract_start_date', $data['contract_start_date']);
        }
         if(!empty($data['contract_end_date'])){
        	$this->db->where('amc_contract_info.contract_end_date', $data['contract_end_date']);
        }
        if(!empty($data['type'])){
        	$this->db->where('amc_contract_info.type', $data['type']);
        }

		$query = $this->db->get('amc_contract_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function EMachineDetails($data){
		$this->db->select('party.party_name, party_info.name, amc_contract_info.*,amc_type.amc_type, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty, item_group.group_name, item_company_info.item_company_info_name');

		$this->db->join('party', 'party.id = amc_machine_details.party_id');
		$this->db->join('party_info', 'party_info.id = amc_machine_details.party_info_id');		
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = amc_machine_details.amc_contract_information_id');      
       	$this->db->join('amc_type', 'amc_type.id = amc_contract_info.type');
       	$this->db->join('amc_machine', 'amc_machine.amc_machine_details_id = amc_machine_details.id');
       	$this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
       	$this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');

       	if(!empty($data['party_id'])){
        	$this->db->where('amc_machine_details.party_id', $data['party_id']);
        }
        if(!empty($data['party_info_id'])){
        	$this->db->where('amc_machine_details.party_info_id', $data['party_info_id']);
        }

        $this->db->order_by('amc_contract_info.contract_ref_no', 'ASC');
        $this->db->order_by('amc_contract_info.contract_ref_no', 'ASC');
        // $this->db->order_by("name", "asc"); 

        $query = $this->db->get('amc_machine_details');

		if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*public function EMachineDetails($data){
		$this->db->select('party.id, party.party_name');

        $this->db->join('party', 'party.id = amc_machine_details.party_id');
       	$this->db->group_by("amc_machine_details.party_id"); 
       	$query = $this->db->get('amc_machine_details');
        
        $vehicle_routes = $query->result_array();
        $array = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                $vec_route = new stdClass();
                $vec_route->party_id = $vehicle_value['id'];
                $vec_route->party_name = $vehicle_value['party_name'];
                $vec_route->contract_ref_no = $this->EMachineDetails1($vehicle_value['id']);
                $array[] = $vec_route;
            }
        }
        return $array; 
	}

	public function EMachineDetails1($party_id){
		$this->db->select('party_info.id, party_info.name');

		$this->db->where('amc_machine_details.party_id', $party_id);

        $this->db->join('party_info', 'party_info.id = amc_machine_details.party_info_id');
        $this->db->group_by("amc_machine_details.party_info_id"); 
        $query = $this->db->get('amc_machine_details');

        $vehicle_routes = $query->result_array();
        $array = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                $vec_route = new stdClass();
                $vec_route->party_info_id = $vehicle_value['id'];
				$vec_route->party_name = $vehicle_value['name'];
                $vec_route->party_name_by = $this->EMachineDetails2($party_id, $vehicle_value['id']);
                $array[] = $vec_route;
            }
        }
        return $array; 
	}

	public function EMachineDetails2($party_id, $party_info_id){
		$this->db->select('amc_machine_details.id, amc_contract_info.*, amc_type.amc_type');

		$this->db->where('amc_machine_details.party_id', $party_id);
		$this->db->where('amc_machine_details.party_info_id', $party_info_id);

        $this->db->join('amc_contract_info', 'amc_contract_info.contract_id = amc_machine_details.amc_contract_information_id');
        $this->db->join('amc_type', 'amc_type.id = amc_contract_info.type');
        $query = $this->db->get('amc_machine_details');
        
        $vehicle_routes = $query->result_array();
        $array = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                $vec_route = new stdClass();
                $vec_route->amc_machine_details_id = $vehicle_value['id'];
                $vec_route->contract_id = $vehicle_value['contract_id'];
				$vec_route->contract_date = $vehicle_value['contract_date'];
				$vec_route->amc_type = $vehicle_value['amc_type'];
				$vec_route->contract_start_date = $vehicle_value['contract_start_date'];
				$vec_route->contract_end_date = $vehicle_value['contract_end_date'];
				$vec_route->contract_ref_no = $vehicle_value['contract_ref_no'];	
                $vec_route->party_name_by = $this->EMachineDetails3($vehicle_value['id']);
                $array[] = $vec_route;
            }
        }
        return $array;
    }

    public function EMachineDetails3($amc_machine_details_id){
    	$this->db->select('item_group.group_name, item_company_info.item_company_info_name, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty');

    	$this->db->where('amc_machine.amc_machine_details_id', $amc_machine_details_id);
 		
 		$this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');
 		$query = $this->db->get('amc_machine');
 		if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }*/

    public function EPartyWiseInfo($data){
    	$this->db->select('party.party_name, party_info.name, amc_contract_info.contract_ref_no, party_wise_info.rate, party_wise_info.required, item_info.item_name');
   	 	
   	 	if(!empty($data['party_id'])){
        	$this->db->where('party_wise_info.party_id', $data['party_id']);
        }
        if(!empty($data['AMC_Ref_No'])){
        	$this->db->where('amc_contract_info.contract_id', $data['AMC_Ref_No']);
        }


   	 	$this->db->join('party', 'party.id = party_wise_info.party_id');
		$this->db->join('party_info', 'party_info.id = party_wise_info.party_info_id', "left");		
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = party_wise_info.amc_contract_info_id');  
		$this->db->join('item_info', 'item_info.id = party_wise_info.amc_machine_id');  

		$this->db->order_by("party_wise_info.id", "asc");
		$query = $this->db->get('party_wise_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function ETicketInfo($data){
    	$this->db->select('ticket_info.*, party.party_name as party_group, party_info.name as party_name, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty,item_group.group_name');

    	if(!empty($data['from_date'])){
        	$this->db->where('ticket_info.create_date >=', $data['from_date']);
        }
        if(!empty($data['to_date'])){
        	$this->db->where('ticket_info.create_date <=', $data['to_date']);
        }
    	if(!empty($data['party_id'])){
        	$this->db->where('ticket_info.party_id', $data['party_id']);
        }
        if(!empty($data['party_info_id'])){
        	$this->db->where('ticket_info.party_info_id', $data['party_info_id']);
        }

    	$this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');;	
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function ECallVisitReport($data){
		$this->db->select('ticket_info.*, call_visit.*,party.party_name as party_group, party_info.name as party_name, amc_machine.model_no, amc_machine.serial_no, amc_machine.in_warrenty,item_group.group_name');

    	if(!empty($data['from_date'])){
        	$this->db->where('call_visit.reported_date >=', $data['from_date']);
        }
        if(!empty($data['to_date'])){
        	$this->db->where('call_visit.reported_date <=', $data['to_date']);
        }
    	if(!empty($data['party_id'])){
        	$this->db->where('ticket_info.party_id', $data['party_id']);
        }
        if(!empty($data['party_info_id'])){
        	$this->db->where('ticket_info.party_info_id', $data['party_info_id']);
        }

    	$this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');;	
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_group', 'item_group.id = amc_machine.item_group_id');
        $this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetMachineSerialNo($id){
		$this->db->select('serial_no');

		$this->db->where('amc_machine_id', $id);

		$query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function ESaleInvoice($data){
		$this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no, item_info.item_name, sale_item.qty, sale_item.rate, sale_item.gst, sale_item.amt');

		$this->db->join('party', 'party.id = sale_invoice.party_id');
        $this->db->join('party_info', 'party_info.id = sale_invoice.party_info_id', "left");
        $this->db->join('amc_contract_info', 'amc_contract_info.contract_id = sale_invoice.amc_contract_info');		
        $this->db->join('sale_item', 'sale_item.sale_invoice_id = sale_invoice.id');
		$this->db->join('item_info', 'item_info.id = sale_item.item_id');

        if(!empty($data['from_date'])){
        	$this->db->where('sale_invoice.date >=', $data['from_date']);
        }
        if(!empty($data['to_date'])){
        	$this->db->where('sale_invoice.date <=', $data['to_date']);
        }
		if(!empty($data['party_id'])){
        	$this->db->where('sale_invoice.party_id', $data['party_id']);
        }
        if(!empty($data['party_info_id'])){
        	$this->db->where('sale_invoice.party_info_id', $data['party_info_id']);
        }
        if(!empty($data['AMC_Ref_No'])){
        	$this->db->where('amc_contract_info.contract_ref_no', $data['AMC_Ref_No']);
        }
        
        $this->db->order_by("sale_invoice.id", "asc"); 

        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	/*public function ESaleInvoice($data){
		$this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');
		
		$this->db->join('party', 'party.id = sale_invoice.party_id');
        $this->db->join('party_info', 'party_info.id = sale_invoice.party_info_id', "left");
        $this->db->join('amc_contract_info', 'amc_contract_info.contract_id = sale_invoice.amc_contract_info');		
        
        $this->db->order_by("sale_invoice.id", "asc"); 

        $query = $this->db->get('sale_invoice');

        $vehicle_routes = $query->result_array();
        $array = array();
        if (!empty($vehicle_routes)) {
            foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                $vec_route = new stdClass();
                $vec_route->sale_invoice_id = $vehicle_value['id'];
                $vec_route->bill_no = $vehicle_value['bill_no'];
                $vec_route->date = $vehicle_value['date'];
                $vec_route->party_name = $vehicle_value['party_name'];
                $vec_route->name = $vehicle_value['name'];
                $vehicle_value['machine_serial_no'];
             
                $pro_info_rec_data = explode(", ", $vehicle_value['machine_serial_no']);

				foreach ($pro_info_rec_data as $k) {
					$Getproblem_info = $this->Admin_model->GetMachineSerialNo($k);
					$infos[] = $Getproblem_info[0]['serial_no'];
				}
				$vec_route->machine_serial_no = implode(", ", $infos);

                $vec_route->contract_ref_no = $vehicle_value['contract_ref_no'];
                $vec_route->total_basic_amt = $vehicle_value['total_basic_amt'];
                $vec_route->total_gst_amt = $vehicle_value['total_gst_amt'];
                $vec_route->total_net_amt = $vehicle_value['total_net_amt'];
                $vec_route->party_name_by = $this->ESaleInvoice2($vehicle_value['id']);
                $array[] = $vec_route;
            }
        }
        return $array;
	}

	public function ESaleInvoice2($id){
		$this->db->select('item_info.item_name, sale_item.qty, sale_item.rate, sale_item.gst, sale_item.amt,');
		$this->db->where('sale_item.sale_invoice_id', $id);

		$this->db->join('sale_item', 'sale_item.sale_invoice_id = sale_invoice.id');
		$this->db->join('item_info', 'item_info.id = sale_item.item_id');
		
		$query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}*/

	public function EGetReceiptInfo($data){
		$this->db->select('receipt_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');
		
		if(!empty($data['from_date'])){
        	$this->db->where('receipt_info.date >=', $data['from_date']);
        }
        if(!empty($data['to_date'])){
        	$this->db->where('receipt_info.date <=', $data['to_date']);
        }
		if(!empty($data['party_id'])){
        	$this->db->where('receipt_info.party_id', $data['party_id']);
        }
        if(!empty($data['party_info_id'])){
        	$this->db->where('receipt_info.party_info_id', $data['party_info_id']);
        }
        if(!empty($data['AMC_Ref_No'])){
        	$this->db->where('receipt_info.amc_contract_info', $data['AMC_Ref_No']);
        }	

		$this->db->join('party', 'party.id = receipt_info.party_id');
		$this->db->join('party_info', 'party_info.id = receipt_info.party_info_id');
		$this->db->join('amc_contract_info', 'amc_contract_info.contract_id = receipt_info.amc_contract_info');

		$query = $this->db->get('receipt_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

    /*<--------------------------------------        Start Export      ------------------------------------------>*/
}

