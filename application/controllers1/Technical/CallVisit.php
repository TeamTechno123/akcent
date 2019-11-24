<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallVisit extends CI_Controller {

	public function index()	{
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | View Call Visit";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Approve Call Visit');


		$party_id = $this->session->userdata('party_id');

		$data['datas'] = $this->Technical_model->GetSaleInvoice($party_id);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/ViewCallVisit', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function CallVisitEdit($id)	{
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | View Call Visit";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Approve Call Visit');

		$data['CallNo'] = $this->Admin_model->CallNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetTicketInfo($id);
		$data['SaleInvoice'] = $this->Admin_model->GetSaleInvoice($id);

		$SaleInvoice_id = $data['SaleInvoice'][0]['id'];

		$data['pro_info_data'] = explode(", ", $data['SaleInvoice'][0]['problem_info_id']);
		$data['pro_info_count'] = count($data['pro_info_data']);
		
		$data['pro_info_rec_data'] = explode(", ", $data['SaleInvoice'][0]['problem_rectification_id']);
		$data['pro_info_rec_count'] = count($data['pro_info_rec_data']);

		$data['id'] = $data['datas'][0]['id'];
		$party_id = $data['datas'][0]['party_id'];
		$amc_machine = $data['datas'][0]['amc_machine_id'];
		$item_id = $data['datas'][0]['item_info_id'];
		$engineer_id = $data['datas'][0]['engineer_id'];

		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$data['GetMachine'] = $this->Admin_model->GetMachiness($amc_machine);
		$data['Item'] = $this->Admin_model->GetItemGroup($item_id);
		$data['pro_info'] = $this->Admin_model->CheckPro($item_id);
		$data['pro_info_rec'] = $this->Admin_model->CheckProRec($item_id);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/EditCallVisit', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function CallVisitView($id)	{
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | View Call Visit";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Approve Call Visit');

		$data['view'] = "View";

		$data['CallNo'] = $this->Admin_model->CallNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetTicketInfo($id);
		$data['SaleInvoice'] = $this->Admin_model->GetSaleInvoice($id);

		$SaleInvoice_id = $data['SaleInvoice'][0]['id'];

		$data['pro_info_data'] = explode(", ", $data['SaleInvoice'][0]['problem_info_id']);
		$data['pro_info_count'] = count($data['pro_info_data']);
		
		$data['pro_info_rec_data'] = explode(", ", $data['SaleInvoice'][0]['problem_rectification_id']);
		$data['pro_info_rec_count'] = count($data['pro_info_rec_data']);

		$data['id'] = $data['datas'][0]['id'];
		$party_id = $data['datas'][0]['party_id'];
		$amc_machine = $data['datas'][0]['amc_machine_id'];
		$item_id = $data['datas'][0]['item_info_id'];
		$engineer_id = $data['datas'][0]['engineer_id'];

		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$data['GetMachine'] = $this->Admin_model->GetMachiness($amc_machine);
		$data['Item'] = $this->Admin_model->GetItemGroup($item_id);
		$data['pro_info'] = $this->Admin_model->CheckPro($item_id);
		$data['pro_info_rec'] = $this->Admin_model->CheckProRec($item_id);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/EditCallVisit', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function CallVisitUpdate($id){
		$data = array('ticket_info_id' => $id, 'approve' => 1);
		$update = $this->Technical_model->CallVisitUpdate($data);	

		$ViewCallVisit = $this->Admin_model->ViewCallVisit($id);
		$technical_data = $this->Admin_model->GetTechnicalUser($this->session->userdata('technical_id'));	

		$call_visit_no = $ViewCallVisit[0]['call_visit_no'];
		$data = date("d-m-Y");
		$technical_user_name = urlencode($technical_data[0]['name']);
		$technical_user_no = urlencode($technical_data[0]['mobile_no']);

		$party_no = $ViewCallVisit[0]['mobile_1'];
		$e_mobile_no = $ViewCallVisit[0]['e_mobile_no'];

		$smscontent = 'Your Call Visit no '.$call_visit_no.' On '.$data.' Approved by '.$technical_user_name.' Mobile No.'.$technical_user_no.'.';
		$smscontent1 = 'Call Visit no '.$call_visit_no.' On '.$data.' Approved by '.$technical_user_name.' Mobile No.'.$technical_user_no.'.';

		$API1 = $this->Admin_model->SMSAPI($party_no, $smscontent);
		$API2 = $this->Admin_model->SMSAPI($e_mobile_no, $smscontent1);

		redirect('Technical/CallVisit');
	}

	public function CallVisitDecline(){
		
		$id = $this->input->post("id");
		$reason = $this->input->post("reason");

		$data = array('ticket_info_id' => $id, 'approve' => 2, 'decline_reason' => $reason);

		$update = $this->Technical_model->CallVisitUpdate($data);	
	}
}