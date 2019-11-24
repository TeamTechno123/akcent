<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{
		
		if($this->session->userdata('party_id') == null){ redirect('Party/login'); }
		$data['title'] = "Party | Home";
		$this->session->set_userdata('topmenu', 'Dashboard');

		$party_group_id = $this->session->userdata('party_group_id');
		$party_id = $this->session->userdata('party_id');


		$data['DTotalTickets'] = $this->Party_model->DTotalTickets($party_group_id, $party_id);
		$data['DOpenTickets'] = $this->Party_model->DOpenTickets($party_group_id, $party_id);	
		$data['DInProcessTickets'] = $this->Party_model->DInProcessTickets($party_group_id, $party_id);
		$data['DCompletedTickets'] = $this->Party_model->DCompletedTickets($party_group_id, $party_id);
		
		$DCollVisitReprort = $this->Party_model->DCollVisitReprort($party_group_id, $party_id);
		if(empty($DCollVisitReprort)){
			$data['DCollVisitReprort'] = 0;
		} else {
			$data['DCollVisitReprort'] = count($DCollVisitReprort);
		}
		
		$data['table'] = $DCollVisitReprort;

		$this->load->view('layout/Party/header', $data);
		$this->load->view('Party/PartyHome', $data);
		$this->load->view('layout/Party/footer', $data);
	}
}	