<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function CallVisitReport()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReport";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Call Visit Report');

		$data['datas'] = $this->Admin_model->GetTicketInfo1($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReportCallVisitReportList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CallVisitReportPrint($id)
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReportPrint";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Call Visit Report');

		$data['id'] = $id;

		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		$data['datas'] = $this->Admin_model->GetTicketInfo($id);
		$data['SaleInvoice'] = $this->Admin_model->GetSaleInvoice($id);

		$SaleInvoice_id = $data['SaleInvoice'][0]['id'];

		$pro_info_data = explode(", ", $data['SaleInvoice'][0]['problem_info_id']);
		foreach ($pro_info_data as $k) {
			$Getproblem_info = $this->Admin_model->Getproblem_info($k);
			$info[] = $Getproblem_info[0]['problem_info'];
		}
		$data['Getproblem_info'] = implode(", ", $info);
		
		
		$pro_info_rec_data = explode(", ", $data['SaleInvoice'][0]['problem_rectification_id']);
		
		foreach ($pro_info_rec_data as $k) {
			$Getproblem_info = $this->Admin_model->GetProblemRectificationInfo($k);
			$infos[] = $Getproblem_info[0]['problem_rectification_info'];
		}
		$data['pro_info_rec_data'] = implode(", ", $infos);

		$party_id = $data['datas'][0]['party_id'];
		$amc_machine = $data['datas'][0]['amc_machine_id'];
		$item_id = $data['datas'][0]['item_info_id'];

		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['GetMachine'] = $this->Admin_model->GetMachiness($amc_machine);
		$data['Item'] = $this->Admin_model->GetItemGroup($item_id);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReportCallVisitReportPrint', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CallVisitReportPrint1($id)
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReportPrint";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Call Visit Report');

		$data['id'] = $id;

		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		$data['datas'] = $this->Admin_model->GetTicketInfo($id);
		$data['SaleInvoice'] = $this->Admin_model->GetSaleInvoice($id);

		$SaleInvoice_id = $data['SaleInvoice'][0]['id'];

		$pro_info_data = explode(", ", $data['SaleInvoice'][0]['problem_info_id']);
		foreach ($pro_info_data as $k) {
			$Getproblem_info = $this->Admin_model->Getproblem_info($k);
			$info[] = $Getproblem_info[0]['problem_info'];
		}
		$data['Getproblem_info'] = implode(", ", $info);
		
		
		$pro_info_rec_data = explode(", ", $data['SaleInvoice'][0]['problem_rectification_id']);
		
		foreach ($pro_info_rec_data as $k) {
			$Getproblem_info = $this->Admin_model->GetProblemRectificationInfo($k);
			$infos[] = $Getproblem_info[0]['problem_rectification_info'];
		}
		$data['pro_info_rec_data'] = implode(", ", $infos);

		$party_id = $data['datas'][0]['party_id'];
		$amc_machine = $data['datas'][0]['amc_machine_id'];
		$item_id = $data['datas'][0]['item_info_id'];

		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['GetMachine'] = $this->Admin_model->GetMachiness($amc_machine);
		$data['Item'] = $this->Admin_model->GetItemGroup($item_id);

		$this->load->view('Admin/ReportCallVisitReportPrint1', $data);
	}

	public function InvoiceReport(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReport";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Invoice Report');

		$data['data'] = $this->Admin_model->SaleInvoiceList($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReportSaleInvoice', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function InvoiceReportPrint($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReport";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Invoice Report');

		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		

		$GetMachine = $this->Admin_model->SaleInvoiceList($id);
		
		$MachineSerial= explode(", ", $GetMachine[0]->machine_serial_no);
		foreach ($MachineSerial as $k) {
			$Serial = $this->Admin_model->SerialNo($k);
			$SerialNo[] = $Serial[0];
		}
		foreach ($SerialNo as $k) {
			$SerialNum[] = $k['serial_no'];
		}
		$data['SerialNum'] = implode(", ", $SerialNum);

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
			$data['PartyGroup'] = $this->Admin_model->GetParty($ids = $data['party_id']);
			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);

			$data['machine_serial_no'] = $this->Admin_model->CheckMachineSerial($data['party_id'],$data['party_info_id']);
			$data['ItemGroup'] = $this->Admin_model->CheckItemGroup($data['party_id'], $data['amc_contract_info']);		
		}

		$data['GetSaleItem'] = $this->Admin_model->GetSaleItem($data['id']);
		$data['count'] = count($data['GetSaleItem']);

		   $number = $data['total_net_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		  
		  if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}

		  $data['bill_words'] = $result;

		  $number = $data['total_gst_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		 	
		 	if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}
		  $data['gst_words'] = $result;

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReportSaleInvoicePrint', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function InvoiceReportPrint1($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | CallVisitReport";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Invoice Report');

		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		

		$GetMachine = $this->Admin_model->SaleInvoiceList($id);
		
		$MachineSerial= explode(", ", $GetMachine[0]->machine_serial_no);
		foreach ($MachineSerial as $k) {
			$Serial = $this->Admin_model->SerialNo($k);
			$SerialNo[] = $Serial[0];
		}
		foreach ($SerialNo as $k) {
			$SerialNum[] = $k['serial_no'];
		}
		$data['SerialNum'] = implode(", ", $SerialNum);

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
			$data['PartyGroup'] = $this->Admin_model->GetParty($ids = $data['party_id']);
			$data['CheckParty'] = $this->Admin_model->CheckParty($data['party_id']);
			$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($data['party_id']);

			$data['machine_serial_no'] = $this->Admin_model->CheckMachineSerial($data['party_id'],$data['party_info_id']);
			$data['ItemGroup'] = $this->Admin_model->CheckItemGroup($data['party_id'], $data['amc_contract_info']);		
		}

		$data['GetSaleItem'] = $this->Admin_model->GetSaleItem($data['id']);
		$data['count'] = count($data['GetSaleItem']);

		   $number = $data['total_net_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		    $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		  
		  if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}

		  $data['bill_words'] = $result;

		  $number = $data['total_gst_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		    $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		 	
		 	if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}
		  $data['gst_words'] = $result;

		$this->load->view('Admin/ReportSaleInvoicePrint1', $data);
	}

	public function ReceiptReport(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Receipt Report";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Receipt Report');

		$data['datas'] = $this->Admin_model->GetReceiptInfo($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReceiptReport', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ReceiptReportPrint($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Receipt Report";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Receipt Report');
		
		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetReceiptInfo($id);

		$data['id'] = $data['datas'][0]['id'];
		$SelectBill = explode(", ", $data['datas'][0]['due_bills']);

		foreach ($SelectBill as $k) {
			$SelectBills[] = $this->Admin_model->CheckBills($k);
		} 

		foreach ($SelectBills as $k) {
			$Select[] = "Bill No.".$k[0]['bill_no']." (Rs.".$k[0]['total_net_amt'].")";
		}

		$data['SelectBills'] = $Select;
		
		$party_id = $data['datas'][0]['party_id'];
		$party_info_id = $data['datas'][0]['party_info_id'];
		$amc_contract_info = $data['datas'][0]['amc_contract_info'];
		
		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$total = $this->Admin_model->CheckTotalBill($party_id, $amc_contract_info);
		$data['TotalBill'] =  "Outstanding Amount ( RS. ".$total[0]['total_net_amt'] .") ";

		$data['SaleInvoices'] = $this->Admin_model->GetSaleInvoices($party_id, $party_info_id, $amc_contract_info);

		
		 $number = $data['datas'][0]['receipt_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		    $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		  if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}
		  $data['receipt_amt_words'] = $result;

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ReceiptReportPrint', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ReceiptReportPrint1($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Receipt Report";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Receipt Report');
		
		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetReceiptInfo($id);

		$data['id'] = $data['datas'][0]['id'];
		$SelectBill = explode(", ", $data['datas'][0]['due_bills']);

		foreach ($SelectBill as $k) {
			$SelectBills[] = $this->Admin_model->CheckBills($k);
		} 

		foreach ($SelectBills as $k) {
			$Select[] = "Bill No.".$k[0]['bill_no']." (Rs.".$k[0]['total_net_amt'].")";
		}

		$data['SelectBills'] = $Select;
		
		$party_id = $data['datas'][0]['party_id'];
		$party_info_id = $data['datas'][0]['party_info_id'];
		$amc_contract_info = $data['datas'][0]['amc_contract_info'];
		
		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$total = $this->Admin_model->CheckTotalBill($party_id, $amc_contract_info);
		$data['TotalBill'] =  "Outstanding Amount ( RS. ".$total[0]['total_net_amt'] .") ";

		$data['SaleInvoices'] = $this->Admin_model->GetSaleInvoices($party_id, $party_info_id, $amc_contract_info);

		
		 $number = $data['datas'][0]['receipt_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		  if($points == null){
		 		$result = " Rupees ". $result;
		 	} else {
		 		$result = " Rupees ". $result . " AND Piasa " .$points;
		 	}
		  $data['receipt_amt_words'] = $result;

		$this->load->view('Admin/ReceiptReportPrint1', $data);
	}

	public function ReceiptReportPrintPDF($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Receipt Report";
		$this->session->set_userdata('topmenu', 'Report');
		$this->session->set_userdata('submenu', 'Receipt Report');
		
		$GetCmpInfo = $this->Admin_model->GetCmpInfo();
		$data['GetCmpInfo'] = $GetCmpInfo[0];

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetReceiptInfo($id);

		$data['id'] = $data['datas'][0]['id'];
		$SelectBill = explode(", ", $data['datas'][0]['due_bills']);

		foreach ($SelectBill as $k) {
			$SelectBills[] = $this->Admin_model->CheckBills($k);
		} 

		foreach ($SelectBills as $k) {
			$Select[] = "Bill No.".$k[0]['bill_no']." (Rs.".$k[0]['total_net_amt'].")";
		}

		$data['SelectBills'] = $Select;
		$party_id = $data['datas'][0]['party_id'];
		$party_info_id = $data['datas'][0]['party_info_id'];
		$amc_contract_info = $data['datas'][0]['amc_contract_info'];
		
		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$total = $this->Admin_model->CheckTotalBill($party_id, $amc_contract_info);
		$data['TotalBill'] =  "Outstanding Amount ( RS. ".$total[0]['total_net_amt'] .") ";

		$data['SaleInvoices'] = $this->Admin_model->GetSaleInvoices($party_id, $party_info_id, $amc_contract_info);

		
		 $number = $data['datas'][0]['receipt_amt'];
		   $no = floor($number);
		   $point = round($number - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		    $words = array('0' => '', '1' => 'One', '2' => 'Two',
		    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
		    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
		    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
		    '13' => 'Thirteen', '14' => 'Fourteen',
		    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
		    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
		    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
		    '60' => 'Sixty', '70' => 'Seventy',
		    '80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
		     $divider = ($i == 2) ? 10 : 100;
		     $number = floor($no % $divider);
		     $no = floor($no / $divider);
		     $i += ($divider == 10) ? 1 : 2;
		     if ($number) {
		        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		        $str [] = ($number < 21) ? $words[$number] .
		            " " . $digits[$counter] . $plural . " " . $hundred
		            :
		            $words[floor($number / 10) * 10]
		            . " " . $words[$number % 10] . " "
		            . $digits[$counter] . $plural . " " . $hundred;
		     } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
		    "." . $words[$point / 10] . " " . 
		          $words[$point = $point % 10] : '';
		  $result = $result . "Rupees " .$points;
		  $data['receipt_amt_words'] = $result;

		$data['pdf'] = "pdf";

		$this->load->view('Admin/ReceiptReportPrint1', $data);
	}
}