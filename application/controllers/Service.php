<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Home";
		$this->pagename="SERVICE";
		$this->userID = $this->session->userdata('userID');
		$this->UserName = $this->session->userdata('UserName');
		$this->UserGroupID = $this->session->userdata('usergroupID');
		$authRs=$this->mdl_packFunction->checkAuthen($this->pagename, $this->UserGroupID);
		if($this->userID=="" || $authRs != true){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
		}
	}

	public function index(){
		$this->data['viewName']=$this->pagename;
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		$this->data['keyword']='';
		$this->packfunction->packView($this->data,'service/ServiceList');
	}

	public function 	ServiceFormAdd()
	{
		$this->load->view('service/ServiceFormAdd');
	}

	public function ServiceFormEdit()
	{
		$this->load->view('service/ServiceFormEdit.php');
	}

}

/* End of file Service.php */
/* Location: ./application/controllers/Service.php */