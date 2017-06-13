<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Home";
		$this->pagename="HOME";
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
		// $this->data['roomtList']=$this->mdl_packFunction->getEventList($this->UserName);
		$this->packfunction->packView($this->data,'Dashboard');
	}

	public function CheckinForm()
	{
		$this->load->view('checkin/CheckinForm');
	}

	public function search(){
		$this->data['viewName']=$this->pagename;
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		// $this->data['roomtList']=$this->mdl_packFunction->getEventList($this->UserName);
		$this->packfunction->packView($this->data,'Dashboard');
	}

}?>
