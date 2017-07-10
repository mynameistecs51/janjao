<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomType extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="RoomType";
		$this->pagename="ROOMTYPE";
		$this->load->model('Mdl_roomType');
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
		$this->data['getRoomtypeAll'] = $this->Mdl_roomType->getRoomtypeAll();
		$this->packfunction->packView($this->data,'roomtype/RoomtypeList');
	}

	public function RoomtypeAdd()
	{
		$this->load->view('roomtype/RoomtypeAdd');
	}

	public function saveAdd()
	{
		$this->Mdl_roomType->saveAdd();
	}

	public function RoomtypeEdit($id)
	{ 
		$this->data['getRoomtype'] = $this->Mdl_roomType->getRoomtypeID($id); 
		$this->load->view('roomtype/RoomtypeEdit',$this->data);
	}

	public function saveEdit()
	{
		$this->Mdl_roomType->saveEdit();
		redirect($this->ctl,'refresh');
	}

	public function deleteRoomtype()
	{
		$this->Mdl_roomType->deleteRoomtype($_POST['roomtypeID']);
		echo json_encode(['status'=>'success']);
	}

}

/* End of file RoomType.php */
/* Location: ./application/controllers/RoomType.php */