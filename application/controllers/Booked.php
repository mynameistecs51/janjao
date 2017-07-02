<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booked extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Booked";
		$this->pagename="BOOKED";
		$this->load->model('Mdl_booked'); 
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
		$this->data['getBooked'] = $this->showList($this->data['keyword']);
		$this->packfunction->packView($this->data,"booked/BookedList");
	}

	public function showList($keyword)
	{
		$data_array = array();
		foreach ($this->Mdl_booked->getBookedAll($keyword) as $key => $rowBooked) {
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

	public function saveAdd()
	{
		$idBooked = $this->Mdl_booked->saveAdd();
		redirect($this->ctl,'refresh');
	}

	public function count()
	{
		echo "<pre>";
		$startDate = date_create(date('Y-m-d H:i:s'));
		$endDate = date_create('2017-07-20 03:30:30');
		$interval = date_diff($startDate, $endDate);
		$a = array();
		$runDay = array();
		while ($startDate < $endDate) {
			$year = $startDate->format("Y");
			$month = $startDate->format("m");

			if(!array_key_exists($year, $runDay))
				$runDay[$year] = array();
			if(!array_key_exists($month, $runDay[$year]))
				$runDay[$year][$month] = 0;

			$runDay[$year][$month]++;
			$startDate->modify("+1 day");
			array_push($a, $startDate->format('Y-m-d H:i:s'));

		}
		print_r($a);


	}

	public function bookedformedit($key='')
	{
		$this->data['bookedDtl']=$this->Mdl_booked->booked($key);
		$this->data['cbookedRoomDtl']=$this->Mdl_booked->bookedRoom($this->data['bookedDtl']['bookedID']);
		$this->load->view('booked/BookedFormEdit',$this->data);
	} 

	public function search(){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']=$this->input->post('keyword');
		$this->data['getBooked'] = $this->showList($this->data['keyword']);
		$this->packfunction->packView($this->data,"booked/BookedList");
	}

	public function last($key=''){
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		//$this->data['getlist']=$this->Mdl_user->getLast($key);
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function checkdata()
	{
		$result = $this->Mdl_user->chk_data($_POST['txt'],$_POST['field'],$_POST['id']);
		echo json_encode($result);
	}

}?>
