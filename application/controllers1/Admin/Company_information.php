<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_information extends CI_Controller {

	public function Add()
	{
		if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
		$data['title'] = "Admin | Company info";
		$this->session->set_userdata('topmenu', 'General');
		$this->session->set_userdata('submenu', 'Add-Company-Info');

		$datas = $this->Admin_model->GetCompanyInformation($id = 1);
		if(!empty($datas))
		{
			foreach ($datas as $datas)
			{			
				$data['company_id'] = $datas['id'];
				$data['name'] = $datas['name'];
				$data['mobile_1'] = $datas['mobile_no_1'];
				$data['mobile_2'] = $datas['mobile_no_2'];
				$data['address'] = $datas['address'];	
				$data['email'] = $datas['email'];
				$data['website'] = $datas['website'];
        		$data['pan_no'] = $datas['pan_no'];
        		$data['gst_no'] = $datas['gst_no'];
        		$data['lic1'] = $datas['lic_no1'];
        		$data['lic2'] = $datas['lic_no2'];
        		$data['old_image'] = $datas['logo'];
			}
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile_1', 'Mobile No. 1', 'trim|required|xss_clean|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');

		if ($this->form_validation->run() !== FALSE)
       	{
        	$name = $this->input->post("name");
        	$mobile_1 = $this->input->post("mobile_1");
        	$mobile_2 = $this->input->post("mobile_2");
        	$address = $this->input->post("address");
        	$email = $this->input->post("email");
        	$website = $this->input->post("website");
        	$pan_no = $this->input->post("pan_no");
        	$gst_no = $this->input->post("gst_no");
        	$lic1 = $this->input->post("lic1");
        	$lic2 = $this->input->post("lic2");
        	$update = $this->input->post("update");

        	if($update == null){
        		
	        		$config = array(
						'allowed_types' => 'gif|jpg|jpeg|png',
						'upload_path' => './files/images/logo/',
						'file_name' => time()
					);
							
					$this->load->library('upload', $config);
					$this->upload->initialize($config);	
					$this->upload->do_upload('file');
					$datas_pic = $this->upload->data();
					$file_name = $datas_pic['file_name'];

					$deletePic = unlink("./files/images/logo/".$data['old_image']);

	        		$data = array(
	        			'name' => $name,
	        			'mobile_no_1' => $mobile_1,
	        			'mobile_no_2' => $mobile_2,
	        			'address' => $address,
	        			'email' => $email,
	        			'website' => $website,
	        			'pan_no' => $pan_no,
	        			'gst_no' => $gst_no,
	        			'lic_no1' => $lic1,
	        			'lic_no2' => $lic2,
	        			'logo' => $file_name,
	        		);

	        		$add = $this->Admin_model->AddCompanyInformation($data);
		        	redirect('Admin/CompanyInformation/add');

        	} else {
        		
        		if(empty($_FILES['new_file']['name']))
				{
					$data = array(
	        			'id' => $update,
	        			'name' => $name,
	        			'mobile_no_1' => $mobile_1,
	        			'mobile_no_2' => $mobile_2,
	        			'address' => $address,
	        			'email' => $email,
	        			'website' => $website,
	        			'pan_no' => $pan_no,
	        			'gst_no' => $gst_no,
	        			'lic_no1' => $lic1,
	        			'lic_no2' => $lic2,
	        		);

					$up = $this->Admin_model->UpCompanyInformation($data);
	        		redirect('Admin/Company_information/add');

				} else {
					$config = array(
						'allowed_types' => 'gif|jpg|jpeg|png',
						'upload_path' => './files/images/logo/',
						'file_name' => time()
					);
							
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					$this->upload->do_upload('new_file');
					$datas_pic = $this->upload->data();
					$file_name = $datas_pic['file_name'];

					if (!$this->upload->do_upload('new_file'))
					{
						//echo $this->upload->display_errors();
					}
					else
					{					
						$datas = $this->upload->data();
						$file_name = $datas['file_name'];

						$data = array(
		        			'id' => $update,
		        			'name' => $name,
		        			'mobile_no_1' => $mobile_1,
		        			'mobile_no_2' => $mobile_2,
		        			'address' => $address,
		        			'email' => $email,
		        			'website' => $website,
		        			'pan_no' => $pan_no,
		        			'gst_no' => $gst_no,
		        			'lic_no1' => $lic1,
		        			'lic_no2' => $lic2,
		        			'logo' => $file_name,
		        		);
	
						$up = $this->Admin_model->UpCompanyInformation($data);
		        		redirect('Admin/Company_information/add');
		        	}
				}
        	}
        }

		$this->load->view('layout/Admin/header', $data);
		$this->load->view('Admin/AddCompanyInfo', $data);
		$this->load->view('layout/Admin/footer', $data);
	} 	
}	