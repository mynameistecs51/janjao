<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_about extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();
	}

	public function saveAdd()
	{
		$data = array(
			'address' => str_replace('\n','<br>',$this->input->post('address')),
			'mobile' => $this->input->post('mobile'),
			'vatNumber' => $this->input->post('vatNumber'),
			'comment' => $this->input->post('comment'),
			"updateDT"		=>$this->packfunction->dtYMDnow(),
			"updateBY"		=>$this->UserName
			);
		$this->db->insert('tm_company',$data);
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */