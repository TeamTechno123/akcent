<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
                if($this->session->userdata('technical_id') == null){ redirect('Technical/login'); }
                $data['title'] = "Technical | Edit Profile";

                $id = $this->session->userdata('technical_id');

                $data['partyGroup'] = $this->Admin_model->GetParty($ids = null);
                $party_info = $this->Admin_model->GetTechnicalUser($id);
                $old_password = $party_info[0]['password'];

                if(!empty($party_info)){
                        foreach ($party_info as $k) {
                                $data['id'] = $k['id'];
                                $data['party_id'] = $k['party_id'];

                                $data['PartyInfo'] = $this->Admin_model->CheckParty($data['party_id']);
                                
                                $data['party_info_id'] = $k['party_info_id'];
                                $data['name'] = $k['name'];
                                $data['mobile_no'] = $k['mobile_no'];
                                $data['address'] = $k['address'];
                                $data['status'] = $k['status'];
                        }                       
                }

                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() !== FALSE) {
                        if(md5($this->input->post("old_password")) !== $old_password){
                                $this->session->set_flashdata( 'msg', 'Your Old Password is Not Matched.' );
                        } else {
                                $datas_post = array(
                                        'id' => $id,
                                        'password' => md5($this->input->post("password"))
                                );
                               $user = $this->Admin_model->UpTechnicalUser($datas_post);
                               redirect('Technical/Home');
                        }  
                }
                $this->load->view('layout/Technical/header', $data);
                $this->load->view('Technical/EditTechnical', $data);
                $this->load->view('layout/Technical/footer', $data);
	}
}