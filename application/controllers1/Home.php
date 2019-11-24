<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{

		$data['title'] = "Admin | AMC Contract";
		$this->session->set_userdata('topmenu', 'AMC-Contract');
		$this->session->set_userdata('submenu', 'ADD-AMC-Contract');

		$data['datas'] = $this->Admin_model->GetParty();

		$this->load->view('layout/header', $data);
		$this->load->view('ADD_AMC', $data);
		$this->load->view('layout/footer', $data);
	}

	public function Add_AMCContractRef(){
		$AMC_Ref_No = $this->input->post("AMC_Ref_No");
        $contaract_date = $this->input->post("contaract_date");
        $Party_Group = $this->input->post("Party_Group");
        $type = $this->input->post("type");
        $datepicker = $this->input->post("datepicker");
        $checkout = $this->input->post("checkout");
        $Ref_No = $this->input->post("Ref_No");

        $datas = array(
        	'AMC_contract_ref_no' => $AMC_Ref_No, 
        	'contract_date' => $contaract_date, 
        	'party_id' => $Party_Group, 
        	'type' => $type,
        	'contract_start_date' => $datepicker, 
        	'contract_end_date' => $checkout, 
        	'contract_ref_no' => $Ref_No, 
        );

        $Getdatas = $this->Admin_model->Add_AMCContractRef($datas);
	}

	public function List_AMC()
	{
		$data['title'] = "Admin | AMC Contract";
		$this->session->set_userdata('topmenu', 'AMC-Contract');
		$this->session->set_userdata('submenu', 'List-AMC-Contract');

		$data['datas'] = $this->Admin_model->Get_AMCContractRef();

		$this->load->view('layout/header', $data);
		$this->load->view('List_AMC', $data);
		$this->load->view('layout/footer', $data);
	}

	public function chechDate()	{	
		$Startdate = $this->input->post("Startdate");	

		$type = $this->input->post("type");
		
		if($type == "1_month"){
			$dates = "+1 months";
		}
		if($type == "2_month"){
			$dates = "+2 months";
		}
		if($type == "3_month"){
			$dates = "+3 months";
		}
		if($type == "6_month"){
			$dates = "+6 months";
		}
		if($type == "1_yr"){
			$dates = "+12 months";
		}
		if($type == "2_yr"){
			$dates = "+24 months";
		}
		if($type == "3_yr"){
			$dates = "+36 months";
		}

		$date=date_create($Startdate);
		date_add($date,date_interval_create_from_date_string($dates));
		echo date_format($date,"d-m-Y");
	}
}	