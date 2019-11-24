<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaleInvoice extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Sale Invoice');

		$data['data'] = $this->Admin_model->SaleInvoiceList($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/SaleInvoiceList', $data);
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
		$MachineSerialNo = $this->input->post("MachineSerialNo");
		$MachineSerialNo = str_replace("  ",",",$MachineSerialNo);

		foreach ($sale_invoice as $k) {
			$bill_no = $k['bill_no'];
			$date = $k['date'];
			$party_id = $k['party_id'];
			$party_info_id = $k['party_info_id'];
			$machine_serial_no = implode(", ", $k['machine_serial_no']);
			$amc_contract_info = $k['amc_contract_info'];
			$total_basic_amt = $k['total_basic_amt'];
			$total_gst_amt = $k['total_gst_amt'];
			$total_net_amt = $k['total_net_amt'];
			$approve = $k['approve'];
		}	

		$sale_invoice_data = array(
			'bill_no' => $bill_no,
			'date' => $date,
			'party_id' => $party_id,
			'party_info_id' => $party_info_id,
			'machine_serial_no' => $machine_serial_no,
			'amc_contract_info' => $amc_contract_info,
			'total_basic_amt' => $total_basic_amt,
			'total_gst_amt' => $total_gst_amt,
			'total_net_amt' => $total_net_amt,
			'approve' => $approve,
		);

		$data = $this->Admin_model->Add_sale_invoice($sale_invoice_data);

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

		$sale_invoice_no = urlencode($bill_no);
		$machine_serial_no = $MachineSerialNo;
		$total = urlencode($total_net_amt);

		$party_info = $this->Admin_model->GetPartyInfo($party_info_id);
		$content_no = urlencode($party_info[0]['mobile_1']);
		$admin_content_no = urlencode($this->session->userdata('cmp_mobile'));

		$smscontent = 'Your Create Sale Invoice No '.$sale_invoice_no.' On '.$date.' Machine Serial No is'.$machine_serial_no.' Net Amount is '.$total.'.';
		$smscontent1 = 'Create Sale Invoice No '.$sale_invoice_no.' On '.$date.' Machine Serial No is'.$machine_serial_no.' Net Amount is '.$total.'.';
		
		$API1 = $this->Admin_model->SMSAPI($content_no, $smscontent);
		$API2 = $this->Admin_model->SMSAPI($admin_content_no, $smscontent1);
	}	

	public function SaleInvoiceAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Machine Details";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Sale Invoice');

		$data['BillNo'] = $this->Admin_model->BillNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroups();
		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);
		

		$this->form_validation->set_rules('party_group', 'Party Group', 'trim|required|xss_clean');
		$this->form_validation->set_rules('party_names', 'Party Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('AMC_Ref_No', 'AMC Ref No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Equipment_type[]', 'Equipment type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('company_name[]', 'Company Name', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$count = count($this->input->post("Equipment_type[]"));
       		if($count > 0)  
	        { 
	            $amc_machine = array(
	            	'party_id' => $this->input->post("party_group"), 
	            	'party_info_id' => $this->input->post("party_names"),
	            	'amc_contract_information_id' => $this->input->post("AMC_Ref_No"),
	            );
	            $amc_machine_details = $this->Admin_model->AddMachine($amc_machine);

	            for($i=0; $i<$count; $i++)  
	            {
	            	if(!empty($_POST["in_warranty"][$i])){
		            	$in_warranty = 1; 	
	            	} else {
	            		$in_warranty = 0;
	            	}

	            	$data_amc_machine = array(
	            		'amc_machine_details_id' => $amc_machine_details,
	            		'item_group_id' => $_POST["Equipment_type"][$i],
	            		'item_company_id' => $_POST["company_name"][$i],
	            		'model_no' => $_POST["model_no"][$i],
	            		'serial_no' => $_POST["serial_no"][$i],
	            		'in_warrenty' => $in_warranty,
	            	);
	            	$amcAdd = $this->Admin_model->AddMachineDetail($data_amc_machine);
	            }
	        }    
        	redirect('Admin/MachineDetails');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/SaleInvoiceAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function SaleInvoiceEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Machine Details";
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
			$data['MachineSerial'] = explode(", ", $k->machine_serial_no);
			$data['amc_contract_info'] = $k->amc_contract_info;		
			$data['total_basic_amt'] = $k->total_basic_amt;
			$data['total_gst_amt'] = $k->total_gst_amt;
			$data['total_net_amt'] = $k->total_net_amt;
			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);
			$data['machine_serial_no'] = $this->Admin_model->CheckMachineSerial($data['party_id'],$data['party_info_id']);
			$data['ItemGroup'] = $this->Admin_model->CheckItemGroup($data['party_id'], $data['amc_contract_info']);
			
		}

		$data['GetSaleItem'] = $this->Admin_model->GetSaleItem($id);
		$data['count'] = count($data['GetSaleItem']);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/SaleInvoiceAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function SaleInvoiceUp(){
		$sale_invoice = $this->input->post("sale_invoice");
		$sale_item = $this->input->post("sale_item");
		$Ids = $this->input->post("Ids");
		$id = $sale_invoice[0]['id'];
		
		
		$GetSaleItem = $this->Admin_model->GetSaleItem($id);
		foreach ($GetSaleItem as $v) {
			$old_ids[] = $v['id']; 
		}

		$datele_rc =  array_diff($old_ids, $Ids);

		foreach ($sale_invoice as $k) {
			$bill_no = $k['bill_no'];
			$date = $k['date'];
			$party_id = $k['party_id'];
			$party_info_id = $k['party_info_id'];
			$machine_serial_no = implode(", ", $k['machine_serial_no']);
			$amc_contract_info = $k['amc_contract_info'];
			$total_basic_amt = $k['total_basic_amt'];
			$total_gst_amt = $k['total_gst_amt'];
			$total_net_amt = $k['total_net_amt'];
			$approve = $k['approve'];
		}	

		$sale_invoice_data = array(
			'id' => $id,
			'bill_no' => $bill_no,
			'date' => $date,
			'party_id' => $party_id,
			'party_info_id' => $party_info_id,
			'machine_serial_no' => $machine_serial_no,
			'amc_contract_info' => $amc_contract_info,
			'total_basic_amt' => $total_basic_amt,
			'total_gst_amt' => $total_gst_amt,
			'total_net_amt' => $total_net_amt,
			'approve' => $approve,
		);
		
		//$data = $this->Admin_model->up_sale_invoice($sale_invoice_data);

		foreach ($sale_item as $k) {
			
			if($k['id'] == 0){
				$insert = array(
					'sale_invoice_id' => $id,
					'item_id' => $k['item_id'],
					'qty' => $k['qty'], 
					'rate' => $k['rate'], 
					'gst' => $k['gst'], 
					'gst_amt' => $k['gst_rate'], 
					'amt' => $k['amount'], 
				);
				$this->Admin_model->Add_sale_item($insert);

			} else {
				$update = array(
					'id' => $k['id'],
					'sale_invoice_id' => $id,
					'item_id' => $k['item_id'],
					'qty' => $k['qty'], 
					'rate' => $k['rate'], 
					'gst' => $k['gst'], 
					'gst_amt' => $k['gst_rate'], 
					'amt' => $k['amount'], 
				);
				$this->Admin_model->UpSaleItem($update);
			}
		}

		foreach ($datele_rc as $k) {
	        $del = $this->Admin_model->DelSaleInvoices($k);
	    }
	}

	public function SaleInvoiceDelete($id){
		$DeteleSetting = $this->Admin_model->SaleInvoiceDelete($id);
		$Detele = $this->Admin_model->DeleteSaleInvoice($id);	
		redirect('Admin/SaleInvoice');
	}

	
	
}