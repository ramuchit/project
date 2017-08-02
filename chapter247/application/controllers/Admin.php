<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model','admin');

	}
	public function index(){
		if($this->session->userdata("user_id")){
			
			redirect("/admin/dashboard");

		}else{
				$this->load->view('signin');
		}
	
		
	}
	public function signin(){
		$this->form_validation->set_rules('name_email', 'Email', 'valid_email');
		$name_email=$this->input->post('name_email');
		$password=$this->input->post('password');
		$info=array();
		    if ($this->form_validation->run() == FALSE){
		    	$info=$this->admin->individual_admin_detail('user',$name_email,'username');
		    }else{
		    	$info=$this->admin->individual_admin_detail('user',$name_email,'u_email');
		    }
			if($info){
					if($info['u_pwd']==$password){
						extract($info);
						$this->session->set_userdata(array(
			                            'user_id'       => $id,
			                            'username'      => $username,
			                            'email'       => $u_email
			                             ));
						$this->session->set_flashdata('success', 'Login Successfully');
						redirect("/admin/dashboard");
					}else{
						$this->session->set_flashdata('error', 'password not correct');
						redirect("/admin");
					}
			 }else{
			 	$this->session->set_flashdata('error', 'User id or email not exist');
			 	redirect("/admin");
			 }
		

	}
	public function signup(){
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$password=$this->input->post('pwd');
		$cnf_pwd=$this->input->post('confirm-password');
		if($cnf_pwd!=$password){
			$this->session->set_flashdata('error', '! Signup Error Try Again !');
			redirect("/admin");
		}
		$data=['username'=>$username,'u_email'=>$email,'u_pwd'=>$password];
		if($this->admin->saveData('user',$data)){
			$this->session->set_flashdata('signup', 'Created Account Successfully.You can login now.');
			redirect("/admin");
		}


	}
	public function chk_existance(){
		$name_email=$this->input->post('chk_name_email');
		$info=array();
		    if ($this->form_validation->run() == FALSE){
		    	$info=$this->admin->individual_admin_detail('user',$name_email,'username');
		    }else{
		    	$info=$this->admin->individual_admin_detail('user',$name_email,'u_email');
		    }
		  echo $info?'0':'1';
	}
	public function dashboard($offset='0'){
		if($this->session->userdata("user_id")){
			$data['product']=$this->admin->get_content('product');
			//paginations
			$this->load->library('pagination');
			$config['per_page'] = 2;
			$config['base_url'] = base_url().'admin/dashboard';
			$config['total_rows'] = count($data['product']);
		
			
             $data['products']=$this->admin->filteredData('product',$config['per_page'],$start=$offset);
			$this->pagination->initialize($config);

			$data['links']=$this->pagination->create_links();
			$this->load->view('dashboard',$data);

		}else{
			redirect("/admin");
		}
		
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("/admin");
		
	}
	public function updateProduct(){
		
	}
	public function removeProduct(){
		
	}

}