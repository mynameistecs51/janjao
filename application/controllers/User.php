<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="User";
		$this->pagename="SETTING"; 
		$this->load->model('Mdl_user');
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
		$this->data['getlist']=$this->Mdl_user->getList($this->data['keyword']);
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function search(){  
		$this->data['viewName']=$this->pagename; 
		$this->data['keyword']=$this->input->post('keyword');
		$this->data['getlist']=$this->Mdl_user->getList(trim($this->data['keyword']));
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function last($key=''){  
		$this->data['viewName']=$this->pagename; 
		$this->data['keyword']=''; 
		$this->data['getlist']=$this->Mdl_user->getLast($key);
		$this->packfunction->packView($this->data,"user/UserList");
	}

	public function create($ref=''){ 
		$this->data['viewName']=$this->pagename;
		$this->data['usergroup']=$this->Mdl_user->getUserGroup();
		$this->data['countryList']=$this->mdl_packFunction->getCountryList(); 
		$this->load->view("user/UserCreate",$this->data); 
	} 

	public function edit($key=''){ 
		$this->data['viewName']=$this->pagename; 
		$this->data['userDtl']=$this->Mdl_user->getDetail($key);
		$this->data['usergroup']=$this->Mdl_user->getUserGroup();
		$this->data['countryList']=$this->mdl_packFunction->getCountryList(); 
		$this->load->view("user/UserEdit",$this->data);   
	} 

	public function saveData()
	{
		if($_POST)
		{ 
			$data = array( 
				"username"	=>$_POST['username'],
				"password"	=>MD5(TRIM($_POST['password'])), 
				"useremail"	=>$_POST['useremail'],
				"userIdcard"=>$_POST['userIdcard'],
				"userTitle"	=>$_POST['userTitle'],
				"userFname"	=>$_POST['userFname'],
				"userLname"	=>$_POST['userLname'],
				"position"	=>$_POST['position'],
				"address"		=>$_POST['address'],
				"mobile"		=>$_POST['mobile'],
				"usergroupID"	=>$_POST['usergroupID'], 
				"status"		=>'ON',
				"createDT"		=>$this->packfunction->dtYMDnow(), 
				"createBY"		=>$this->UserName, 
				"updateDT"		=>$this->packfunction->dtYMDnow(), 
				"updateBY"		=>$this->UserName
			);
			$userID = $this->Mdl_user->addNewData($data,'tm_user');

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
				"username"		=>$_POST['username'],
				"password"		=>MD5(TRIM($_POST['password'])), 
				"useremail"		=>$_POST['useremail'],
				"userIdcard"	=>$_POST['userIdcard'],
				"userTitle"		=>$_POST['userTitle'],
				"userFname"		=>$_POST['userFname'],
				"userLname"		=>$_POST['userLname'],
				"position"		=>$_POST['position'],
				"address"		=>$_POST['address'],
				"mobile"		=>$_POST['mobile'],
				"usergroupID"	=>$_POST['usergroupID'], 
				"status"		=>$_POST['status'],
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

	public function saveCancle()
	{
		if($_POST)
		{ 
			$data = array( 
				"status"		=>"DISABLE",
				"updateDT"		=>$this->packfunction->dtYMDnow(), 
				"updateBY"		=>$this->UserName
			);
			$userID = $_POST['key'];
			$this->Mdl_user->updateData($data,'tm_user',$userID);
			echo json_encode(['status'=>'success']);
			
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
