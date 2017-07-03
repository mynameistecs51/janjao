<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Room";
		$this->pagename="ROOM";
		$this->load->model('Mdl_user');
		$this->load->model('Mdl_room');
		$this->load->model('Mdl_roomType');
		$this->dtnow = $this->packfunction->dtYMDnow();
		$this->ip_addr = $this->input->ip_address();
		$this->userID = $this->session->userdata('userID'); // ID จากตาราง Session
		$this->UserName = $this->session->userdata('UserName');
		if($this->userID==""){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
		}

	}

	public function index(){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['getlist']=$this->Mdl_user->getList($this->data['keyword']);
		$this->data['getRoomAll'] = $this->Mdl_room->getRoomAll();
		$this->packfunction->packView($this->data,"room/RoomList");
	}

	public function RoomFormAdd()
	{
		$this->load->view('room/RoomFormAdd');
	}

	public function roomEdit($id = "")
	{
		$getRoom = $this->Mdl_room->getRoomID($id);
		$this->data['getRoom']  = '';
		foreach ($getRoom as $rowRoom) {
			$this->data['getRoom']   = array(
				'roomID'  => $rowRoom['roomID'],
				'floor'  => $rowRoom['floor'],
				'zone'  => $rowRoom['zone'],
				'roomCODE'  => $rowRoom['roomCODE'],
				'transaction'  => $rowRoom['transaction'],
				'comment'  => $rowRoom['comment'],
				'status'  => $rowRoom['status'],
				'createDT'  => $rowRoom['createDT'],
				'createBY'  => $rowRoom['createBY'],
				'updateDT'  => $rowRoom['updateDT'],
				'updateBy'  => $rowRoom['updateBy'],
				'roomtypeID'  => $rowRoom['roomtypeID'],
				'bed'  => $rowRoom['bed'],
				'roomtypeCode'  => $rowRoom['roomtypeCode'],
				'price_month'  => $rowRoom['price_month'],
				'price_day'  => $rowRoom['price_day'],
				'price_short'  => $rowRoom['price_short'],
				'price_hour'  => $rowRoom['price_hour'],
				);
		}
		$this->data['roomType'] = $this->Mdl_roomType->getRoomTypeAll();
		$this->load->view('room/RoomFormEdit',$this->data);
	}

	public function search(){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']=$this->input->post('keyword');
		$this->data['getlist']=$this->Mdl_user->getList(trim($this->data['keyword']));
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function last($key=''){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['getlist']=$this->Mdl_user->getLast($key);
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function create($ref=''){
		$this->data['viewName']=$this->pagename;
		$this->data['usergroup']=$this->Mdl_user->getUserGroup();
		$this->data['countryList']=$this->mdl_packFunction->getCountryList();
		$this->packfunction->packView($this->data,"user/UserCreate");
	}

	public function edit($key=''){
		$this->data['viewName']=$this->pagename;
		$this->data['userDtl']=$this->Mdl_user->getDetail($key);
		$this->data['usergroup']=$this->Mdl_user->getUserGroup();
		$this->data['countryList']=$this->mdl_packFunction->getCountryList();
		$this->packfunction->packView($this->data,"user/UserEdit");
	}

	public function saveData()
	{
		if($_POST)
		{
			$data = array(
				"username"	=>$_POST['username'],
				"useremail"	=>$_POST['useremail'],
				"userIdcard"=>$_POST['userIdcard'],
				"userTitle"	=>$_POST['userTitle'],
				"userFname"	=>$_POST['userFname'],
				"userMname"	=>$_POST['userMname'],
				"userLname"	=>$_POST['userLname'],
				"countryID"	=>$_POST['countryID'],
				"address"		=>$_POST['address'],
				"city"			=>$_POST['city'],
				"state"			=>$_POST['state'],
				"postcode"		=>$_POST['postcode'],
				"mobile"		=>$_POST['mobile'],
				"usergroupID"	=>$_POST['usergroupID'],
				"status"		=>'ON',
				"createDT"		=>$this->packfunction->dtYMDnow(),
				"createBY"		=>$this->UserName,
				"updateDT"		=>$this->packfunction->dtYMDnow(),
				"updateBY"		=>$this->UserName
				);
			$userID = $this->Mdl_user->addNewData($data,'tm_user');

			// echo "<pre>";
			// print_r($data);
			// print_r($_FILES);

			redirect('user/last/'.md5($userID));
		}else{
			redirect('authen/');
		}
	}

	public function saveUpdate()
	{
		if($_POST)
		{
			$data = array(
				"username"	=>$_POST['username'],
				"useremail"	=>$_POST['useremail'],
				"userIdcard"=>$_POST['userIdcard'],
				"userTitle"	=>$_POST['userTitle'],
				"userFname"	=>$_POST['userFname'],
				"userMname"	=>$_POST['userMname'],
				"userLname"	=>$_POST['userLname'],
				"countryID"	=>$_POST['countryID'],
				"companyName"	=>$_POST['companyName'],
				"position"		=>$_POST['position'],
				"address"		=>$_POST['address'],
				"city"			=>$_POST['city'],
				"state"			=>$_POST['state'],
				"postcode"		=>$_POST['postcode'],
				"telephone"		=>$_POST['telephone'],
				"mobile"		=>$_POST['mobile'],
				"usergroupID"	=>$_POST['usergroupID'],
				"tradeID"		=>$_POST['tradeID'],
				"status"		=>'ON',
				"createDT"		=>$this->packfunction->dtYMDnow(),
				"createBY"		=>$this->UserName,
				"updateDT"		=>$this->packfunction->dtYMDnow(),
				"updateBY"		=>$this->UserName
				);
			$userID = $_POST['userID'];
			$this->Mdl_user->updateData($data,'tm_user',$userID);
			redirect('user/last/'.md5($userID));
		}else{
			redirect('authen/');
		}
	}

	public function checkdata()
	{
		$result = $this->Mdl_user->chk_data($_POST['txt'],$_POST['field'],$_POST['id']);
		echo json_encode($result);
	}

}?>
