<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_booked extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Report_booked";
		$this->pagename="REPORT BOOKED";
		$this->load->model("Mdl_booked");
		$this->dtnow = $this->packfunction->dtYMDnow();
		$this->ip_addr = $this->input->ip_address();
		$this->userID = $this->session->userdata('userID'); // ID จากตาราง Session
		$this->UserName = $this->session->userdata('UserName');
		if($this->userID==""){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
		}
	}

	public function bookedday()
	{
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['getBooked'] = $this->showList($this->data['keyword']);
		$this->packfunction->packView($this->data,"report/reportbooked/ReportBookedDAY");
	}

	public function bookedMonth()
	{
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['getBooked'] = $this->showList($this->data['keyword']);
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->packfunction->packView($this->data,"report/reportbooked/ReportBookedMonth");
	}

	public function showList($keyword='')
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

	public function search()
	{
		$keywordDay = $this->input->post('keywordDay');
		$keywordMonth = $this->input->post('startMonth');
		if(!empty($keywordDay )){
			if($_POST){
				$this->data['viewName']=$this->pagename;
				$this->data['keyword']= $keywordDay;
				$this->data['getBooked'] = $this->showList($this->data['keyword']);
				$this->packfunction->packView($this->data,"report/reportbooked/ReportBookedDAY");
			}else{
				redirect('report/reportbooked/booked','refresh');
			}
		}else if(!empty($keywordMonth)){
			if($_POST){
				$this->data['viewName']=$this->pagename;
				$this->data['keyword']= '/'.$keywordMonth.'/'.$this->input->post('startYear') ;
				$this->data['getMonth'] = $this->packfunction->getMonth();
				$this->data['getBooked'] = $this->showList($this->data['keyword']);
				$this->packfunction->packView($this->data,"report/reportbooked/ReportBookedMonth");
			}else{
				redirect('report/reportbooked/bookedmonth/','refresh');
			}
		}else{
			redirect('report/reportbooked/booked','refresh');
		}
	}

	public function PDF($keyword="")
	{
		$this->data['keyword'] = ($keyword == '__________')?'':str_replace('_','/',$keyword);
		$this->data['getBooked'] = $this->showList($this->data['keyword'] );
		$this->load->view('report/reportbooked/ReportBookedPDF',$this->data);
	}
}

/* End of file Report.php */
			/* Location: ./application/controllers/Report.php */