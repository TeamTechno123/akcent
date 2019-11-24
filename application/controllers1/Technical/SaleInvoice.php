<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaleInvoice extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | Sale Invoice";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Sale Invoice');

		$party_id = $this->session->userdata('party_id');
		$party_info_id = $this->session->userdata('party_info_id');

		$data['data'] = $this->Technical_model->SaleInvoiceList($party_id);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/SaleInvoiceList', $data);
		$this->load->view('layout/Technical/footer', $data);
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
			if(isset($party_info_id)) {
				if($party_info_id == $data['contract_id']){
					echo "<option value='".$data['contract_id']."' selected> ".$data['contract_ref_no']." </option>";
				}
			} else {
				echo "<option value='".$data['contract_id']."'> ".$data['contract_ref_no']." </option>";
			}
		}
	}

	public function CheckItemGroup()
	{
		$ItemGroup =  $this->input->post('ItemGroup');
		$AMC_Ref_No =  $this->input->post('AMC_Ref_No');
		$data = $this->Admin_model->CheckItemGroup($ItemGroup, $AMC_Ref_No);
		echo "<option value=''> Select </option>";
		foreach ($data as $data) {
			if(isset($party_info_id)) {
				if($party_info_id == $data['id']){
					echo "<option value='".$data['id']."' selected> ".$data['item_name']." </option>";
				}
			} else {
				echo "<option value='".$data['id']."'> ".$data['item_name']." </option>";
			}
		}
	}

	public function GetRateParty(){
		$party_id =  $this->input->post('party_group');
		$amc_contract_info_id =  $this->input->post('AMC_Ref_No');
		$amc_machine_id =  $this->input->post('ItemName');
		
		$data = $this->Admin_model->GetRateParty($party_id, $amc_contract_info_id, $amc_machine_id);
		if(!empty($data)){
			
			foreach ($data as $v) {
				$datas = array(
					'id' => $v['id'],
					'party_rate' => $v['party_rate'], 
					'gst' => $v['taxslab_name'],
					'required' => $v['required'],
				);	
			}
			echo json_encode($datas);
		}
	}

	public function AddSaleInvoice(){
		$sale_invoice = $this->input->post("sale_invoice");
		$sale_item = $this->input->post("sale_item");

		$data = $this->Admin_model->Add_sale_invoice($sale_invoice[0]);

		foreach ($sale_item as $k) {
			$datas = array(
				'sale_invoice_id' => $data,
				'item_id' => $k['item_id'], 
				'qty' => $k['qty'], 
				'rate' => $k['rate'], 
				'gst' => $k['gst'], 
				'gst_amt' => $k['gst_rate'], 
				'amt' => $k['amount'], 
			);
			$this->Admin_model->Add_sale_item($datas);
		}
	}	
	
	public function SaleInvoiceApprove($id){
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | Edit Sale Invoice";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Sale Invoice');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$GetMachine = $this->Admin_model->SaleInvoiceList($id);
		foreach ($GetMachine as $k) {
			$data['id'] = $k->id;
			$data['old_bill_no'] = $k->bill_no;
			$data['date'] = $k->date;
			$data['party_id'] = $k->party_id;
			$data['party_info_id'] = $k->party_info_id;
			$data['amc_contract_info'] = $k->amc_contract_info;		
			$data['total_basic_amt'] = $k->total_basic_amt;
			$data['total_gst_amt'] = $k->total_gst_amt;
			$data['total_net_amt'] = $k->total_net_amt;

			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);

			$data['ItemGroup'] = $this->Admin_model->CheckItemGroup($data['party_id'], $data['amc_contract_info']);
		}
		$data['GetSaleItem'] = $this->Admin_model->GetSaleItem($data['id']);
		$data['count'] = count($data['GetSaleItem']);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/SaleInvoiceEdit', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function SaleInvoiceView($id){
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | View Sale Invoice";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Sale Invoice');
		
		$data['view'] = "View";

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);

		$GetMachine = $this->Admin_model->SaleInvoiceList($id);
		foreach ($GetMachine as $k) {
			$data['id'] = $k->id;
			$data['old_bill_no'] = $k->bill_no;
			$data['date'] = $k->date;
			$data['party_id'] = $k->party_id;
			$data['party_info_id'] = $k->party_info_id;
			$data['amc_contract_info'] = $k->amc_contract_info;		
			$data['total_basic_amt'] = $k->total_basic_amt;
			$data['total_gst_amt'] = $k->total_gst_amt;
			$data['total_net_amt'] = $k->total_net_amt;

			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);

			$data['ItemGroup'] = $this->Admin_model->CheckItemGroup($data['party_id'], $data['amc_contract_info']);
		}
		$data['GetSaleItem'] = $this->Admin_model->GetSaleItem($data['id']);
		$data['count'] = count($data['GetSaleItem']);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/SaleInvoiceEdit', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function SaleInvoiceUp($id){
		$data = array('id' => $id, 'approve' => 1);

		$update = $this->Technical_model->SaleInvoiceUpdate($data);	
		redirect('Technical/SaleInvoice');
	}

	public function SaleInvoiceDecline(){
		$id = $this->input->post("id");
		$reason = $this->input->post("reason");

		$data = array('id' => $id, 'approve' => 2, 'decline_reason' => $reason);

		$update = $this->Technical_model->SaleInvoiceUpdate($data);	
	}
}