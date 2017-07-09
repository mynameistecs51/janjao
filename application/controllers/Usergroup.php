<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usergroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Usergroup";
		$this->pagename="SETTING"; 
		$this->load->model('Mdl_usergroup');
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
		$this->data['getlist']=$this->Mdl_usergroup->getList($this->data['keyword']);
		$this->packfunction->packView($this->data,"usergroup/UsergroupList");
	}

	public function search(){  
		$this->data['viewName']=$this->pagename; 
		$this->data['keyword']=$this->input->post('keyword');
		$this->data['getlist']=$this->Mdl_usergroup->getList(trim($this->data['keyword']));
		$this->packfunction->packView($this->data,"usergroup/UsergroupList");
	}

	public function last($key=''){  
		$this->data['viewName']=$this->pagename; 
		$this->data['keyword']=''; 
		$this->data['getlist']=$this->Mdl_usergroup->getLast($key);
		$this->packfunction->packView($this->data,"usergroup/UsergroupList");
	}

	public function create($ref=''){ 
		$this->data['viewName']=$this->pagename;
		$this->load->view("usergroup/UsergroupCreate",$this->data); 
	} 

	public function edit($key=''){ 
		$this->data['viewName']=$this->pagename; 
		$this->data['usergroupDtl']=$this->Mdl_usergroup->getDetail($key);
		$this->load->view("usergroup/UsergroupEdit",$this->data);   
	} 

	public function saveData()
	{
		if($_POST)
		{ 
			$data = array( 
				"usergroupName"	=>$_POST['usergroupName'], 
				"usergroupDesc"	=>$_POST['usergroupDesc'], 
				"status"		=>'ON',
				"updateDT"		=>$this->packfunction->dtYMDnow(), 
				"updateBY"		=>$this->UserName
			);
			$usergroupID = $this->Mdl_usergroup->addNewData($data,'tm_usergroup');

			redirect('usergroup/last/'.md5($usergroupID));
		}else{
			redirect('authen/');
		}
	} 

	public function saveUpdate()
	{
		if($_POST)
		{ 
			$data = array( 
				"usergroupName"	=>$_POST['usergroupName'], 
				"usergroupDesc"	=>$_POST['usergroupDesc'],  
				"status"		=>$_POST['status'],
				"updateDT"		=>$this->packfunction->dtYMDnow(), 
				"updateBY"		=>$this->UserName
			);
			$id = $_POST['usergroupID'];
			$this->Mdl_usergroup->updateData($data,'tm_usergroup',$id);
			
			redirect('usergroup/last/'.md5($id));
			

		}else{
			redirect('authen/');
		} 
	}

	public function saveCancle()
	{
		if($_POST)
		{ 
			$data = array( 
				"status"		=>"DISABLE",
				"updateDT"		=>$this->packfunction->dtYMDnow(), 
				"updateBY"		=>$this->UserName
			);
			$id = $_POST['key'];
			$this->Mdl_usergroup->updateData($data,'tm_usergroup',$id);
			echo json_encode(['status'=>'success']);
			
		}else{
			redirect('authen/');
		} 
	}
 
	public function checkdata()
	{		
		$result = $this->Mdl_usergroup->chk_data($_POST['txt'],$_POST['field'],$_POST['id']); 
		echo json_encode($result);
	} 
 
}?>
