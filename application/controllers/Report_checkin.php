<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_checkin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Report_checkin";
		$this->pagename="REPORT CHECKIN";
		$this->load->model('Mdl_booked');
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

	public function index()
	{
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['repCheckout'] = $this->showList($this->data['keyword']);
		// $this->data['repCheckout'] = $this->Mdl_booked->report_checkout($this->data['keyword']);
		$this->packfunction->packView($this->data,"report/reportcheckin/ReportCheckinDay.php");
	}

	public function showList($keyword = "")
	{
		$data_array = array();
		// foreach ($this->Mdl_checkin->getCheckinAll($keyword) as $key => $rowBooked) {
		foreach ($this->Mdl_checkin->report_checkin($keyword) as $key => $rowBooked) {
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
					'totalLast' => $rowBooked['totalLast'],
					'discount' => $rowBooked['discount'],	//form ts_cash_dtl
					'sumtotal' => $rowBooked['sumtotal'], 	//form ts_cash_dtl
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

	public function search($keywork = "")
	{
		$keywordDay = $this->input->post('keywordDay');
		if(!empty($keywordDay )){
			if($_POST){
				$this->data['viewName']=$this->pagename;
				$this->data['keyword']= $keywordDay;
				$this->data['repCheckout'] = $this->showList($this->data['keyword']);
				$this->packfunction->packView($this->data,"report/reportcheckin/ReportCheckinDay.php");
			}else{
				redirect('report/reportbooked/booked','refresh');
			}
		}
	}
}


/* End of file Report_checkin.php */
/* Location: ./application/controllers/Report_checkin.php */