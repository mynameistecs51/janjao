<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Checkin";
		$this->pagename="CHECKIN"; 
		$this->load->model('Mdl_checkin');
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
		$this->data['getCheckin'] = $this->showList($this->data['keyword']);
		$this->packfunction->packView($this->data,"checkin/CheckinList");
	}


	public function showList($keyword='')
	{
		$data_array = array();
		foreach ($this->Mdl_checkin->getCheckinAll($keyword) as $key => $rowBooked) {
			if(isset($data_array[$rowBooked['bookedID']]))
			{
				array_push($data_array[$rowBooked['bookedID']]['selectRoom'],
					array(
						'bookedroomID' => $rowBooked['bookedroomID'],
						'roomID' => $rowBooked['roomID'],
						'checkinDate' => $rowBooked['checkinDate'],
						'checkoutDate' => $rowBooked['checkoutDate'],
						'comment' => $rowBooked['comment'],
						'status' => $rowBooked['status'],
						)
					);
				continue;
			}
			if(!isset($data_array[$rowBooked['bookedID']]))
			{
				$data_array[$rowBooked['bookedID']] =  array(
					'bookedID' =>  $rowBooked['bookedID'],
					'bookedCode' =>  $rowBooked['bookedCode'],
					'idcardno' =>  $rowBooked['idcardno'],
					'idcardnoPath' =>  $rowBooked['idcardnoPath'],
					'titleName' =>  $rowBooked['titleName'],
					'firstName' =>  $rowBooked['firstName'],
					'middleName' =>  $rowBooked['middleName'],
					'lastName' =>  $rowBooked['lastName'],
					'birthdate' =>  $rowBooked['birthdate'],
					'address' =>  $rowBooked['address'],
					'district' =>  $rowBooked['district'],
					'province' =>  $rowBooked['province'],
					'country' =>  $rowBooked['country'],
					'postcode' =>  $rowBooked['postcode'],
					'mobile' =>  $rowBooked['mobile'],
					'email' =>  $rowBooked['email'],
					'bookedDate' =>  $rowBooked['bookedDate'],
					'checkInAppointDate' =>  $rowBooked['checkInAppointDate'],
					'checkOutAppointDate' =>  $rowBooked['checkOutAppointDate'],
					'checkinDate' =>  $rowBooked['checkinDate'],
					'checkoutDate' =>  $rowBooked['checkoutDate'],
					'is_breakfast' =>  $rowBooked['is_breakfast'],
					'bookedType' =>  $rowBooked['bookedType'],
					'cashPledge' =>  $rowBooked['cashPledge'],
					'cashPledgePath' =>  $rowBooked['cashPledgePath'],
					'comment' =>  $rowBooked['comment'],
					'status' =>  $rowBooked['status'],
					'createDT' =>  $rowBooked['createDT'],
					'createBY' =>  $rowBooked['createBY'],
					'updateDT' =>  $rowBooked['updateDT'],
					'updateBY' =>  $rowBooked['updateBY'],
					'selectRoom' => array(
						array(
							'bookedroomID' => $rowBooked['bookedroomID'],
							'roomID' => $rowBooked['roomID'],
							'checkinDate' => $rowBooked['checkinDate'],
							'checkoutDate' => $rowBooked['checkoutDate'],
							'comment' => $rowBooked['comment'],
							'status' => $rowBooked['status'],
							)
						)
					);
			}
		}
		return $data_array;
	}

	public function CheckinForm()
	{
		$this->packfunction->packView($this->data,"checkin/CheckinForm");
	}

	public function saveAdd()
	{
		$idCheckin = $this->Mdl_checkin->saveAdd();
		redirect($this->ctl,'refresh');
	}

	public function saveCheckin()
	{
		$idCheckin = $this->Mdl_checkin->saveCheckin();
		// redirect($this->ctl,'refresh');
	}

	public function checkinformedit($key='')
	{ 
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		$this->data['checkinRoomDtl']=$this->Mdl_checkin->bookedRoom($this->data['checkinDtl']['bookedID']);
		$this->load->view('checkin/CheckinFormEdit',$this->data);
	} 

	public function checkinformcheckin($key=''){
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		$this->data['checkinRoomDtl']=$this->Mdl_checkin->bookedRoom($this->data['checkinDtl']['bookedID']);
		$this->load->view('checkin/CheckinFormEdit',$this->data);
	}

	public function bill()
	{
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$this->load->view('checkin/Bill',$this->data);
	}

	public function search(){
		if($_POST){
			$this->data['viewName']=$this->pagename;
			$this->data['keyword']=$this->input->post('keyword'); 
			$this->data['getCheckin'] = $this->showList($this->data['keyword']);
			$this->packfunction->packView($this->data,"checkin/CheckinList"); 
		}else{
			redirect('checkin/');
		}
	}

	public function last($key=''){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['getlist']=$this->Mdl_user->getLast($key);
		$this->packfunction->packView($this->data,"user/UserList");
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
