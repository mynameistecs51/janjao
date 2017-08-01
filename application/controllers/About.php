<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="About";
		$this->pagename="About";
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

	public function index()
	{
		$this->data['viewName']=$this->pagename;
		$this->data['keyword']='';
		$this->data['aboutList'] = $this->Mdl_about->getAllabout();
		$this->packfunction->packView($this->data,"about/AboutList");
	}

	public function aboutFormAdd()
	{
		$this->load->view('about/aboutFormAdd');
	}

	public function saveAdd()
	{
		$this->Mdl_about->saveAdd();
		redirect($this->ctl,'refresh');
	}

	public function aboutFormEdit($aboutID)
	{
		$this->data['aboutList'] = '';
		$aboutList = $this->Mdl_about->getAllabout(trim($aboutID));
		// var_dump($aboutList);
		foreach ($aboutList as $rowAbout) {
			$this->data['aboutList'] = array(
				'companyID' => $rowAbout['companyID'],
				'address' => $rowAbout['address'],
				'mobile' =>  $rowAbout['mobile'],
				'vatNumber' =>  $rowAbout['vatNumber'],
				'comment' =>  $rowAbout['comment'],
				);
		}
		$this->load->view('about/aboutFormEdit',$this->data);
	}

	public function saveEdit()
	{
		$this->Mdl_about->saveEdit();
		redirect($this->ctl,'refresh');
	}

}

/* End of file About.php */
/* Location: ./application/controllers/About.php */