<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function PartyInfo()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export PartyInfo";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Party info');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['party_info'] = $this->Admin_model->GetPartyInfo($id = null);
		} else {
			$search = array(
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       		); 
       		$data['party_info'] = $this->Admin_model->EGetPartyInfo($search);
       	}

       	$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportPartyInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ItemCompany(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export ItemCompany";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Item Company');

		$data['setting'] = $this->Admin_model->GetItemCompany($id = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportItemGroup', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EquipmentType(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export EquipmentType";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Equipment Type');

		$data['setting'] = $this->Admin_model->GetItemGroup($id = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportEquipmentType', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ItemInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export ItemInfo";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Item Info');

		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);

		if($this->input->post("submit") == null){
			$data['ItemInfo'] = $this->Admin_model->GetItemInfo($ids = null);
		} else {
			$search = array(
       			'item_company' => $this->input->post("item_company"),
       			'equipment_type' => $this->input->post("equipment_type"),
       		); 
       		$data['ItemInfo'] = $this->Admin_model->EGetItemInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportItemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ProblemInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export ProblemInfo";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Problem Info');

		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);

		if($this->input->post("submit") == null){
			$data['setting'] = $this->Admin_model->Getproblem_info($id = null);
		} else {
			$search = array(
       			'equipment_type' => $this->input->post("equipment_type"),
       		);
       		$data['setting'] = $this->Admin_model->EGetproblemInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportProblemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ProblemRectificationInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export ProblemRectification";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Problem Rectification Info');

		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);

		if($this->input->post("submit") == null){
			$data['setting'] = $this->Admin_model->GetProblemRectificationInfo($id = null);
		} else {
			$search = array(
       			'equipment_type' => $this->input->post("equipment_type"),
       		);
       		$data['setting'] = $this->Admin_model->EGetProblemRectificationInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportProblemRectificationInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function AMCContractInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export AMC Contract Info";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'AMC Contract Info');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);
		$data['AMCType'] = $this->Admin_model->GetAMCType($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->GetAMCContract($ids = null);
		} else {
		
			$search = array(
       			'contract_date' => $this->input->post("contaract_date"),
       			'party_id' => $this->input->post("Party_Group"),
       			'contract_start_date' => $this->input->post("start_date"),
       			'contract_end_date' => $this->input->post("end_date"),
       			'type' => $this->input->post("type"),
       		);

       		$data['datas'] = $this->Admin_model->EGetAMCContract($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportAMCContractInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function MachineDetails(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export Machine Details";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Machine Details');

		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->EMachineDetails($ids = null);
		} else {
		
			$search = array(
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       		);

       		$data['datas'] = $this->Admin_model->EMachineDetails($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportMachineDetails', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function PartyWiseInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export Party Wise Info";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Party Wise Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->EPartyWiseInfo($ids = null);
		} else {
		
			$search = array(
       			'party_id' => $this->input->post("party_group"),
       			'AMC_Ref_No' => $this->input->post("AMC_Ref_No"),
       		);

       		$data['datas'] = $this->Admin_model->EPartyWiseInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportPartyWiseInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function TicketInfo(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export Ticket Info";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Ticket Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->ETicketInfo($ids = null);
		} else {
		
			$search = array(
       			'from_date' => $this->input->post("from_date"),
       			'to_date' => $this->input->post("to_date"),
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       		);

       		$data['datas'] = $this->Admin_model->ETicketInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportTicketInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function CallVisitReport(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export Call Visit Report";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Call Visit Report');
			
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->ECallVisitReport($ids = null);

			$pro_info_data = explode(", ", $data['datas'][0]['problem_info_id']);
			foreach ($pro_info_data as $k) {
				$Getproblem_info = $this->Admin_model->Getproblem_info($k);
				$info[] = $Getproblem_info[0]['problem_info'];
			}
			$data['Getproblem_info'] = implode(", ", $info);
			
			
			$pro_info_rec_data = explode(", ", $data['datas'][0]['problem_rectification_id']);
			
			foreach ($pro_info_rec_data as $k) {
				$Getproblem_info = $this->Admin_model->GetProblemRectificationInfo($k);
				$infos[] = $Getproblem_info[0]['problem_rectification_info'];
			}
			$data['pro_info_rec_data'] = implode(", ", $infos);


		} else {
		
			$search = array(
				'from_date' => $this->input->post("from_date"),
       			'to_date' => $this->input->post("to_date"),
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       		);

       		$data['datas'] = $this->Admin_model->ECallVisitReport($search);

       		$pro_info_data = explode(", ", $data['datas'][0]['problem_info_id']);
			foreach ($pro_info_data as $k) {
				$Getproblem_info = $this->Admin_model->Getproblem_info($k);
				$info[] = $Getproblem_info[0]['problem_info'];
			}
			$data['Getproblem_info'] = implode(", ", $info);
			
			
			$pro_info_rec_data = explode(", ", $data['datas'][0]['problem_rectification_id']);
			
			foreach ($pro_info_rec_data as $k) {
				$Getproblem_info = $this->Admin_model->GetProblemRectificationInfo($k);
				$infos[] = $Getproblem_info[0]['problem_rectification_info'];
			}
			$data['pro_info_rec_data'] = implode(", ", $infos);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportCallVisitReport', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function SaleInvoice(){
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export Ticket Info";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Sale Invoice');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->ESaleInvoice($ids = null);
		} else {
		
			$search = array(
       			'from_date' => $this->input->post("from_date"),
       			'to_date' => $this->input->post("to_date"),
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       			'AMC_Ref_No' => $this->input->post("AMC_Ref_No"),
       		);

       		$data['datas'] = $this->Admin_model->ESaleInvoice($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportSaleInvoice', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function ReceiptInfo(){
		
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Export ReceiptInfo";
		$this->session->set_userdata('topmenu', 'Export');
		$this->session->set_userdata('submenu', 'Receipt Info');
		
		$data['PartyGroup'] = $this->Admin_model->GetParty($ids = null);

		if($this->input->post("submit") == null){
			$data['datas'] = $this->Admin_model->EGetReceiptInfo($ids = null);
		} else {
		
			$search = array(
				'from_date' => $this->input->post("from_date"),
       			'to_date' => $this->input->post("to_date"),
       			'party_id' => $this->input->post("party_group"),
       			'party_info_id' => $this->input->post("party_name"),
       			'AMC_Ref_No' => $this->input->post("AMC_Ref_No")
       		);

       		$data['datas'] = $this->Admin_model->EGetReceiptInfo($search);
		}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ExportReceiptInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}
}