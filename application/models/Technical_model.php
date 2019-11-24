<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Technical_model extends CI_Model {
	/*<--------------------------------------         Start Technical Login      ------------------------------------------>*/

	public function login($mobile, $password)
	{
		$this->db->select()->from('technical_user');
		$this->db->where('mobile_no', $mobile);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	/*<--------------------------------------         End Technical Login      ------------------------------------------>*/


    /*<--------------------------------------        Start Dashboard      ------------------------------------------>*/



    public function DPendingCollVisit($party_group_id){
        $this->db->select('call_visit.*, party_info.name,');

        $this->db->join('ticket_info', 'ticket_info.call_visit_id = call_visit.id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');

        $this->db->where('call_visit.approve', 0);
        $this->db->where('ticket_info.party_id', $party_group_id);
        
        $query = $this->db->get('call_visit');
        $num = $query->num_rows();
        return $num;
    }

    public function DApprovedCollVisit($party_group_id){
        $this->db->select('call_visit.*, party_info.name,');

        $this->db->join('ticket_info', 'ticket_info.call_visit_id = call_visit.id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');

        $this->db->where('call_visit.approve', 1);
        $this->db->where('ticket_info.party_id', $party_group_id);
        
        $query = $this->db->get('call_visit');
        $num = $query->num_rows();
        return $num;
    }

    public function DCallVisit($party_group_id){
        $this->db->select('call_visit.*, party_info.name,');

        $this->db->join('ticket_info', 'ticket_info.call_visit_id = call_visit.id');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');

        $this->db->where('ticket_info.party_id', $party_group_id);
        
        $query = $this->db->get('call_visit');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function Ticket($party_group_id){
        $this->db->select('ticket_info.*, party_info.name,');
        $this->db->join('party_info', 'party_info.id = ticket_info.party_info_id');
        
        $this->db->where('ticket_info.party_id', $party_group_id);
        
        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function DSaleInvoice($party_group_id){
        $this->db->select('sale_invoice.*, party_info.name,');
        $this->db->join('party_info', 'party_info.id = sale_invoice.party_info_id');
        
        $this->db->where('sale_invoice.party_id', $party_group_id);
        
        $query = $this->db->get('sale_invoice');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    
    public function DMachineSerialNo($id){ 
        $this->db->select('serial_no');
        $this->db->where('amc_machine_id', $id);
        $query = $this->db->get('amc_machine');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    /*<--------------------------------------      End Dashboard      ------------------------------------------>*/


	/*<--------------------------------------         Start Approve Call Visit Login      ------------------------------------------>*/

		
	public function GetSaleInvoice($party_id){
		$this->db->select('ticket_info.*,call_visit.*,  engineer.id as engineer_id,engineer.name as engineer_name,');

		$this->db->join('call_visit', 'call_visit.id = ticket_info.call_visit_id');
		 $this->db->join('engineer', 'engineer.id = ticket_info.engineer_id', 'left');

		$this->db->where('ticket_info.party_id', $party_id);
		$this->db->where('call_visit.approve', 0);

        $query = $this->db->get('ticket_info');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}

	public function CallVisitUpdate($data){
		$this->db->where('ticket_info_id', $data['ticket_info_id']);
		$this->db->update('call_visit', $data);
	}

	/*<--------------------------------------         End Approve Call Visit Login      ------------------------------------------>*/


	/*<--------------------------------------         Start Approve Sale Invoice      ------------------------------------------>*/


	public function SaleInvoiceList($party_id){
        $this->db->select('sale_invoice.*, party.party_name, party_info.name, amc_contract_info.contract_ref_no');

       	
        $this->db->where('sale_invoice.party_id', $party_id);
		$this->db->where('sale_invoice.approve', 0);

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

    public function SaleInvoiceUpdate($data){
		$this->db->where('id', $data['id']);
		$this->db->update('sale_invoice', $data);
	}

    /*<--------------------------------------         End Approve Sale Invoice      ------------------------------------------>*/
}