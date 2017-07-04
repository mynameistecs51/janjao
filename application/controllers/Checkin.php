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
		redirect('checkin/','refresh');
	}

	public function saveCheckin()
	{
		$this->Mdl_checkin->saveCheckin();
		redirect('checkin/','refresh');
	}

	public function saveUpdate(){
		$this->Mdl_checkin->saveCheckin();
		redirect('checkin/','refresh');
	}

	public function saveCancle(){ 
		if($_POST){
			$this->Mdl_checkin->saveCancle($_POST['key']);
			echo json_encode(['status'=>'success']);
		}else{
			redirect('authen/','refresh');
		}
	}

	public function saveService()
	{ 
		$this->Mdl_checkin->saveService();
		if(isset($_POST['isprint'])==true){
			echo "<script>window.open('".base_url()."checkin/billprint/','_new');</script>";
			redirect('checkin/','refresh');
		}else{
			redirect('checkin/','refresh');
		} 
		
	}

	public function  billprint(){
		echo "<script>window.print();</script>";
		echo "Print Page";
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

	public function checkinformService($key=''){
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		$this->data['serviceDtl']=$this->Mdl_checkin->serviceList($key); 
		$this->load->view('checkin/CheckinAddservice',$this->data);
	}

	

	public function bill($key='')
	{ 
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		$this->data['checkinRoomDtl']=$this->Mdl_checkin->bookedRoom($this->data['checkinDtl']['bookedID']);
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
 

	

	  

}?>
