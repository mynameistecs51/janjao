<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Profile";
		$this->pagename="Profile";
		$this->load->model('Mdl_user');
		$this->dtnow = $this->packfunction->dtYMDnow();
		$this->ip_addr = $this->input->ip_address();
    $this->userID = $this->session->userdata('userID'); // ID จากตาราง Session
    $this->UserName = $this->session->userdata('UserName');
    $this->usergroupID = $this->session->userdata('usergroupID');
    if($this->userID==""){
      // ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
    	redirect('authen/');
    }

  }

  public function index(){
  	$this->data['viewName']=$this->pagename;
  	$this->data['userDtl']=$this->Mdl_user->getDetail($this->userID);
  	// $this->data['usergroup']=$this->Mdl_user->getUserGroup();
  	// $this->data['countryList']=$this->mdl_packFunction->getCountryList();
  	$this->data['getlist']=$this->Mdl_user->getList( $this->UserName);
  	$this->data['usergroupID'] = $this->usergroupID;
  	$this->packfunction->packView($this->data,"profile/Profile");
  }

  public function saveUpdate()
  {
  	if($_POST)
  	{
  		$data = array(
  			"username"		=>$_POST['username'],
  			// "password"		=>MD5(TRIM($_POST['password'])),
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

  		redirect('profile');


  	}else{
  		redirect('authen/');
  	}
  }

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */