<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Authen";
		$this->dtnow = $this->packfunction->dtYMDnow();
		$this->ip_addr = $this->input->ip_address();
		$this->userID = $this->session->userdata('userID');
	}

	public function index()
	{
		if($this->userID==""){
			redirect('authen/login','refresh');
		}else{
			// ถ้าไม่มีการ Login อยู่แล้ว ให้ไปที่หน้า Login
			redirect('home/','refresh');
		}
	}

	public function setSession($authRs)
	{
			$this->loginSession = 	array(
										"userID" => $authRs[0]['userID'],
										"usergroupID" => $authRs[0]['usergroupID'],
										"UserName" => $authRs[0]['username'],
										"UserEmail" => $authRs[0]['useremail'],
										"userFname" => $authRs[0]['userFname']
									);
			// Set ค่าให้ session
			$this->session->set_userdata($this->loginSession);
			// เสร็จแล้วไปที่หน้า dashboard
			redirect('home/','refresh');
	}

	public function login($error='')
	{
		if($this->session->userdata('userID')==""){
			$this->data['viewName']="Login";
	    	$this->data['userID']=$this->userID;
	    	$this->data['ctl'] = $this->ctl;
			$this->data['error']= $error == 'fail' ? 'Username Password not found ! ' : '';
			$this->load->view($this->data['viewName'],$this->data);
	    }else{
			redirect('authen/','refresh');
		}
 	}

	public function CheckLogin()
	{
		if($_POST){
			$authRs=$this->mdl_authen->doCheckValidUserLogin($_POST['UserName'], MD5($_POST['Password']) );

			if(COUNT($authRs) > 0){
					$this->setSession($authRs);
			}else{
				redirect('authen/login/fail','refresh');
			}
		}else{
		   redirect('authen/','refresh');
		}
	}

	public function logout()
	{
		$userID = $this->session->unset_userdata("userID");
		$usergroupID = $this->session->unset_userdata("usergroupID");
		$UserName = $this->session->unset_userdata("UserName");
		$UserEmail = $this->session->unset_userdata("UserEmail");
		$userFname = $this->session->unset_userdata("userFname");
		redirect('home/','refresh');
	}


	public function forgotpassword()
	{

	}

}?>
