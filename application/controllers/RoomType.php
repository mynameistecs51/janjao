<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomType extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Home";
		$this->pagename="ROOMTYPE";
		$this->userID = $this->session->userdata('userID');
		$this->UserName = $this->session->userdata('UserName');
		$this->UserGroupID = $this->session->userdata('usergroupID');
		$authRs=$this->mdl_packFunction->checkAuthen($this->pagename, $this->UserGroupID);
		if($this->userID=="" || $authRs != true){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
		}
	}

	public function index()
	{
		$this->data['viewName']=$this->pagename;
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		$this->data['keyword']='';
		$this->packfunction->packView($this->data,'roomtype/RoomtypeList');
	}

	public function RoomtypeAdd()
	{
		$this->load->view('roomtype/RoomtypeAdd');
	}

	public function RoomtypeEdit()
	{
		$this->load->view('roomtype/RoomtypeEdit');
	}

}

/* End of file RoomType.php */
/* Location: ./application/controllers/RoomType.php */