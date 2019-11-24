<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
                if($this->session->userdata('party_id') == null){ redirect('Party/login'); }
                $data['title'] = "Party | Edit Profile";

                $id = $this->session->userdata('party_id');

                $data['datas'] = $this->Admin_model->GetParty($ids = null);
                $party_info = $this->Admin_model->GetPartyInfo($id);
                $data['party_info'] = $party_info[0];

                if(!empty($party_info)){
                        foreach ($party_info as $k) {
                                $data['id'] = $k['id'];
                                $data['party_group_id'] = $k['party_group_id'];
                                $data['name'] = $k['name'];
                                $data['mobile_1'] = $k['mobile_1'];
                                $data['mobile_2'] = $k['mobile_2'];
                                $data['address'] = $k['address'];
                                $data['old_password'] = $k['password'];
                                $data['email'] = $k['email'];
                                $data['website'] = $k['website'];
                                $data['pan_no'] = $k['pan_no'];
                                $data['gst_no'] = $k['gst_no'];
                                $data['party_contact_person_name'] = $k['party_contact_person_name'];
                                $data['party_contact_no'] = $k['party_contact_no'];
                        }                       
                }

                $old_passsword = $data['party_info']['password'];

                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() !== FALSE) {
                        if(md5($this->input->post("old_password")) !== $old_passsword){
                                $this->session->set_flashdata( 'msg', 'Your Old Password is Not Matched.' );
                        } else {
                                $datas_post = array(
                                        'id' => $id,
                                        'password' => md5($this->input->post("password"))
                                );
                                $user = $this->Admin_model->UpPartyInfo($datas_post);
                                redirect('Party/Home');
                        }  
                }
                $this->load->view('layout/Party/header', $data);
                $this->load->view('Party/EditPartyInfo', $data);
                $this->load->view('layout/Party/footer', $data);
	}
}