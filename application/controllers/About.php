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

}

/* End of file About.php */
/* Location: ./application/controllers/About.php */