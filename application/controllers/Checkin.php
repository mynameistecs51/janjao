<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Checkin";
		$this->pagename="CHECKIN";
		$this->load->model('Mdl_checkin');
		$this->load->model('Mdl_about');
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

		$id = $this->Mdl_checkin->saveAdd();
		if(isset($_POST['isprint'])==true){
			echo "<script>window.open('".base_url()."checkin/billprintcheckin/".MD5(trim($id))."','_new');</script>";
			redirect('checkin/','refresh');
		}else{
			redirect('checkin/','refresh');
		}
	}

	public function  billprintcheckin($key=''){
		 // $key = MD5(30);
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);

		$this->data['dateDtl'] = date_diff(date_create($this->data['checkinDtl']['checkInAppointDate']),date_create($this->data['checkinDtl']['checkOutAppointDate'])->modify("+1 hour"));

		if(count($this->data['checkinDtl'])>0){
			$this->data['billCode']=$this->Mdl_checkin->getBillCode();
			$this->data['getMonth'] = $this->packfunction->getMonth();
			$this->data['getDetail'] = $this->showListBill($key);
			$this->data['getYear'] = $this->packfunction->getYear();
			$this->data['serviceDtl']=$this->Mdl_checkin->serviceList($key,'ROOM');
			$this->data['about'] = $this->dataAbout();
			$this->load->view('checkin/Bill',$this->data);
		}else{
			redirect('authen/','refresh');
		}
	}

	public function showListBill($bookedID='')
	{
		$data_array = array();
		foreach ($this->Mdl_checkin->getBillCheckin($bookedID) as $key => $rowBooked) {
			if(isset($data_array[$rowBooked['bookedID']]))
			{
				array_push($data_array[$rowBooked['bookedID']]['selectRoom'],
					array(
						'bookedroomID' => $rowBooked['bookedroomID'],
						'roomID' => $rowBooked['roomID'],
						'cashr_roomID' => $rowBooked['cashr_roomID'],
						'checkinDate' => $rowBooked['checkinDate'],
						'checkoutDate' => $rowBooked['checkoutDate'],
						'comment' => $rowBooked['comment'],
						'status' => $rowBooked['status'],
						'bed' => $rowBooked['bed'],
						'roomtypeCode' => $rowBooked['roomtypeCode'],
						'price_month' => $rowBooked['price_month'],
						'price_hour' => $rowBooked['price_hour'],
						'price_short' => $rowBooked['price_short'],
						'price_day' => $rowBooked['price_day'],
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
					'cashDate' => $rowBooked['cashDate'],
					'totalVat' => $rowBooked['totalVat'],
					'totalDiscount' => $rowBooked['totalDiscount'],
					'totalLast' => $rowBooked['totalLast'],
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
							'cashr_roomID' => $rowBooked['cashr_roomID'],
							'checkinDate' => $rowBooked['checkinDate'],
							'checkoutDate' => $rowBooked['checkoutDate'],
							'comment' => $rowBooked['comment'],
							'status' => $rowBooked['status'],
							'bed' => $rowBooked['bed'],
							'roomtypeCode' => $rowBooked['roomtypeCode'],
							'price_month' => $rowBooked['price_month'],
							'price_hour' => $rowBooked['price_hour'],
							'price_short' => $rowBooked['price_short'],
							'price_day' => $rowBooked['price_day'],
							)
						)
					);
			}
		}
		return $data_array;
	}

	public function saveCheckin()
	{
		$id = $_POST['bookedID'];
		$this->Mdl_checkin->saveCheckin();
		if(isset($_POST['isprint'])==true){
			echo "<script>window.open('".base_url()."checkin/billprintcheckin/".md5(trim($id))."','_new');</script>";
			redirect('checkin/','refresh');
		}else{
			redirect('checkin/','refresh');
		}
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
			echo "<script>window.open('".base_url()."checkin/billprint/".md5(trim($_POST['bookedID']))."','_new');</script>";
			redirect('checkin/','refresh');
		}else{
			redirect('checkin/','refresh');
		}
	}

	public function saveCheckout()
	{
		// echo "<pre>";
		// print_r($_POST);
		$this->Mdl_checkin->saveCheckout();
		if(isset($_POST['isprint'])==true){
			echo "<script>window.open('".base_url()."checkin/billCheckout/".md5(trim($_POST['bookedID']))."','_new');</script>";
			redirect('checkin/','refresh');
		}else{
			redirect('checkin/','refresh');
		}
	}

	public function  billprint($key=''){
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		if(count($this->data['checkinDtl'])>0){
			$this->data['billCode']=$this->Mdl_checkin->getBillCode();
			$this->data['getMonth'] = $this->packfunction->getMonth();
			$this->data['getYear'] = $this->packfunction->getYear();
			$this->data['serviceDtl']=$this->Mdl_checkin->serviceList($key,'SERVICE');
			$this->data['about'] = $this->dataAbout();
			$this->load->view('checkin/BillService',$this->data);
		}else{
			redirect('authen/','refresh');
		}
	}

	public function  billCheckout($key=''){
		// $key = MD5('6');

		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		if(count($this->data['checkinDtl'])>0){
			$this->data['billCode']=$this->Mdl_checkin->getBillCode();
			$this->data['getMonth'] = $this->packfunction->getMonth();
			$this->data['getYear'] = $this->packfunction->getYear();
			$this->data['serviceDtl']=(empty($this->Mdl_checkin->serviceList($key,'DESTROY'))?$this->Mdl_checkin->outdontservice(trim($key)) : $this->Mdl_checkin->serviceList($key,'DESTROY') );
			$this->data['about'] = $this->dataAbout();
			$this->load->view('checkin/BillService',$this->data);
		}else{
			redirect('authen/','refresh');
		}
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
		$this->data['serviceDtl']=$this->Mdl_checkin->serviceList($key,'SERVICE');
		$this->load->view('checkin/CheckinAddservice',$this->data);
	}

	public function checkoutform($key=''){
		$this->data['tscashHTD'] = $this->Mdl_checkin->getCashHDR($key);
		$this->data['checkinDtl']=$this->Mdl_checkin->booked($key);
		$this->data['serviceDtl']=$this->Mdl_checkin->serviceList($key,'DESTROY');
		$this->data['checkinRoomDtl']=$this->Mdl_checkin->bookedRoom($this->data['checkinDtl']['bookedID']);
		$this->load->view('checkin/Checkoutform',$this->data);
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

	public function dataAbout($aboutID = '')
	{
		$this->data['aboutList'] = '';
		$aboutList = $this->Mdl_about->getAllabout($aboutID);
		foreach ($aboutList as $rowAbout) {
			$this->data['aboutList'] = array(
				'companyID' => $rowAbout['companyID'],
				'address' => $rowAbout['address'],
				'mobile' =>  $rowAbout['mobile'],
				'vatNumber' =>  $rowAbout['vatNumber'],
				'comment' =>  $rowAbout['comment'],
				);
		}
		return $this->data;
	}




}?>
