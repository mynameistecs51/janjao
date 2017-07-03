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
		$getRoomtypeID = $this->Mdl_roomType->getRoomtypeID($id);
		$this->data['getRoomtype'] = '';
		foreach ($getRoomtypeID as $key => $rowRoomType) {
			$this->data['getRoomtype'] = array(
				'roomtypeID' => $rowRoomType['roomtypeID'],
				'bed' => $rowRoomType['bed'],
				'roomtypeCode' => $rowRoomType['roomtypeCode'],
				'price_month' => $rowRoomType['price_month'],
				'price_day' => $rowRoomType['price_day'],
				'price_short' => $rowRoomType['price_short'],
				'price_hour' => $rowRoomType['price_hour'],
				'comment' => $rowRoomType['comment'],
				'status' => $rowRoomType['status'],
				'createDT' => $rowRoomType['createDT'],
				'createBY' => $rowRoomType['createBY'],
				'updateDT' => $rowRoomType['updateDT'],
				'updateB' => $rowRoomType['updateBY'],
				);
		}
		$this->load->view('roomtype/RoomtypeEdit',$this->data);
	}

	public function saveEdit()
	{
		$this->Mdl_roomType->saveEdit();
		redirect($this->ctl,'refresh');
	}

	public function deleteRoomtype()
	{
		$data = $this->Mdl_roomType->deleteRoomtype();
		redirect($this->ctl,'refresh');
	}

}

/* End of file RoomType.php */
/* Location: ./application/controllers/RoomType.php */