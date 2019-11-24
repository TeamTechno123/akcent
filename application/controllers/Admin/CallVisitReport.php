<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallVisitReport extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Call Visit Report";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Call Visit Report');

		$data['datas'] = $this->Admin_model->GetCallVisit($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/CallVisitReportList', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CallVisitReportAdd($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Add Call Visit Report";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Call Visit Report');

		$data['CallNo'] = $this->Admin_model->CallNo();
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetTicketInfo($id);

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

		$this->form_validation->set_rules('report_date', 'Report Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('report_time', 'Report Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('place', 'Place', 'trim|required|xss_clean');
		$this->form_validation->set_rules('call_status', 'Call Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$problem_info = $this->input->post("problem_info[]");
       		$problem_info = implode(', ', $problem_info); 
       		
       		$prob_info_rec = $this->input->post("prob_info_rec[]");
			$prob_info_rec = implode(', ', $prob_info_rec); 

			if($this->input->post("approve") == null){
				$approve = 1;
			} else {
				$approve = 0;
			}

			$PostData = array(
				'call_visit_no' => $this->input->post("call_visit"),
				'ticket_info_id' => $id,
				'problem_info_id' => $problem_info,
				'problem_rectification_id' => $prob_info_rec,
				'reported_date' => $this->input->post("report_date"),
				'reported_time' => $this->input->post("report_time"),
				'place' => $this->input->post("place"),
				'call_status' => $this->input->post("call_status"),
				'engineer_id' => $engineer_id,
				'approve' => $approve,
			);
			
			$AddCall = $this->Admin_model->AddCallVisit($PostData);

			$update = array( 'id' => $id, 'call_visit_id' => $AddCall);
			$this->Admin_model->UpTicketInfo($update);
			
			$call_visit_no = urlencode($this->input->post("call_visit"));
			$report_date = $this->input->post("report_date");
			$ticket_no = urlencode($data['datas'][0]['id']);
			$engineer_name = urlencode($data['datas'][0]['engineer_name']);
			$engineer_no = urlencode($data['datas'][0]['e_mobile_no']);
			$status = urlencode($this->input->post("call_status"));
			
			$content_no = urlencode($data['datas'][0]['content_no']);
			$admin_content_no = urlencode($this->session->userdata('cmp_mobile'));
			
			$smscontent = 'Your Create Call Visit no '.$call_visit_no.' On '.$report_date.' Ticket No '.$ticket_no.' has been Engineer Name '.$engineer_name.' And Mobile No.'.$engineer_no.' Status is '.$status.'.';
			$smscontent1 = 'Call Visit no '.$call_visit_no.' On '.$report_date.' Ticket No '.$ticket_no.' has been Engineer Name '.$engineer_name.' And Mobile No.'.$engineer_no.' Status is '.$status.'.';

			$API1 = $this->Admin_model->SMSAPI($content_no, $smscontent);
			$API2 = $this->Admin_model->SMSAPI($admin_content_no, $smscontent1);

			redirect('Admin/CallVisitReport');
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/CallVisitReportAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
	
	public function CallVisitReportEdit($id){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Edit Call Visit Report";
		$this->session->set_userdata('topmenu', 'Transactions');
		$this->session->set_userdata('submenu', 'Call Visit Report');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['datas'] = $this->Admin_model->GetTicketInfo($id);
		$data['SaleInvoice'] = $this->Admin_model->GetSaleInvoice($id);

		$SaleInvoice_id = $data['SaleInvoice'][0]['id'];

		$data['pro_info_data'] = explode(", ", $data['SaleInvoice'][0]['problem_info_id']);
		$data['pro_info_count'] = count($data['pro_info_data']);
		
		$data['pro_info_rec_data'] = explode(", ", $data['SaleInvoice'][0]['problem_rectification_id']);
		$data['pro_info_rec_count'] = count($data['pro_info_rec_data']);

		$party_id = $data['datas'][0]['party_id'];
		$amc_machine = $data['datas'][0]['amc_machine_id'];
		$item_id = $data['datas'][0]['item_info_id'];
		$engineer_id = $data['datas'][0]['engineer_id'];
		$data['call_visit_no'] = $data['SaleInvoice'][0]['call_visit_no'];

		$data['CheckParty'] = $this->Admin_model->CheckParty($party_id);
		$data['CheckAmcContract'] = $this->Admin_model->CheckAmcContract($party_id);
		$data['GetMachine'] = $this->Admin_model->GetMachiness($amc_machine);
		$data['Item'] = $this->Admin_model->GetItemGroup($item_id);
		$data['pro_info'] = $this->Admin_model->CheckPro($item_id);
		$data['pro_info_rec'] = $this->Admin_model->CheckProRec($item_id);


		$this->form_validation->set_rules('report_date', 'Report Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('report_time', 'Report Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('place', 'Place', 'trim|required|xss_clean');
		$this->form_validation->set_rules('call_status', 'Call Status', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$problem_info = $this->input->post("problem_info[]");
       		$problem_info = implode(', ', $problem_info); 
       		
       		$prob_info_rec = $this->input->post("prob_info_rec[]");
			$prob_info_rec = implode(', ', $prob_info_rec); 

			$PostData = array(
				'id' => $SaleInvoice_id,
				'ticket_info_id' => $id,
				'problem_info_id' => $problem_info,
				'problem_rectification_id' => $prob_info_rec,
				'reported_date' => $this->input->post("report_date"),
				'reported_time' => $this->input->post("report_time"),
				'place' => $this->input->post("place"),
				'call_status' => $this->input->post("call_status"),
				'engineer_id' => $engineer_id,
				'approve' => $this->input->post("approve"),
			);

			$update = $this->Admin_model->UpSaleInvoice($PostData);	

			/*$status = $this->input->post("call_status");
			$UpData = array('id' => $id, 'status' => $status); 

			$update_date = $this->Admin_model->UpTicket($UpData);
			*/
			redirect('Admin/CallVisitReport');
		}	


		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/CallVisitReportAdd', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CallVisitReportDelete($id){
		$DeteleSetting = $this->Admin_model->DelSaleInvoice($id);
		
		$datas = array('call_visit_id' => NULL);

		$Detele = $this->Admin_model->UpTicketInfo1($id, $datas);	
		redirect('Admin/CallVisitReport');
	}
	
}