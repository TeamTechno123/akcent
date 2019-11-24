<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceiptInfo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Receipt Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Receipt Info');

		$data['datas'] = $this->Admin_model->GetReceiptInfo($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReceiptInfoList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CheckBill(){
		$partyGroup = $this->input->post("partyGroup");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");

		$data = $this->Admin_model->CheckBill($partyGroup, $AMC_Ref_No);
		

		if(!empty($data)){
			echo "<option value=''> Select </option>";
			foreach ($data as $data) {
				echo "<option value=".$data['id']."> ".$data['bill_no']." ( RS.".$data['total_net_amt']." ) </option>";
			}			
		} else {
			echo "<option value=''> Select </option>";
		}
		
	}

	public function CheckTotalBill(){
		$partyGroup = $this->input->post("partyGroup");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");

		$total = $this->Admin_model->CheckTotalBill($partyGroup, $AMC_Ref_No);
		if(!empty($total[0]['total_net_amt'])){
			echo "Outstanding Amount ( RS. ".$total[0]['total_net_amt'] .") ";
		}
	}

	public function CheckSelectBill(){
		$due_bills = $this->input->post("due_bills");

		if(!empty($due_bills)){

			$List = implode(', ',array_map('intval', $due_bills)); 
			$total = $this->Admin_model->CheckSelectBill($List);
			
			if(!empty($total[0]['sum_total'])){
				echo $total[0]['sum_total'];
			}
		}
	}

	public function ReceiptInfoAdd(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Receipt Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Receipt Info');

		$data['ReceiptNo'] = $this->Admin_model->ReceiptNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReceiptInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AddReceiptInfo(){
		$receipt_no = $this->input->post("receipt_no");
		$date = $this->input->post("date");
		$party_group = $this->input->post("party_group");
		$party_names = $this->input->post("party_names");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");
		$due_bills = $this->input->post("due_bills");
		
		$due_bills = implode(", ", $due_bills);

		$receipt_amt = $this->input->post("receipt_amt");
		$payment = $this->input->post("payment");
		$remarks = $this->input->post("remarks");
		$cheque_date = $this->input->post("cheque_date");

		$data = array(
			'receipt_no' => $receipt_no,
			'date' => $date,
			'party_id' => $party_group,
			'party_info_id' => $party_names,
			'amc_contract_info' => $AMC_Ref_No,
			'due_bills' => $due_bills,
			'receipt_amt' => $receipt_amt,
			'payment_mode' => $payment,
			'remark' => $remarks,
			'payment_date' => $cheque_date,
		);

		$insert = $this->Admin_model->AddReceiptInfo($data);

		if($payment == 1){
			$details = "Payment On Cash And Remarks is:".$remarks.".";
		}
		if($payment == 2){
			$details = "Payment On Cheque And Cheque No.:".$remarks." And Date is ".$cheque_date.".";
		}
		if($payment == 3){
			$details = "Payment On Online Transfer And Translate Id:".$remarks." And Date is ".$cheque_date.".";
		}

		$admin_content_no = urlencode($this->session->userdata('cmp_mobile'));
		$party_info = $this->Admin_model->GetPartyInfo($party_names);
		$content_no = urlencode($party_info[0]['mobile_1']);
		
		$smscontent = 'Your Create Receipt No '.$receipt_no.' On '.$date.' Receipt Amount is '.$receipt_amt.' Amd '.$details;
		$smscontent1 = 'Create Receipt No '.$receipt_no.' On '.$date.' Receipt Amount is '.$receipt_amt.' Amd '.$details;

		$API1 = $this->Admin_model->SMSAPI($content_no, $smscontent);
		$API2 = $this->Admin_model->SMSAPI($admin_content_no, $smscontent1);

		redirect('Admin/ReceiptInfo');
	}
	
	public function ReceiptInfoEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Receipt Info";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Receipt Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetReceiptInfo($id);

		$data['id'] = $data['datas'][0]['id'];
		$data['SelectBill'] = explode(", ", $data['datas'][0]['due_bills']); 
		
		$party_id = $data['datas'][0]['party_id'];
		$party_info_id = $data['datas'][0]['party_info_id'];
		$amc_contract_info = $data['datas'][0]['amc_contract_info'];
		
		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$total = $this->Admin_model->CheckTotalBill($party_id, $amc_contract_info);
		$data['TotalBill'] =  "Outstanding Amount ( RS. ".$total[0]['total_net_amt'] .") ";

		$data['SaleInvoices'] = $this->Admin_model->GetSaleInvoices($party_id, $party_info_id, $amc_contract_info);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReceiptInfoAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function UpReceiptInfo(){
		$id = $this->input->post("id");
		$receipt_no = $this->input->post("receipt_no");
		$date = $this->input->post("date");
		$party_group = $this->input->post("party_group");
		$party_names = $this->input->post("party_names");
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");
		$due_bills = $this->input->post("due_bills");
		
		$due_bills = implode(", ", $due_bills);

		$receipt_amt = $this->input->post("receipt_amt");
		$payment = $this->input->post("payment");
		$remarks = $this->input->post("remarks");
		$cheque_date = $this->input->post("cheque_date");

		$data = array(
			'id' => $id,
			'receipt_no' => $receipt_no,
			'date' => $date,
			'party_id' => $party_group,
			'party_info_id' => $party_names,
			'amc_contract_info' => $AMC_Ref_No,
			'due_bills' => $due_bills,
			'receipt_amt' => $receipt_amt,
			'payment_mode' => $payment,
			'remark' => $remarks,
			'payment_date' => $cheque_date,
		);

		$insert = $this->Admin_model->UpReceiptInfo($data);
	}

	public function ReceiptInfoDelete($id){
		$DeteleSetting = $this->Admin_model->ReceiptInfoDelete($id);

		redirect('Admin/ReceiptInfo');
	}
	
}