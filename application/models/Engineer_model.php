<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Engineer_model extends CI_Model {
	
	public function Login($mobile, $password)
	{
		$this->db->select()->from('engineer');
		
		$this->db->where('mobile_no', $mobile);
		if(!empty($password)){
			$this->db->where('password', $password);
			$this->db->where('status', 1);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function TodayTicket($engineer_id, $date)
	{
		$this->db->select()->from('ticket_info');
		
		$this->db->where('engineer_id', $engineer_id);
		$this->db->where('create_date', $date);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function WorkingTicket($data){
		$this->db->where('id', $data['id']);
		$this->db->update('ticket_info', $data);

		$this->db->trans_complete();        
		
		if($this->db->affected_rows() > 0)
	    {
	    	return $data;
	    } else {
	    	return FALSE;
	    }
	}

	public function PendingTicket($engineer_id)
	{
		$this->db->where('engineer_id', $engineer_id);
		$this->db->where('status', 'working');

		$query = $this->db->get('ticket_info');
		return $query->result_array();
	}

	public function CompletedTickets($engineer_id)
	{
		$this->db->where('engineer_id', $engineer_id);
		$this->db->where('status', 'complete');

		$query = $this->db->get('ticket_info');
		return $query->result_array();
	}

	public function ViewCallVisit($engineer_id)
	{
		$this->db->select('ticket_info.*, party.party_name as party, party_info.name as party_name, item_group.group_name as equipmeny_type, amc_machine.serial_no, amc_machine.model_no, item_company_info.item_company_info_name as make, engineer.name as engineer_name, engineer.mobile_no as engineer_mobile_no')->from('ticket_info');
		
		$this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        $this->db->join('item_group', 'item_group.id = ticket_info.item_info_id');
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id');

		$this->db->where('engineer_id', $engineer_id);
		$this->db->where('approve', 1);
		$this->db->where('call_visit_id IS NULL', null);
		
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function ViewCallVisitById($engineer_id, $id)
	{
		$this->db->select('ticket_info.*, party.party_name as party, party_info.name as party_name, item_group.group_name as equipmeny_type, amc_machine.serial_no, amc_machine.model_no, item_company_info.item_company_info_name as make, engineer.name as engineer_name, engineer.mobile_no as engineer_mobile_no')->from('ticket_info');
		
		$this->db->join('party', 'party.id = ticket_info.party_id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        $this->db->join('item_group', 'item_group.id = ticket_info.item_info_id');
        $this->db->join('amc_machine', 'amc_machine.amc_machine_id = ticket_info.amc_machine_id');
        $this->db->join('item_company_info', 'item_company_info.id = amc_machine.item_company_id');
        $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id');
        $this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');

		$this->db->where('ticket_info.engineer_id', $engineer_id);
		$this->db->where('call_visit.id', $id);
		
		$this->db->order_by("id", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function ProblemInfo($id)
	{
		$this->db->where('equipment_type_id', $id);

		$query = $this->db->get('problem_info');
		return $query->result_array();
	}

	public function ProblemRec($id)
	{
		$this->db->where('equipment_type_id', $id);

		$query = $this->db->get('problem_rectification_info');
		return $query->result_array();
	}

	public function AddCallVisit($data){
		$this->db->insert('call_visit', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function UpdateTicket($data){
		$this->db->where('id', $data['id']);
		$this->db->update('ticket_info', $data);
	}

	public function ViewAllCallVisit($id){

		$this->db->where('engineer_id', $id);		
		$this->db->order_by("id", "desc");

		$query = $this->db->get('call_visit');
		return $query->result_array();
	}

	public function UpCallVisit($data){
		$this->db->where('id', $data['id']);
		$this->db->update('call_visit', $data);

		$this->db->trans_complete();        
		
		if($this->db->affected_rows() > 0)
	    {
	    	return $data;
	    } else {
	    	return FALSE;
	    }
	}

	public function DeleteCallVisit($id){
		$this->db->where('id', $id);
		$this->db->delete('call_visit');

		$this->db->trans_complete();        
		
		if($this->db->affected_rows() > 0)
	    {
	    	return $id;
	    } else {
	    	return FALSE;
	    }
	}

	public function GetTicketInfo($id){
		$this->db->where('call_visit_id', $id);
		$query = $this->db->get('ticket_info');
		return $query->result_array();
	}

	public function UpTicketInfo($id, $data){
        $this->db->where('call_visit_id', $id);
        $this->db->update('ticket_info', $data);
    }

    public function CallNo(){
		$sql = "SELECT * FROM sale_invoice";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
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

	public function CheckItemGroup($ItemGroup, $AMC_Ref_No){
		$this->db->select('item_info.*, taxslab.taxslab_name as gst');

		$this->db->where('party_wise_info.party_id', $ItemGroup);
		$this->db->where('party_wise_info.amc_contract_info_id', $AMC_Ref_No);

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

    public function ViewSaleInvoice($id){
        $this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');

        if($id !== null){
            $this->db->where('sale_invoice.engineer_id', $id);
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

    public function ViewSaleInvoiceById($engineer_id, $id){
        $this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');

        $this->db->where('sale_invoice.engineer_id', $engineer_id);
        $this->db->where('sale_invoice.id', $id);

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

    public function up_sale_invoice($data){
        $this->db->where('id', $data['id']);
        $this->db->update('sale_invoice', $data);
    }

	public function Del_sale_item($id){
        $this->db->where('sale_invoice_id', $id);
        $this->db->delete('sale_item');
    }
    
    public function SaleInvoiceDelete($id){
        $this->db->where('id', $id);
        $this->db->delete('sale_invoice');
    }

    public function ReceiptNo(){
		$sql = "SELECT * FROM receipt_info";
        $query = $this->db->query($sql);
        $newresult =  $query->num_rows();
        $value2 = substr($newresult, 10, 13);                  //separating numeric part
        $value2 = $newresult + 1;                              //Incrementing numeric part
        $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
        return $value = $value2;
	}

	public function CheckBill($partyGroup, $AMC_Ref_No, $engineer_id){
       
        $this->db->where('party_id', $partyGroup);
        $this->db->where('amc_contract_info', $AMC_Ref_No);
        $this->db->where('engineer_id', $engineer_id);

        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function AddReceipt($data){
        $this->db->insert('receipt_info', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function ViewReceipt($id){
		$this->db->select('receipt_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');	
		
        $this->db->where('receipt_info.engineer_id', $id);	

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

	public function ViewReceiptById($engineer_id, $id){
		$this->db->select('receipt_info.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');	
		
        $this->db->where('receipt_info.engineer_id', $engineer_id);	
        $this->db->where('receipt_info.id', $id);	

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
 	
 	public function UpReceipt($data){
		$this->db->where('id', $data['id']);
		$this->db->update('receipt_info', $data);

		$this->db->trans_complete();        
		
		if($this->db->affected_rows() > 0)
	    {
	    	return $data;
	    } else {
	    	return FALSE;
	    }
	} 

	public function DelReceipt($id){
        $this->db->where('id', $id);
        $this->db->delete('receipt_info');
    } 
}