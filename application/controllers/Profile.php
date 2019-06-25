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
    $this->data['usergroup']=$this->Mdl_user->getUserGroup();
    $this->data['countryList']=$this->mdl_packFunction->getCountryList();
    $this->load->view("profile/Profile",$this->data);
  }

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */