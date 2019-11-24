<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class API extends CI_Controller {
    public function __construct($config = 'rest')
    {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    parent::__construct();
    }
	public function Login()	{

		$phoneno = $_REQUEST['mobile_number'];
		$password = md5($_REQUEST['password']);
		
		$user = $this->Engineer_model->Login($phoneno, $password);

		if($user == null){
			$response["status"] = FALSE;
			$response["msg"] = "Login not SuccessFul \n\n Check Your Phone Number or Password";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Login SuccessFul";
			$response["engineer_data"] = $user;
		}	

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function Dashboard(){
		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);

		if(!empty($user)){

			$engineer_id = $user[0]['id'];	
			
			$date = date("m/d/Y");
			$TodayTicket = $this->Engineer_model->TodayTicket($engineer_id, $date);
			$PendingTicket = $this->Engineer_model->PendingTicket($engineer_id);
			$CompletedTickets = $this->Engineer_model->CompletedTickets($engineer_id);
			$ViewAllCallVisit = $this->Engineer_model->ViewAllCallVisit($engineer_id);
			$ViewSaleInvoice = $this->Engineer_model->ViewSaleInvoice($engineer_id);
			$ViewReceipt = $this->Engineer_model->ViewReceipt($engineer_id);
			
			$TodayTicket = count($TodayTicket);
			$PendingTicket = count($PendingTicket);
			$CompletedTickets = count($CompletedTickets);
			$ViewAllCallVisit = count($ViewAllCallVisit);
			$ViewSaleInvoice = count($ViewSaleInvoice);
			$ViewReceipt = count($ViewReceipt);

			$response["TodayTicket"] = $TodayTicket;
			$response["PendingTicket"] = $PendingTicket;
			$response["CompletedTickets"] = $CompletedTickets;
			$response["AllCallVisit"] = $ViewAllCallVisit;
			$response["SaleInvoice"] = $ViewSaleInvoice;
			$response["Receipt"] = $ViewReceipt;

		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function TodayTicket() {
		$phoneno = $_REQUEST['mobile_number'];
		$date = date("m/d/Y");

		$user = $this->Engineer_model->Login($phoneno, $password = null);
		$engineer_id = $user[0]['id'];

		$datas = $this->Engineer_model->TodayTicket($engineer_id, $date);

		if($datas == null){
			$response["status"] = FALSE;
			$response["msg"] = "Today Ticket is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Today Ticket is Available";
			$response["TodayTicket"] = $datas;
		}	

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function WorkingTicket(){

		$data = array(
			'id' => $_REQUEST['ticket_no'],
			'approve' => $_REQUEST['approve'],
		);

		$datas = $this->Engineer_model->WorkingTicket($data);
		
		if(!empty($datas)){
			$response["status"] = TRUE;
			$response["msg"] = "This Ticket Now Working Mode";	
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Ticket not Available";
		}	
		
		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function PendingTicket() {
		$phoneno = $_REQUEST['mobile_number'];

		$user = $this->Engineer_model->Login($phoneno, $password = null);
		$engineer_id = $user[0]['id'];


		$datas = $this->Engineer_model->PendingTicket($engineer_id);

		if($datas == null){
			$response["status"] = FALSE;
			$response["msg"] = "Pending Ticket is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Pending Ticket is Available";
			$response["PendingTicket"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function CompletedTickets() {
		$phoneno = $_REQUEST['mobile_number'];

		$user = $this->Engineer_model->Login($phoneno, $password = null);
		$engineer_id = $user[0]['id'];

		$datas = $this->Engineer_model->CompletedTickets($engineer_id);

		if($datas == null){
			$response["status"] = FALSE;
			$response["msg"] = "Completed Ticket is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Completed Ticket is Available";
			$response["CompletedTickets"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewCallVisit() {
		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];
			$datas = $this->Engineer_model->ViewCallVisit($engineer_id);

			if($datas == null){
				$response["status"] = FALSE;
				$response["msg"] = "Call Visit is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "CallVisit is Available";
				$response['CallVisitNo'] = $this->Admin_model->CallNo();
				$response["CallVisit"] = $datas;
			}
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewCallVisitById() {	
		$phoneno = $_REQUEST['mobile_number'];
		$id = $_REQUEST['id'];

		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];
			$datas = $this->Engineer_model->ViewCallVisitById($engineer_id, $id);

			if($datas == null){
				$response["status"] = FALSE;
				$response["msg"] = "Call Visit is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "CallVisit is Available";
				$response['CallVisitNo'] = $this->Admin_model->CallNo();
				$response["CallVisit"] = $datas;
			}
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ProblemInfo() {

		$datas = $this->Engineer_model->ProblemInfo($_REQUEST['item_info_id']);

		if($datas == null){
			$response["status"] = FALSE;
			$response["msg"] = "Problem Info is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Problem Info is Available";
			$response["ProblemInfo"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ProblemRec() {

		$datas = $this->Engineer_model->ProblemRec($_REQUEST['item_info_id']);

		if($datas == null){
			$response["status"] = FALSE;
			$response["msg"] = "Problem Rectification is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Problem Rectification is Available";
			$response["ProblemRec"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function AddCallVisit() {

		$data = array(
			'call_visit_no' => $_REQUEST['call_visit_no'],
			'ticket_info_id' => $_REQUEST['ticket_info_id'],
			'problem_info_id' => $_REQUEST['problem_info_id'],
			'problem_rectification_id' => $_REQUEST['problem_rectification_id'],
			'reported_date' => $_REQUEST['reported_date'],
			'reported_time' => $_REQUEST['reported_time'],
			'place' => $_REQUEST['place'],
			'call_status' => $_REQUEST['call_status'],
			'engineer_id' => $_REQUEST['engineer_id'],
			'approve' => $_REQUEST['approve'],
		);

		$CallVisitId = $this->Engineer_model->AddCallVisit($data);
		
		if($CallVisitId){
			$data_array = array( 'id' => $_REQUEST['ticket_info_id'], 'call_visit_id' => $CallVisitId);

			$datas = $this->Engineer_model->UpdateTicket($data_array);
			$response["status"] = TRUE;
			$response["msg"] = "Inserted Recode";

		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Not Inserted Recode";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewAllCallVisit() {

		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];
			$datas = $this->Engineer_model->ViewAllCallVisit($engineer_id);

			if($datas == null){
				$response["status"] = FALSE;
				$response["msg"] = "Call Visit is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "CallVisit is Available";
				$response["CallVisit"] = $datas;
			}
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function EditCallVisit() {
		$data = array(
			'id' => $_REQUEST['call_visit_id'],
			'ticket_info_id' => $_REQUEST['ticket_info_id'],
			'problem_info_id' => $_REQUEST['problem_info_id'],
			'problem_rectification_id' => $_REQUEST['problem_rectification_id'],
			'reported_date' => $_REQUEST['reported_date'],
			'reported_time' => $_REQUEST['reported_time'],
			'place' => $_REQUEST['place'],
			'call_status' => $_REQUEST['call_status'],
			'engineer_id' => $_REQUEST['engineer_id'],
			'approve' => $_REQUEST['approve'],
		);

		$CallVisitId = $this->Engineer_model->UpCallVisit($data);
		
		if(!empty($CallVisitId)){
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Updated";

		} else {
			$response["status"] = FALSE;
			$response["msg"] = " Recode Not Updated";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function DeleteCallVisit() {

		$CallVisitId = $this->Engineer_model->DeleteCallVisit($_REQUEST['call_visit_id']);

		if(!empty($CallVisitId)){
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Delete";

			$ticket_info = $this->Engineer_model->GetTicketInfo($_REQUEST['call_visit_id']);
			$datas = array('call_visit_id' => NULL);
			
			$up = $this->Engineer_model->UpTicketInfo($_REQUEST['call_visit_id'], $datas);

		} else {
			$response["status"] = FALSE;
			$response["msg"] = " Recode Not Delete";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function SaleInvoiceNo(){	

		$datas = $this->Engineer_model->CallNo();

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Sale Invoice No is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Sale Invoice No is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function PartyGroup(){

		$datas = $this->Engineer_model->GetParty($id = null);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Party Group is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Party Group No is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function SelectPartyName(){

		$datas = $this->Engineer_model->CheckParty($_REQUEST['PartyGroupId']);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Party Name is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Party Name is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function GetSerialNo(){
		$datas = $this->Admin_model->CheckMachineSerial($_REQUEST['PartyGroupId'],$_REQUEST['PartyNameId']);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Serial No is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Serial No is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function AMCContractRefNo(){
		$datas = $this->Engineer_model->CheckAmcContract($_REQUEST['PartyGroupId']);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "AMC Contract Ref No is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "AMC Contract Ref No is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function SelectItems(){
		
		$datas = $this->Engineer_model->CheckItemGroup($_REQUEST['PartyGroupId'], $_REQUEST['AMCRefNoid']);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Items is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Items is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function GetRate(){
		$datas = $this->Engineer_model->GetRateParty($_REQUEST['PartyGroupId'], $_REQUEST['AMCRefNoid'], $_REQUEST['ItemId']);
		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Rate is not Available";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Rate is Available";
			$response["SaleInvoice"] = $datas;
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function AddSaleInvoice(){
		$data = array(
			'bill_no' => $_REQUEST['SaleInvoiceNo'],
			'date' => $_REQUEST['date'], 
			'party_id' => $_REQUEST['party_group_id'],
			'party_info_id' => $_REQUEST['party_name_id'],
			'machine_serial_no' => $_REQUEST['machine_serial_no'],
			'amc_contract_info' => $_REQUEST['amc_contract_info'],
			'total_basic_amt' => $_REQUEST['total_basic_amt'],
			'total_net_amt' => $_REQUEST['total_net_amt'],
			'engineer_id' => $_REQUEST['engineer_id'],
		);
	 	$json_decode = json_decode($_REQUEST['ItemList'], true);


	 	$sale_invoice_id = $this->Engineer_model->Add_sale_invoice($data);
	 	
		if($sale_invoice_id){
			$json_decode['sale_invoice_id'] = $sale_invoice_id;

			$this->Engineer_model->Add_sale_item($json_decode);
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Inserted";
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not Inserted";
		}
	 	
	 	$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewSaleInvoice(){
		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];
			$datas = $this->Engineer_model->ViewSaleInvoice($engineer_id);

			if($datas == null){
				$response["status"] = FALSE;
				$response["msg"] = "Sale Invoice is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "Sale Invoice is Available";
				$response["CallVisit"] = $datas;
			}
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewSaleInvoiceById(){
		$phoneno = $_REQUEST['mobile_number'];
		$id = $_REQUEST['id'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];
			$datas = $this->Engineer_model->ViewSaleInvoiceById($engineer_id, $id);

			if($datas == null){
				$response["status"] = FALSE;
				$response["msg"] = "Sale Invoice is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "Sale Invoice is Available";
				$response["CallVisit"] = $datas;
			}
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function EditSaleInvoice(){
		$data = array(
			'id' => $_REQUEST['sale_id'],
			'date' => $_REQUEST['date'], 
			'party_id' => $_REQUEST['party_group_id'],
			'party_info_id' => $_REQUEST['party_name_id'],
			'machine_serial_no' => $_REQUEST['machine_serial_no'],
			'amc_contract_info' => $_REQUEST['amc_contract_info'],
			'total_basic_amt' => $_REQUEST['total_basic_amt'],
			'total_net_amt' => $_REQUEST['total_net_amt'],
		);
	 	$json_decode = json_decode($_REQUEST['ItemList'], true);
		//$json_decode = $_REQUEST['ItemList'];

		$GetSaleItem = $this->Admin_model->GetSaleItem($_REQUEST['sale_id']);
		foreach ($GetSaleItem as $v) {
			$old_ids[] = $v['id']; // Old Id
		}
		foreach ($json_decode as $k) { 
			if(!empty($k['id'])){
				$new_id[] = $k['id']; //  Get New id
			}
		}
		$datele_rc =  array_diff($old_ids, $new_id); 
		foreach ($datele_rc as $del_id) {
	        $del = $this->Admin_model->DelSaleInvoices($del_id); // Delete Id
	    }

	 	$sale_invoice_id = $this->Engineer_model->up_sale_invoice($data);
	 	
		foreach ($json_decode as $sale_item) {
			if($sale_item['id'] == ''){					
				$insert = array(
					'sale_invoice_id' => $_REQUEST['sale_id'],
					'item_id' => $sale_item['item_id'],
					'qty' => $sale_item['qty'], 
					'rate' => $sale_item['rate'], 
					'gst' => $sale_item['gst'],  
					'amt' => $sale_item['amt'], 
				);	
				$this->Admin_model->Add_sale_item($insert);
				$status = TRUE;
			} else {	
				$update = array(
					'sale_invoice_id' => $_REQUEST['sale_id'],
					'id' => $sale_item['id'],
 					'item_id' => $sale_item['item_id'],
					'qty' => $sale_item['qty'], 
					'rate' => $sale_item['rate'], 
					'gst' => $sale_item['gst'], 
					'amt' => $sale_item['amt'], 
				);
				$this->Admin_model->UpSaleItem($update);
				$status = TRUE;
			}
		}
		if($status == TRUE){
			$response["status"] = TRUE;
			$response["msg"] = "Recode is updated";
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not updated";
		}
	 
	 	$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function DelSaleInvoice(){
		$dal = $this->Engineer_model->Del_sale_item($_REQUEST['sale_id']);
		$dalete = $this->Engineer_model->SaleInvoiceDelete($_REQUEST['sale_id']);

		if($dalete){
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Deleted";
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not Deleted";
		}
	}

	public function ReceiptNo(){
		
		$data = $this->Engineer_model->ReceiptNo();

		$response["status"] = TRUE;
		$response["msg"] = "Receipt No";
		$response["data"] = $data; 

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function CheckBill(){

		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);
		if(!empty($user)){
			
			$engineer_id = $user[0]['id'];	
			
			$data = $this->Admin_model->CheckBill($_REQUEST['PartyGroupId'], $_REQUEST['AMCRefNoid'], $engineer_id);

			if(empty($data)){
				$response["status"] = FALSE;
				$response["msg"] = "Bill is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "Bill is Available";
				$response["SaleInvoice"] = $data;
			}			

		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function AddReceipt(){
		
		if(!empty($_REQUEST['payment_date'])){
			$payment_date = $_REQUEST['payment_date'];
		} else {
			$payment_date = '';
		}

		$data = array(
			'receipt_no' => $_REQUEST['receipt_no'],
			'date' => $_REQUEST['date'],
			'party_id' => $_REQUEST['PartyGroupId'],
			'party_info_id' => $_REQUEST['party_name_id'],
			'amc_contract_info' => $_REQUEST['AMCRefNoid'],
			'due_bills' => $_REQUEST['due_bills'],
			'receipt_amt' => $_REQUEST['receipt_amt'],
			'payment_mode' => $_REQUEST['payment_mode'],
			'remark' => $_REQUEST['remark'],
			'payment_date' => $payment_date,
			'engineer_id' => $_REQUEST['engineer_id'],
		);

		$datas = $this->Engineer_model->AddReceipt($data);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not Add";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Add";
		}	

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewReceipt(){
		$phoneno = $_REQUEST['mobile_number'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);

		if(!empty($user)){

			$engineer_id = $user[0]['id'];	
			
			$data = $this->Engineer_model->ViewReceipt($engineer_id);	

			if($data == ''){
				$response["status"] = FALSE;
				$response["msg"] = "Receipt is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "Receipt is Available";
				$response["Receipt"] = $data;
			}			

		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function ViewReceiptById(){
		$phoneno = $_REQUEST['mobile_number'];
		$id = $_REQUEST['id'];
		$user = $this->Engineer_model->Login($phoneno, $password = null);

		if(!empty($user)){

			$engineer_id = $user[0]['id'];	
			
			$data = $this->Engineer_model->ViewReceiptById($engineer_id, $id);	


			if($data == ''){
				$response["status"] = FALSE;
				$response["msg"] = "Receipt is not Available";
			}else{
				$response["status"] = TRUE;
				$response["msg"] = "Receipt is Available";
				$response["Receipt"] = $data;
			}			

		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Engineer is not Found";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function UpReceipt(){
		if(isset($_REQUEST['payment_date'])){
			$payment_date = $_REQUEST['payment_date'];
		} else {
			$payment_date = '';
		}

		$data = array(
			'id' => $_REQUEST['receipt_id'],
			'date' => $_REQUEST['date'],
			'party_id' => $_REQUEST['PartyGroupId'],
			'party_info_id' => $_REQUEST['party_name_id'],
			'amc_contract_info' => $_REQUEST['AMCRefNoid'],
			'due_bills' => $_REQUEST['due_bills'],
			'receipt_amt' => $_REQUEST['receipt_amt'],
			'payment_mode' => $_REQUEST['payment_mode'],
			'remark' => $_REQUEST['remark'],
			'payment_date' => $payment_date,
		);	

		$datas = $this->Engineer_model->UpReceipt($data);

		if(empty($datas)){
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not Update";
		}else{
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Update";
		}	

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function DelReceipt(){

		$dalete = $this->Engineer_model->DelReceipt($_REQUEST['receipt_id']);

		if($dalete){
			$response["status"] = TRUE;
			$response["msg"] = "Recode is Deleted";
		} else {
			$response["status"] = FALSE;
			$response["msg"] = "Recode is Not Deleted";
		}

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}

	public function CallVisitNo(){

		$response["status"] = TRUE;
		$response["msg"] = "Call Visit No";
		$response['CallVisitNo'] = $this->Admin_model->CallNo();

		$json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
	}
}	