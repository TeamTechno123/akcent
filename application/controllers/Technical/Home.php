<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{
		
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | Home";
		$this->session->set_userdata('topmenu', 'Dashboard');

		$party_group_id = $this->session->userdata('party_id');
		$party_id = $this->session->userdata('party_info_id');

		$data['DTotalTickets'] = $this->Party_model->DTotalTickets($party_group_id, $party_ids = null);
		$data['DOpenTickets'] = $this->Party_model->DOpenTickets($party_group_id, $party_ids = null);	
		$data['DInProcessTickets'] = $this->Party_model->DInProcessTickets($party_group_id, $party_ids = null);
		$data['DCompletedTickets'] = $this->Party_model->DCompletedTickets($party_group_id, $party_ids = null);
		
		
		$data['DPendingCollVisit'] = $this->Technical_model->DPendingCollVisit($party_group_id);

		$data['DApprovedCollVisit'] = $this->Technical_model->DApprovedCollVisit($party_group_id);

		$data['Ticket'] = $this->Technical_model->Ticket($party_group_id);
		$data['DCallVisit'] = $this->Technical_model->DCallVisit($party_group_id);
		$data['DSaleInvoice'] = $this->Technical_model->DSaleInvoice($party_group_id);

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/TechnicalHome', $data);
		$this->load->view('layout/Technical/footer', $data);
	}

	public function TicketInfoView($id){
		if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
		$data['title'] = "Technical | Home";
		$this->session->set_userdata('topmenu', 'Dashboard');

		$datas = $this->Party_model->GetTicketInfo($id);
		$data['datas'] = $datas[0];

		$this->load->view('layout/Technical/header', $data);
		$this->load->view('Technical/TicketInfoView', $data);
		$this->load->view('layout/Technical/footer', $data);
	}
}	