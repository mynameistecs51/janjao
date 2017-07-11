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
		// $this->data['repCheckout'] = $this->showList($this->data['keyword']);
		$this->data['repCheckout'] = $this->Mdl_booked->report_checkout($this->data['keyword']);
		$this->packfunction->packView($this->data,"report/reportcheckin/ReportCheckinDay.php");
	}

	public function showList($keyword='')
	{
		$data_array = array();
		foreach ($this->Mdl_booked->report_checkout($keyword) as $key => $rowList) {
			$data_array = array(
				'bookedID' => $rowList['bookedID'],
				'bookedCode' => $rowList['bookedCode'],
				'idcardno' => $rowList['idcardno'],
				'idcardnoPath' => $rowList['idcardnoPath'],
				'titleName' => $rowList['titleName'],
				'firstName' => $rowList['firstName'],
				'lastName' => $rowList['lastName'],
				'birthdate' => $rowList['birthdate'],
				'address' => $rowList['address'],
				'roomID' => $rowList['roomID'],
				'checkinDate' => $rowList['checkinDate'],
				'checkoutDate' => $rowList['checkoutDate'],
				'totalLast' => $rowList['totalLast'],
				'sumtotal' => $rowList['sumtotal'],
				'discount' => $rowList['discount'],
				);
		}
		return $data_array;
	}
}


/* End of file Report_checkin.php */
/* Location: ./application/controllers/Report_checkin.php */