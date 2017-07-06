<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Home";
		$this->pagename="HOME";
		$this->load->model('Mdl_getprovince');
		$this->load->model('Mdl_booked');
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
		$this->data['dtcheckin']=$this->packfunction->dtcheckin();
		$this->data['dtcheckout']=$this->packfunction->dtcheckout();
		// $this->data['roomType']="STANDARD";
		// $this->data['roomstatus']='EMPTY';
		$this->data['getfloor2']=$this->Mdl_booked->getRoom(2,$this->data['dtcheckin'],$this->data['dtcheckout']);
		$this->data['getfloor3']=$this->Mdl_booked->getRoom(3,$this->data['dtcheckin'],$this->data['dtcheckout']);
		$this->data['getfloor4']=$this->Mdl_booked->getRoom(4,$this->data['dtcheckin'],$this->data['dtcheckout']);
		$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>';
		// $this->data['roomtList']=$this->mdl_packFunction->getEventList($this->UserName);
		$this->packfunction->packView($this->data,'Dashboard');
	}

	public function checkinformadd($selectRoom,$din,$dout)
	{
		$this->data['selectRoom'] = $selectRoom;
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$din  = str_replace("_","/",$din);
		$dout = str_replace("_","/",$dout);
		$this->data['din'] = str_replace("T"," ",$din);
		$this->data['dout'] = str_replace("T"," ",$dout);
		$this->load->view('checkin/CheckinFormAdd',$this->data);
	}


	public function bookingformadd($selectRoom,$din,$dout)
	{
		$this->data['selectRoom'] = $selectRoom;
		$this->data['getMonth'] = $this->packfunction->getMonth();
		$this->data['getYear'] = $this->packfunction->getYear();
		$din  = str_replace("_","/",$din);
		$dout = str_replace("_","/",$dout);
		$this->data['din'] = str_replace("T"," ",$din);
		$this->data['dout'] = str_replace("T"," ",$dout);
		$this->load->view('booked/BookedFormAdd',$this->data);
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

	public function getDistrict()
	{
		$district = $this->Mdl_getprovince->getDistrict();
		echo json_encode($district);
	}

	public function search(){
		if($_POST){ 
			$this->data['dtcheckin']=$_POST['dtcheckin']!='' ? $_POST['dtcheckin']:$this->packfunction->dtcheckin();
			$this->data['dtcheckout']=$_POST['dtcheckout']!='' ? $_POST['dtcheckout']:$this->packfunction->dtcheckout();
			// $this->data['roomType']=$_POST['roomType'];
			// $this->data['roomstatus']=$_POST['roomstatus']; 
			$this->data['viewName'] =$this->pagename;
			$this->data['getfloor2']=$this->Mdl_booked->getRoom(2,$this->data['dtcheckin'],$this->data['dtcheckout']);
			$this->data['getfloor3']=$this->Mdl_booked->getRoom(3,$this->data['dtcheckin'],$this->data['dtcheckout']);
			$this->data['getfloor4']=$this->Mdl_booked->getRoom(4,$this->data['dtcheckin'],$this->data['dtcheckout']);
			$this->data['topPageName']='<b style="color:#D70F0F;font-size:18px;">Room Status</b>'; 
			$this->packfunction->packView($this->data,'Dashboard');
		}else{
			redirect('home/');
		}
	}

}?>
