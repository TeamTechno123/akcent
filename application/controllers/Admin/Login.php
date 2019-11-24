<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id') !== null){ redirect('Admin/Home'); }

		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean|min_length[10]|max_length[10]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

                if ($this->form_validation->run() == FALSE) {
                	$this->load->view('Admin/AdminLogin');
                } else {
                	
                	$mobile = $this->input->post("mobile");
                	$password = md5($this->input->post("password"));

                	$sql = $this->Admin_model->login($mobile,$password);
                	if($sql == null){
                		$this->session->set_flashdata( 'msg', 'Email and Password is wrong.' );
                	} else {
        				foreach ($sql as $sql) {
        					$this->session->set_userdata('admin_mobile', $sql['mobile_no']);
        					$this->session->set_userdata('admin_id', $sql['admin_id']);
                                                $this->session->set_userdata('company_id', $sql['company_id']);
        				}
                                        $GetCmpInfo = $this->Admin_model->GetCmpInfo();
                                        $this->session->set_userdata('cmp_mobile', $GetCmpInfo[0]['mobile_no_1']);
                                        redirect('Admin/Home');
                	}
                	$this->load->view('Admin/AdminLogin');
                }
	}

        public function Logout(){
                $this->session->sess_destroy();
                redirect('Admin/Login');
        }
}