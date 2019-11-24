<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{
		
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Home";
		$this->session->set_userdata('topmenu', 'Dashboard');
		
		$data['DEngineer'] = $this->Admin_model->DEngineer();
		$data['DParty'] = $this->Admin_model->DParty();
		$data['DPartys'] = $this->Admin_model->DPartys();
		$data['DTechnicalUser'] = $this->Admin_model->DTechnicalUser();
		$data['DProduct'] = $this->Admin_model->DProduct();
		$data['DContract'] = $this->Admin_model->DContract();
		$data['DTickets'] = $this->Admin_model->DTickets();
		$data['DprogressTickets'] = $this->Admin_model->DprogressTickets();
		$data['DCompletTicket'] = $this->Admin_model->DCompletTicket();
		$data['DvisitReport'] = $this->Admin_model->DvisitReport();
		$data['DSaleInvoice'] = $this->Admin_model->DSaleInvoice();

		$data['AMCContract'] = $this->Admin_model->GetAMCContract($ids = null);
		$data['TicketInfo'] = $this->Admin_model->DGetTicketInfo($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AdminHome', $data);
		$this->load->view('layout/Admin/footer', $data);
	}


	/*public SMSAPI($mobile_no, $SMS){
		$smsGatewayUrl = 'http://msgblast.in/index.php/smsapi/httpapi/';
		$api_params='?uname=wbcare&password=123123&sender=AKCENT&route=TA&msgtype=1&receiver='.$mobile_no.'&sms=';

		$smsgatewaydata = $smsGatewayUrl.$api_params.$SMS;

		print_r($smsgatewaydata);

		$ch = curl_init($smsgatewaydata1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
		$output;
	}*/
}	