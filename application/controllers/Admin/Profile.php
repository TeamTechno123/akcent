<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
               if($this->session->userdata('admin_id') == null){ redirect('Admin/login'); }
                $data['title'] = "Admin | Edit Profile";

                $id = $this->session->userdata('admin_id');

                $info = $this->Admin_model->GetAdminInfo($id);

                $data['mobile_no'] = $info[0]['mobile_no'];
                $old_password = $info[0]['password'];                      

                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() !== FALSE) {
                        if(md5($this->input->post("old_password")) !== $old_password){
                                $this->session->set_flashdata( 'msg', 'Your Old Password is Not Matched.' );
                        } else {
                                $datas_post = array(
                                        'admin_id' => $id,
                                        'password' => md5($this->input->post("password"))
                                );
                                $user = $this->Admin_model->UpAdminInfo($datas_post);
                                redirect('Admin/Home');
                        }  
                }

                $this->load->view('layout/Admin/header', $data);
                $this->load->view('Admin/EditProfile', $data);
                $this->load->view('layout/Admin/footer', $data);
	}
}