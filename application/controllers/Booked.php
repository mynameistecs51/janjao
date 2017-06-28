<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booked extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Booked";
		$this->pagename="BOOKED";
		$this->load->model('Mdl_booked');
		$this->load->model('Mdl_user');
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
		$this->data['getBooked'] = $this->Mdl_booked->getAll();
		$this->packfunction->packView($this->data,"booked/BookedList");
	}

	public function saveAdd()
	{
		$idBooked = $this->Mdl_booked->saveAdd();
		// $idBookedRoom = $this->Mdl_booked->saveAddBookedRoom($idBooked);
		// $bookedRoomLog = $this->Mdl_booked->saveAddBookedRoomLog($idBookedRoom);

	}

	public function BookedFormEdit()
	{
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$this->load->view('booked/BookedFormEdit',$this->data);
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
