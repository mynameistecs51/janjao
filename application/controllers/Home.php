<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Home";
		$this->pagename="HOME";
		$this->load->model('Mdl_getprovince');
		$this->userID = $this->session->userdata('userID');
		$this->UserName = $this->session->userdata('UserName');
		$this->UserGroupID = $this->session->userdata('usergroupID');
		$authRs=$this->mdl_packFunction->checkAuthen($this->pagename, $this->UserGroupID);
		if($this->userID=="" || $authRs != true){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
		}
	}

	public function index(){
		$this->data['viewName']=$this->pagename;
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		// $this->data['roomtList']=$this->mdl_packFunction->getEventList($this->UserName);
		$this->packfunction->packView($this->data,'Dashboard');
	}

	public function CheckinFormAdd($selectRoom)
	{
		$this->data['selectRoom'] = $selectRoom;
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$this->load->view('checkin/CheckinFormAdd',$this->data);
	}


	public function BookingFormAdd($selectRoom)
	{
		$this->data['selectRoom'] = $selectRoom;
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$this->load->view('booked/BookedFormAdd',$this->data);
	}

public function testArray()
{
	$this->data['data'] = "room210_room212_room214";
	// $a = str_replace('_',"','",$data);
	$b = explode('_',$this->data['data']);
	// print_r($b);
	print_r($b);

}

	public function getProvince() //แสดงรายการ รหัสไปรษณีย์ จังหวัด อำเภอ ตำบล
	{
		$zipcode =  $_POST['zipcode'];
		$showdata = $this->Mdl_getprovince->getProvince($zipcode);

		$province = array('province_id'=>$showdata[0]['PROVINCE_ID'],'province_name' => $showdata[0]['PROVINCE_NAME'],'amphur_id'=>$showdata[0]['AMPHUR_ID'],'amphur_name' => $showdata[0]['AMPHUR_NAME'],'zipcode ' => $showdata[0]['ZIPCODE']);
		foreach ($showdata as $rowProvince) {
			$dataProvince = array(
				'district_id' => $rowProvince['DISTRICT_ID'],
				'district_name' => $rowProvince['DISTRICT_NAME'],
				);
			array_push($province,array('district_name'=>$dataProvince['district_name'],'district_id'=>$dataProvince['district_id']));
		}
		echo json_encode($showdata);

	}

	public function search(){
		$this->data['viewName']=$this->pagename;
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		// $this->data['roomtList']=$this->mdl_packFunction->getEventList($this->UserName);
		$this->packfunction->packView($this->data,'Dashboard');
	}

}?>
