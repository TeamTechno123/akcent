<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Party_model extends CI_Model {
	/*<--------------------------------------         Start Party Login      ------------------------------------------>*/

	public function login($mobile, $password)
	{
		$this->db->select()->from('party_info');
		$this->db->where('mobile_1', $mobile);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->result_array();
	}

	/*<--------------------------------------         End Party Login      ------------------------------------------>*/

	/*<--------------------------------------         Dashboard      ------------------------------------------>*/

	public function DTotalTickets($party_group_id, $party_id){
		$this->db->where('party_id', $party_group_id);
		if(!empty($party_id)){
			$this->db->where('party_info_id', $party_id);
		}
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DOpenTickets($party_group_id, $party_id){
		$this->db->where('party_id', $party_group_id);
		if(!empty($party_id)){
			$this->db->where('party_info_id', $party_id);
		}
		$this->db->where('engineer_id IS NULL', null);
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DInProcessTickets($party_group_id, $party_id){
		$this->db->where('party_id', $party_group_id);
		if(!empty($party_id)){
			$this->db->where('party_info_id', $party_id);
		}
		$this->db->where('status', 'working');
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DCompletedTickets($party_group_id, $party_id){
		$this->db->where('party_id', $party_group_id);
		if(!empty($party_id)){
			$this->db->where('party_info_id', $party_id);
		}
		$this->db->where('status', 'complete');
        
        $query = $this->db->get('ticket_info');
        $num = $query->num_rows();
        return $num;
	}

	public function DCollVisitReprort($party_group_id, $party_id){
		$this->db->select('call_visit.*, ticket_info.*,  party.party_name, party_info.name, amc_machine.serial_no, item_group.group_name, engineer.name as engineer_name, engineer.mobile_no as engineer_mobile_no, ');

		$this->db->join('ticket_info', 'ticket_info.call_visit_id = call_visit.id');
		$this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
		$this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
		$this->db->join('item_group', 'item_group.id = ticket_info.item_info_id');

		
		$this->db->join('engineer', 'engineer.id = ticket_info.engineer_id');

		$this->db->where('ticket_info.party_id', $party_group_id);
		$this->db->where('ticket_info.party_info_id', $party_id);
        
        $query = $this->db->get('call_visit');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}


	/*<--------------------------------------       Dashboard      ------------------------------------------>*/

	/*<--------------------------------------         Start Ticket Info      ------------------------------------------>*/

	public function CheckMachineSerial($id){
		$this->db->select('amc_machine.serial_no, amc_machine.amc_machine_id, item_company_info.item_company_info_name, amc_machine.model_no, amc_machine.item_group_id');

		$this->db->join('amc_machine', 'amc_machine.amc_machine_details_id = amc_machine_details.id');
		 $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');

		$this->db->where('amc_machine_details.party_id', $id);

		$this->db->order_by('amc_machine.amc_machine_id', 'asc');
		$query = $this->db->get('amc_machine_details');
		if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function CheckMachineSerial1($party_id, $party_info_id){
		$this->db->select('amc_machine.serial_no, amc_machine.amc_machine_id, item_company_info.item_company_info_name, amc_machine.model_no, amc_machine.item_group_id');

		$this->db->join('amc_machine', 'amc_machine.amc_machine_details_id = amc_machine_details.id');
		 $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');

		$this->db->where('amc_machine_details.party_id', $party_id);
		$this->db->where('amc_machine_details.party_info_id', $party_info_id);

		$this->db->order_by('amc_machine.amc_machine_id', 'asc');
		$query = $this->db->get('amc_machine_details');
		if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetTicketInfos($id){
		$this->db->select('ticket_info.*, engineer.name as engineer_name, engineer.mobile_no as e_mobile_no');
		if($id !== null){
        	$this->db->where('ticket_info.party_info_id', $id);
        }
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function GetTicketInfo($id){
		$this->db->select('ticket_info.*, party.party_name, party_info.name, amc_machine.serial_no, amc_machine.in_warrenty, item_company_info.item_company_info_name ,amc_machine.model_no,item_group.group_name');
		

        $this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
		$this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');

		$this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');
		
		$this->db->join('item_group', 'item_group.id = ticket_info.item_info_id');
		

        if($id !== null){
        	$this->db->where('ticket_info.id', $id);
        }

        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function DelTicketInfo($id){
		$this->db->where('id', $id);
		$this->db->delete('ticket_info');
	}

	/*<--------------------------------------         End Ticket Info      ------------------------------------------>*/
}