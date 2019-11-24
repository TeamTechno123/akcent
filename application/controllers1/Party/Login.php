<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
                if($this->session->userdata('party_id') !== null){ redirect('Party/Home'); }

		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|min_length[10]|max_length[10]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

                if ($this->form_validation->run() == FALSE) {
                	$this->load->view('Party/PartyLogin');
                } else {
                	
                	$mobile = $this->input->post("mobile");
                	$password = md5($this->input->post("password"));

                	$sql = $this->Party_model->login($mobile,$password);

                        if($sql == null){
                		$this->session->set_flashdata( 'msg', 'Email and Password is wrong.' );
                	} else {
        				foreach ($sql as $sql) {
        					$this->session->set_userdata('party_mobile', $sql['mobile_1']);
        					$this->session->set_userdata('party_id', $sql['id']);
                                                $this->session->set_userdata('party_group_id', $sql['party_group_id']);
        				}
        				redirect('Party/Home');
                	}
                	$this->load->view('Party/PartyLogin');
                }
	}

        public function Logout(){
                $this->session->sess_destroy();
                redirect('Party/Login');
        }
}