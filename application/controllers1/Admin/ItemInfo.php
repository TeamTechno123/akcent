<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemInfo extends CI_Controller {

	public function index(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Item Infor";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Info');

		$data['ItemInfo'] = $this->Admin_model->GetItemInfo($ids = null);

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/ItemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);		
	}
	
	public function AddInfo(){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Add Item Infor";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Info');

		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['TaxSlab'] = $this->Admin_model->GetTaxSlab($ids = null);
		$data['Unit'] = $this->Admin_model->GetUnit($ids = null);


		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('HSN', 'HSN', 'trim|required|xss_clean');
		$this->form_validation->set_rules('item_company', 'Item Company', 'trim|required|xss_clean');
		$this->form_validation->set_rules('taxs_lab', 'Taxs Lab', 'trim|required|xss_clean');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|required|xss_clean');
		$this->form_validation->set_rules('MRP', 'MRP', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'item_name' => $this->input->post("name"),
	        	'HSN' => $this->input->post("HSN"),
	        	'item_company_id' => $this->input->post("item_company"),
	        	'item_group_id' => $this->input->post("equipment_type"),
	        	'taxslab_id' => $this->input->post("taxs_lab"),
	        	'unit_id' => $this->input->post("unit"),
	        	'sale_price' => $this->input->post("sale_price"),
	        	'mrp' => $this->input->post("MRP"),
	        	'warranty' => $this->input->post("warranty"),
	        );

       		$user = $this->Admin_model->AddItemInfo($datas_post);
        	redirect('Admin/ItemInfo');
        }
	    
	    $this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AddItemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function EditItemInfo($id){
		if($this->session->userdata('admin_mobile') == null){ redirect('Admin/Login'); }
		$data['title'] = "Admin | Edit Item Infor";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Item Info');

		$data['ItemCompany'] = $this->Admin_model->GetItemCompany($ids = null);
		$data['ItemGroup'] = $this->Admin_model->GetItemGroup($ids = null);
		$data['TaxSlab'] = $this->Admin_model->GetTaxSlab($ids = null);
		$data['Unit'] = $this->Admin_model->GetUnit($ids = null);
		$party_info = $this->Admin_model->GetItemInfo($id);

		if(!empty($party_info)){
			foreach ($party_info as $k) {
				$data['id'] = $k['id'];
				$data['name'] = $k['item_name'];
				$data['HSN'] = $k['HSN'];
				$data['item_company_id'] = $k['item_company_id'];
				$data['item_group_id'] = $k['item_group_id'];
				$data['taxslab_id'] = $k['taxslab_id'];
				$data['unit_id'] = $k['unit_id'];
				$data['sale_price'] = $k['sale_price'];
				$data['MRP'] = $k['mrp'];
				$data['warranty'] = $k['warranty'];
			}			
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('HSN', 'HSN', 'trim|required|xss_clean');
		$this->form_validation->set_rules('item_company', 'Item Company', 'trim|required|xss_clean');
		$this->form_validation->set_rules('taxs_lab', 'Taxs Lab', 'trim|required|xss_clean');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sale_price', 'Sale Price', 'trim|required|xss_clean');
		$this->form_validation->set_rules('MRP', 'MRP', 'trim|required|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
       		$datas_post = array(
	        	'id' => $id,
	        	'item_name' => $this->input->post("name"),
	        	'HSN' => $this->input->post("HSN"),
	        	'item_company_id' => $this->input->post("item_company"),
	        	'item_group_id' => $this->input->post("equipment_type"),
	        	'taxslab_id' => $this->input->post("taxs_lab"),
	        	'unit_id' => $this->input->post("unit"),
	        	'sale_price' => $this->input->post("sale_price"),
	        	'mrp' => $this->input->post("MRP"),
	        	'warranty' => $this->input->post("warranty"),
	        );

       		$user = $this->Admin_model->UpItemInfo($datas_post);
        	redirect('Admin/ItemInfo');
       	}

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AddItemInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	}

	public function DeleteItemInfo($id){
		$DeleteUser = $this->Admin_model->DelItemInfo($id);
		redirect('Admin/ItemInfo');
	}

}